<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<form action="" method="post">
    <label for="from2">From</label>
    <input type="text" name="from2">
    <br>
    <label for="to2">To</label>
    <input type="text" name="to2">
    <input type="submit">

    </form>
</body>
</html>

<?php

require_once "../classes/core/App.php";
require_once "../controllers/ViewController.php";
require_once "../controllers/AuthController.php";
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


$app2 = new App(dirname(__DIR__), $config);

$app2->router->post('/utrance-railway/t/test.php', [ViewController::class, 'search']);

$app2->run();

// if(isset($_POST['from2'])) {
//     echo 'hello';
//     var_dump(App::$APP->request->getBody());
// } else {
//     echo 'my bad';
// }
