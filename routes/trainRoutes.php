<?php

require_once "../controllers/TrainController.php";

require_once "../controllers/AdminController.php";

$app->router->get('/utrance-railway/trains', [AdminController::class, 'manageTrains']);
$app->router->Post('/utrance-railway/trains', [AdminController::class, 'manageTrains']);


$app->router->post('/utrance-railway/routes/newmanageRoutes', [TrainController::class, 'updateRoutes']);
$app->router->get('/utrance-railway/routes/newmanageRoutes', [TrainController::class, 'updateRoutes']);
$app->router->get('/utrance-railway/newmanageTrains', [AdminController::class, 'newsearch']);

$app->router->get('/utrance-railway/trains/view', [AdminController::class, 'viewTrain']);


$app->router->get('/utrance-railway/trains/add', [AdminController::class, 'addTrain']);
$app->router->post('/utrance-railway/trains/add', [AdminController::class, 'addTrain']);

$app->router->post('/utrance-railway/trains/update', [AdminController::class, 'updateTrain']);

$app->router->get('/utrance-railway/trains/deleted', [AdminController::class, 'deleteTrain']);
$app->router->post('/utrance-railway/trains/deleted', [AdminController::class, 'deleteTrain']);

$app->router->get('/utrance-railway/trains/Deactivated', [AdminController::class, 'deleteTrain']);
$app->router->post('/utrance-railway/trains/Deactivated', [AdminController::class, 'deleteTrain']);

$app->router->get('/utrance-railway/trains/Activated', [AdminController::class, 'activeTrain']);
$app->router->post('/utrance-railway/trains/Activated', [AdminController::class, 'activeTrain']);

$app->router->get('/utrance-railway/ticket-prices', [TrainController::class, 'ticketPrice']);
$app->router->post('/utrance-railway/ticket-prices', [TrainController::class, 'ticketPrice']);

$app->router->get('/utrance-railway/frieght-prices', [TrainController::class, 'freightPrice']);
$app->router->post('/utrance-railway/freight-prices', [TrainController::class, 'freightPrice']);


$app->router->post('/utrance-railway/FreightServicePrice', [TrainController::class, 'FreightServicePrice']);
$app->router->get('/utrance-railway/FreightServicePrice', [TrainController::class, 'FreightServicePrice']);
$app->router->post('/utrance-railway/ticket', [TrainController::class, 'ticket']);
$app->router->get('/utrance-railway/ticket', [TrainController::class, 'ticket']);


$app->router->get('/utrance-railway/trains/search', [TrainController::class, 'newsearch']);

?>