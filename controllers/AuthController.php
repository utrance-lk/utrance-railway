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

        return $this->render('login');

    }

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

            //    $registerModel->loadData($request->getBody());
            //    $pathArray1=$registerModel->getUsers();

            //    App::$APP->session->setFlash('success', 'Thanks for registering');
            //     exit;
            //  return  $this->render('validation',$pathArray1);
            if ($registerModel->valid()) {
                if ($registerModel->register()) {
                    //   App::$APP->response->redirect('/');
                    // header('Location : /');
                    return "Success";
                }

            } else {
                return $this->render('validation', $pathArray1);

            }

        }

    }

    /*public function validate($request){
    $registerValidate=new UserModel();
    if($request->is_Post()){
    $registerValidate->loadData($request->getBody());
    $pathArray=$registerModel->getUsers();
    var_dump($pathArray);
    }*/

    public function registerPage()
    {
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
