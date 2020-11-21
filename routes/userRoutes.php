<?php

require_once "../controllers/UserController.php";

// profile rendering
$app->router->get('/utrance-railway/profile', [UserController::class, 'getMe']);
$app->router->post('/utrance-railway/profile', [UserController::class, 'updateMe']);

$app->router->get('/utrance-railway/settings', [UserController::class, 'getMe']);
$app->router->post('/utrance-railway/settings', [UserController::class, 'updateMe']);
$app->router->post('/utrance-railway/aboutUs', [UserController::class, 'aboutUs']);
$app->router->get('/utrance-railway/aboutUs', [UserController::class, 'aboutUs']);

$app->router->post('/utrance-railway/news', [UserController::class, 'newsFeed']);
$app->router->get('/utrance-railway/news', [UserController::class, 'newsFeed']);


?>