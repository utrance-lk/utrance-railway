<?php

include_once "../classes/core/Controller.php";
include_once "../models/UserModel.php";
include_once "AdminController.php";
include_once "RegisterUserController.php";
include_once "../utils/Email.php";

class AuthController extends Controller
{

    public function login($request, $response)
    {
        if ($request->isPost()) {
            $loginUser = new UserModel();
            $loginUser->loadData($request->getBody());
            $result = $loginUser->findOne('email_id');
            $verifyPassword = password_verify($loginUser->user_password, $result[0]['user_password']);
            if ($verifyPassword) {
                App::$APP->session->set('user', $result[0]['id']);
                return $response->redirect('/utrance-railway/home');
            }

            return 'invalid username or password';
        }
        return $this->render('login');


       if($request->isPost()){
         
        $registerModel->loadData($request->getBody());
        $pathArray1=$registerModel->getUsers();
          //  return  $this->render('validation',$pathArray1);
        if( $registerModel->valid()){
            if($registerModel->register()){
                return "Success";
        }
    }
        else{return  $this->render('validation',$pathArray1);
        } 

    }
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
        if ($role === 'user') {
            $regUser = new RegisterUserController();
            return $regUser->registeredUserSettings($request);
        }
        if ($role === 'detailsProvider') {
            $regUser = new detailsProviderController();
            return $regUser->detailsProviderSettings($request);
        }
        return 'hacker';

    }

    public function forgotPassword($request, $response)
    {

        if ($request->isPost()) {

            // 1) get user based on POSTed email
            $userForgotPassword = new UserModel();
            $userForgotPassword->loadData($request->getBody());
            $user = $userForgotPassword->findOne('email_id');

            if (!$user) {
                return 'There is no user with that email address.';
                // return $response->setStatusCode('404');
            }

            // 2) Generate the random reset token
            $resetToken = $userForgotPassword->createPasswordResetToken();

            // 3) Send it to user's email
            $resetURL = $_SERVER['SERVER_PROTOCOL'] . "://" . $_SERVER['HTTP_HOST'] . "/utrance-railway/resetPassword?token=" . $resetToken;

            $message = "Forgot you password? Change it here: " . $resetURL . "\nIf you didn't forget your password, please ignore this email!";

            App::$APP->email->sendEmail([
                'email' => $user[0]['email_id'],
                'subject' => 'Your password reset token (valid for 10 minutes)',
                'message' => $message,
            ]);

            return '';
        }

        return $this->render('forgotPassword');

    }

    public function resetPassword($request)
    {
        // if ($request->isPost()) {

            // 1) get user based on the token
            $resetPasswordUser = new UserModel();
            $resetToken = $request->getQueryParams()['token'];
            $hashedToken = hash('sha256', $resetToken);
            $tempBody = $request->getBody();
            $tempBody['PasswordResetToken'] = $hashedToken;
            $resetPasswordUser->loadData($tempBody);
            $user = $resetPasswordUser->findOne('PasswordResetToken');
            var_dump($user);
            $dateInDB = new DateTime($user[0]['PasswordResetExpires']);
            $currentDate = new DateTime();
            $interval = $dateInDB->diff($currentDate);
            if((int)$interval->format('%i') > 10 && (int)$interval->format('%s') > 0) {
                return 'your token has expired';
            }
            return '';

            // 2) If token has not expired and there is a user, set the new password

            // 3) Update changedPasswordAt property for the current user

            // 4) Log the user in
        // }
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
