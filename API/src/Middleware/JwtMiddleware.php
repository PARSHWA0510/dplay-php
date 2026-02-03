<?php
declare(strict_types=1);

namespace App\Middleware;

use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Server\RequestHandlerInterface as Handler;
use Psr\Http\Message\ResponseInterface as Response;
use Slim\Psr7\Response as SlimResponse;

class JwtMiddleware
{
    public function __invoke(Request $request, Handler $handler): Response
    {
        $authHeader = $request->getHeaderLine('Authorization');

        if (!preg_match('/Bearer\s+(.+)$/i', $authHeader, $matches)) {
            return $this->unauthorized('Missing or invalid Authorization header');
        }

        $token = $matches[1];

        try {
            $decoded = JWT::decode($token, new Key($_ENV['JWT_SECRET'], 'HS256'));
        } catch (\Throwable $e) {
            return $this->unauthorized('Invalid or expired token');
        }

        $request = $request->withAttribute('user', (array)$decoded);

        return $handler->handle($request);
    }

    private function unauthorized(string $message): Response
    {
        $response = new SlimResponse();
        $response->getBody()->write(json_encode([
            'success' => false,
            'message' => $message
        ]));
        return $response->withStatus(401)
                        ->withHeader('Content-Type', 'application/json');
    }
}
