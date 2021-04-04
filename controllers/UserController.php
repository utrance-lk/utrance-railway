<?php

include_once "../classes/Controller.php";
include_once "../models/UserModel.php";
include_once "../middlewares/AuthMiddleware.php";

class UserController extends Controller
{
    public function protect()
    {
        $authMiddleware = new AuthMiddleware();

        if (!$authMiddleware->isLoggedIn()) {
            return false;
        }

        return true;

    }

    public function getMe($request, $response)
    {

        if ($this->protect()) {
            if ($request->isGet()) {

                return $this->render('dashboard');
            }
        }

        $response->setStatusCode(403);
        return $response->redirect('/utrance-railway/home');
    }

    public function viewAllTrains($request)
    {
        $getTrainDetailsModel = new UserModel();
        if ($request->isPost()) {
            $getTrainDetailsModel->loadData($request->getBody());
            $viewAllTrainDetailsArray = $getTrainDetailsModel->viewAllTrainsByUsers();

        }

    }

    public function upload($request, $response)
    {

        if ($this->protect()) {

            if ($request->isPost()) {

                $updateUserDetailsModel = new UserModel();
                $tempUpdateUserBody = $request->getBody();
                $tempUpdateUserBody['id'] = App::$APP->activeUser()['id'];
                $tempUpdateUserBody['file'] = $_FILES;
                $updateUserDetailsModel->loadData($tempUpdateUserBody);
                $array = $updateUserDetailsModel->uploadImage(App::$APP->activeUser()['id']);
                if ($array === "Success") {
                    App::$APP->session->set('operation', 'success');
                    return $response->redirect('/utrance-railway/dashboard');
                } else {
                    App::$APP->session->set('operation', 'fail');
                }

            }
            return $this->render('dashboard');
        }

        $response->setStatusCode(403);
        return $response->redirect('/utrance-railway/home');

    }

    public function updateMe($request, $response)
    {

        if ($this->protect()) {

            $updateUserDetailsModel = new UserModel();

            if ($request->isPost()) {

                $tempUpdateUserBody = $request->getBody();

                $tempUpdateUserBody['id'] = App::$APP->activeUser()['id'];
                $tempUpdateUserBody['user_role'] = App::$APP->activeUser()['role'];
                $tempUpdateUserBody['user_profile_image'] = App::$APP->activeUser()['user_image'];

                $updateUserDetailsModel->loadData($tempUpdateUserBody);

                $state = $updateUserDetailsModel->updateMyProfile();

                if ($state === 'success') {

                    App::$APP->session->set('operation', 'success');
                    return $response->redirect('/utrance-railway/dashboard');

                } else {
                    $updateUserDetailsSetValue = $updateUserDetailsModel->registerSetValue($state); //Ashika

                    App::$APP->session->set('operation', 'fail');
                    return $this->render('dashboard', $updateUserDetailsSetValue);
                }
            }
        }

        $response->setStatusCode(403);
        return $response->redirect('/utrance-railway/home');

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

    public function aboutUs()
    {

        return $this->render('aboutUs');

    }

    public function newsFeed()
    {

        return $this->render('newsFeed');
    }

    // public function newsFeed01(){

    //     return $this->render(['newsFeed','newsFeed01']);
    // }

    //return $this->render(['newsFeed', 'newsFeed01']);
    //}

}
