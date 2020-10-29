<?php

require_once "../classes/core/App.php";
require_once "../controllers/ViewController.php";
require_once "../controllers/AuthController.php";
require_once "../controllers/AdminController.php";
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

// $app->router->get('/utrance-railway/', [ViewController::class, 'home']);

$app->router->get('/utrance-railway/home', [ViewController::class, 'home']);

$app->router->get('/utrance-railway/public/index.php/login/', [AuthController::class, 'login']);

$app->router->post('/utrance-railway/public/index.php/login/', [AuthController::class, 'login']);

$app->router->get('/utrance-railway/public/index.php/register', [AuthController::class, 'register']);

$app->router->post('/utrance-railway/public/index.php/register', [AuthController::class, 'register']);


// Admin routing
$app->router->get('/utrance-railway/admin', [AdminController::class, 'adminSettings']);
$app->router->get('/utrance-railway/admin/settings', [AdminController::class, 'adminSettings']);
$app->router->get('/utrance-railway/admin/manage-users', [AdminController::class, 'manageUsers']);





////////////////////////////////////////////////////////////
$app->router->get('/utrance-railway/public/index.php/registerPage', [AuthController::class, 'registerPage']);
$app->router->post('/utrance-railway/public/index.php/registerPage', [AuthController::class, 'registerPageNow']);



$app->router->post('/utrance-railway/t/test.php', 'search');

$app->router->post('/utrance-railway/t/test.php', [ViewController::class, 'search']);



$app->router->post('/utrance-railway/addTrain', [AdminController::class, 'addTrain']);


$app->router->post('/utrance-railway/public/index.php/admin', [AdminController::class, 'adminSettingsNow']);

$app->router->get('/utrance-railway/public/index.php/manageUser', [AdminController::class, 'manageUser']);

$app->router->post('/utrance-railway/public/index.php/manageUser', [AdminController::class, 'manageUserNow']);

$app->router->get('/utrance-railway/public/index.php/addUser', [AdminController::class, 'addUser']);

$app->router->post('/utrance-railway/public/index.php/addUser', [AdminController::class, 'addUserNow']);

$app->router->get('/utrance-railway/public/index.php/updateUserProfile', [AdminController::class, 'updateUserProfile']);

$app->router->post('/utrance-railway/public/index.php/updateUserProfile', [AdminController::class, 'updateUserProfileNow']);

$app->router->get('/utrance-railway/public/index.php/viewUsers', [AdminController::class, 'viewUsers']);

$app->router->post('/utrance-railway/public/index.php/viewUsers', [AdminController::class, 'viewUsersNow']);












//hasani nimeshika

$app->router->get('/utrance-railway/public/index.php/getUserDetails', [ViewController::class, 'getUserDetails']);



//$app->router->post('/utrance-railway/public/index.php/hi/','hi');

/* ROUTE HANDLING */

$app->run();
