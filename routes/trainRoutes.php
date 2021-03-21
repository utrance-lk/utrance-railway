<?php

require_once "../controllers/TrainController.php";

require_once "../controllers/AdminController.php";

$app->router->get('/trains', [AdminController::class, 'manageTrains']);
$app->router->Post('/trains', [AdminController::class, 'manageTrains']);

$app->router->get('/newmanageTrains', [AdminController::class, 'newsearch']);
$app->router->post('/newmanageTrains', [AdminController::class, 'newsearch']);

$app->router->get('/trains/view', [AdminController::class, 'viewTrain']);


$app->router->get('/trains/add', [AdminController::class, 'addTrain']);
$app->router->post('/trains/add', [AdminController::class, 'addTrain']);

$app->router->post('/trains/update', [AdminController::class, 'updateTrain']);

$app->router->get('/trains/deleted', [AdminController::class, 'deleteTrain']);
$app->router->post('/trains/deleted', [AdminController::class, 'deleteTrain']);

$app->router->get('/trains/Deactivated', [AdminController::class, 'deleteTrain']);
$app->router->post('/trains/Deactivated', [AdminController::class, 'deleteTrain']);

$app->router->get('/trains/Activated', [AdminController::class, 'activeTrain']);
$app->router->post('/trains/Activated', [AdminController::class, 'activeTrain']);

$app->router->get('/ticket-prices', [TrainController::class, 'ticketPrice']);
$app->router->post('/ticket-prices', [TrainController::class, 'ticketPrice']);

$app->router->get('/frieght-prices', [TrainController::class, 'freightPrice']);
$app->router->post('/freight-prices', [TrainController::class, 'freightPrice']);


$app->router->post('/FreightServicePrice', [TrainController::class, 'FreightServicePrice']);
$app->router->get('/FreightServicePrice', [TrainController::class, 'FreightServicePrice']);
$app->router->post('/ticket', [TrainController::class, 'ticket']);
$app->router->get('/ticket', [TrainController::class, 'ticket']);


$app->router->get('/trains/search', [TrainController::class, 'newsearch']);

?>