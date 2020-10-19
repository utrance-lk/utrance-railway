<?php

require_once "../classes/core/App.php";
require_once "../controllers/ViewController.php";
require_once "../controllers/AuthController.php";
require_once "../controllers/AddTrainDetailsController.php";
require_once "../vendor/autoload.php";

$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();


// databse configuration (getting the details from the config.env)
$config = [
    'db' => [
        'dsn' => $_ENV['DB_DSN'],
        'user' => $_ENV['DB_USER'],
        'password' => $_ENV['DB_PASSWORD'],
    ],
];

$app = new App(dirname(__DIR__), $config);

/* ROUTE HANDLING */
//This stores the route data in an array in Route class, that means we specify if the '/register' like url recieved we should render the registration page.

// $app->router->get('/utrance-railway/public/index.php/', function () {
//     return "hi from asindu";
// });

// $app->router->get('/utrance-railway/public/index.php/hey/', [SiteController::class, 'handleContact']);

// $app->router->post('/utrance-railway/public/index.php/home/', [SiteController::class, 'home']);


// $app->router->get('/utrance-railway/public/index.php/hey/', [SiteController::class, 'handleContact']);

// $app->router->post('/utrance-railway/public/index.php/home/', [SiteController::class, 'home']);

$app->router->get('/utrance-railway/public/index.php/home', [ViewController::class, 'home']);

$app->router->get('/utrance-railway/public/index.php/home2', [ViewController::class, 'home2']);

$app->router->post('/utrance-railway/public/index.php/home', [ViewController::class, 'search']);

$app->router->get('/utrance-railway/public/index.php/login/', [AuthController::class, 'login']);

$app->router->post('/utrance-railway/public/index.php/login/', [AuthController::class, 'login']);

$app->router->get('/utrance-railway/public/index.php/register', [AuthController::class, 'register']);

$app->router->post('/utrance-railway/public/index.php/register', [AuthController::class, 'register']);

// $app->router->get('/utrance-railway/public/index.php/cat', [ViewController::class, 'cat']);

// $app->router->post('/utrance-railway/t/test.php', [ViewController::class, 'search']);

$app->router->post('/utrance-railway/t/test.php', 'search');

// $app->router->post('/utrance-railway/public/index.php/hi/','hi');
//$app->router->post('/utrance-railway/public/index.php/cat', [AuthController::class, 'cat']);



$app->router->post('/utrance-railway/t/test.php', [ViewController::class, 'search']);


$app->router->get('/utrance-railway/public/index.php/cat', [AddTrainDetailsController::class, 'addTrain']);
// $app->router->get('/utrance-railway/public/index.php/cat', [AddTrainDetailsController::class, 'ashika']);

$app->router->post('/utrance-railway/public/index.php/dog', [AddTrainDetailsController::class, 'addTrainDetails']);








//$app->router->post('/utrance-railway/public/index.php/hi/','hi');

/* ROUTE HANDLING */

$app->run();
