<?php
include_once "../models/UserModel.php";
include_once "../models/AdminModel.php";
include_once "../classes/core/Model.php";


class Sanitization{


    public function runSanitization($array){//Ashika
        $array['first_name'] = $this->sanitizeFormUsername($array['first_name']);
        $array['city'] = $this->sanitizeFormUsername($array['city']);
        $array['last_name'] = $this->sanitizeFormUsername($array['last_name']);
        $array['email_id'] = $this->sanitizeFormEmail($array['email_id']);
        $array['user_password'] = $this->sanitizeFormPassword($array['user_password']);
        $array['user_password']=$this->passwordHashing($array['user_password']);
        return $array;

    }


    private function sanitizeFormUsername($inputText){//Asindu
        $inputText = strip_tags($inputText); //remove html tags
        $inputText = ucfirst($inputText);
        return str_replace(" ", "", $inputText); // remove white spaces
    }

    private function sanitizeFormPassword($inputText){
        return strip_tags($inputText); //remove html tags
    }

    private function sanitizeFormEmail($inputText){//Asindu
        $inputText = strip_tags($inputText); //remove html tags
        return str_replace(" ", "", $inputText); // remove white spaces
    }

    private function passwordHashing($value)
    {
        $array['user_password'] = password_hash($value, PASSWORD_BCRYPT);
        return $array['user_password'];
    }





}
