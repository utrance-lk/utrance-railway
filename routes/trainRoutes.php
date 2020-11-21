<?php

require_once "../controllers/TrainController.php";

require_once "../controllers/AdminController.php";

// $app->router->get('/utrance-railway/getUserDetails', [TrainController::class, 'form']);
// $app->router->post('/utrance-railway/getUserDetgitails', [TrainController::class, 'register']);
// $app->router->get('/utrance-railway/trains/update', [TrainController::class, 'updateTrain']);
// $app->router->post('/utrance-railway/trains/update', [TrainController::class, 'updateTrain']);
// $app->router->get('/utrance-railway/trains/delete', [TrainController::class, 'deleteTrain']);
// $app->router->post('/utrance-railway/trains/delete', [TrainController::class, 'deleteTrain']);
// $app->router->get('/utrance-railway/trains/add', [TrainController::class, 'addTrain']);
// $app->router->post('/utrance-railway/trains/add', [TrainController::class, 'addTrain']);

// $app->router->post('/utrance-railway/ticket-prices', [TrainController::class, 'ticketPrice']);
// $app->router->get('/utrance-railway/ticket-prices', [TrainController::class, 'ticketPrice']);
$app->router->get('/utrance-railway/trains', [AdminController::class, 'manageTrains']);
$app->router->Post('/utrance-railway/trains', [AdminController::class, 'manageTrains']);



$app->router->get('/utrance-railway/trains/view', [AdminController::class, 'viewTrain']);

$app->router->post('/utrance-railway/trains/update', [AdminController::class, 'updateTrain']);
$app->router->get('/utrance-railway/trains/delete', [AdminController::class, 'deleteTrain']);
$app->router->post('/utrance-railway/trains/delete', [AdminController::class, 'deleteTrain']);
$app->router->get('/utrance-railway/trains/add', [AdminController::class, 'addTrain']);
$app->router->post('/utrance-railway/trains/add', [AdminController::class, 'addTrain']);

$app->router->post('/utrance-railway/ticket-prices', [TrainController::class, 'ticketPrice']);
$app->router->get('/utrance-railway/ticket-prices', [TrainController::class, 'ticketPrice']);


?>