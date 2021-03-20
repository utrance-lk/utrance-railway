<?php

include_once "../classes/core/Controller.php";
include_once "../models/UserModel.php";
include_once "../models/AdminModel.php";
include_once "AdminController.php";
include_once "RegisterUserController.php";
include_once "../utils/Email.php";
include_once "../middlewares/AuthMiddleware.php";

class AuthController extends Controller
{

    private $authMiddleware;

    public function __construct() {
        $this->authMiddleware = new AuthMiddleware();
    }

    public function login($request, $response)
    {

        // if the user logged in redirect to home page
        if(isset(App::$APP->activeUser()['id'])) {
            return $this->render('home');
        }

        if ($request->isPost()) {
            $loginUser = new UserModel();
            $loginUser->loadData($request->getBody());
            $result = $loginUser->findUser('email_id');
            if($result) {
                if(!$result[0]['user_active_status']) {
                    return 'Your account has been deactivated!';
                }
                $verifyPassword = password_verify($loginUser->user_password, $result[0]['user_password']);
                if ($verifyPassword) {
                    App::$APP->session->set('user', $result[0]['id']);
                    return $response->redirect('/utrance-railway/home');
                }
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

    //public function register($request)

    public function register($request, $response)
    {

        // if the user logged in redirect to home page
        if(isset(App::$APP->activeUser()['id'])) {
            return $this->render('home');
        }

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

    public function forgotPassword($request, $response)
    {

        if ($request->isPost()) {

            // 1) get user based on POSTed email
            $userForgotPassword = new UserModel();
            $userForgotPassword->loadData($request->getBody());
            $user = $userForgotPassword->findUser('email_id');

            if (!$user) {
                return 'There is no user with that email address.';
                // return $response->setStatusCode('404');
            }

            // 2) Generate the random reset token
            $resetToken = $userForgotPassword->createPasswordResetToken();

            // 3) Send it to user's email
            $resetURL = $_SERVER['HTTP_HOST'] . "/utrance-railway/resetPassword?token=" . $resetToken;

            $message = "Forgot you password? Change it here: " . $resetURL . "\nIf you didn't forget your password, please ignore this email!";

            App::$APP->email->sendRestPasswordEmail([
                'email' => $user[0]['email_id'],
                'subject' => 'Your password reset token (valid for 10 minutes)',
                'message' => $message,
                'resetURL' => $resetURL
            ]);

            return '';
        }

        return $this->render('forgotPassword');

    }

    public function resetPassword($request, $response)
    {
        $resetPasswordUser = new UserModel();

        if ($request->isGet()) {

            // 1) get user based on the token
            $resetToken = $request->getQueryParams()['token']; // url error

            $hashedToken = hash('sha256', $resetToken);
            $tempBody = $request->getBody();
            $tempBody['password_reset_token'] = $hashedToken;
            $resetPasswordUser->loadData($tempBody);
            $user = $resetPasswordUser->findUser('password_reset_token');
            if (!$user) {
                return 'invalid token';
            }
            $dateInDB = new DateTime($user[0]['password_reset_expires']);
            $currentDate = new DateTime();
            $interval = $dateInDB->diff($currentDate);
            if((int)$interval->format('%i') > 10 && (int)$interval->format('%s') > 0) {
                return 'your token has expired'; // 400 bad request
            }

            // 2) If token has not expired and there is a user, set the new password
            // var_dump($tempBody);
            return $this->render('resetPassword', [
                'user' => $user[0],
            ]);
        }

        // 3) Update changedPasswordAt property for the current user

        // 4) Log the user in
        $email = $request->getQueryParams()['email_id'];
        $tempBody = $request->getBody();
        $tempBody['email_id'] = $email;
        $resetPasswordUser->loadData($tempBody);
        $passwordChangeState = $resetPasswordUser->forgotUpdatePassword();
        if($passwordChangeState === 'success') {
            return $response->redirect('/utrance-railway/login');
        } else {
            // $registerSetValue = $resetPasswordUser->registerSetValue($passwordChangeState); 
            // var_dump($registerSetValue);
            // return $this->render('resetPassword', $registerSetValue);
            // validation part is to be done
            return 'fail';
        }
    }

    public function updatePassword($request,$response) {
        if($this->authMiddleware->isLoggedIn()) {

            $updatePasswordUserModel = new UserModel();
            
            if($request->isPost()){
                $tempBody=$request->getBody();
                $email=App::$APP->activeUser()['email_id'];
                $tempBody["email_id"]=$email;
                $user_role=App::$APP->activeUser()['role'];
                $tempBody['user_role']=$user_role;
                $updatePasswordUserModel->loadData($tempBody);
                $updatePasswordState = $updatePasswordUserModel->updatePassword();
                
                if ($updatePasswordState === 'success') {
                    return $response->redirect('/utrance-railway/logout');
                }else{
                    $updatePasswordSetValue=$updatePasswordUserModel->registerSetValue($updatePasswordState);
                    // if($user_role === "admin"){
                        //     return $this->render('admin',$updatePasswordSetValue);
                        // }
                        
                        // if($user_role === "user"){
                            //     return $this->render('registeredUser',$updatePasswordSetValue); 
                            // }
                            
                            // if($user_role === "detailsProvider"){
                                //     return $this->render('detailsProvider',$updatePasswordSetValue);
                                // }     
                    return $this->render('settings', $updatePasswordSetValue);   
                                
                }
            }

            return $this->render('settings');
        }
      
        // updates the password
    }

}
