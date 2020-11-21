<?php

include_once "../classes/core/Controller.php";
include_once "../controllers/AuthController.php";
include_once "../middlewares/AuthMiddleware.php";

class AdminController extends Controller
{
    private function protect()
    {
        $authMiddleware = new AuthMiddleware();

        if(!$authMiddleware->isLoggedIn()) {
            // echo 'Your are not logged in!';
            return false;
        }

        if (!$authMiddleware->restrictTo('admin')) {
            // echo 'You are unorthorized to perform this action!!';
            return false;
        }
        return true;

    }

    // Admin's Specific functionalities //

    // manage users

    public function manageUsers($request) {

        if ($this->protect()) {
            $manageUserModel = new AdminModel(); 

            if ($request->isPost()) {
                $searchUser = new AdminModel();
                $searchUser->loadData($request->getBody());
                $getSearchResult = $searchUser->getSearchUserResult();
                return $this->render(['admin', 'manageUsers'], $getSearchResult);
            }

            $manageUserModel->loadData($request->getBody());
            $getUserArray = $manageUserModel->getUsers();

            return $this->render(['admin', 'manageUsers'], $getUserArray);

        } else {
            return 'You are not authorized';
        }
    }

    public function addUser($request,$response) {//Admin page add user function

        $adminFunction = new AdminModel();

        if ($request->isPost()) {
            $adminFunction->loadData($request->getBody());
            $state=$adminFunction->addUser();

            if($state === "success"){
                return $response->redirect('/utrance-railway/users/add');
            }else{
                $addUserSetValue = $adminFunction->registerSetValue($state); //Ashika
               // var_dump($addUserSetValue);
                return $this->render(['admin','addUser'], $addUserSetValue); //Ashika
            }

        }
        
        return $this->render(['admin','addUser']);
    }

    public function viewUser($request) {//View users from manage users

        if($request->isGet()) {
            $adminViewUser = new AdminModel();
            $adminViewUser->loadData($request->getQueryParams());
            $updateUserArray = $adminViewUser->getUserDetails();
            $updateUserArray['users'][0]['id'] = $request->getQueryParams()['id'];
            return $this->render(['admin', 'updateUser'], $updateUserArray);
        }

    }

    public function viewTrains($request){
        if($request->isGet()){
            $adminViewTrain=new AdminModel();
            $adminViewTrain->loadData($request->getQueryParams());
            $updateTrainArray=$adminViewTrain->getTrainDetails();
            $updateTrainArray['trains'][0]['trains_id']=$request->getQueryParams()['trains_id'];
            return $this->render(['admin','updateUser'],$updateTrainArray);
        }
    }
    
    public function updateUser($request, $response) {//update users from manage users

        if ($request->isPost()) {
            $saveDetailsModel = new AdminModel();
            
            $tempBody = $request->getBody();
            $id = $request->getQueryParams()['id'];
            $tempBody['id'] = $id;
            $saveDetailsModel->loadData($tempBody);
            $state=$saveDetailsModel->updateUserDetails();
           
            if($state === "success"){
                return $response->redirect('/utrance-railway/users/view?id=' . $id);
            }else{
                $commonArray=$saveDetailsModel->getUserDetails();
                $commonArray["updateSetValue"]=$saveDetailsModel->registerSetValue($state); //Ashika
                return $this->render(['admin','updateUser'], $commonArray); //Ashika
            }
            
        }

    }

    public function changeUserStatus($request, $response) /// Activate and deactivate part in manage users
    { //Ashika
        if ($request->isGet()) {
            $changeUserStatusModel = new AdminModel();
            $changeUserStatusModel->loadData($request->getQueryParams());
            $changeUserStatusModel->changeUserStatusDetails();
            $changeStatusArray = $changeUserStatusModel->getUsers();

        }
        $response->redirect('/utrance-railway/users');
    }


