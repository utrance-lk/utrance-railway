<?php

include_once "../classes/core/Model.php";
include_once "HandlerFactory.php";
include_once "../middlewares/FormValidation.php";
include_once "../middlewares/Sanitization.php";


class UserModel extends Model
{
    public $first_name;
    public $last_name;
    public $street_line1;
    public $street_line2;
    public $city;
    public $contact_num;
    public $email_id;
    public $user_role = "user";
    public $user_password;
    public $user_active_status = 1;
    public $user_confirm_password;
    public $searchUserByNameOrId;
    public $photo = "Chris-user-profile.jpg";

    public $resultArray;
    public $detailsArray;
    public $defaultPassword;
    public $id;
    private $errorArray = [];
    private $registerSetValueArray = [];
    public $array=[];

    public $PasswordResetToken;


    private function populateValues() {
        return ['first_name' => $this->first_name, 'last_name' => $this->last_name, 'street_line1' => $this->street_line1, 'street_line2' => $this->street_line2, 'city' => $this->city, 'contact_num' => $this->contact_num, 'email_id' => $this->email_id, 'user_role' => $this->user_role, 'user_password' => $this->user_password, 'user_active_status' => $this->user_active_status, ];
    }

    public static function getUser($id) {
        $query = App::$APP->db->pdo->prepare("SELECT * FROM users WHERE id=:id");
        $query->bindValue(":id", $id);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }


    public function findUser($email) {
        $findUser = new HandlerFactory();
        return $findUser->getOne('users', $email, $this->email_id);
    }

    public function register(){ 
       
        $array=['first_name'=> $this->first_name,'last_name'=>$this->last_name,'street_line1' => $this->street_line1,'street_line2' => $this->street_line2,'city'=>$this->city,'contact_num' => $this->contact_num,'email_id' => $this->email_id,'user_password' => $this->user_password,'user_confirm_password' => $this->user_confirm_password];
        $registerValidation=new FormValidation();
        $validationState=$registerValidation->runValidators($array);
        if($validationState ==="success"){
         $arraySanitize=['first_name'=> $this->first_name,'last_name'=>$this->last_name,'street_line1' => $this->street_line1,'street_line2' => $this->street_line2,'city'=>$this->city,'contact_num' => $this->contact_num,'email_id' => $this->email_id,'user_password' => $this->user_password];
         $sanitizeData=new Sanitization();
         $sanitizeArray=$sanitizeData->runSanitization($arraySanitize);
         $createUser = new HandlerFactory();
         return $createUser->createOne('users', $sanitizeArray);
         }else{
             //var_dump($validationState);
             return $validationState;
         }
       

        
    }

    public function updateMyProfile() { 
        $this->runValidators();
        var_dump($this->first_name);
        if (empty($this->errorArray)) {

            $this->runSanitization();

        $updateUser = New HandlerFactory();

        $valuesArray = ['first_name' => $this->first_name, 'last_name' => $this->last_name, 'street_line1' => $this->street_line1, 'street_line2' => $this->street_line2, 'city' => $this->city, 'contact_num' => $this->contact_num, 'email_id' => $this->email_id,];
       
        return $updateUser->updateOne('users', 'id', $this->id, $valuesArray);
        }
        return $this->errorArray;
    }


    public function registerSetValue($registerSetValueArray)
    { //Ashika
        if (empty($registerSetValueArray['firstNameError'])) {
            $registerSetValueArray['first_name'] = $this->first_name;
        }
        if (empty($registerSetValueArray['lastNameError'])) {
            $registerSetValueArray['last_name'] = $this->last_name;
        }
        if (empty($registerSetValueArray['streetLine1Error'])) {
            $registerSetValueArray['street_line1'] = $this->street_line1;
        }

        if (empty($registerSetValueArray['streetLine2Error'])) {
            $registerSetValueArray['street_line2'] = $this->street_line2;
        }

        if (empty($registerSetValueArray['contactNumError'])) {
            $registerSetValueArray['contact_num'] = $this->contact_num;
        }
        if (empty($registerSetValueArray['email_id_error'])) {
            $registerSetValueArray['email_id'] = $this->email_id;
        }
        if (empty($registerSetValueArray['cityError'])) {
            $registerSetValueArray['city'] = $this->city;
        }
        return $registerSetValueArray;

    }

    public function getUpdateUserDetails() ////Ashika 

