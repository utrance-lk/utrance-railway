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


// Admin routing
$app->router->get('/utrance-railway/admin', [AdminController::class, 'adminSettings']);

$app->router->get('/utrance-railway/admin/settings', [AdminController::class, 'adminSettings']);
$app->router->get('/utrance-railway/admin/trains', [AdminController::class, 'manageTrains']);

$app->router->get('/utrance-railway/admin/users/add', [AdminController::class, 'addUser']);
$app->router->get('/utrance-railway/admin/users/update', [AdminController::class, 'updateUser']);

$app->router->get('/utrance-railway/admin/trains/add', [AdminController::class, 'addTrain']);
$app->router->get('/utrance-railway/admin/trains/update', [AdminController::class, 'updateTrain']);



////////////////////////////////////////////
$app->router->get('/utrance-railway/addTrainDetails', [AdminController::class, 'addTrain']);



////////////////////////////////////////////////////////////
$app->router->get('/utrance-railway/public/index.php/registerPage', [AuthController::class, 'registerPage']);
$app->router->post('/utrance-railway/public/index.php/registerPage', [AuthController::class, 'registerPageNow']);

// $app->router->get('/utrance-railway/public/index.php/cat', [ViewController::class, 'cat']);

// $app->router->post('/utrance-railway/t/test.php', [ViewController::class, 'search']);

$app->router->post('/utrance-railway/t/test.php', 'search');

// $app->router->post('/utrance-railway/public/index.php/hi/','hi');
//$app->router->post('/utrance-railway/public/index.php/cat', [AuthController::class, 'cat']);



$app->router->post('/utrance-railway/t/test.php', [ViewController::class, 'search']);



$app->router->get('/utrance-railway/cat', [AddTrainDetailsController::class, 'addTrain']);


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
