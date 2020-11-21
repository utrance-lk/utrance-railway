<?php

require_once "../controllers/detailsProviderController.php";

$app->router->get('/utrance-railway/contact-admin', [detailsProviderController::class, 'contactAdmin']);


?>