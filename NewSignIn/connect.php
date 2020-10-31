<?php

$dsn = "mysql:host localhost;dbname=utrance";
$username = "root";
$password = "";

try{
    $db = new PDO($dsn,$username,$password);
    echo "Connected!";
} catch(PDOException $e){
    $error_message = $e->getMessage();
    echo $error_message;
    exit();
}

?>

 