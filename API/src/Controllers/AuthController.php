<?php
declare(strict_types=1);

namespace App\Controllers;

use App\Support\DB;
use Firebase\JWT\JWT;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use DateTimeImmutable;

class AuthController
{
    private function json(Response $response, $data, int $status = 200): Response
    {
        $response->getBody()->write(json_encode($data));
        return $response->withStatus($status)
                        ->withHeader('Content-Type', 'application/json');
    }

    private function createTokens(array $user): array
    {
        $now  = new DateTimeImmutable();
        $iat  = $now->getTimestamp();
        $exp  = $iat + (int)($_ENV['JWT_TTL'] ?? 900);
        $rExp = $iat + (int)($_ENV['JWT_REFRESH_TTL'] ?? 2592000);

        $payload = [
            'sub'   => $user['id'],
            'email' => $user['email'],
            'role'  => $user['role'] ?? 'user',
            'iat'   => $iat,
            'exp'   => $exp,
        ];

        $accessToken  = JWT::encode($payload, $_ENV['JWT_SECRET'], 'HS256');
        $refreshToken = bin2hex(random_bytes(40));

        $pdo = DB::conn();
        $stmt = $pdo->prepare("
            INSERT INTO auth_tokens (user_id, refresh_token, expires_at)
            VALUES (?, ?, FROM_UNIXTIME(?))
        ");
        $stmt->execute([$user['id'], $refreshToken, $rExp]);

        return [
            'access_token'  => $accessToken,
            'refresh_token' => $refreshToken,
            'expires_in'    => $exp
        ];
    }

   public function register(Request $request, Response $response): Response
    {
    $data = (array)$request->getParsedBody();
    $email     = trim($data['email'] ?? '');
    $password  = $data['password'] ?? '';
    $firstName = trim($data['first_name'] ?? '');
    $lastName  = trim($data['last_name'] ?? '');
    $gender    = trim($data['gender'] ?? '');
    $fullName  = trim($firstName . ' ' . $lastName);
    $todaydate = date('Y-m-d');
    if (!$email || !$password) {
        return $this->json($response, [
            'success' => false,
            'message' => 'Email and password are required'
        ], 422);
    }

    $pdo = DB::conn();

    // Check duplicate
    $stmt = $pdo->prepare("SELECT id FROM user_master WHERE email1 = ?");
    $stmt->execute([$email]);
    if ($stmt->fetch()) {
        return $this->json($response, [
            'success' => false,
            'message' => 'Email already registered'
        ], 409);
    }

    $hash = password_hash($password, PASSWORD_BCRYPT);

    try {
        $pdo->beginTransaction();

        // Insert into users table
        $stmt = $pdo->prepare("
            INSERT INTO users (email, first_name, last_name, full_name, picture, verifiedEmail, token)
            VALUES (?, ?, ?, ?, '', 0, '')
        ");
        $stmt->execute([$email, $firstName, $lastName, $fullName]);
       

        // Insert into user_master table
        $stmt = $pdo->prepare("
            INSERT INTO user_master 
            (user_type, username, password, name, email1, verifiedEmail, status, gender,join_date, token)
            VALUES ('customer', ?, ?, ?, ?, 0, 1, ?, ?, ?)
        ");
        $stmt->execute([
            $email,          // username
            $password,           // password
            $fullName,       // name
            $email,
            $gender,
            $todaydate,
            $hash           // email1
        ]);
        $userId = (int)$pdo->lastInsertId();
        $pdo->commit();

    } catch (\Exception $e) {
        $pdo->rollBack();
        return $this->json($response, [
            'success' => false,
            'message' => 'Registration failed',
            'error'   => $e->getMessage()
        ], 500);
    }

    $user = [
        'id'    => $userId,
        'email' => $email,
        'role'  => 'user'
    ];

    $tokens = $this->createTokens($user);

    return $this->json($response, [
        'success' => true,
        'user'    => [
            'id'         => $userId,
            'email'      => $email,
            'first_name' => $firstName,
            'last_name'  => $lastName
        ],
        'tokens'  => $tokens
    ], 201);
    }


    public function login(Request $request, Response $response): Response
    {
        $data = (array)$request->getParsedBody();
        $email    = trim($data['email'] ?? '');
        $password = $data['password'] ?? '';

        if (!$email || !$password) {
            return $this->json($response, [
                'success' => false,
                'message' => 'Email and password are required'
            ], 422);
        }

        $pdo = DB::conn();
        $stmt = $pdo->prepare("
            SELECT id, email1,name, user_type,password, token AS password_hash
            FROM user_master
            WHERE email1 = ?
        ");
        $stmt->execute([$email]);
        $user = $stmt->fetch();
        list($first, $last) = explode(' ', trim($user['name']), 2);

        if (!$user ||  $user['password'] !== $password &&!password_verify($password, $user['password_hash'])) {
            return $this->json($response, [
                'success' => false,
                'message' => 'Invalid credentials'
            ], 401);
        }

        $tokens = $this->createTokens([
            'id'    => $user['id'],
            'email' => $user['email1'],
            'user_type'  => $user['user_type']
        ]);

        return $this->json($response, [
            'success' => true,
            'user'    => [
            'id'         => $user['id'],
            'email'      => $user['email1'],
            'first_name' => $first,
            'last_name'  => $last,
            'user_type'  => $user['user_type']
        ],
            'tokens'  => $tokens
        ]);
    }

    public function refresh(Request $request, Response $response): Response
    {
        $data = (array)$request->getParsedBody();
        $refreshToken = $data['refresh_token'] ?? '';

        if (!$refreshToken) {
            return $this->json($response, [
                'success' => false,
                'message' => 'Refresh token is required'
            ], 422);
        }

        $pdo = DB::conn();
        $stmt = $pdo->prepare("
            SELECT at.user_id, u.email1 as email
            FROM auth_tokens at
            JOIN user_master u ON u.id = at.user_id
            WHERE at.refresh_token = ?
              AND at.expires_at > NOW()
        ");
        $stmt->execute([$refreshToken]);
        $row = $stmt->fetch();

        if (!$row) {
            return $this->json($response, [
                'success' => false,
                'message' => 'Invalid or expired refresh token'
            ], 401);
        }

        $pdo->prepare("DELETE FROM auth_tokens WHERE refresh_token = ?")
            ->execute([$refreshToken]);

        $user = [
            'id'    => $row['user_id'],
            'email' => $row['email'],
            'role'  => 'user'
        ];

        $tokens = $this->createTokens($user);

        return $this->json($response, [
            'success' => true,
            'tokens'  => $tokens
        ]);
    }

    public function me(Request $request, Response $response): Response
    {
        $payload = $request->getAttribute('user');
        $userId  = (int)$payload['sub'];

        $pdo = DB::conn();
        $stmt = $pdo->prepare("
            SELECT id, email1,contact1,name, user_type, photo
            FROM user_master
            WHERE id = ?
        ");
        $stmt->execute([$userId]);
        $user = $stmt->fetch();

        if (!$user) {
            return $this->json($response, [
                'success' => false,
                'message' => 'User not found'
            ], 404);
        }

        return $this->json($response, [
            'success' => true,
            'user'    => $user
        ]);
    }
}
