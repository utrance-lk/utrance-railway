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
                // var_dump(App::$APP->session->get('user'));
            }

            return 'invalid username or password';
        }

<<<<<<< HEAD
       if($request->isPost())
         
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

    /*echo '<pre>';
    var_dump($registerModel->errors);
    echo '</pre>';
    exit; */
 
       /*return $this->render('register',[
           'model'=>$registerModel
       ]);*/
       
         
    
=======
        return $this->render('login');

    }
>>>>>>> 0104de12a94334e7d4146291840f6e8c26687ac3

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
            if ($registerModel->valid()) {
                $registerModel->registerUser();
                return "Succes";
            } else {
                return "Added Fail";
            }

        }

    }

    public function registerPage()
    {
        return $this->render('register');

    }

    public function getMy($request)
    {
<<<<<<< HEAD
        // logout
    
    }
    public function getMy($request) {
        if($request->isPost()) {
=======
        if ($request->isPost()) {
>>>>>>> 0104de12a94334e7d4146291840f6e8c26687ac3
            //from
            return 'success';
        }
        return $this->render('admin');
<<<<<<< HEAD
 
    }
    
   public function signInPage(){
    return $this->render('signIn');
    }
=======
>>>>>>> 0104de12a94334e7d4146291840f6e8c26687ac3

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
