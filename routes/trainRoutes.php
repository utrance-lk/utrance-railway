<?php

require_once "../controllers/TrainController.php";

$app->router->get('/utrance-railway/getUserDetails', [TrainController::class, 'form']);
$app->router->post('/utrance-railway/getUserDetgitails', [TrainController::class, 'register']);
$app->router->get('/utrance-railway/trains/update', [TrainController::class, 'updateTrain']);
$app->router->post('/utrance-railway/trains/update', [TrainController::class, 'updateTrain']);
$app->router->get('/utrance-railway/trains/delete', [TrainController::class, 'deleteTrain']);
$app->router->post('/utrance-railway/trains/delete', [TrainController::class, 'deleteTrain']);
$app->router->get('/utrance-railway/trains/add', [TrainController::class, 'addTrain']);
$app->router->post('/utrance-railway/trains/add', [TrainController::class, 'addTrain']);

$app->router->post('/utrance-railway/ticket-prices', [TrainController::class, 'ticketPrice']);
$app->router->get('/utrance-railway/ticket-prices', [TrainController::class, 'ticketPrice']);


?>