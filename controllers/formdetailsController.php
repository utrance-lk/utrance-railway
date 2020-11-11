<?php
include_once "../classes/core/Controller.php";
include_once "../models/TrainModel.php";
class FormDetailsController extends Controller
{

    public function form($request)
    {
        if ($request->isPost()) {
            // form
            return 'success';

        }

        return $this->render('getUserDetails');
    }

    public function register($request)
    {

        $userModel = new TrainModel();
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
            $searchModel = new TrainModel();
            $searchModel->loadData($request->getBody());
            

            $trainArrays = $searchModel->getTrains();
            //  var_dump($trainArrays);
            return $this->render(['admin', 'manageTrains'], $trainArrays);

        }

        if ($request->isPost()) 
        {
            $searModel = new TrainModel();

            $searModel->loadData($request->getBody());
           
            $resultArray=$searModel->searchTrainDetails();
           

            if($resultArray){
                
             return $this->render(['admin', 'manageTrains'], $resultArray);

            }else{
                 return $this->render(['admin', 'manageTrains'] );
                
               
            }
            

            // if($searchModel->searchTrainDetails()){
            //     return 'success';
                
            // }  

        }

        //  return $this->render(['admin', 'manageTrains']);
   }

   public function updateTrain($request) 
    {
    
        if($request->isGet()) 
        {
            $updateTrainModel=new TrainModel();
            // var_dump($request->getQueryParams());


        $updateTrainModel->loadData($request->getQueryParams());
        $updateTrainArray=$updateTrainModel->getManagTrains();
        
            
        
            //return $this->render(['admin', 'manageUsers'],$getUserArray);
        return $this->render(['admin', 'updateTrain'],$updateTrainArray);
        }

        if ($request->isPost()) 
        {

            $saveDetailsModel = new TrainModel();

       

             $tempBody = $request->getBody();
             $tempBody['id'] = $request->getQueryParams()['id'];
             $saveDetailsModel->loadData($tempBody);


            //$updateUser=$saveDetailsModel->getUpdateUserDetails();
            //var_dump($saveDetailsModel->updateUserDetails());
            $saveDetailsModel->updateTrainDetails();
            
            return 'success';

        }

   
            //  return $this->render(
            // return $this->render(['admin', 'updateTrain']);
    }



    public function deleteTrain($request) 
    {
    
        if($request->isGet()) 
        {
        $deleteTrainModel=new TrainModel();
            // var_dump($request->getQueryParams());


        $deleteTrainModel->loadData($request->getQueryParams());
        $deleteTrainModel->deleteTrains();
        $trainArrays=$deleteTrainModel->getTours();
        
            
    
        return $this->render(['admin', 'manageTrains'],$trainArrays);
        return succsee;
        }

        
    }

    public function addTrain($request) 
    {
        $saveTrainDetails = new TrainModel();
        
        if ($request->isPost()) 
        {
            

          

            $saveTrainDetails->loadData($request->getBody());
            //$updateUser=$saveDetailsModel->getUpdateUserDetails();
            //var_dump($saveDetailsModel->updateUserDetails());
            if($saveTrainDetails->addNewTrainDetails()){
                return 'success';
                
            }
            
           

        }
      
            return $this->render(['admin', 'addTrain']);
        

    }

   

 
}
