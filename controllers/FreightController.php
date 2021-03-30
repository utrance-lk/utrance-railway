<?php
include_once "../classes/core/Controller.php";
include_once "../models/FreightModel.php";
class FreightController extends Controller
{
    public function viewFreightPrice($request)
    {
        $viewFreightPrice = new FreightModel();

        $viewFreightPrice->loadData($request->getBody());

        if ($request->isPost()) {
            $getResultPrice = $viewFreightPrice->getFreightPrice();
            return $this->render('freightPrice', $getResultPrice);
            
        }
        

        return $this->render('freightPrice');
    }
}