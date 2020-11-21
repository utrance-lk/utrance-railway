<?php

include_once "../classes/core/Controller.php";
include_once "../controllers/AuthController.php";
include_once "../models/DetailsProviderModel.php";


class DetailsProviderController extends Controller
{

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

        return $this->render(['detailsProvider', 'contactAdmin']);

    }



    public function addNoticesBySource()
    {
        return $this->render('addNoticesBySource');
        echo "hy girl";
    }

    public function addNoticesBySourceNow()
    {
        echo "Added Notices!!";
    }

    public function sourceDashboard()
    {
        return $this->render('sourceDashboard');
        echo "Hello Sri Lanka";
    }

    public function sourceDashboardNow()
    {
        echo "Hello my world";
    }

    public function viewUsers2()
    {
        return $this->render('viewUsers');
        echo " View Users!!";
    }
    public function viewUsersNow2()
    {
        echo "Upload View Users form";
    }

}
