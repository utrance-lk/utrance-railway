<?php

require_once "../controllers/TicketController.php";
require_once "../controllers/FreightController.php";
$app->router->post('/utrance-railway/ajax-ticket-price', [TicketController::class, 'getTicketPrices']);
$app->router->post('/utrance-railway/ajax-freight-price', [FreightController::class, 'getFreightPrices']);
