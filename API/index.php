<?php
declare(strict_types=1);

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

use Slim\Factory\AppFactory;

require __DIR__ . '/vendor/autoload.php';

// Load env (FIXED)
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->safeLoad();

// Debug check
//var_dump($_ENV['DB_HOST'] ?? 'ENV NOT LOADED');
//exit;

$app = AppFactory::create();
$app->addBodyParsingMiddleware();

(require __DIR__ . '/src/routes.php')($app);

$app->run();