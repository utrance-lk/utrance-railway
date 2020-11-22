<?php

require_once "../controllers/AuthController.php";

$app->router->get('/utrance-railway/login', [AuthController::class, 'login']);
$app->router->post('/utrance-railway/login', [AuthController::class, 'login']);

$app->router->get('/utrance-railway/logout', [AuthController::class, 'logout']);

$app->router->get('/utrance-railway/register', [AuthController::class, 'register']);
$app->router->post('/utrance-railway/register', [AuthController::class, 'register']);

// reset password
$app->router->get('/utrance-railway/forgotPassword', [AuthController::class, 'forgotPassword']);
$app->router->post('/utrance-railway/forgotPassword', [AuthController::class, 'forgotPassword']);
$app->router->get('/utrance-railway/resetPassword', [AuthController::class, 'resetPassword']);
$app->router->post('/utrance-railway/resetPassword', [AuthController::class, 'resetPassword']);

////update Password
$app->router->get('/utrance-railway/update-password', [AuthController::class, 'updatePassword']);
$app->router->post('/utrance-railway/update-password', [AuthController::class, 'updatePassword']);

?>