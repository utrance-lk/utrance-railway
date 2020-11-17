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
        }
    }

    public function updateMe($request, $response) {
        var_dump("hy");
        $updateUserDetailsModel = new UserModel();
        if ($request->isPost()) {
            
            
            $tempUpdateUserBody = $request->getBody();

            $tempUpdateUserBody['id'] = App::$APP->activeUser()['id'];

            $updateUserDetailsModel->loadData($tempUpdateUserBody);
           
            $state = $updateUserDetailsModel->updateMyProfile();
           var_dump($state);
            if ($state === 'success') {
                var_dump("hyefew");
                return $response->redirect('/utrance-railway/settings');
            } else {
                $updateUserDetailsSetValue = $updateUserDetailsModel->registerSetValue($state); //Ashika
               // var_dump($addUserSetValue);
               if($this->authMiddleware->restrictTo('admin')) {
                return $this->render('admin',$updateUserDetailsSetValue);
               }
      
              if($this->authMiddleware->restrictTo('user')) {
                  var_dump($updateUserDetailsSetValue);
                return $this->render('registeredUser',$updateUserDetailsSetValue);
              }
               // return $this->render(['admin','addUser'], $addUserSetValue); //Ashika
               // return 'error updating data!!';
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
