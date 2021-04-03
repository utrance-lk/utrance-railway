<?php

require_once "../controllers/UserController.php";

// profile rendering
$app->router->get('/dashboard', [UserController::class, 'getMe']);
$app->router->post('/dashboard', [UserController::class, 'updateMe']);

$app->router->get('/settings', [UserController::class, 'getMe']);
$app->router->post('/settings', [UserController::class, 'updateMe']);

$app->router->post('/upload', [UserController::class, 'upload']);
$app->router->get('/upload', [UserController::class, 'upload']);


$app->router->post('/aboutUs', [UserController::class, 'aboutUs']);
$app->router->get('/aboutUs', [UserController::class, 'aboutUs']);

$app->router->post('/viewAllTrains', [UserController::class, 'viewAllTrains']);
$app->router->get('/viewAllTrains', [UserController::class, 'viewAllTrains']);

?>