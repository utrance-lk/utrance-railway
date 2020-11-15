<?php
include_once "../models/UserModel.php";
include_once "../models/AdminModel.php";
include_once "../classes/core/Model.php";


class FormValidation{
  public $errorArray=[];

        public function runValidators($array){
        $this->validateFirstName($array['first_name']); //Asindu
        $this->validateLastName($array['last_name']); //Ashika
        $this->validateStreetLine1($array['street_line1']); //Ashika
        $this->validateStreetLine2($array['street_line2']); //Ashika
        $this->validateCity($array['city']); //Ashika
        $this->validateContactNumber($array['contact_num']); //Ashika
        $this->validateEmailId($array['email_id']); //Ashika
        $this->validatePassword($array['user_password'], $array['user_confirm_password']); //Ashika*/
        if(empty($this->errorArray)){
            return "success";
        }else{
            return $this->errorArray;
        }

    }


    public function runUpdateValidators($array){
        
      
        
        
      
       
        
        $this->validateFirstName(trim($array['first_name'])); //Asindu
        $this->validateLastName(trim($array['last_name'])); //Ashika
        $this->validateStreetLine1(trim($array['street_line1'])); //Ashika
        $this->validateStreetLine2(trim($array['street_line2'])); //Ashika
        $this->validateCity(trim($array['city'])); //Ashika
        $this->validateContactNumber(trim($array['contact_num'])); //Ashika
        $this->validateEmailId(trim($array['email_id'])); //Ashika
        if(empty($this->errorArray)){
           return "success";
        }else{
            
            return $this->errorArray;
        }
    }


    private function validateFirstName($fn){//Asindu
       
        if (strlen($fn) < 2 || strlen($fn) > 25) {
            
            $this->errorArray['firstNameError'] = 'first name wrong length';

        }

        if (is_numeric($fn)) {
            
            $this->errorArray['firstNameError'] = 'first name only letters required';
        }

        if (!(ctype_alpha($fn))) {
            
            $this->errorArray['firstNameError'] = 'First name only letters 1  required';
        }

    }



    private function validateLastName($ln){ //Ashika
        if (strlen($ln) < 2 || strlen($ln) > 25) {
           
            $this->errorArray['lastNameError'] = 'last name wrong length';
        }

        if (is_numeric($ln)) {
            
            $this->errorArray['lastNameError'] = 'last name only letters required';
        }

        if (!(ctype_alpha($ln))) {
            
            $this->errorArray['lastNameError'] = 'last name only letters 1 required';
        }
    }

 

    private function validateStreetLine1($str1){ //Ashika
        if (strlen($str1) < 5 || strlen($str1) > 30) {
            
            $this->errorArray['streetLine1Error'] = 'Street Line 1  wrong length';
        }

      /*  if (ctype_digit($str1)) {
            //var_dump("N");
            $this->errorArray['streetLine1Error'] = "Street Line 1 has only letters";
        }

        if (!(ctype_alpha($str1))) {
            //Var_dump($city);
              $this->errorArray['streetLine1Error'] = "Street Line 1 has only letters";
          }*/

    }



    private function validateStreetLine2($str2){ //Ashika
        if (strlen($str2) < 5 || strlen($str2) > 30) {
           
            $this->errorArray['streetLine2Error'] = 'Street Line 2  wrong length';
        }

        /*if (ctype_digit($str2)) {
            //var_dump("N");
            $this->errorArray['streetLine2Error'] = "Street Line 2 has only letters";
        }

        if (!(ctype_alpha($str2))) {
            //Var_dump($city);
              $this->errorArray['streetLine2Error'] = "Street Line 2 has only letters";
          }*/
    }

