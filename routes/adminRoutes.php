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

$app->router->get('/manage-news', [AdminController::class, 'manageNews']);
$app->router->post('/manage-news', [AdminController::class, 'manageNews']);

$app->router->get('/routes/newmanageRoutes', [AdminController::class, 'updateRoutes']);
$app->router->post('/routes/newmanageRoutes', [AdminController::class, 'updateRoutes']);

$app->router->post('/routes/newmanageRoutesValidations', [AdminController::class, 'getRoutesStations']);

$app->router->post('/routes/addnewmanageRoutes', [AdminController::class, 'addupdateRoutes']);
$app->router->get('/routes/addnewmanageRoutes', [AdminController::class, 'addupdateRoutes']);

$app->router->get('/getNewNews', [ViewController::class, 'getNews']);
$app->router->post('/getNewBookingTrain', [AdminController::class, 'getNewBookingTrain']);

$app->router->get('/news/getmyNewNews', [ViewController::class, 'getNews']);

$app->router->get('/news/news01', [ViewController::class, 'newsFeed01']);
$app->router->get('/routes/addnewmanageRoutesValidations', [AdminController::class, 'getaddRoutesStations']);

$app->router->post('/getMessages', [AdminController::class, 'getMessages']);
$app->router->post('/getCount', [AdminController::class, 'getCount']);

$app->router->post('/news', [ViewController::class, 'newsFeed']);
$app->router->get('/news', [ViewController::class, 'newsFeed']);

$app->router->get('/message', [AdminController::class, 'message']);
$app->router->post('/message', [AdminController::class, 'message']);

$app->router->get('/messageFull', [AdminController::class, 'messageFull']);
$app->router->post('/messageFull', [AdminController::class, 'messageFull']);

