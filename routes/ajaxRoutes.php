<?php

require_once "../controllers/TicketController.php";
$app->router->post('/ajax-ticket-price', [TicketController::class, 'getTicketPrices']);
