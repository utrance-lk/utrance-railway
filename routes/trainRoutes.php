<?php

require_once "../controllers/TrainController.php";

require_once "../controllers/AdminController.php";

$app->router->get('/utrance-railway/trains', [AdminController::class, 'manageTrains']);
$app->router->Post('/utrance-railway/trains', [AdminController::class, 'manageTrains']);

$app->router->get('/utrance-railway/trains/view', [AdminController::class, 'viewTrain']);

$app->router->get('/utrance-railway/trains/add', [AdminController::class, 'addTrain']);
$app->router->post('/utrance-railway/trains/add', [AdminController::class, 'addTrain']);

$app->router->post('/utrance-railway/trains/update', [AdminController::class, 'updateTrain']);

$app->router->get('/utrance-railway/trains/delete', [AdminController::class, 'deleteTrain']);
$app->router->post('/utrance-railway/trains/delete', [AdminController::class, 'deleteTrain']);

$app->router->get('/utrance-railway/ticket-prices', [TrainController::class, 'ticketPrice']);
$app->router->post('/utrance-railway/ticket-prices', [TrainController::class, 'ticketPrice']);


?>