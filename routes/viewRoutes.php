<?php

require_once "../controllers/ViewController.php";
require_once "../controllers/TicketController.php";

$app->router->get('/home', [ViewController::class, 'home']);
$app->router->get('/', [ViewController::class, 'home']);
$app->router->post('/search', [ViewController::class, 'search']);

$app->router->get('/view-train', [ViewController::class, 'viewTrain']);

$app->router->get('/ticket-prices', [TicketController::class, 'ViewticketPrice']);
$app->router->post('/ticket-prices', [TicketController::class, 'ViewticketPrice']);

$app->router->get('/train-details', [ViewController::class, 'viewAllTrainDetails']);
$app->router->post('/train-details', [ViewController::class, 'viewAllTrainDetails']);

$app->router->get('/getSelect', [ViewController::class, 'newSearchResults']);
$app->router->post('/getSelect', [ViewController::class, 'newSearchResults']);

$app->router->get('/getSelect', [ViewController::class, 'newSearchResults']);
$app->router->post('/getSelect', [ViewController::class, 'newSearchResults']);

<<<<<<< HEAD
$app->router->post('/news', [ViewController::class, 'newsFeed']);
$app->router->get('/news', [ViewController::class, 'newsFeed']);
=======
$app->router->post('/utrance-railway/news', [ViewController::class, 'newsFeed']);
$app->router->get('/utrance-railway/news', [ViewController::class, 'newsFeed']);
>>>>>>> master
