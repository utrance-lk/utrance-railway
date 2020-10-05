<?php

require_once "./classes/core/App.php";
// require_once "../controllers/SiteController.php";
// require_once "../controllers/AuthController.php";
require_once "./vendor/autoload.php";

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

// databse configuration (getting the details from the config.env)
$config = [ 
    'db' => [
        'dsn' => $_ENV['DB_DSN'],
        'user' => $_ENV['DB_USER'],
        'password' => $_ENV['DB_PASSWORD'],
    ],
];

$app = new App(__DIR__, $config);

$app->db->applyMigrations();
