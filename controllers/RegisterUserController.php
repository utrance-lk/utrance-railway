<?php

include_once "../classes/core/Controller.php";

class RegisterUserController extends Controller
{
    public function registeredUserSettings($request)
    {

        $registerUserSettingModel = new UserModel();
        if ($request->isPost()) {
            // form
            return 'success';
        }
        if($request->isGet()) {
        $registerUserSettingModel->loadData($request->getBody());
        $getUserDetailsArray=$registerUserSettingModel->getUserDetailsAdmin();
        //var_dump($getUserDetailsArray);
        return $this->render('registeredUser',$getUserDetailsArray);
        }
    }

}
