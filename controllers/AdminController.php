<?php

include_once "../classes/core/Controller.php";
include_once "../controllers/AuthController.php";

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

    public function adminSettings($request)
    {

        if ($this->validateUser()) {

            $updateUserDetailsModel = new UserModel();

            if ($request->isPost()) {

                $tempUpdateUserBody = $request->getBody();

                $tempUpdateUserBody['id'] = $request->getQueryParams()['id'];

                $updateUserDetailsModel->loadData($tempUpdateUserBody);

                $updateUserDetailsModel->updateUserSettingsDetails();
                return $this->render('admin');
            }

            return $this->render('admin');
        }
    }

    public function manageUsers($request) //Ashika

    {

        if ($this->validateUser()) {
            $manageUserModel = new UserModel();
            if ($request->isGet()) {

                $manageUserModel->loadData($request->getBody());
                $getUserArray = $manageUserModel->getManageUsers();

                return $this->render(['admin', 'manageUsers'], $getUserArray);

            }

            if ($request->isPost()) {
                $searchUser = new UserModel();
                $searchUser->loadData($request->getBody());
                $getSearchREsult = $searchUser->getSearchUserResult();
                return $this->render(['admin', 'manageUsers'], $getSearchREsult);

            }
            //return $this->render(['admin', 'manageUsers']);
        }

        //  return $this->render(['admin', 'manageUsers']);
    }

    public function addUser($request)
    {

        $addUserModel = new UserModel();

        if ($request->isPost()) {

            $addUserModel->loadData($request->getBody());
            if ($addUserModel->addUser()) {

                return "Success";
            }

        }
        return $this->render(['admin', 'addUser']);

    }

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

    public function manageRoutes($request)
    {
        if ($request->isPost()) {
            return 'success';
        }

        return $this->render(['admin', 'manageRoutes']);
    }

    public function addTrain($request)
    {
        if ($request->isPost()) {
            return 'success';
        }

        return $this->render(['admin', 'addTrain']);
    }

    public function addRoute($request)
    {
        if ($request->isPost()) {
            return 'success';
        }

        return $this->render(['admin', 'addRoute']);
    }

    public function changeUserStatus($request)
    { //Ashika
        if ($request->isGet()) {
            $changeUserStatusModel = new UserModel();
            $changeUserStatusModel->loadData($request->getQueryParams());
            //var_dump($request->getQueryParams());
            $changeUserStatusModel->changeUserStatusDetails();
            $changeStatusArray = $changeUserStatusModel->getManageUsers();

        }
        return $this->render(['admin', 'manageUsers'], $changeStatusArray);
    }

    public function updateUser($request) //Ashika

    {

        if ($request->isGet()) {
            $updateUserModel = new UserModel();
            $updateUserModel->loadData($request->getQueryParams());
            $updateUserArray = $updateUserModel->getUserDetails();
            return $this->render(['admin', 'updateUser'], $updateUserArray);
        }

        if ($request->isPost()) {

            $saveDetailsModel = new UserModel();
            $tempBody = $request->getBody();
            $tempBody['id'] = $request->getQueryParams()['id'];
            $saveDetailsModel->loadData($tempBody);
            //$updateUser=$saveDetailsModel->getUpdateUserDetails();
            $saveDetailsModel->updateUserDetails();

            return;

        }

    }

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

    public function addNoticesByAdminNow()
    {
        echo "Added Notices!!";
    }

    public function adminDashboard()
    {
        echo "Hello Sri Lanka";
        return $this->render('adminDashboard');
    }

    public function adminDashboardNow()
    {
        echo "Hello my world";
    }

    public function viewUsers()
    {
        echo " View Users!!";
        return $this->render('viewUsers');
    }
    public function viewUsersNow()
    {
        echo "Upload View Users form";
    }

    public function aboutUs()
    {

        return $this->render('aboutUs');

    }

}
