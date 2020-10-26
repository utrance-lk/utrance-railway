<?php

include_once "../classes/core/Controller.php";
include_once "../models/UserModel.php";

class AuthController extends Controller
{

    public function register($request)
    {

        $userModel = new UserModel();
        if ($request->isPost()) {
            $userModel->loadData($request->getBody());

            if ($userModel->createOne()) {
                return 'Success';
            }

            // return $this->render('register', [
            //     'model' => $userModel,
            // ]);

        }

        // return $this->render('register', [
        //     'model' => $userModel,
        // ]);
    }

    public function registerPage(){
        return $this->render('register');
    echo " View Users!!";
    }


    public function registerPageNow(){
        
    echo " View Users Register Page!!";
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
