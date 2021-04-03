<?php

include_once "../classes/Controller.php";

class RegisterUserController extends Controller
{
    public function registeredUserSettings($request)
    {

        $registerUserSettingModel = new UserModel();
        if ($request->isPost()) {
            return 'success';
        }
        
        return $this->render('registeredUser');

    }

}
