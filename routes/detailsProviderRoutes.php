<?php

require_once "../controllers/DetailsProviderController.php";

$app->router->get('/contact-admin', [DetailsProviderController::class, 'contactAdmin']);

$app->router->post('/contact-admin', [DetailsProviderController::class, 'contactAdmin']);

?>