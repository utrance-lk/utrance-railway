<?php

require_once "../controllers/UserController.php";

// profile rendering
$app->router->get('/utrance-railway/dashboard', [UserController::class, 'getMe']);
$app->router->post('/utrance-railway/dashboard', [UserController::class, 'updateMe']);

$app->router->get('/utrance-railway/settings', [UserController::class, 'getMe']);
$app->router->post('/utrance-railway/settings', [UserController::class, 'updateMe']);

$app->router->post('/utrance-railway/upload', [UserController::class, 'upload']);
$app->router->get('/utrance-railway/upload', [UserController::class, 'upload']);


$app->router->post('/utrance-railway/aboutUs', [UserController::class, 'aboutUs']);
$app->router->get('/utrance-railway/aboutUs', [UserController::class, 'aboutUs']);

$app->router->post('/utrance-railway/viewAllTrains', [UserController::class, 'viewAllTrains']);
$app->router->get('/utrance-railway/viewAllTrains', [UserController::class, 'viewAllTrains']);

?>