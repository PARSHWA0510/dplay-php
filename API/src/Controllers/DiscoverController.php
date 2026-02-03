<?php
declare(strict_types=1);

namespace App\Controllers;

use App\Support\DB;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use PDO;

class DiscoverController
{
    private function json(Response $response, $data, int $status = 200): Response
    {
        $response->getBody()->write(json_encode($data));
        return $response->withStatus($status)
                        ->withHeader('Content-Type', 'application/json');
    }

    public function listVenues(Request $request, Response $response): Response
    {
        $pdo = DB::conn();
        $params  = $request->getQueryParams();
        $page    = max(1, (int)($params['page'] ?? 1));
        $perPage = min(50, max(1, (int)($params['per_page'] ?? 10)));
        $offset  = ($page - 1) * $perPage;

        $city  = $params['city'] ?? null;
        $sport = $params['sport'] ?? null;

        $where    = ['status = 1'];
        $bindings = [];

        if ($city) {
            $where[]    = 'city = ?';
            $bindings[] = $city;
        }

        if ($sport) {
            $where[]    = 'sport_type LIKE ?';
            $bindings[] = '%' . $sport . '%';
        }

        $whereSql = $where ? 'WHERE ' . implode(' AND ', $where) : '';

        $countStmt = $pdo->prepare("SELECT COUNT(*) AS total FROM venue_master $whereSql");
        $countStmt->execute($bindings);
        $total = (int)$countStmt->fetch()['total'];

        $sql = "
            SELECT
              id,
              name,
              city,
              state,
              small_des,
              photo,
              seo_url,
              sport_type
            FROM venue_master
            $whereSql
            ORDER BY id DESC
            LIMIT $perPage OFFSET $offset
        ";
        $stmt = $pdo->prepare($sql);
        $stmt->execute($bindings);
        $venues = $stmt->fetchAll();

        return $this->json($response, [
            'success' => true,
            'data'    => $venues,
            'pagination' => [
                'page'       => $page,
                'per_page'   => $perPage,
                'total'      => $total,
                'totalPages' => (int)ceil($total / $perPage)
            ]
        ]);
    }

    public function venueDetails(Request $request, Response $response, array $args): Response
    {
        $id  = (int)$args['id'];
        $pdo = DB::conn();

        $stmt = $pdo->prepare("
            SELECT
              id, manager_id, name, owner_name,
              email1, contact1,
              google_map, address, state, city,
              about_venue, seo_title, seo_keyword, seo_description,
              sport_type, logo_img, photo,
              note_court, note_membership
            FROM venue_master
            WHERE id = ? AND status = 1
        ");
        $stmt->execute([$id]);
        $venue = $stmt->fetch();

        if (!$venue) {
            return $this->json($response, [
                'success' => false,
                'message' => 'Venue not found'
            ], 404);
        }

        $photoStmt = $pdo->prepare("
            SELECT id, image
            FROM venue_photo
            WHERE venue_id = ? AND status = 1
        ");
        $photoStmt->execute([$id]);
        $photos = $photoStmt->fetchAll();

        $incStmt = $pdo->prepare("
            SELECT id, name
            FROM venue_includes
            WHERE venue_id = ? AND status = 1
        ");
        $incStmt->execute([$id]);
        $includes = $incStmt->fetchAll();

        $ruleStmt = $pdo->prepare("
            SELECT id, name
            FROM venue_rules
            WHERE venue_id = ? AND status = 1
        ");
        $ruleStmt->execute([$id]);
        $rules = $ruleStmt->fetchAll();

        $courtStmt = $pdo->prepare("
            SELECT
              id, name, sport_type, surface_type,
              noof_player, start_time, end_time, time_slot, status
            FROM court_master
            WHERE venue_id = ? AND status = 1
        ");
        $courtStmt->execute([$id]);
        $courts = $courtStmt->fetchAll();

        return $this->json($response, [
            'success' => true,
            'data'    => [
                'venue'     => $venue,
                'photos'    => $photos,
                'includes'  => $includes,
                'rules'     => $rules,
                'courts'    => $courts
            ]
        ]);
    }
    public function discoverMobile(Request $request, Response $response): Response
    {
    $pdo = DB::conn();
    $data = (array)$request->getParsedBody();

    $city = strtolower(trim($data['city'] ?? ''));

    // ---- NEW: Top Sports from Database ----
    $sportsQuery = "
        SELECT 
            id,
            name AS display_title,
            CONCAT('https://dplays.in/images/', icon) AS icon
        FROM sport_type
        WHERE home_status = 1
        ORDER BY  id ASC
    ";

    $stmtSports = $pdo->query($sportsQuery);
    $topSports = [];

    while ($row = $stmtSports->fetch(PDO::FETCH_ASSOC)) {
        $topSports[] = [
            "id" => strtolower(str_replace(" ", "_", $row['display_title'])),
            "display_title" => $row['display_title'],
            "icon" => $row['icon']
        ];
    }

    // ---- Featured Venues Query (same as previous version) ----
    $query = "
        SELECT id, name, small_des AS subtitle, address, city, latitude, longitude, photo as image 
        FROM venue_master 
        WHERE LOWER(city) = :city 
        AND status = 1
        LIMIT 12
    ";
    $stmt = $pdo->prepare($query);
    $stmt->execute([':city' => $city]);
    $venues = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // ---- Format Venues for Mobile ----
    $formattedVenues = [];

    foreach ($venues as $v) {

        $ratingQ = $pdo->prepare("
            SELECT COUNT(*) as total, AVG(rating) as avgRating 
            FROM venue_review 
            WHERE venue_id = :id
        ");
        $ratingQ->execute([":id" => $v['id']]);
        $rating = $ratingQ->fetch(PDO::FETCH_ASSOC);

        $formattedVenues[] = [
            "id_key"=> $v['id'],
            "id" => strtolower(str_replace(" ", "_", $v['name'])),
            "display_title" => $v['name'],
            "display_subtitle" => $v['subtitle'],
            "location" => [
                "address" => $v['address'],
                "latitude" => floatval($v['latitude']),
                "longitude" => floatval($v['longitude']),
            ],
            "review_data" => [
                "count" => intval($rating['total'] ?? 0),
                "average_rating" => round(floatval($rating['avgRating'] ?? 0), 1)
            ],
            "icon" => "https://dplays.in/images/" . $v['image']
        ];
    }

    // ---- Final Response ----
    $payload = [
        "status_code" => 200,
        "status" => true,
        "data" => [
            "top_sports" => [
                "display_title" => "Top Sports",
                "display_subtitle" => "\"Your Arena of Action – Watch, Play, and Compete!\" Explore the most loved and widely played sports on Dplay.",
                "games" => $topSports
            ],
            "featured_venues" => [
                "display_title" => "Featured Venues",
                "display_subtitle" => "Advanced sports venues offer the latest facilities, dynamic and unique environments for enhanced sport performance.",
                "venues" => $formattedVenues
            ]
        ]
    ];

    $response->getBody()->write(json_encode($payload));
    return $response->withHeader('Content-Type', 'application/json');
    }
}
