<?php
include_once "../classes/Controller.php";
include_once "../models/TicketModel.php";
class TicketController extends Controller
{
    public function viewTicketPrice($request)
    {
        $viewTicketPrice = new TicketModel();

        $viewTicketPrice->loadData($request->getBody());

        if ($request->isPost()) {
            $getResultPrice = $viewTicketPrice->getTicketPrice();
            return $this->render('ticketPrice', $getResultPrice);
        }

        return $this->render('ticketPrice');
    }

    public function getTicketPrices($request)
    {
        $viewTicketPrice = new TicketModel();
        $viewTicketPrice->loadData($request->getBody());

        if ($request->isPost()) {
            $getResultPrice = $viewTicketPrice->getTicketPrice();

            return json_encode($getResultPrice['tickets']);
        }

    }

}
