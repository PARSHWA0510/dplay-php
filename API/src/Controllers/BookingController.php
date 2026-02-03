<?php
declare(strict_types=1);

namespace App\Controllers;

use App\Support\DB;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use PDO;

class BookingController
{
    /* ==========
     *  Helpers
     * ========== */

    private function json(Response $response, $data, int $status = 200): Response
    {
        $response->getBody()->write(json_encode($data));
        return $response->withStatus($status)
                        ->withHeader('Content-Type', 'application/json');
    }

    private function jsonError(Response $response, int $status, string $message): Response
    {
        return $this->json($response, [
            'success' => false,
            'message' => $message,
        ], $status);
    }

    /**
     * Calculate base + final price (with discount) for a slot on a date
     * Logic matches court-book.php
     */
    private function calculateSlotPrice(PDO $db, int $courtId, array $slotRow, string $date): array
    {
        $dayNumber = (int) date('N', strtotime($date)); // 1=Mon ... 7=Sun
        $isWeekend = $dayNumber >= 6;

        // Base price comes from weekday/weekend column
        $basePrice = $isWeekend
            ? (float)$slotRow['weeekend_slot_price']
            : (float)$slotRow['weeekday_slot_price'];

        $finalPrice  = $basePrice;
        $discountPer = 0.0;
        $discountRs  = 0.0;

        // Discount from discount_master for 'courtbook'
        $stmt = $db->prepare("
            SELECT discount_per, discount_rs
            FROM discount_master
            WHERE court_id = :court_id
              AND status = 1
              AND discount_for = 'courtbook'
              AND start_date <= :book_date
              AND end_date   >= :book_date
            LIMIT 1
        ");
        $stmt->execute([
            ':court_id'  => $courtId,
            ':book_date' => $date,
        ]);
        $discount = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($discount) {
            $discountPer = (float)$discount['discount_per'];
            $discountRs  = (float)$discount['discount_rs'];

            if ($discountPer != 0.0) {
                $amount = ($basePrice * $discountPer) / 100;
                $finalPrice = $basePrice - $amount;
            } else {
                $finalPrice = ceil($basePrice - $discountRs);
            }
        }

        return [
            'base_price'   => $basePrice,
            'final_price'  => $finalPrice,
            'discount_per' => $discountPer,
            'discount_rs'  => $discountRs,
        ];
    }

    /* ==============================
     * GET /api/v1/bookings/slots
     * ============================== */
    public function getSlots(Request $request, Response $response): Response
    {
        $pdo    = DB::conn();
        $params = $request->getQueryParams();

        $courtId = (int)($params['court_id'] ?? 0);
        $date    = $params['date'] ?? date('Y-m-d');

        if (!$courtId || !$date) {
            return $this->jsonError($response, 422, 'court_id and date are required');
        }

        $today   = date('Y-m-d');
        $nowTime = date('H:i:s');

        $dayNumber = (int) date('N', strtotime($date));
        $isWeekend = $dayNumber >= 6;

        // Build WHERE like original court-book.php
        $conditions = ['court_id = :court_id'];
        if ($isWeekend) {
            $conditions[] = "weeekend_slot_price != 0";
            $conditions[] = "weeekend_slot_status = 1";
        } else {
            $conditions[] = "weeekday_slot_price != 0";
            $conditions[] = "weeekday_slot_status = 1";
        }

        // For today, only show future slots
        if ($date === $today) {
            $conditions[] = "start_time > :now_time";
        }

        $whereSql = implode(' AND ', $conditions);

        // NOTE: autono is the ordering column in original code
        $sql = "
            SELECT
              id,
              court_id,
              slot_timing,
              weeekday_slot_price,
              weeekend_slot_price,
              weeekday_slot_status,
              weeekend_slot_status,
              noof_booking,
              start_time,
              end_time,
              weekday_commission,
              weekend_commission
            FROM court_slot
            WHERE $whereSql
            ORDER BY autono ASC
        ";

        $stmt = $pdo->prepare($sql);
        $bindings = [
            ':court_id' => $courtId,
        ];
        if ($date === $today) {
            $bindings[':now_time'] = $nowTime;
        }
        $stmt->execute($bindings);
        $slots = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $result = [];

        foreach ($slots as $slot) {
            $slotId     = (int)$slot['id'];
            $slotTiming = $slot['slot_timing'];
            $capacity   = (int)$slot['noof_booking'];

            // 1) Check if slot is disabled for this date (slot_disable)
            $stmtDis = $pdo->prepare("
                SELECT 1
                FROM slot_disable
                WHERE court_id   = :court_id
                  AND court_time = :court_time
                  AND disable_date = :book_date
                LIMIT 1
            ");
            $stmtDis->execute([
                ':court_id'   => $courtId,
                ':court_time' => $slotTiming,
                ':book_date'  => $date,
            ]);
            $isDisabled = (bool)$stmtDis->fetchColumn();

            // 2) Count confirmed bookings (payment_status IN (1,2))
            $stmtCnt = $pdo->prepare("
                SELECT COUNT(*)
                FROM user_court
                WHERE court_id   = :court_id
                  AND court_time = :court_time
                  AND court_date = :book_date
                  AND payment_status IN (1,2)
            ");
            $stmtCnt->execute([
                ':court_id'   => $courtId,
                ':court_time' => $slotTiming,
                ':book_date'  => $date,
            ]);
            $bookedCount = (int)$stmtCnt->fetchColumn();

            $isFull = $bookedCount >= $capacity;

            // 3) Price and discount (same as web)
            $priceInfo = $this->calculateSlotPrice($pdo, $courtId, $slot, $date);

            $result[] = [
                'slot_id'         => $slotId,
                'time'            => $slotTiming,
                'base_price'      => $priceInfo['base_price'],
                'final_price'     => $priceInfo['final_price'],
                'discount_per'    => $priceInfo['discount_per'],
                'discount_rs'     => $priceInfo['discount_rs'],
                'capacity'        => $capacity,
                'booked_count'    => $bookedCount,
                'is_disabled'     => $isDisabled,
                'is_fully_booked' => $isFull,
                'is_available'    => !$isDisabled && !$isFull,
            ];
        }

        return $this->json($response, [
            'success'  => true,
            'court_id' => $courtId,
            'date'     => $date,
            'slots'    => $result,
        ]);
    }

    /* ==============================
     * POST /api/v1/bookings
     * ============================== */
    public function create(Request $request, Response $response): Response
    {
        $pdo         = DB::conn();
        $data        = (array)$request->getParsedBody();
        $userPayload = $request->getAttribute('user'); // from JwtMiddleware
        $userId      = (int)($userPayload['sub'] ?? 0);

        $courtId = (int)($data['court_id'] ?? 0);
        $slotId  = (int)($data['slot_id'] ?? 0);
        $date    = $data['date'] ?? null;

        if (!$userId) {
            return $this->jsonError($response, 401, 'Unauthorized');
        }

        if (!$courtId || !$slotId || !$date) {
            return $this->jsonError($response, 422, 'court_id, slot_id and date are required');
        }

        // 1) Load slot
        $stmtSlot = $pdo->prepare("
            SELECT *
            FROM court_slot
            WHERE id = :slot_id
              AND court_id = :court_id
        ");
        $stmtSlot->execute([
            ':slot_id'  => $slotId,
            ':court_id' => $courtId,
        ]);
        $slot = $stmtSlot->fetch(PDO::FETCH_ASSOC);

        if (!$slot) {
            return $this->jsonError($response, 404, 'Slot not found');
        }

        $slotTiming = $slot['slot_timing'];
        $capacity   = (int)$slot['noof_booking'];

        // 2) Slot disabled check
        $stmtDis = $pdo->prepare("
            SELECT 1
            FROM slot_disable
            WHERE court_id   = :court_id
              AND court_time = :court_time
              AND disable_date = :book_date
            LIMIT 1
        ");
        $stmtDis->execute([
            ':court_id'   => $courtId,
            ':court_time' => $slotTiming,
            ':book_date'  => $date,
        ]);
        if ($stmtDis->fetchColumn()) {
            return $this->jsonError($response, 400, 'Slot disabled for this date');
        }

        // 3) Capacity check (booked/confirmed)
        $stmtCnt = $pdo->prepare("
            SELECT COUNT(*)
            FROM user_court
            WHERE court_id   = :court_id
              AND court_time = :court_time
              AND court_date = :book_date
              AND payment_status IN (1,2)
        ");
        $stmtCnt->execute([
            ':court_id'   => $courtId,
            ':court_time' => $slotTiming,
            ':book_date'  => $date,
        ]);
        $bookedCount = (int)$stmtCnt->fetchColumn();

        if ($bookedCount >= $capacity) {
            return $this->jsonError($response, 409, 'Slot already fully booked');
        }

        // 4) Prevent user double-booking same slot
        $stmtDup = $pdo->prepare("
            SELECT id
            FROM user_court
            WHERE user_id    = :user_id
              AND court_id   = :court_id
              AND court_time = :court_time
              AND court_date = :book_date
              AND payment_status IN (0,1,2)
            LIMIT 1
        ");
        $stmtDup->execute([
            ':user_id'    => $userId,
            ':court_id'   => $courtId,
            ':court_time' => $slotTiming,
            ':book_date'  => $date,
        ]);
        if ($stmtDup->fetchColumn()) {
            return $this->jsonError($response, 409, 'You already have this slot in cart or booked');
        }

        // 5) Calculate price
        $priceInfo  = $this->calculateSlotPrice($pdo, $courtId, $slot, $date);
        $finalPrice = $priceInfo['final_price'];

        // 6) Get venue_id & manager_id from court_master
        $stmtCourt = $pdo->prepare("
            SELECT venue_id, user_id AS manager_id
            FROM court_master
            WHERE id = :court_id
        ");
        $stmtCourt->execute([':court_id' => $courtId]);
        $courtInfo = $stmtCourt->fetch(PDO::FETCH_ASSOC);

        $venueId   = $courtInfo ? (int)$courtInfo['venue_id'] : 0;
        $managerId = $courtInfo ? (int)$courtInfo['manager_id'] : 0;

        // 7) Simple order_no generation (you can refine)
        $orderNoRow = $pdo->query("SELECT IFNULL(MAX(order_no), 10000) + 1 AS next_no FROM user_court")
                          ->fetch(PDO::FETCH_ASSOC);
        $orderNo = (int)$orderNoRow['next_no'];

        // 8) Insert booking as pending (payment_status = 0, like cart)
        $stmtIns = $pdo->prepare("
            INSERT INTO user_court
            (
              user_id,
              venue_id,
              court_id,
              court_date,
              court_time,
              court_price,
              slot_id,
              payment_status,
              order_no
            )
            VALUES
            (
              :user_id,
              :venue_id,
              :court_id,
              :court_date,
              :court_time,
              :court_price,
              :slot_id,
              0,
              :order_no
            )
        ");

        $stmtIns->execute([
            ':user_id'     => $userId,
            ':venue_id'    => $venueId,
            ':court_id'    => $courtId,
            ':court_date'  => $date,
            ':court_time'  => $slotTiming,
            ':court_price' => $finalPrice,
            ':slot_id'     => $slotId,
            ':order_no'    => $orderNo,
        ]);

        $bookingId = (int)$pdo->lastInsertId();

        return $this->json($response, [
            'success'      => true,
            'booking_id'   => $bookingId,
            'order_no'     => $orderNo,
            'court_id'     => $courtId,
            'venue_id'     => $venueId,
            'slot_id'      => $slotId,
            'court_date'   => $date,
            'court_time'   => $slotTiming,
            'amount'       => $finalPrice,
            'price_detail' => $priceInfo,
            'status'       => 'pending', // waiting for payment
        ], 201);
    }

    /* ==============================
     * GET /api/v1/bookings
     * ============================== */
    public function list(Request $request, Response $response): Response
    {
        $pdo         = DB::conn();
        $userPayload = $request->getAttribute('user');
        $userId      = (int)($userPayload['sub'] ?? 0);
        $role        = $userPayload['role'] ?? 'user';

        $params  = $request->getQueryParams();
        $page    = max(1, (int)($params['page'] ?? 1));
        $perPage = min(50, max(1, (int)($params['per_page'] ?? 10)));
        $offset  = ($page - 1) * $perPage;

        $whereSql = 'WHERE uc.payment_status >= 0';
        $bindings = [];

        if ($role !== 'admin') {
            $whereSql .= ' AND uc.user_id = :user_id';
            $bindings[':user_id'] = $userId;
        }

        $countSql = "SELECT COUNT(*) AS total FROM user_court uc $whereSql";
        $stmtCnt  = $pdo->prepare($countSql);
        $stmtCnt->execute($bindings);
        $total = (int)$stmtCnt->fetch(PDO::FETCH_ASSOC)['total'];

        $sql = "
            SELECT
              uc.id,
              uc.court_date,
              uc.court_time,
              uc.court_price,
              uc.payment_status,
              uc.order_no,
              uc.order_id,
              vm.name AS venue_name,
              cm.name AS court_name
            FROM user_court uc
            LEFT JOIN venue_master vm ON vm.id = uc.venue_id
            LEFT JOIN court_master cm ON cm.id = uc.court_id
            $whereSql
            ORDER BY uc.court_date DESC, uc.court_time ASC
            LIMIT $perPage OFFSET $offset
        ";
        $stmt = $pdo->prepare($sql);
        $stmt->execute($bindings);
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $data = array_map(static function (array $r) {
            return [
                'id'             => (int)$r['id'],
                'venue_name'     => $r['venue_name'],
                'court_name'     => $r['court_name'],
                'date'           => $r['court_date'],
                'time'           => $r['court_time'],
                'price'          => (float)$r['court_price'],
                'payment_status' => (int)$r['payment_status'],
                'order_no'       => (int)$r['order_no'],
                'order_id'       => $r['order_id']
            ];
        }, $rows);

        return $this->json($response, [
            'success'    => true,
            'data'       => $data,
            'pagination' => [
                'page'       => $page,
                'per_page'   => $perPage,
                'total'      => $total,
                'totalPages' => (int)ceil($total / $perPage),
            ],
        ]);
    }

    /* ==============================
     * GET /api/v1/bookings/{id}
     * ============================== */
    public function details(Request $request, Response $response, array $args): Response
    {
        $pdo         = DB::conn();
        $bookingId   = (int)$args['id'];
        $userPayload = $request->getAttribute('user');
        $userId      = (int)($userPayload['sub'] ?? 0);
        $role        = $userPayload['role'] ?? 'user';

        $sql = "
            SELECT
              uc.*,
              vm.name  AS venue_name,
              vm.address,
              vm.city,
              vm.state,
              cm.name  AS court_name,
              cm.sport_type
            FROM user_court uc
            LEFT JOIN venue_master vm ON vm.id = uc.venue_id
            LEFT JOIN court_master cm ON cm.id = uc.court_id
            WHERE uc.id = :id
        ";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([':id' => $bookingId]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$row) {
            return $this->jsonError($response, 404, 'Booking not found');
        }

        if ($role !== 'admin' && (int)$row['user_id'] !== $userId) {
            return $this->jsonError($response, 403, 'Forbidden');
        }

        $data = [
            'id'             => (int)$row['id'],
            'venue_name'     => $row['venue_name'],
            'court_name'     => $row['court_name'],
            'sport_type'     => $row['sport_type'],
            'date'           => $row['court_date'],
            'time'           => $row['court_time'],
            'price'          => (float)$row['court_price'],
            'payment_status' => (int)$row['payment_status'],
            'order_no'       => (int)$row['order_no'],
            'address'        => $row['address'],
            'city'           => $row['city'],
            'state'          => $row['state'],
        ];

        return $this->json($response, [
            'success' => true,
            'data'    => $data,
        ]);
    }

    /* ==============================
     * POST /api/v1/bookings/{id}/cancel
     * ============================== */
    public function cancel(Request $request, Response $response, array $args): Response
    {
        $pdo         = DB::conn();
        $bookingId   = (int)$args['id'];
        $userPayload = $request->getAttribute('user');
        $userId      = (int)($userPayload['sub'] ?? 0);
        $role        = $userPayload['role'] ?? 'user';

        $stmt = $pdo->prepare("SELECT * FROM user_court WHERE id = :id");
        $stmt->execute([':id' => $bookingId]);
        $booking = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$booking) {
            return $this->jsonError($response, 404, 'Booking not found');
        }

        if ($role !== 'admin' && (int)$booking['user_id'] !== $userId) {
            return $this->jsonError($response, 403, 'Forbidden');
        }

        // 3 = cancelled (same as web conventions)
        $upd = $pdo->prepare("
            UPDATE user_court
            SET payment_status = 3
            WHERE id = :id
        ");
        $upd->execute([':id' => $bookingId]);

        return $this->json($response, [
            'success' => true,
            'message' => 'Booking cancelled',
            'data'    => [
                'id'     => $bookingId,
                'status' => 'cancelled',
            ],
        ]);
    }
}
