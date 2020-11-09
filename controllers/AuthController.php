<?php

include_once "../classes/core/Controller.php";
include_once "../models/UserModel.php";

class AuthController extends Controller
{

    public function login($request, $response)
    {
        if ($request->isPost()) {
            $loginUser = new UserModel();
            $loginUser->loadData($request->getBody());
            $result = $loginUser->findOne();
            if ($result) {
                App::$APP->session->set('user', $result[0]['id']);
                return $response->redirect('/utrance-railway/home');
            }

            return 'invalid username or password';
        }
        return $this->render('login');

    }

    //    if($request->isPost())

    //     $registerModel->loadData($request->getBody());
    //     $pathArray1=$registerModel->getUsers();
    //       //  return  $this->render('validation',$pathArray1);
    //     if( $registerModel->valid()){
    //         if($registerModel->register()){
    //             return "Success";
    //     }

    // else{return  $this->render('validation',$pathArray1);
    // }

    /*echo '<pre>';
    var_dump($registerModel->errors);
    echo '</pre>';
    exit; */

    /*return $this->render('register',[
    'model'=>$registerModel
    ]);*/

    public function logout($request, $response)
    {
        App::$APP->user = null;
        App::$APP->session->remove('user');
        return $response->redirect('/utrance-railway/home');
    }

    public function registerPageNow($request)
    {
        
        $registerModel = new UserModel();
        if ($request->isPost()) {
            $registerModel->loadData($request->getBody());
            $registrationState = $registerModel->register();
            if($registrationState === 'success') {
                // return $this->render('register');
                return 'successfully registered!!';
            }else{
                $registerSetValue=$registerModel->registerSetValue($registrationState);//Ashika
               
            }
            return $this->render('register', $registerSetValue);//Ashika
          //  return $this->render('register', $registrationState);

        }
        // //var_dump("heo");
        return $this->render('register');

    }

    public function getMy($request)
    {
        if ($request->isPost()) {

            //from
            return 'success';
        }
        return $this->render('admin');

    }

    public function signInPage()
    {
        return $this->render('signIn');
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

    public function restrictTo($role)
    { // asindu
        if (App::$APP->activeUser()['role'] === $role) {
            return true;
        }

        return false;
    }

    public function isLoggedIn()
    { // asindu
        if (App::$APP->user) {
            return true;
        }

        return false;

    }

    public function protect()
    {
        // protect the route
    }
}
