<?php
declare(strict_types=1);

namespace App\Support;

use PDO;

class DB
{
    private static ?PDO $conn = null;

    public static function conn(): PDO
    {
        if (self::$conn === null) {
            $host = $_ENV['DB_HOST'] ?? '127.0.0.1';
            $db   = $_ENV['DB_NAME'] ?? '';
            $user = $_ENV['DB_USER'] ?? 'root';
            $pass = $_ENV['DB_PASS'] ?? '';

            $dsn = "mysql:host=$host;dbname=$db;charset=utf8mb4";

            self::$conn = new PDO($dsn, $user, $pass, [
                PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            ]);
        }

        return self::$conn;
    }
}
