<?php

include_once "../classes/core/Controller.php";
include_once "../controllers/AuthController.php";

class detailsProviderController extends Controller
{
  
//details provider functionalities daranya

public function detailsProviderSettings($request){
    $detailsProviderSettingModel=new UserModel();
     if($request->isPost()) {
         // form
         return 'success';
     }
     if($request->isGet()) {
     //$detailsProviderSettingModel->loadData($request->getBody());
     //$getUserDetailsArray=$detailsProviderSettingModel->getUserDetailsAdmin();
     return $this->render('detailsProvider',$getUserDetailsArray);
     }
}

 public function contactAdmin($request)
 {
    if ($request->isPost()) {
        // form
        return 'success';
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
