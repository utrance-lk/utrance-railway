<?php

include_once "../classes/core/Controller.php";
include_once "../models/UserModel.php";

class UserController extends Controller
{
    public function getMe($request, $response)
    {
        if ($request->isGet()) {
            $role = App::$APP->activeUser()['role'];
            if($role === 'admin') return $this->render('admin');
            if($role === 'user') return $this->render('registeredUser');
        }
    }

    public function updateMe($request, $response)
    {
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
