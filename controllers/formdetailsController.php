<?php
include_once "../classes/core/Controller.php";
include_once "../models/getUserModel.php";
class formdetailsController extends Controller {
  
    public function form($request){
         if($request->isPost()) {
             // form
              return 'success';
            
         }
 
         return $this->render('getUserDetails');
    }

    public function register($request)
    {

        $userModel = new getUserModel();
        if ($request->isPost()) {
            $userModel->loadData($request->getBody());

            if ($userModel->createOne()) {
                return 'Success';
            }

            // return $this->render('register', [
            //     'model' => $userModel,
            // ]);

        }

        // return $this->render('register', [
        //     'model' => $userModel,
        // ]);
    }

    public function manageTrains($request)
    {
        // var_dump($request->getBody());
        if($request->isGet()) 
        {
            $searchModel = new getUserModel();
            $searchModel->loadData($request->getBody());
            

            $trainArrays = $searchModel->getTours();
            //  var_dump($trainArrays);
            return $this->render(['admin', 'manageTrains'], $trainArrays);

        }

        return $this->render(['admin', 'manageTrains']);
   }

   public function updateTrain($request) 
    {
    
        if($request->isGet()) 
        {
            $updateTrainModel=new getUserModel();
            // var_dump($request->getQueryParams());


        $updateTrainModel->loadData($request->getQueryParams());
        $updateTrainArray=$updateTrainModel->getManagTrains();
        
            
        
            //return $this->render(['admin', 'manageUsers'],$getUserArray);
        return $this->render(['admin', 'updateTrain'],$updateTrainArray);
        }

        if ($request->isPost()) 
        {

            $saveDetailsModel = new getUserModel();
            $tempBody = $request->getBody();
            $tempBody['train_id'] = $request->getQueryParams()['train_id'];
            $saveDetailsModel->loadData($tempBody);
            //$updateUser=$saveDetailsModel->getUpdateUserDetails();
            //var_dump($saveDetailsModel->updateUserDetails());
            $saveDetailsModel->updateTrainDetails();
            
            return 'success';

        }

   
            //  return $this->render(
            // return $this->render(['admin', 'updateTrain']);
    }

   

 
}

?>


