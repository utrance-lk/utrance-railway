<?php
include_once "../classes/core/Controller.php";
include_once "../models/TicketModel.php";
class TicketController extends Controller
{
    public function viewTicketPrice($request)
    {
        $viewTicketPrice = new TicketModel();

        $viewTicketPrice->loadData($request->getBody());

        if ($request->isPost()) {
            $getResultPrice = $viewTicketPrice->getTicketPrice();
            var_dump($getResultPrice);
            // echo json_encode($getResultPrice['tickets']);
            return $this->render('ticketPrice', $getResultPrice);
        }

        return $this->render('ticketPrice');
    }

    public function getTicketPrices($request) {
        $viewTicketPrice = new TicketModel();
        $viewTicketPrice->loadData($request->getBody());
            
        if ($request->isPost()) {
            $getResultPrice = $viewTicketPrice->getTicketPrice();
            // var_dump($getResultPrice);
            return json_encode($getResultPrice['tickets']);
        }

    }



}