    {
        $this->resultArray['first_name'] = $this->first_name;
        $this->resultArray['last_name'] = $this->last_name;
        $this->resultArray['street_line1'] = $this->street_line1;
        $this->resultArray['street_line2'] = $this->street_line2;
        $this->resultArray['contact_num'] = $this->contact_num;
        $this->resultArray['city'] = $this->city;
        $this->resultArray['email_id'] = $this->email_id;
        return $this->resultArray;
    }

    // asindu - sanitization

    private function runSanitization(){
        $this->first_name = $this->sanitizeFormUsername($this->first_name);
        $this->last_name = $this->sanitizeFormUsername($this->last_name);
        $this->email_id = $this->sanitizeFormEmail($this->email_id);
        $this->user_password = $this->sanitizeFormPassword($this->user_password);
        $this->passwordHashing();
    }

    // private function sanitizeFormString($inputText) //Asindu

    // {
    //     $inputText = strip_tags($inputText); //remove html tags
    //     $inputText = str_replace(" ", "", $inputText); // remove white spaces
    //     $inputText = strtolower($inputText); // lowering the text
    //     return ucfirst($inputText); // capitalize first letter
    // }

   /* private function sanitizeFormUsername($inputText){//Asindu
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

    private function passwordHashing()
    {
        $this->user_password = password_hash($this->user_password, PASSWORD_BCRYPT);
    }

    // asindu - validations

    /*private function runValidators(){
      var_dump("hello");
        $this->validateFirstName($this->first_name); //Asindu
        $this->validateLastName($this->last_name); //Ashika
        $this->validateStreetLine1($this->street_line1); //Ashika
        $this->validateStreetLine2($this->street_line2); //Ashika
        $this->validateCity($this->city); //Ashika
        $this->validateContactNumber($this->contact_num); //Ashika
        $this->validateEmailId($this->email_id); //Ashika
        $this->validatePassword($this->user_password, $this->user_confirm_password); //Ashika
        // $this->validateConfirmPassword($this->$user_confirmPassword);//Ashika

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
    }



    private function validateStreetLine2($str2){ //Ashika
        if (strlen($str2) < 5 || strlen($str2) > 30) {
            $this->errorArray['streetLine2Error'] = 'Street Line 2  wrong length';
        }
    }

    private function validateCity($city)
    { //Ashika
        if (strlen($city) < 2 || strlen($city) > 25) {
            $this->errorArray['cityError'] = 'City  wrong length';
        }

        if (!(ctype_alpha($city))) {
            $this->errorArray['cityError'] = 'City  only letters  required';
        }
    }
    private function validateContactNumber($cnum)
    { //Ashika
        $num = "";
        $num = substr($cnum, 0, 3);
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

    }

    private function validateEmailId($email_id)
    { //Ashika

        if (!filter_var($email_id, FILTER_VALIDATE_EMAIL)) {
            $this->errorArray['email_id_error'] = "Invalid email format";
        }

        $query = APP::$APP->db->pdo->prepare("SELECT * FROM users WHERE email_id=:email_id");
        $query->bindValue(":email_id", $email_id);
        $query->execute();
        $email_status = $query->fetchAll(PDO::FETCH_ASSOC);
        if ($email_status == true) {
            $this->errorArray['email_id_error'] = "This email is already exist";
        }

    }

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

    }*/

    public function createPasswordResetToken()
    {
        $resetToken = bin2hex(random_bytes(32));
        $resetTokenEncrypted = hash('sha256', $resetToken);
        $query = App::$APP->db->pdo->prepare("UPDATE users SET PasswordResetToken=:prt WHERE email_id=:email");
        $query->bindValue(":prt", $resetTokenEncrypted);
        $query->bindValue(":email", $this->email_id);
        $query->execute();
        $date = new DateTime();
        $date->add(new DateInterval('PT10M'));
        $date = $date->format('Y-m-d H:i:s');
        $query = App::$APP->db->pdo->prepare("UPDATE users SET PasswordResetExpires=:pre WHERE email_id=:email");
        $query->bindValue(":pre", $date);
        $query->bindValue(":email", $this->email_id);
        $query->execute();
        return $resetToken;
    }

    public function updatePassword()
    {
        $this->validatePassword($this->user_password, $this->user_confirm_password);
        if (empty($this->errorArray)) {
            $this->sanitizeFormPassword($this->user_password);
            $this->passwordHashing();
            $query = App::$APP->db->pdo->prepare("UPDATE users SET user_password=:up WHERE email_id=:email");
            $query->bindValue(":up", $this->user_password);
            $query->bindValue(":email", $this->email_id);
            $query->execute();
            return 'success';
        }
        return $this->errorArray;
    }

}
