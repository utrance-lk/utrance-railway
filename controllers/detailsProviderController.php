<?php

include_once "../classes/core/Controller.php";
include_once "../controllers/AuthController.php";
include_once "../middlewares/AuthMiddleware.php";
include_once "../models/DetailsProviderModel.php";

  

class DetailsProviderController extends Controller
{

    private function protect()
    {
        $authMiddleware = new AuthMiddleware();

        if(!$authMiddleware->isLoggedIn()) {
            return 'Your are not logged in!';
        }

        if (!$authMiddleware->restrictTo('detailsProvider')) {
            echo 'You are unorthorized to perform this action!!';
            return false;
        }
        return true;

    }

    public function contactAdmin($request)
    { 
        $contactAdminModel = new DetailsProviderModel();

        if ($request->isPost()) 
        {
            $contactAdminModel->loadData($request->getbody());
            $addDetails = $contactAdminModel->contactAdmin();
            //var_dump($addDetails);
            return $this->render(['detailsProvider','contactAdmin']); 
        
        }
        return $this->render(['detailsProvider','contactAdmin']); 

    }

}