    private function validateCity($city)
    { //Ashika
        if (strlen($city) < 2 || strlen($city) > 25) {
           
            $this->errorArray['cityError'] = 'City  wrong length';
        }

        if (!(ctype_alpha($city))) {
          Var_dump($city);
            $this->errorArray['cityError'] = 'City  only letters  required';
        }
    }
    private function validateContactNumber($cnum)
    { //Ashika
        $num = "";
        $num = substr($cnum, 0, 3);
        if(strlen($cnum)!=9){
         if (strlen($cnum) == 10 && is_numeric($cnum)) {
            
            if ($num != "070" && $num != "071" && $num != "072" && $num != "075" && $num != "076" && $num != "077" && $num != "078" && $num != "063") {
                $this->errorArray['contactNumError'] = 'Contact Num in Invalid Format';
            }

        } else {
            if (strlen($cnum) != 10 && is_numeric($num)) {
                
                $this->errorArray['contactNumError'] = 'Contact Num Wrong length';
            } elseif (!(is_numeric($num)) && strlen($cnum) != 10) {
                $this->errorArray['contactNumError'] = 'Contact Num has only digits';
            }

        }
        if (!(ctype_digit($cnum))) {
            
            $this->errorArray['contactNumError'] = "Contact Num has only digits";
        }

       }else{
           $num2=substr($cnum,0,2);
           echo $num2;
           if ($num2 != "70" && $num2 != "71" && $num2 != "72" && $num2 != "75" && $num2 != "76" && $num2 != "77" && $num2 != "78" && $num2 != "63") {
            $this->errorArray['contactNumError'] = 'Contact Num234 in Invalid Format';
          } 

       }
}

    private function validateEmailId($email_id)
    { //Ashika

        if (!filter_var($email_id, FILTER_VALIDATE_EMAIL)) {
            $this->errorArray['email_id_error'] = "Invalid email format";
        }
        //SELECT * FROM users GROUP BY email_id HAVING COUNT(email_id) > 1;
        $query = APP::$APP->db->pdo->prepare("SELECT * FROM users WHERE email_id=:email_id HAVING COUNT(email_id) > 1");
        $query->bindValue(":email_id", $email_id);
        $query->execute();
        $email_status = $query->fetchAll(PDO::FETCH_ASSOC);
        if ($email_status == true) {
            $this->errorArray['email_id_error'] = "This email is already exist";
        }

    }

   /* private function validateEmailIdForUpdate($email_id,$id){

        if (!filter_var($email_id, FILTER_VALIDATE_EMAIL)) {
            $this->errorArray['email_id_error'] = "Invalid email format";
        }

        $query = APP::$APP->db->pdo->prepare("SELECT * FROM users WHERE email_id=:email_id NOT IN (id=:id)");
        $query->bindValue(":email_id", $email_id);
        $query->bindValue(":id",$id);
        $query->execute();
        $email_status = $query->fetchAll(PDO::FETCH_ASSOC);
        if ($email_status == true) {
            $this->errorArray['email_id_error'] = "This email is already exist";
        }

    }*/

    private function validatePassword($user_password, $user_confirm_password)
    { //Ashika

        if ($user_password != $user_confirm_password) {
            $this->errorArray['passwordError'] = "Password does not match";
        } else {
            if (strlen($user_password) < 8) {
                $this->errorArray['passwordError'] = "Password at least 8 characters";
            }

            $uppercase = preg_match('@[A-Z]@', $user_password);
            $lowercase = preg_match('@[a-z]@', $user_password);
            $number = preg_match('@[0-9]@', $user_password);
            $specialChars = preg_match('@[^\w]@', $user_password);

            if (!$uppercase) {
                $this->errorArray['passwordError'] = "Password at least one upper case letter";
            }
            if (!$lowercase) {
                $this->errorArray['passwordError'] = "Password at least one lower case letter";
            }

            if (!$number) {
                $this->errorArray['passwordError'] = "Password at least one digit";
            }

            if (!$specialChars) {
                $this->errorArray['passwordError'] = "Password at least one special charcter";
            }
        }

    }
}






?>