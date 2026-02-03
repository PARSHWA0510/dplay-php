<?php
declare(strict_types=1);

use Slim\App;
use App\Controllers\AuthController;
use App\Controllers\DiscoverController;
use App\Controllers\BookingController;
use App\Middleware\JwtMiddleware;

return function (App $app) {

     // ✅ ADD THIS TEST ROUTE
    $app->get('/', function ($request, $response) {
        $response->getBody()->write(json_encode([
            'success' => true,
            'message' => 'DPlay API is running 🚀',
        ]));
        return $response->withHeader('Content-Type', 'application/json');
    });

    $jwt = new JwtMiddleware();

    // AUTH
    $app->post('/api/v1/auth/register', [AuthController::class, 'register']);
    $app->post('/api/v1/auth/login',    [AuthController::class, 'login']);
    $app->post('/api/v1/auth/refresh',  [AuthController::class, 'refresh']);
    $app->get('/api/v1/auth/me',        [AuthController::class, 'me'])
        ->add($jwt);

    // DISCOVER
    $app->get('/api/v1/discover/venues',      [DiscoverController::class, 'listVenues']);
    $app->get('/api/v1/discover/venues/{id}', [DiscoverController::class, 'venueDetails']);
    
    $app->post('/api/v1/discovermobile', [DiscoverController::class, 'discoverMobile']);
    // BOOKINGS
    $app->post('/api/v1/bookings/slots', [BookingController::class, 'getSlots']);

    $app->post('/api/v1/bookings', [BookingController::class, 'create'])
        ->add($jwt);

    $app->get('/api/v1/bookings', [BookingController::class, 'list'])
        ->add($jwt);

    $app->get('/api/v1/bookings/{id}', [BookingController::class, 'details'])
        ->add($jwt);

    $app->post('/api/v1/bookings/{id}/cancel', [BookingController::class, 'cancel'])
        ->add($jwt);
};
