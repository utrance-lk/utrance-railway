
<?php

require_once "../controllers/PaymentController.php";

// payment
$app->router->post('/utrance-railway/payment', [PaymentController::class, 'payment']);
$app->router->get('/utrance-railway/payment', [PaymentController::class, 'payment']);
