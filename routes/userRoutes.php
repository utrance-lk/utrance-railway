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
$app->router->get('/utrance-railway/news/news01', [UserController::class, 'newsFeed01']);
$app->router->get('/utrance-railway/news/news02', [UserController::class, 'newsFeed02']);
$app->router->get('/utrance-railway/news/news03', [UserController::class, 'newsFeed03']);
$app->router->get('/utrance-railway/news/news04', [UserController::class, 'newsFeed04']);
$app->router->get('/utrance-railway/news/news05', [UserController::class, 'newsFeed05']);
$app->router->get('/utrance-railway/news/news06', [UserController::class, 'newsFeed06']);


$app->router->get('/utrance-railway/news/news01', [UserController::class, 'newsFeed01']);
$app->router->get('/utrance-railway/news/news02', [UserController::class, 'newsFeed02']);
$app->router->get('/utrance-railway/news/news03', [UserController::class, 'newsFeed03']);
$app->router->get('/utrance-railway/news/news04', [UserController::class, 'newsFeed04']);
$app->router->get('/utrance-railway/news/news05', [UserController::class, 'newsFeed05']);
$app->router->get('/utrance-railway/news/news06', [UserController::class, 'newsFeed06']);
$app->router->get('/utrance-railway/news/news07', [UserController::class, 'newsFeed07']);
$app->router->get('/utrance-railway/news/news08', [UserController::class, 'newsFeed08']);
$app->router->get('/utrance-railway/news/news09', [UserController::class, 'newsFeed09']);
$app->router->get('/utrance-railway/news/news10', [UserController::class, 'newsFeed10']);

?>