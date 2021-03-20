<?php

require_once "../controllers/TicketController.php";
$app->router->post('/utrance-railway/ajax-ticket-price', [TicketController::class, 'getTicketPrices']);
