<?php

require_once "../controllers/ViewController.php";

$app->router->get('/utrance-railway/home', [ViewController::class, 'home']);
$app->router->post('/utrance-railway/search', [ViewController::class, 'search']);
$app->router->get('/utrance-railway/view-train', [ViewController::class, 'viewTrain']);

?>