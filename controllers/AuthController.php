<?php

include_once "../classes/core/Controller.php";
include_once "../models/UserModel.php";


class AuthController extends Controller
{

    public function registerPageNow($request)
    {
        $registerModel=new UserModel();
       if($request->isPost()){
          
           $registerModel->loadData($request->getBody());
          
           
          

    if($registerModel->validate() && $registerModel->register()){
               return "Success";
    }
           
   echo '<pre>';
    var_dump($registerModel->errors);
    echo '</pre>';
    exit; 
 
       return $this->render('register',[
           'model'=>$registerModel
       ]);
       
    }
}

    public function registerPage(){
        return $this->render('register');
        
    }

    public function login()
    {
        return $this->render('login');
    }

    public function logout()
    {
        // logout
       
    }

    public function isLoggedIn()
    {
        
        // checks whether user is logged in or not
    }

    public function forgotPassword()
    {
        // user forget the password
    }

    public function resetPassword()
    {
        // reset password
    }

    public function updatePassword()
    {
        // updates the password
    }

    public function restricTo()
    {
        // grant permission
    }

    public function protect()
    {
        // protect the route
    }

}
