<?php

require_once "../controllers/AuthController.php";

$app->router->get('/login', [AuthController::class, 'login']);
$app->router->post('/login', [AuthController::class, 'login']);

$app->router->get('/logout', [AuthController::class, 'logout']);

$app->router->get('/register', [AuthController::class, 'register']);
$app->router->post('/register', [AuthController::class, 'register']);

// reset password
$app->router->get('/forgotPassword', [AuthController::class, 'forgotPassword']);
$app->router->post('/forgotPassword', [AuthController::class, 'forgotPassword']);
$app->router->get('/resetPassword', [AuthController::class, 'resetPassword']);
$app->router->post('/resetPassword', [AuthController::class, 'resetPassword']);

////update Password
$app->router->get('/update-password', [AuthController::class, 'updatePassword']);
$app->router->post('/update-password', [AuthController::class, 'updatePassword']);

?>