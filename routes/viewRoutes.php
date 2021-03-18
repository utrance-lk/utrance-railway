<?php

require_once "../controllers/ViewController.php";
require_once "../controllers/TicketController.php";

$app->router->get('/utrance-railway/home', [ViewController::class, 'home']);
$app->router->post('/utrance-railway/search', [ViewController::class, 'search']);

$app->router->get('/utrance-railway/view-train', [ViewController::class, 'viewTrain']);
//$app->router->get('/utrance-railway/view-train', [ViewController::class, 'viewTrainBasic']);

$app->router->get('/utrance-railway/ticket-prices', [TicketController::class, 'ViewticketPrice']);
$app->router->post('/utrance-railway/ticket-prices', [TicketController::class, 'ViewticketPrice']);


?>