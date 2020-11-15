<?php

include_once "../classes/core/Controller.php";
include_once "../controllers/AuthController.php";
include_once "../middelwares/AuthMiddelware.php";

class AdminController extends Controller
{
    public function validateAdmin()
    {
        $authMiddleware = new AuthMiddleware();

        if (!$authMiddleware->restrictTo('admin')) {
            echo 'You are unorthorized to perform this action!!';
            return false;
        }

        return true;

    }

    // Admin's Specific functionalities //

    // manage users

    public function manageUsers($request) {

        if ($this->validateAdmin()) {
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

    public function viewUser($request) {

        if($request->isGet()) {
            $adminViewUser = new AdminModel();
            $adminViewUser->loadData($request->getQueryParams());
            $updateUserArray = $adminViewUser->getUserDetails();
            $updateUserArray['users'][0]['id'] = $request->getQueryParams()['id'];
            return $this->render(['admin', 'updateUser'], $updateUserArray);
        }

    }

    public function updateUser($request, $response) {

        if ($request->isPost()) {
            $saveDetailsModel = new AdminModel();
            $tempBody = $request->getBody();
            $id = $request->getQueryParams()['id'];
            $tempBody['id'] = $id;
            $saveDetailsModel->loadData($tempBody);
            $saveDetailsModel->updateUserDetails();
            return $response->redirect('/utrance-railway/users/view?id=' . $id);
        }

    }

    public function changeUserStatus($request)
    { //Ashika
        if ($request->isGet()) {
            $changeUserStatusModel = new AdminModel();
            $changeUserStatusModel->loadData($request->getQueryParams());
            //var_dump($request->getQueryParams());
            $changeUserStatusModel->changeUserStatusDetails();
            $changeStatusArray = $changeUserStatusModel->getManageUsers();

        }
        return $this->render(['admin', 'manageUsers'], $changeStatusArray);
    }


    // manage trains

    public function manageTrains($request)
    {

        if ($this->validateAdmin()) {
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
