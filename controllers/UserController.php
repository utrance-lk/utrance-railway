<?php

include_once "../classes/core/Controller.php";
include_once "../models/UserModel.php";
include_once "../middelwares/AuthMiddleware.php";

class UserController extends Controller
{
    private $authMiddleware;

    public function __construct() {
        $this->authMiddleware = new AuthMiddleware();
    }

    public function getMe($request, $response) {
        if ($request->isGet()) {
            if($this->authMiddleware->restrictTo('admin')) {
                return $this->render('admin');
            }
            if($this->authMiddleware->restrictTo('admin')) {
                return $this->render('registeredUser');
            }
        }
    }

    public function updateMe($request, $response) {
        if ($request->isPost()) {
            $updateUserDetailsModel = new UserModel();

            $tempUpdateUserBody = $request->getBody();

            $tempUpdateUserBody['id'] = App::$APP->activeUser()['id'];

            $updateUserDetailsModel->loadData($tempUpdateUserBody);

            $state = $updateUserDetailsModel->updateMyProfile();
            if ($state === 'success') {
                return $response->redirect('/utrance-railway/settings');
            } else {
                return 'error updating data!!';
            }
        }
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

}
