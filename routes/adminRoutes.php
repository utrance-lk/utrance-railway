<?php

require_once "../controllers/AdminController.php";

$app->router->get('/utrance-railway/users', [AdminController::class, 'manageUsers']);
$app->router->post('/utrance-railway/users', [AdminController::class, 'manageUsers']);
$app->router->get('/utrance-railway/users/add', [AdminController::class, 'addUser']);
$app->router->post('/utrance-railway/users/add', [AdminController::class, 'addUser']);
$app->router->get('/utrance-railway/users/view', [AdminController::class, 'viewUser']);
$app->router->post('/utrance-railway/users/update', [AdminController::class, 'updateUser']);
$app->router->get('/utrance-railway/users/updateSettings', [AdminController::class, 'adminSettings']);
$app->router->post('/utrance-railway/users/updateSettings', [AdminController::class, 'adminSettings']);
$app->router->get('/utrance-railway/users/delete', [AdminController::class, 'deleteUser']);
$app->router->post('/utrance-railway/users/delete', [AdminController::class, 'deleteUser']);
$app->router->get('/utrance-railway/users/activate', [AdminController::class, 'changeUserStatus']);
$app->router->get('/utrance-railway/users/deactivate', [AdminController::class, 'changeUserStatus']);

$app->router->get('/utrance-railway/routes/', [AdminController::class, 'manageRoutes']);
$app->router->post('/utrance-railway/routes/', [AdminController::class, 'manageRoutes']);
$app->router->get('/utrance-railway/routes/add', [AdminController::class, 'addRoute']);
$app->router->get('/utrance-railway/routes/view', [AdminController::class, 'viewRoute']);
$app->router->get('/utrance-railway/routes/update', [AdminController::class, 'addRoute']);

$app->router->get('/utrance-railway/manage-news', [AdminController::class, 'manageNews']);
$app->router->post('/utrance-railway/manage-news', [AdminController::class, 'manageNews']);

$app->router->get('/utrance-railway/newmanageUsers', [AdminController::class, 'filterSearch']);
$app->router->post('/utrance-railway/newmanageUsers', [AdminController::class, 'filterSearch']);

$app->router->post('/utrance-railway/routes/newmanageRoutesValidations', [AdminController::class, 'getRoutesStations']);
$app->router->post('/utrance-railway/routes/newmanageRoutes', [AdminController::class, 'updateRoutes']);
$app->router->get('/utrance-railway/routes/newmanageRoutes', [AdminController::class, 'updateRoutes']);

$app->router->get('/utrance-railway/getNewNews', [AdminController::class, 'getNews']);
$app->router->post('/utrance-railway/getNewNews', [AdminController::class, 'getNews']);

$app->router->get('/utrance-railway/news/getmyNewNews', [AdminController::class, 'getNews']);

$app->router->get('/utrance-railway/news/news01', [AdminController::class, 'newsFeed01']);
?>