<?php

use Bramus\Router\Router;
// Require composer autoloader
require __DIR__ . '/../vendor/autoload.php'; // Adjust the path based on your project structure

// Create Router instance
$router = new Router();

// Define routes
// Create Router instance with base path
$router->setNamespace('\App\Controllers');

// Home route
$router->get('/','HomeController@index');


// Authentication routes
$router->get('/login', function() {
    include __DIR__ . '/../Authentication/Login.php';
});

$router->get('/registration', function() {
    include __DIR__ . '/../Authentication/Registration.php';
});

$router->get('/logout', function() {
    include __DIR__ . '/../Authentication/Logout.php';
});

// Booking routes
$router->get('/booking', function() {
    include __DIR__ . '/../Booking/Booking.php';
});

$router->get('/mybookings', function() {
    include __DIR__ . '/../Booking/mybookings.php';
});

$router->get('/view-booking', function() {
    include __DIR__ . '/../Booking/view-booking.php';
});

// Room routes
$router->get('/allrooms', function() {
    include __DIR__ . '/../views/rooms/allrooms.php';
});

$router->get('/createproperty', function() {
    include __DIR__ . '/../views/rooms/createproperty.php';
});

$router->get('/myrooms', function() {
    include __DIR__ . '/../views/rooms/myrooms.php';
});

$router->get('/room-edit', function() {
    include __DIR__ . '/../views/rooms/room-edit.php';
});

// User routes
$router->get('/user-edit', function() {
    include __DIR__ . '/../views/user/user-edit.php';
});

$router->get('/userprofile', function() {
    include __DIR__ . '/views/user/userprofile.php';
});


$router->set404(function () {
    header('HTTP/1.1 404 Not Found');
    echo "404: Route not found";
});

// Run it!
$router->run();
