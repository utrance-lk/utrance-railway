<?php

require_once "../controllers/BookingController.php";

$app->router->get('/utrance-railway/myBookings', [BookingController::class, 'getAllBookings']);

$app->router->get('/utrance-railway/bookings', [BookingController::class, 'manageBookings']);
$app->router->post('/utrance-railway/bookings', [BookingController::class, 'manageBookings']);

$app->router->get('/utrance-railway/book-seats', [BookingController::class, 'createBooking']);

$app->router->get('/utrance-railway/book-freights', [BookingController::class, 'bookFreight']);

$app->router->get('/utrance-railway/booked-tour', [BookingController::class, 'bookedTour']);

$app->router->get('/utrance-railway/booking-train', [BookingController::class, 'bookingForTrain']);
$app->router->post('/utrance-railway/booking-train', [BookingController::class, 'bookingForTrain']);

$app->router->get('/utrance-railway/freight-search', [BookingController::class, 'searchFreightTrains']);
$app->router->get('/utrance-railway/freight-bookings', [BookingController::class, 'manageFreights']);
$app->router->get('/utrance-railway/freight-booking-train', [BookingController::class, 'freightBookingForTrain']);

?>