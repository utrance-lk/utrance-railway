<?php

require_once "../classes/core/App.php";
include_once "../models/UserModel.php";
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
    ]
    
];

$app = new App(dirname(__DIR__), $config);

require_once "../routes/adminRoutes.php";
require_once "../routes/ajaxRoutes.php";
require_once "../routes/authRoutes.php";
require_once "../routes/bookingRoutes.php";
// require_once "../routes/detailsProviderRoutes.php";
require_once "../routes/paymentRoutes.php";
require_once "../routes/trainRoutes.php";
require_once "../routes/userRoutes.php";
require_once "../routes/viewRoutes.php";

$app->run();
