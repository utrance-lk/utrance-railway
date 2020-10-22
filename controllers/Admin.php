<?php

include_once "../classes/core/Controller.php";



class Admin extends Controller {

    public function addTrainDetails() {

    

            // var_dump($request->getBody());

            //$trainModel->getTrainDetails();
            
       /* if($request->isPost()) {
            $adminModel->loadData($request->getBody());
            $viewModel->getUserDEtails();

        }*/
   // }

   
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

}


?>
