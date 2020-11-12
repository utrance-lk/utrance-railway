<?php

include_once "../classes/core/Controller.php";
include_once "../models/UserModel.php";
include_once "AdminController.php";
include_once "RegisterUserController.php";

class AuthController extends Controller
{

    public function login($request, $response)
    {
        if ($request->isPost()) {
            $loginUser = new UserModel();
            $tempBody = $request->getBody();
            $tempBody['user_password'] = hash('sha256', $request->getBody()['user_password']);
            // $loginUser->loadData($request->getBody()); // for earlier created users
            $loginUser->loadData($tempBody);
            $result = $loginUser->findOne();
            if ($result) {
                App::$APP->session->set('user', $result[0]['id']);
                return $response->redirect('/utrance-railway/home');
            }

            return 'invalid username or password';
        }
        return $this->render('login');

    }

    public function logout($request, $response)
    {
        App::$APP->user = null;
        App::$APP->session->remove('user');
        return $response->redirect('/utrance-railway/home');
    }

    public function register($request, $response)
    {

        $registerModel = new UserModel();
        if ($request->isPost()) {
            $registerModel->loadData($request->getBody());
            $registrationState = $registerModel->register();
            if ($registrationState === 'success') {
                return $this->login($request, $response);
            } else {
                $registerSetValue = $registerModel->registerSetValue($registrationState); //Ashika

            }
            return $this->render('register', $registerSetValue); //Ashika
            //  return $this->render('register', $registrationState);

        }
        return $this->render('register');

    }

    public function getMyProfile($request)
    {
        if ($request->isPost()) {

            //from
            return 'success';
        }

        $role = App::$APP->activeUser()['role'];

        if (!$this->isLoggedIn()) {
            return 'You are not logged in!';
        }

        if ($role === 'admin') {
            $admin = new AdminController();
            return $admin->adminSettings($request);
        }
        if ($role === 'User') {
            $regUser = new RegisterUserController();
            return $regUser->registeredUserSettings($request);
        }
        return 'hacker';

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
