<?php

include_once "../classes/core/Controller.php";
include_once "../controllers/AuthController.php";
include_once "../models/UserModel.php";
include_once "../models/AdminModel.php";

class AdminController extends Controller
{
    public function validateUser()
    {
        $currentUser = new AuthController();

        if (!$currentUser->restrictTo('admin')) {
            echo 'You are unorthorized to perform this action!!';
            return false;
        }

        return true;

    }

    // Admin as User

    public function adminProfile($request, $response)
    {

        if ($this->validateUser()) {

            $updateUserDetailsModel = new UserModel();
           if ($request->isPost()) {

                $tempUpdateUserBody = $request->getBody();

                $tempUpdateUserBody['id'] = App::$APP->activeUser()['id'];
                $tempUpdateUserBody['user_role']=App::$APP->activeUser()['role'];

                $updateUserDetailsModel->loadData($tempUpdateUserBody);
                $state = $updateUserDetailsModel->updateMyProfile();
               
                if($state === 'success') {
                    return $response->redirect('/utrance-railway/settings');
                } else {
                    $updateSetValue = $updateUserDetailsModel->registerSetValue($state); //Ashika
                    
                    return $this->render('admin', $updateSetValue); //Ashika
                    
                }
               
            }
            return $this->render('admin');

            

        }
    }

    // Admin's Specific functionalities //

    // manage users

    public function manageUsers($request) {

        if ($this->validateUser()) {
            $manageUserModel = new AdminModel(); 

            if ($request->isPost()) {
               
                $manageUserModel->loadData($request->getBody());
                $getSearchResult = $manageUserModel->getSearchUserResult();
                return $this->render(['admin', 'manageUsers'], $getSearchResult);
            }

            $manageUserModel->loadData($request->getBody());
            $getUserArray = $manageUserModel->getUsers();

            return $this->render(['admin', 'manageUsers'], $getUserArray);

        }
    }

    public function addUser($request) {

        $adminFunction = new AdminModel();

        if ($request->isPost()) {
            $adminFunction->loadData($request->getBody());
            if ($adminFunction->addUser()) {
                return "Success";
            } else {
                return 'error creating user!';
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
                var_dump("hy");
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

    public function manageTrains($request)
    {

        if ($this->validateUser()) {
            if ($request->isPost()) {
                // form
                return 'success';
            }

            return $this->render(['admin', 'manageTrains']);
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
