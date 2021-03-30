<?php

require_once "../controllers/ViewController.php";
require_once "../controllers/TicketController.php";
require_once "../controllers/FreightController.php";

$app->router->get('/home', [ViewController::class, 'home']);
$app->router->get('/', [ViewController::class, 'home']);
$app->router->post('/search', [ViewController::class, 'search']);

$app->router->get('/view-train', [ViewController::class, 'viewTrain']);

$app->router->get('/ticket-prices', [TicketController::class, 'ViewticketPrice']);
$app->router->post('/ticket-prices', [TicketController::class, 'ViewticketPrice']);

$app->router->get('/freight-prices', [FreightController::class, 'viewFreightPrice']);
$app->router->post('/freight-prices', [FreightController::class, 'ViewtfreightPrice']);

?>