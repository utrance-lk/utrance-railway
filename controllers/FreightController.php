<?php

include_once "../classes/core/Controller.php";
include_once "../middlewares/AuthMiddleware.php";

class FreightController extends Controller{

    public function searchFreightTrains($request) {
        if($request->isGet()) {
            return $this->render('freightSearch');
        }
    }

}


?>