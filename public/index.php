<?php 

require_once "../classes/core/App.php";
require_once "../controllers/SiteController.php";

$app = new App(dirname(__DIR__));

$app->router->get('/utrance-railway/public/index.php/', function() {
    return "hi from asindu";
});

$app->router->get('/utrance-railway/public/index.php/', 'home');

$app->router->post('/utrance-railway/public/index.php/home/',[SiteController::class, 'home'] );

$app->run();


