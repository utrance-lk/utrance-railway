<?php

include_once "../classes/core/Controller.php";
include_once "../models/UserModel.php";

class AuthController extends Controller
{

    public function registerPageNow($request)
    {
        echo "Hwll";

        $userModel = new UserModel();
        if ($request->isPost()) {
            echo "hy";
            $userModel->loadData($request->getBody());
            $userModel->createOne();

           /* if ($userModel->createOne()) {
                echo "";
                return 'Success';
            }

          /*  return $this->render('register', [
                'model' => $userModel,
             ]);*/

        }

        // return $this->render('register', [
        //     'model' => $userModel,
        // ]);
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
