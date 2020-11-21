<?php

require_once "../controllers/DetailsProviderController.php";

$app->router->get('/utrance-railway/contact-admin', [DetailsProviderController::class, 'contactAdmin']);


?>