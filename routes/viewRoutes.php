<?php

require_once "../controllers/ViewController.php";
require_once "../controllers/TicketController.php";

$app->router->get('/utrance-railway/home', [ViewController::class, 'home']);
$app->router->get('/utrance-railway/', [ViewController::class, 'home']);
$app->router->post('/utrance-railway/search', [ViewController::class, 'search']);

$app->router->get('/utrance-railway/view-train', [ViewController::class, 'viewTrain']);

$app->router->get('/utrance-railway/ticket-prices', [TicketController::class, 'ViewticketPrice']);
$app->router->post('/utrance-railway/ticket-prices', [TicketController::class, 'ViewticketPrice']);

$app->router->get('/utrance-railway/train-details', [ViewController::class, 'viewAllTrainDetails']);
$app->router->post('/utrance-railway/train-details', [ViewController::class, 'viewAllTrainDetails']);

$app->router->get('/utrance-railway/getSelect', [ViewController::class, 'newSearchResults']);
$app->router->post('/utrance-railway/getSelect', [ViewController::class, 'newSearchResults']);

$app->router->get('/utrance-railway/getSelect', [ViewController::class, 'newSearchResults']);
$app->router->post('/utrance-railway/getSelect', [ViewController::class, 'newSearchResults']);








?>