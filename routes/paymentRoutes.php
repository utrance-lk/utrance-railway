
<?php

require_once "../controllers/PaymentController.php";

// payment
$app->router->post('/payment', [PaymentController::class, 'payment']);
$app->router->get('/payment', [PaymentController::class, 'payment']);
