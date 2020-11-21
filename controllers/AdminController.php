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
                //var_dump($getSearchResult);
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
               // var_dump($addUserSetValue);
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


    // manage trains

    public function manageTrains($request) //Ashika
    {

        if ($this->protect()) {
            $manageTrainModel = new AdminModel(); 
            
            if ($request->isPost()) {
               
                $manageTrainModel->loadData($request->getBody());
                $getSearchResult = $manageTrainModel->getSearchTrainResult();
                
                return $this->render(['admin', 'manageTrains'], $getSearchResult);
            }

            $manageTrainModel->loadData($request->getBody());
            $getTrainArray = $manageTrainModel->getTrains();
            
            return $this->render(['admin', 'manageTrains'], $getTrainArray);

        }
        }

    

    public function addTrain($request)
    {
        if ($request->isPost()) {
            return 'success';
        }

        return $this->render(['admin', 'addTrain']);
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

    public function updateTrain($request)
    {
        if ($request->isPost()) {
            return 'success';
        }

        return $this->render(['admin', 'updateTrain']);
    }

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
