<?php

include_once "../classes/core/Controller.php";
include_once "../controllers/AuthController.php";

class AdminController extends Controller
{
    public function validateUser()
    {
        $currentUser = new AuthController();

        if (!$currentUser->isLoggedIn()) {
            echo 'You are not logged in!!';
            return false;
        }

        if (!$currentUser->restrictTo('admin')) {
            echo 'You are unorthorized to perform this action!!';
            return false;
        }

        return true;

    }

    public function adminSettings($request)
    {

        if ($this->validateUser()) {
            if ($request->isPost()) {
                // form
                return 'success';
            }

            return $this->render('admin');
        }

    }

    public function manageUsers($request)
    {

        if ($this->validateUser()) {
            $manageUserModel = new UserModel();
            if ($request->isGet()) {

                $manageUserModel->loadData($request->getBody());
                $getUserArray = $manageUserModel->getManageUsers();

                return $this->render(['admin', 'manageUsers'], $getUserArray);

            }

            if ($request->isPost()) {

            }
        }

        //  return $this->render(['admin', 'manageUsers']);
        

        
   }
   public function addUser($request){
      
       $addUserModel=new UserModel();

       if ($request->isPost()) {

        $addUserModel->loadData($request->getBody());
        if($addUserModel->addUser()){
            return "Success";
        }

    }
    return $this->render(['admin','addUser']);
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
            //from
            return 'success';
        }

        return $this->render(['admin', 'manageRoutes']);
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

    public function aboutUs()
    {
        
        return $this->render('aboutUs');
        

    }

////////////////////////////////////////////////////////////////////////////////
//source functionalities daranya

public function sourceSettings($request){
    $sourceSettingModel=new UserModel();
     if($request->isPost()) {
         // form
         return 'success';
     }
     if($request->isGet()) {
     $sourceSettingModel->loadData($request->getBody());
     $getUserDetailsArray=$sourceSettingModel->getUserDetails1();
     return $this->render('source',$getUserDetailsArray);
     }
}

 public function contactAdmin($request)
 {
    if ($request->isPost()) {
        // form
        return 'success';
    }

    return $this->render(['source', 'contactAdmin']);
     

}


public function functionality02($request){
   
   
 
}

public function fnuctionality03(){
 
     
}

 public function functionality04($request)
 {
     
 }

 public function functionality05($request)
 {
     
 }

 
 public function addNoticesBySource()
 {
     return $this->render('addNoticesBySource');
     echo "hy girl";
 }

 public function addNoticesBySourceNow()
 {
     echo "Added Notices!!";
 }

 public function sourceDashboard()
 {
     return $this->render('sourceDashboard');
     echo "Hello Sri Lanka";
 }

 public function sourceDashboardNow()
 {
     echo "Hello my world";
 }

 public function viewUsers2()
 {
     return $this->render('viewUsers');
     echo " View Users!!";
 }
 public function viewUsersNow2()
 {
     echo "Upload View Users form";
 }

 




}
