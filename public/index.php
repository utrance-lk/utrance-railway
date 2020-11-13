<?php

require_once "../classes/core/App.php";
require_once "../controllers/ViewController.php";
require_once "../controllers/AuthController.php";
require_once "../controllers/AdminController.php";

require_once "../controllers/RegisterUserController.php";

require_once "../controllers/FormDetailsController.php";

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
    'email' => [
        'user' => $_ENV['EMAIL_USERNAME'],
        'password' => $_ENV['EMAIL_PASSWORD'],
        'host' => $_ENV['EMAIL_HOST'],
        'port' => $_ENV['EMAIL_PORT'],
    ],
];

$app = new App(dirname(__DIR__), $config);

/* ROUTE HANDLING */
//This stores the route data in an array in Route class, that means we specify if the '/register' like url recieved we should render the registration page.

// Home page
$app->router->get('/utrance-railway/home', [ViewController::class, 'home']);

// search
$app->router->post('/utrance-railway/search', [ViewController::class, 'search']);

// login Page Routing
$app->router->get('/utrance-railway/login', [AuthController::class, 'login']);
$app->router->post('/utrance-railway/login', [AuthController::class, 'login']);
$app->router->get('/utrance-railway/logout', [AuthController::class, 'logout']);

// register page routing
$app->router->get('/utrance-railway/register', [AuthController::class, 'register']);
$app->router->post('/utrance-railway/register', [AuthController::class, 'register']);

// profile rendering
$app->router->get('/utrance-railway/profile', [AuthController::class, 'getMyProfile']);
$app->router->get('/utrance-railway/settings', [AuthController::class, 'getMyProfile']);

// reset password
$app->router->get('/utrance-railway/forgotPassword', [AuthController::class, 'forgotPassword']);
$app->router->post('/utrance-railway/forgotPassword', [AuthController::class, 'forgotPassword']);
$app->router->get('/utrance-railway/resetPassword', [AuthController::class, 'resetPassword']);





////////Registered User Routing
$app->router->get('/utrance-railway/registeredUser', [RegisterUserController::class, 'registeredUserSettings']);
$app->router->post('/utrance-railway/registeredUser', [RegisterUserController::class, 'registeredUserSettings']);

// Admin routing
// $app->router->get('/utrance-railway/admin', [AdminController::class, 'adminSettings']);

$app->router->post('/utrance-railway/users', [AdminController::class, 'manageUsers']);
$app->router->get('/utrance-railway/users', [AdminController::class, 'manageUsers']);
// $app->router->get('/utrance-railway/admin/trains', [AdminController::class, 'manageTrains']);
$app->router->get('/utrance-railway/routes', [AdminController::class, 'manageRoutes']);

$app->router->get('/utrance-railway/users/add', [AdminController::class, 'addUser']);
$app->router->post('/utrance-railway/users/add', [AdminController::class, 'addUser']);

$app->router->get('/utrance-railway/users/update', [AdminController::class, 'updateUser']);
$app->router->post('/utrance-railway/users/update', [AdminController::class, 'updateUser']);

$app->router->get('/utrance-railway/users/delete', [AdminController::class, 'deleteUser']);
$app->router->post('/utrance-railway/users/delete', [AdminController::class, 'deleteUser']);

$app->router->get('/utrance-railway/users/activate', [AdminController::class, 'changeUserStatus']);
$app->router->get('/utrance-railway/users/deactivate', [AdminController::class, 'changeUserStatus']);

// $app->router->get('/utrance-railway/admin/trains/add', [AdminController::class, 'addTrain']);
// $app->router->get('/utrance-railway/admin/trains/update', [AdminController::class, 'updateTrain']);

$app->router->get('/utrance-railway/routes/add', [AdminController::class, 'addRoute']);

$app->router->post('/utrance-railway/aboutUs', [AdminController::class, 'aboutUs']);
$app->router->get('/utrance-railway/aboutUs', [AdminController::class, 'aboutUs']);

$app->router->get('/utrance-railway/getUserDetails', [FormDetailsController::class, 'form']);
$app->router->post('/utrance-railway/getUserDetgitails', [FormDetailsController::class, 'register']);
$app->router->get('/utrance-railway/trains', [FormDetailsController::class, 'manageTrains']);
$app->router->get('/utrance-railway/trains/update', [FormDetailsController::class, 'updateTrain']);
$app->router->post('/utrance-railway/trains/update', [FormDetailsController::class, 'updateTrain']);
$app->router->get('/utrance-railway/trains/delete', [FormDetailsController::class, 'deleteTrain']);
$app->router->post('/utrance-railway/trains/delete', [FormDetailsController::class, 'deleteTrain']);
$app->router->get('/utrance-railway/trains/add', [FormDetailsController::class, 'addTrain']);
$app->router->post('/utrance-railway/trains/add', [FormDetailsController::class, 'addTrain']);

// $app->router->get('/utrance-railway/admin/trains/add', [AdminController::class, 'addTrain']);
// $app->router->get('/utrance-railway/admin/trains/update', [AdminController::class, 'updateTrain']);
// $app->router->post('/utrance-railway/admin/trains/update', [AdminController::class, 'updateTrain']);

/* ROUTE HANDLING */

$app->run();
