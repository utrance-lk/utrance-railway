<?php

include_once "../classes/core/Controller.php";

class AdminController extends Controller
{

    public function adminSettings($request)
    {
        if ($request->isPost()) {
            // form
            return 'success';
        }

        return $this->render('admin');
    }

    public function manageUsers($request)
    {
        $manageUserModel = new UserModel();
        if ($request->isGet()) {

            $manageUserModel->loadData($request->getBody());
            $getUserArray = $manageUserModel->getManageUsers();

            return $this->render(['admin', 'manageUsers'], $getUserArray);

        }

        if ($request->isPost()) {

        }
        //  return $this->render(['admin', 'manageUsers']);

    }

    public function manageTrains($request)
    {
        if ($request->isPost()) {
            // form
            return 'success';
        }

        return $this->render(['admin', 'manageTrains']);
    }

    public function manageRoutes($request)
    {
        if ($request->isPost()) {
            //from
            return 'success';
        }

        return $this->render(['admin', 'manageRoutes']);
    }

    public function addUser($request)
    {
        if ($request->isPost()) {
            //form
            return 'success';
        }

        return $this->render(['admin', 'addUser']);
    }

    public function addTrain($request)
    {
        if ($request->isPost()) {
            //form
            return 'success';
        }

        return $this->render(['admin', 'addTrain']);
    }

    public function addRoute($request)
    {
        if ($request->isPost()) {
            // form
            return 'success';
        }

        return $this->render(['admin', 'addRoute']);
    }

    public function updateUser($request)
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
            //var_dump($saveDetailsModel->updateUserDetails());
            $saveDetailsModel->updateUserDetails();

            return;

        }

    }

    public function updateTrain($request)
    {
        if ($request->isPost()) {
            //form
            return 'success';
        }

        return $this->render(['admin', 'updateTrain']);
    }

    public function addNoticesByAdmin()
    {
        return $this->render('addNoticesByAdmin');
        echo "hy girl";
    }

    public function addNoticesByAdminNow()
    {
        echo "Added Notices!!";
    }

    public function adminDashboard()
    {
        return $this->render('adminDashboard');
        echo "Hello Sri Lanka";
    }

    public function adminDashboardNow()
    {
        echo "Hello my world";
    }

    public function viewUsers()
    {
        return $this->render('viewUsers');
        echo " View Users!!";
    }
    public function viewUsersNow()
    {
        echo "Upload View Users form";
    }

}
