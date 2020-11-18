<?php

include_once "../classes/core/Controller.php";
include_once "../models/UserModel.php";
include_once "../middlewares/AuthMiddleware.php";

class UserController extends Controller
{
    private $authMiddleware;

    public function __construct() {
        $this->authMiddleware = new AuthMiddleware();
    }

    public function getMe($request, $response) {
        if ($request->isGet()) {
            if($this->authMiddleware->restrictTo('admin')) {
                return $this->render('admin');
            }
            if($this->authMiddleware->restrictTo('user')) {
                return $this->render('registeredUser');
            }

            if($this->authMiddleware->restrictTo('deatils provider')){
               // return $this->render('');
            }

        }
    }

    public function updateMe($request, $response) {
       
        $updateUserDetailsModel = new UserModel();
        if ($request->isPost()) {
            
            
            $tempUpdateUserBody = $request->getBody();

            $tempUpdateUserBody['id'] = App::$APP->activeUser()['id'];
            $tempUpdateUserBody['user_role']=App::$APP->activeUser()['role'];

            $updateUserDetailsModel->loadData($tempUpdateUserBody);
           
            $state = $updateUserDetailsModel->updateMyProfile();
           
            if ($state === 'success') {
             
                return $response->redirect('/utrance-railway/settings');
            } else {
                $updateUserDetailsSetValue = $updateUserDetailsModel->registerSetValue($state); //Ashika
               
               if($this->authMiddleware->restrictTo('admin')) {
                return $this->render('admin',$updateUserDetailsSetValue);
               }
      
              if($this->authMiddleware->restrictTo('user')) {
                
                return $this->render('registeredUser',$updateUserDetailsSetValue);
              }
              
            }
        }
        
    }

    public function deleteMe()
    {
        // delete my profile
    }

    public function createUser()
    {
        // do not implement this method
        // use sign up in AuthController
    }

}
