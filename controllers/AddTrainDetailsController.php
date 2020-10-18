<?php

include_once "../classes/core/Controller.php";


class AddTrainDetailsController extends Controller {

    public function addTrainDetails(){
       
        echo "Hello World";
       
       
        

        /*if($request->isPost()) {
            $trainModel->loadData($request->getBody());

            // var_dump($request->getBody());

            $trainModel->getTrainDetails();
            
       /* if($request->isPost()) {
            $adminModel->loadData($request->getBody());
            $viewModel->getUserDEtails();

        }*/
   // }

   
   }
public function addTrain(){
    return $this->render('admin');
    echo "hy girl";
}

}


?>