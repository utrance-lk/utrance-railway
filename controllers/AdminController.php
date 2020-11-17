<?php

include_once "../classes/core/Controller.php";
include_once "../controllers/AuthController.php";
include_once "../middlewares/AuthMiddleware.php";

class AdminController extends Controller
{
    public function protect()
    {
        $authMiddleware = new AuthMiddleware();

        if(!$authMiddleware->isLoggedIn()) {
            return 'Your are not logged in!';
        }

        if (!$authMiddleware->restrictTo('admin')) {
            echo 'You are unorthorized to perform this action!!';
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
                var_dump($addUserSetValue);
                return $this->render(['admin','addUser'], $addUserSetValue); //Ashika
            }

        }
        return $this->render(['admin', 'addUser']);
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

    public function changeUserStatus($request) /// Activate and deactivate part in manage users
    { //Ashika
        if ($request->isGet()) {
            $changeUserStatusModel = new AdminModel();
            $changeUserStatusModel->loadData($request->getQueryParams());
            $changeUserStatusModel->changeUserStatusDetails();
            $changeStatusArray = $changeUserStatusModel->getUsers();

        }
        return $this->render(['admin', 'manageUsers'], $changeStatusArray);
    }


    // manage trains///////////////////////////////////////////////////////////////////////////////////////////////

    public function manageTrains($request)
    {
        $searchModel = new AdminModel();
        if ($this->protect()) {
            if ($request->isPost()) 
        {
            $searchModel = new AdminModel();
            $searchModel->loadData($request->getBody());          
            $resultArray=$searchModel->searchTrainDetails();
             return $this->render(['admin', 'manageTrains'], $resultArray);
        }

        $searchModel->loadData($request->getBody());
        $trainArrays = $searchModel->getTrains();
        //  var_dump($trainArrays);
        return $this->render(['admin', 'manageTrains'], $trainArrays);


        }
    }

    public function updateTrain($request) 
    {
    
        if($request->isGet()) 
        {
        $updateTrainModel=new AdminModel();
        $updateTrainModel->loadData($request->getQueryParams());
        $updateTrainArray=$updateTrainModel->getManagTrains();
        return $this->render(['admin', 'updateTrain'],$updateTrainArray);
        }

        if ($request->isPost()) 
        {
            $saveDetailsModel = new AdminModel();
             $tempBody = $request->getBody();
             $tempBody['id'] = $request->getQueryParams()['id'];
             $saveDetailsModel->loadData($tempBody); 
             $validationState = $saveDetailsModel->updateTrainDetails();
            //  var_dump($validationState);
             
             if ($validationState === "success") {
               
                 $trainArray=$saveDetailsModel->getTrains();
             return $this->render(['admin', 'manageTrains'],$trainArray);
             } 
             else {
                $trainArray=$saveDetailsModel->getManagTrains();
                return $this->render(['admin', 'updateTrain'],$trainArray,$validationState);
   
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

    public function addTrain($request) 
    {
        $saveTrainDetails = new AdminModel();
        $saveTrainDetails->loadData($request->getBody());
         if ($request->isPost()) 
        {
            $validationState = $saveTrainDetails->addNewTrainDetails();
             
            if ($validationState === 'success') {
                $getrouteArray = $saveTrainDetails->getAvailableRoute();
                
                return $this->render(['admin', 'addTrain'],$getrouteArray);
            } else {
                $registerSetValue = $saveTrainDetails->trainSetValue($validationState);
            //    var_dump($getrouteArray);
                // var_dump( $registerSetValue['train_travel_days']);
                // $this->render(['admin', 'addTrain'], $getrouteArray);
                
                return $this->render(['admin', 'addTrain'],$registerSetValue); 
                

            }
        }
        $getrouteArray = $saveTrainDetails->getAvailableRoute();
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

    

    public function addNoticesByAdmin()
    {
        echo "hy girl";
        return $this->render('addNoticesByAdmin');
    }

    public function adminDashboard()
    {
        echo "Hello Sri Lanka";
        return $this->render('adminDashboard');
    }

    public function viewUsers()
    {
        echo " View Users!!";
        return $this->render('viewUsers');
    }
    
    public function aboutUs()
    {

        return $this->render('aboutUs');

    }

}
