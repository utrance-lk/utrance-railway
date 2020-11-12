<?php

include_once "../classes/core/Controller.php";
include_once "../controllers/AuthController.php";

class detailsProviderController extends Controller
{
  
//details provider functionalities daranya

public function sourceSettings($request){
    $sourceSettingModel=new UserModel();
     if($request->isPost()) {
         // form
         return 'success';
     }
     if($request->isGet()) {
     $sourceSettingModel->loadData($request->getBody());
     $getUserDetailsArray=$sourceSettingModel->getUserDetailsAdmin();
     return $this->render('source',$getUserDetailsArray);
     }
}

 public function contactAdmin($request)
 {
    if ($request->isPost()) {
        // form
        return 'success';
    }

    return $this->render(['source', 'contactAdmin']);
     

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
