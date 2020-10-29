<?php

include_once "../classes/core/Controller.php";



class AdminController extends Controller {
  
   public function adminSettings($request){
        if($request->isPost()) {
            // form
            return 'success';
        }

        return $this->render('admin');
   }

   public function manageUsers($request){
        if($request->isPost()) {
            // from
            return 'success';
        }

        return $this->render(['admin', 'manageUsers']);
   }

   public function manageTrains($request) {
       if($request->isPost()) {
           // form
           return 'success';
       }

       return $this->render(['admin', 'manageTrains']);
   }

   public function addUser($request) {
       if($request->isPost()) {
           //form
           return 'success';
       }

       return $this->render(['admin', 'addUser']);
   }

   public function addTrain($request) {
       if($request->isPost()) {
           //form
           return 'success';
       }

       return $this->render(['admin', 'addTrain']);
   }

   public function updateUser($request) {
        if($request->isPost()) {
            //form
            return 'success';
        }

        return $this->render(['admin', 'updateUser']);
   }
   
   public function updateTrain($request) {
       if($request->isPost()) {
           //form
           return 'success';
       }

       return $this->render(['admin' ,'updateTrain']);
   }







public function addNoticesByAdmin(){
    return $this->render('addNoticesByAdmin');
    echo "hy girl";
}

public function addNoticesByAdminNow(){
    echo "Added Notices!!";
}

public function adminDashboard(){
    return $this->render('adminDashboard');
    echo "Hello Sri Lanka";
}

public function adminDashboardNow(){
    echo "Hello my world";
}

public function viewUsers(){
    return $this->render('viewUsers');
    echo " View Users!!";
}
public function viewUsersNow(){
    echo "Upload View Users form" ;
}


}


?>
