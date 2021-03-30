<?php

require_once "../controllers/AdminController.php";

$app->router->get('/users', [AdminController::class, 'manageUsers']);
$app->router->post('/users', [AdminController::class, 'manageUsers']);

$app->router->get('/users/add', [AdminController::class, 'addUser']);
$app->router->post('/users/add', [AdminController::class, 'addUser']);

$app->router->get('/users/view', [AdminController::class, 'viewUser']);

$app->router->post('/users/update', [AdminController::class, 'updateUser']);

$app->router->get('/users/activate', [AdminController::class, 'changeUserStatus']);

$app->router->get('/users/deactivate', [AdminController::class, 'changeUserStatus']);

$app->router->get('/newmanageUsers', [AdminController::class, 'filterSearch']);
$app->router->post('/newmanageUsers', [AdminController::class, 'filterSearch']);

$app->router->get('/routes/', [AdminController::class, 'manageRoutes']);
$app->router->post('/routes/', [AdminController::class, 'manageRoutes']);

$app->router->get('/routes/add', [AdminController::class, 'addRoute']);

$app->router->get('/routes/view', [AdminController::class, 'viewRoute']);

#TODO: why is this duplicated route?
$app->router->get('/routes/update', [AdminController::class, 'addRoute']);

$app->router->get('/routes/newmanageRoutes', [AdminController::class, 'updateRoutes']);
$app->router->post('/routes/newmanageRoutes', [AdminController::class, 'updateRoutes']);

$app->router->post('/routes/newmanageRoutesValidations', [AdminController::class, 'getRoutesStations']);

$app->router->get('/manage-news', [AdminController::class, 'manageNews']);
