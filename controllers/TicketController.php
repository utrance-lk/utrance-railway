<?php
include_once "../classes/core/Controller.php";
include_once "../models/TicketModel.php";
class TicketController extends Controller
{
    public function viewTicketPrice($request){
        $viewTicketPrice = new TicketModel();
       
        $viewTicketPrice->loadData($request->getBody());
        //var_dump($request->getBody());
        if($request->isPost()){
            $getResultPrice=$viewTicketPrice->getTicketPrice();
            //var_dump($getResultPrice);
            return $this->render('ticketPrice',$getResultPrice);
        }
        return $this->render('ticketPrice');
    }
}