    // manage trains///////////////////////////////////////////////////////////////////
    public function manageTrains($request)
    {
        $searchModel = new AdminModel();
        $searchModel->loadData($request->getBody());
        if ($this->protect()) {
            if ($request->isPost()) 
        {
                     
            $resultArray=$searchModel->searchTrainDetails();
             return $this->render(['admin', 'manageTrains'], $resultArray);
        }

        
        $trainArrays = $searchModel->getTrains();
        return $this->render(['admin', 'manageTrains'], $trainArrays);


        }
    }
    
    public function viewTrain($request){
        if ($request->isGet()) {
            $saveDetailsModel = new AdminModel();
    
        $tempBody = $request->getBody();
        $tempBody['id'] = $request->getQueryParams()['id'];
        $saveDetailsModel->loadData($tempBody); 

        $updateTrainArray=$saveDetailsModel->getManagTrains();
        $updateTrainArray['newArray']=$saveDetailsModel->validateTrains($updateTrainArray);
    
        return $this->render(['admin', 'updateTrain'],$updateTrainArray);

        }
        
        

    } 


    public function updateTrain($request, $response) 
    {
        
        if ($request->isPost()) 
        {
            $saveDetailsModel = new AdminModel();
           
          
        $tempBody = $request->getBody();
        $tempBody['id'] = $request->getQueryParams()['id'];
        $id = $request->getQueryParams()['id'];
        $tempBody['id'] = $id;
        $saveDetailsModel->loadData($tempBody);
   
             $validationState = $saveDetailsModel->updateTrainDetails();
            //  var_dump($validationState);
             
             if ($validationState === "success") {
               
                return $response->redirect('/utrance-railway/trains/view?id='.$id);
             } 
             else {
               
                $trainArray=$saveDetailsModel->getManagTrains();
                $registerSetValue = $saveDetailsModel->trainSetValue($validationState);
                return $this->render(['admin', 'updateTrain'],$trainArray,$registerSetValue);
   
             }
         
        }
        

    }

    public function deleteTrain($request) 
    {
    
        if($request->isGet()) 
        {
        $deleteTrainModel=new AdminModel();
      
        $deleteTrainModel->loadData($request->getQueryParams());
        $deleteTrainModel->deleteTrains();
        $trainArray=$deleteTrainModel->getTrains();
        return $this->render(['admin', 'manageTrains'],$trainArray);
        
        }

        
    }

    public function addTrain($request, $response) 
    {
        $saveTrainDetails = new AdminModel();
        $saveTrainDetails->loadData($request->getBody());
        $getrouteArray['routes'] = $saveTrainDetails->getAvailableRoute();
        
        
         if ($request->isPost()) 
        {
            $validationState = $saveTrainDetails->addNewTrainDetails();
             
            if ($validationState === 'success') {
                // $getrouteArray = $saveTrainDetails->getAvailableRoute();
                
                // return $this->render(['admin', 'addTrain'],$getrouteArray);
                return $response->redirect('/utrance-railway/trains/add');
            } else {
               
                $trainArray= $saveTrainDetails->trainSetValue($validationState);
                $trainArray['routes'] = $saveTrainDetails->getAvailableRoute();
             
                // var_dump( $registerSetValue['train_travel_days']);
                // $this->render(['admin', 'addTrain'], $getrouteArray);
                
                return $this->render(['admin', 'addTrain'],$trainArray); 
                

            }
        }
        
        // var_dump($getrouteArray)
            return $this->render(['admin', 'addTrain'],$getrouteArray);
    }

    

    

    // manage routes

    public function manageRoutes($request)
    {
        if ($request->isPost()) {
            return 'success';
        }

        return $this->render(['admin', 'manageRoutes']);
    }

    public function addRoute($request)
    {
        if ($request->isPost()) {
            return 'success';
        }

        return $this->render(['admin', 'addRoute']);
    }

    ////////////////////////

    
    public function aboutUs()
    {

        return $this->render('aboutUs');

    }



}
