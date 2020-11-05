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
    'userClass' => UserModel::class,
    'db' => [
        'dsn' => $_ENV['DB_DSN'],
        'user' => $_ENV['DB_USER'],
        'password' => $_ENV['DB_PASSWORD'],
    ],
];

$app = new App(dirname(__DIR__), $config);

/* ROUTE HANDLING */
//This stores the route data in an array in Route class, that means we specify if the '/register' like url recieved we should render the registration page.


// Home page
$app->router->get('/utrance-railway/home', [ViewController::class, 'home']);
$app->router->post('/utrance-railway/home', [ViewController::class, 'home']);

// search page
$app->router->get('/utrance-railway/search', [ViewController::class, 'search']);
$app->router->post('/utrance-railway/search', [ViewController::class, 'search']);

/////login Page Routing
$app->router->get('/utrance-railway/login', [AuthController::class, 'login']);
$app->router->post('/utrance-railway/login', [AuthController::class, 'login']);
$app->router->get('/utrance-railway/logout', [AuthController::class, 'logout']);

// Admin routing
$app->router->get('/utrance-railway/admin', [AdminController::class, 'adminSettings']);

$app->router->get('/utrance-railway/admin/settings', [AdminController::class, 'adminSettings']);
$app->router->post('/utrance-railway/admin/users', [AdminController::class, 'manageUsers']);
$app->router->get('/utrance-railway/admin/users', [AdminController::class, 'manageUsers']);
$app->router->get('/utrance-railway/admin/trains', [AdminController::class, 'manageTrains']);
$app->router->get('/utrance-railway/admin/routes', [AdminController::class, 'manageRoutes']);

$app->router->get('/utrance-railway/admin/users/add', [AdminController::class, 'addUser']);
$app->router->get('/utrance-railway/admin/users/update', [AdminController::class, 'updateUser']);
$app->router->post('/utrance-railway/admin/users/update', [AdminController::class, 'updateUser']);

$app->router->get('/utrance-railway/admin/trains/add', [AdminController::class, 'addTrain']);
$app->router->get('/utrance-railway/admin/trains/update', [AdminController::class, 'updateTrain']);

$app->router->get('/utrance-railway/admin/routes/add', [AdminController::class, 'addRoute']);


///////////Register Page Routing
$app->router->get('/utrance-railway/registerPage', [AuthController::class, 'registerPageNow']);
$app->router->post('/utrance-railway/registerPage', [AuthController::class, 'registerPageNow']);






////$app->router->post('/utrance-railway/t/test.php', 'search');

////$app->router->post('/utrance-railway/t/test.php', [ViewController::class, 'search']);


// Home page
$app->router->get('/utrance-railway/home', [ViewController::class, 'home']);

// Admin routing
$app->router->get('/utrance-railway/admin', [AdminController::class, 'adminSettings']);

$app->router->get('/utrance-railway/admin/settings', [AdminController::class, 'adminSettings']);
$app->router->get('/utrance-railway/admin/users', [AdminController::class, 'manageUsers']);
$app->router->get('/utrance-railway/admin/trains', [AdminController::class, 'manageTrains']);
$app->router->get('/utrance-railway/admin/routes', [AdminController::class, 'manageRoutes']);

$app->router->get('/utrance-railway/admin/users/add', [AdminController::class, 'addUser']);
$app->router->get('/utrance-railway/admin/users/update', [AdminController::class, 'updateUser']);

$app->router->get('/utrance-railway/admin/trains/add', [AdminController::class, 'addTrain']);
$app->router->get('/utrance-railway/admin/trains/update', [AdminController::class, 'updateTrain']);

$app->router->get('/utrance-railway/admin/routes/add', [AdminController::class, 'addRoute']);









$app->router->post('/utrance-railway/t/test.php', 'search');

$app->router->post('/utrance-railway/t/test.php', [ViewController::class, 'search']);



//hasani nimeshika

$app->router->post('/utrance-railway/getUserDetails', [formdetailsController::class, 'form']);
$app->router->get('/utrance-railway/getUserDetails', [formdetailsController::class, 'form']);



////////////////////////////////



//$app->router->get('/utrance-railway/example', [AuthController::class, 'getMy']);


//$app->router->post('/utrance-railway/public/index.php/hi/','hi');

/* ROUTE HANDLING */

$app->run();
