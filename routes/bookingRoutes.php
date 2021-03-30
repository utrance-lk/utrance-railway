<?php

require_once "../controllers/BookingController.php";

$app->router->get('/myBookings', [BookingController::class, 'getAllBookings']);

$app->router->get('/bookings', [BookingController::class, 'manageBookings']);
// $app->router->post('/bookings', [BookingController::class, 'manageBookings']);
// $app->router->post('/getSearchbookings', [BookingController::class, 'SearchManageBookings']);


$app->router->get('/book-seats', [BookingController::class, 'createSeatBooking']);
$app->router->post('/book-seats', [BookingController::class, 'createSeatBooking']);

$app->router->get('/book-freights', [BookingController::class, 'bookFreight']);

$app->router->get('/booked-tour', [BookingController::class, 'bookedTour']);

$app->router->get('/booking-train', [BookingController::class, 'bookingForTrain']);
$app->router->post('/booking-train', [BookingController::class, 'bookingForTrain']);

$app->router->get('/freight-search', [BookingController::class, 'searchFreightTrains']);
$app->router->get('/freight-bookings', [BookingController::class, 'manageFreights']);
$app->router->get('/freight-booking-train', [BookingController::class, 'freightBookingForTrain']);

// booking
$app->router->get('/checkout', [BookingController::class, 'checkout']);
$app->router->post('/checkout', [BookingController::class, 'checkout']);

$app->router->get('/getBookings', [BookingController::class, 'bookingDetails']);
$app->router->post('/getBookings', [BookingController::class, 'bookingDetails']);
$app->router->get('/booking-success', [BookingController::class, 'bookingSuccess']);

?>