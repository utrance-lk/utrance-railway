<?php

include_once "../classes/core/Controller.php";



class AdminController extends Controller {

    public function addTrainDetails() {

    

            // var_dump($request->getBody());

            //$trainModel->getTrainDetails();
            
       /* if($request->isPost()) {
            $adminModel->loadData($request->getBody());
            $viewModel->getUserDEtails();

        }*/
   // }

   
   }


   public function adminSettings(){
    return $this->render('admin');
    
   }

   public function adminSettingsNow(){
    echo "Admin settings page added Successfully";
   }


   public function manageUser(){
    return $this->render('manageUser');
   
    
   }


   public function manageUserNow(){
       echo "Manage User Page added Successfully";

   }

   public function addUser(){
    return $this->render('addUser');
    
   }

   public function addUserNow(){
    
    echo "Add User Page added Successfully";
   }








public function addTrain(){
    return $this->render('addTrainDetails');
    echo "hy girl";
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

public function updateUserProfile(){
    return $this->render('updateUserProfile');
    echo " hello update user profile!!";
}
public function updateUserProfileNow(){
    echo " hello Upload form" ;
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
