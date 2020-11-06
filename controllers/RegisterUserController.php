<?php

include_once "../classes/core/Controller.php";

class RegisterUserController extends Controller
{


    public function registeredUser($request){
         
        if ($request->isPost()) {
            return $this->render('registeredUser');
        }

       
        return $this->render('registeredUser');
    }


}