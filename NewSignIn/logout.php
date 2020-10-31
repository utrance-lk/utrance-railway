<?php
//logout.php
session_start();
session_destroy();
header("locatoin:pdo_signIn.php");
?>
