<?php

require_once "../classes/core/App.php";
require_once "../controllers/ViewController.php";
require_once "../controllers/AuthController.php";
require_once "../controllers/AdminController.php";
require_once "../controllers/detailsProviderController.php";
require_once "../controllers/UserController.php";

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
];

$app = new App(dirname(__DIR__), $config);

/* ROUTE HANDLING */
//This stores the route data in an array in Route class, that means we specify if the '/register' like url recieved we should render the registration page.


// Home page
$app->router->get('/utrance-railway/home', [ViewController::class, 'home']);

// login Page Routing
$app->router->get('/utrance-railway/login', [AuthController::class, 'login']);
$app->router->post('/utrance-railway/login', [AuthController::class, 'login']);
$app->router->get('/utrance-railway/logout', [AuthController::class, 'logout']);

// register page routing
$app->router->get('/utrance-railway/register', [AuthController::class, 'register']);
$app->router->post('/utrance-railway/register', [AuthController::class, 'register']);

<<<<<<< HEAD
////////Registered User Routing
$app->router->get('/utrance-railway/registeredUser',[RegisterUserController::class,'registeredUserSettings']);
$app->router->post('/utrance-railway/registeredUser',[RegisterUserController::class,'registeredUserSettings']);

// Admin routing
$app->router->get('/utrance-railway/admin', [AdminController::class, 'adminSettings']);

$app->router->get('/utrance-railway/admin/settings', [AdminController::class, 'adminSettings']);
$app->router->post('/utrance-railway/admin/settings', [AdminController::class, 'updateUserAdmin']);
$app->router->post('/utrance-railway/admin/users', [AdminController::class, 'manageUsers']);
$app->router->get('/utrance-railway/admin/users', [AdminController::class, 'manageUsers']);
// $app->router->get('/utrance-railway/admin/trains', [AdminController::class, 'manageTrains']);
$app->router->get('/utrance-railway/admin/routes', [AdminController::class, 'manageRoutes']);

$app->router->get('/utrance-railway/admin/users/add', [AdminController::class, 'addUser']);
$app->router->post('/utrance-railway/admin/users/add', [AdminController::class, 'addUser']);

$app->router->get('/utrance-railway/admin/users/update', [AdminController::class, 'updateUser']);
$app->router->post('/utrance-railway/admin/users/update', [AdminController::class, 'updateUser']);

$app->router->get('/utrance-railway/admin/users/delete', [AdminController::class, 'deleteUser']);
$app->router->post('/utrance-railway/admin/users/delete', [AdminController::class, 'deleteUser']);

// $app->router->get('/utrance-railway/admin/trains/add', [AdminController::class, 'addTrain']);
// $app->router->get('/utrance-railway/admin/trains/update', [AdminController::class, 'updateTrain']);

$app->router->get('/utrance-railway/admin/routes/add', [AdminController::class, 'addRoute']);

=======
// relevant page rendering
$app->router->get('/utrance-railway/profile', [AuthController::class, 'getMyProfile']);
>>>>>>> af88cd648676b25c8e6ea6872785543ef7a223f4

//aboutUs routing Daranya

$app->router->post('/utrance-railway/aboutUs/', [AdminController::class, 'aboutUs']);
$app->router->get('/utrance-railway/aboutUs/', [AdminController::class, 'aboutUs']);


// search
$app->router->post('/utrance-railway/search', [ViewController::class, 'search']);



////////Registered User Routing
$app->router->get('/utrance-railway/registeredUser',[RegisterUserController::class,'registeredUserSettings']);
$app->router->post('/utrance-railway/registeredUser',[RegisterUserController::class,'registeredUserSettings']);

// Admin routing
// $app->router->get('/utrance-railway/admin', [AdminController::class, 'adminSettings']);

$app->router->get('/utrance-railway/settings', [AuthController::class, 'getMyProfile']);
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


<<<<<<< HEAD
/////login Page Routing
$app->router->get('/utrance-railway/signIn', [AuthController::class, 'signInPage']);
$app->router->post('/utrance-railway/signIn', [AuthController::class, 'signInPageNow']);

///////////Register Page Routing
$app->router->get('/utrance-railway/register', [AuthController::class, 'registerPageNow']);
$app->router->post('/utrance-railway/register', [AuthController::class, 'registerPageNow']);






////$app->router->post('/utrance-railway/t/test.php', 'search');

////$app->router->post('/utrance-railway/t/test.php', [ViewController::class, 'search']);

$app->router->post('/utrance-railway/t/test.php', 'search');
$app->router->post('/utrance-railway/t/test.php', [ViewController::class, 'search']);








// source routing daranya

$app->router->get('/utrance-railway/source', [detailsProviderController::class, 'sourceSettings']);
$app->router->get('/utrance-railway/source/settings', [detailsProviderController::class, 'sourceSettings']);
$app->router->get('/utrance-railway/source/contactAdmin', [detailsProviderController::class, 'contactAdmin']);

// registered user routing daranya

$app->router->get('/utrance-railway/registeredUser', [RegisterUserController::class, 'registeredUserSettings']);
$app->router->get('/utrance-railway/registeredUser/settings', [RegisterUserController::class, 'registeredUserSettings']);

////////////////////////////////



//$app->router->get('/utrance-railway/example', [AuthController::class, 'getMy']);


//$app->router->post('/utrance-railway/public/index.php/hi/','hi');


=======
>>>>>>> af88cd648676b25c8e6ea6872785543ef7a223f4
/* ROUTE HANDLING */

$app->run();
