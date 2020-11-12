<?php

include_once "../classes/core/Model.php";

class UserModel extends Model
{
    public $first_name;
    public $last_name;
    public $street_line1;
    public $street_line2;
    public $city;
    public $contact_num;
    public $user_password;
    public $email_id;
    public $user_role = "User";
    public $user_confirmPassword;
    public $searchUserByNameOrId;
    public $addUserImage="Chris-user-profile.jpg";

    public $resultArray;
    public $detailsArray;
    public $defaultPassword;
    public $id;
    public $user_active_status;
    private $errorArray = [];
    private $registerSetValueArray=[];

    public function findOne() ///Asindu

    {
        $query = App::$APP->db->pdo->prepare("SELECT * FROM users WHERE email_id=:email AND user_password=:password LIMIT 1");
        $query->bindValue(":email", $this->email_id);
        $query->bindValue(":password", $this->user_password);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getUser($id) ///Asindu

    {
        $query = App::$APP->db->pdo->prepare("SELECT * FROM users WHERE id=:id");
        $query->bindValue(":id", $id);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function register()
    { ////Ashika
        $this->runValidators();
        if (empty($this->errorArray)) {

            $this->runSanitization();

            $this->user_active_status = 1;

            $query = App::$APP->db->pdo->prepare("INSERT INTO users (first_name, last_name,street_line1,street_line2,city,contact_num,user_password,email_id,user_role,user_active_status) VALUES (:fn, :ln,:st1,:st2,:city,:cn,:up,:eid,:us,:ua)");
            $query->bindValue(":fn", $this->first_name);
            $query->bindValue(":ln", $this->last_name);
            $query->bindValue(":st1", $this->street_line1);
            $query->bindValue(":st2", $this->street_line2);
            $query->bindValue(":city", $this->city);
            $query->bindValue(":cn", $this->contact_num);
            $query->bindValue(":up", $this->user_password);
            $query->bindValue(":eid", $this->email_id);
            $query->bindValue(":us", $this->user_role);
            $query->bindValue(":ua", $this->user_active_status);
            $query->execute();
            return 'success';
        }

        return $this->errorArray;

    }


    public function registerSetValue($registerSetValueArray){//Ashika
        if(empty($registerSetValueArray['firstNameError'])){
            $registerSetValueArray['first_name']=$this->first_name;
        }
        if(empty($registerSetValueArray['lastNameError'])){
            $registerSetValueArray['last_name']=$this->last_name; 
        }
        if(empty($registerSetValueArray['streetLine1Error'])){
            $registerSetValueArray['street_line1']=$this->street_line1;
        }

        if(empty($registerSetValueArray['streetLine2Error'])){
            $registerSetValueArray['street_line2']=$this->street_line2;
        }

        if(empty($registerSetValueArray['contactNumError'])){
            $registerSetValueArray['contact_num']=$this->contact_num;
        }
        if(empty($registerSetValueArray['emailIdError'])){
            $registerSetValueArray['email_id']=$this->email_id;
        }
        if(empty($registerSetValueArray['cityError'])){
            $registerSetValueArray['city']=$this->city;
        }
        return $registerSetValueArray;

        

    }

    public function addUser(){ //Daranya

    

        $this->user_active_status = 1;
        $query = App::$APP->db->pdo->prepare("INSERT INTO users (first_name, last_name,street_line1,street_line2,city,contact_num,user_password,email_id,user_role,user_active_status) VALUES (:fn, :ln,:st1,:st2,:city,:cn,:up,:eid,:us,:ua)");
        $query->bindValue(":fn", $this->first_name);
        $query->bindValue(":ln", $this->last_name);
        $query->bindValue(":st1", $this->street_line1);
        $query->bindValue(":st2", $this->street_line2);
        $query->bindValue(":city", $this->city);
        $query->bindValue(":cn", $this->contact_num);
        $query->bindValue(":up", $this->user_password);
        $query->bindValue(":eid", $this->email_id);
        $query->bindValue(":us", $this->user_role);
        $query->bindValue(":ua", $this->user_active_status);
        $query->execute();

    }
     

    public function updateUserSettingsDetails(){//Daranya
       // var_dump("Hello");
        $query = App::$APP->db->pdo->prepare("UPDATE users SET first_name =:first_name, last_name=:last_name, email_id=:email_id, city=:city,street_line1=:street_line1,street_line2=:street_line2,contact_num=:contact_num WHERE id=:id");
        $query->bindValue(":id", $this->id);
        $query->bindValue(":first_name", $this->first_name);
        $query->bindValue(":last_name", $this->last_name);
        $query->bindValue(":street_line1", $this->street_line1);
        $query->bindValue(":street_line2", $this->street_line2);
        $query->bindValue(":city", $this->city);
        $query->bindValue(":contact_num", $this->contact_num);
        $query->bindValue(":email_id", $this->email_id);
        $query->execute();
    
        //var_dump($query->execute());
    }
    /*public function getUserDetails1()
    { //Daranya
        $query = APP::$APP->db->pdo->prepare("SELECT first_name,last_name,email_id,street_line1,street_line2,city,contact_num,user_password FROM users WHERE id=10 ");
        $query->execute();
        $this->detailsArray["users"] = $query->fetchAll(PDO::FETCH_ASSOC);
        return $this->detailsArray;
    }*/

    public function getManageUsers() //Ashika

    {

        $query = APP::$APP->db->pdo->prepare("SELECT id,last_name,user_role,first_name,user_active_status FROM users  ORDER BY user_active_status DESC");
        $query->execute();
        $this->resultArray["users"] = $query->fetchAll(PDO::FETCH_ASSOC);
        return $this->resultArray;
    }

    public function getSearchUserResult(){//Ashika
        $this->id=$this->searchUserByNameOrId;
        $this->first_name=$this->searchUserByNameOrId;
        $query = APP::$APP->db->pdo->prepare("SELECT id,last_name,user_role,first_name,user_active_status FROM users  WHERE id=:id OR first_name=:fn ");
        $query->bindValue(":id", $this->id);
        $query->bindValue(":fn", $this->first_name);
        $query->execute();
        $this->resultArray["users"] = $query->fetchAll(PDO::FETCH_ASSOC);
        return $this->resultArray;

    }

    public function getUserDetails() ///Ashika

    {
        $query = APP::$APP->db->pdo->prepare("SELECT last_name,first_name,street_line1,street_line2,email_id,city,contact_num FROM users WHERE id=:id ");
        $query->bindValue(":id", $this->id);

        $query->execute();
        $this->resultArray["users"] = $query->fetchAll(PDO::FETCH_ASSOC);
        return $this->resultArray;
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


    public function changeUserStatusDetails(){//Ashika
        if($this->user_active_status==0){
            $this->user_active_status=1;
        }else{
            $this->user_active_status=0;  
        }
        //var_dump($this->user_active_status);
        $query=App::$APP->db->pdo->prepare("UPDATE users SET user_active_status=:uas WHERE id=:id");
        $query->bindValue(":id",$this->id);
        $query->bindValue(":uas",$this->user_active_status);
        $query->execute();
       
        
       // $resultArray=$this->getManageUsers();
       // return $resultArray;
    }

    public function updateUserDetails() ////Ashika

    {
        $query = App::$APP->db->pdo->prepare("UPDATE users SET first_name =:first_name, last_name=:last_name, email_id=:email_id, city=:city,street_line1=:street_line1,street_line2=:street_line2,contact_num=:contact_num WHERE id=:id");
        $query->bindValue(":id", $this->id);
        $query->bindValue(":first_name", $this->first_name);
        $query->bindValue(":last_name", $this->last_name);
        $query->bindValue(":street_line1", $this->street_line1);
        $query->bindValue(":street_line2", $this->street_line2);
        $query->bindValue(":city", $this->city);
        $query->bindValue(":contact_num", $this->contact_num);
        $query->bindValue(":email_id", $this->email_id);
        $query->execute();
    }

    

    // asindu - sanitization

    private function runSanitization()
    {
        $this->first_name = $this->sanitizeFormUsername($this->first_name);
        $this->last_name=$this->sanitizeFormUsername($this->last_name);
        $this->email_id = $this->sanitizeFormPassword($this->email_id);
        $this->user_password = password_hash($this->sanitizeFormPassword($this->user_password),PASSWORD_DEFAULT);
    }

    private function sanitizeFormString($inputText)//Asindu
    {
        $inputText = strip_tags($inputText); //remove html tags
        $inputText = str_replace(" ", "", $inputText); // remove white spaces
        $inputText = strtolower($inputText); // lowering the text
        return ucfirst($inputText); // capitalize first letter
    }

    private function sanitizeFormUsername($inputText)//Asindu~
    {
        $inputText = strip_tags($inputText); //remove html tags
        $inputText=ucfirst($inputText);
        return str_replace(" ", "", $inputText); // remove white spaces
    }

    private function sanitizeFormPassword($inputText)
    {
        return strip_tags($inputText); //remove html tags
    }

    private function sanitizeFormEmail($inputText)//Asindu
    {
        $inputText = strip_tags($inputText); //remove html tags
        return str_replace(" ", "", $inputText); // remove white spaces
    }

    // asindu - validations

    private function runValidators()
    {
        $this->validateFirstName($this->first_name);//Asindu
        $this->validateLastName($this->last_name);//Ashika
        $this->validateStreetLine1($this->street_line1);//Ashika
        $this->validateStreetLine2($this->street_line2);//Ashika
        $this->validateCity($this->city);//Ashika
        $this->validateContactNumber($this->contact_num);//Ashika
        $this->validateEmailId($this->email_id);//Ashika
        $this->validatePassword($this->user_password);
    }

    private function validateFirstName($fn)//Asindu
    {
        if (strlen($fn) < 2 || strlen($fn) > 25 ) {
            $this->errorArray['firstNameError'] = 'first name wrong length';
        }

        if(is_numeric($fn) ){
            $this->errorArray['firstNameError'] = 'first name only letters required';
        }

        if(!(ctype_alpha($fn))){
            $this->errorArray['firstNameError'] = 'First name only letters 1 required';
        }
        
    }

    private function validateLastName($ln){//Ashika
        if(strlen($ln) <2 || strlen($ln) >25){
            $this->errorArray['lastNameError'] = 'last name wrong length';
        }

        if(is_numeric($ln) ){
            $this->errorArray['lastNameError'] = 'last name only letters required';
        }

        if(!(ctype_alpha($ln))){
            $this->errorArray['lastNameError'] = 'last name only letters 1 required';
        }
    }

    private function validateStreetLine1($str1){//Ashika
        if(strlen($str1) <5 || strlen($str1) >30){
            $this->errorArray['streetLine1Error'] = 'Street Line 1  wrong length';
        }

       

        
    }

    private function validateStreetLine2($str2){//Ashika
        if(strlen($str2) <5 || strlen($str2) >30){
            $this->errorArray['streetLine2Error'] = 'Street Line 2  wrong length';
        }

        

        
    }

    private function validateCity($city){//Ashika
        if(strlen($city) <2 || strlen($city) >25){
            $this->errorArray['cityError'] = 'City  wrong length';
        }

        if(!(ctype_alpha($city))){
            $this->errorArray['cityError'] = 'City  only letters  required';
        }
    }
    private function validateContactNumber($cnum){//Ashika
        $num="";
        $num= substr($cnum,0,3);
        if(strlen($cnum) == 10 && is_numeric($cnum) ){
            if($num !="070" && $num !="071" && $num !="072" && $num !="075" && $num !="076" && $num !="077" && $num !="078" && $num!="063"){
                $this->errorArray['contactNumError']='Contact Num in Invalid Format';
            }

        }else{
            if(strlen($cnum) !=10 && is_numeric($num)){
                $this->errorArray['contactNumError']='Contact Num Wrong length'; 
            }elseif(!(is_numeric($num)) && strlen($cnum) !=10 ){
                $this->errorArray['contactNumError']='Contact Num has only digits'; 
            }
            
        }
        if(!(ctype_digit($cnum))){
            $this->errorArray['contactNumError']="Contact Num has only digits";
        }
   
    }


    private function validateEmailId($email_id){ //Ashika
        if(!filter_var($email_id,FILTER_VALIDATE_EMAIL)){
            $this->errorArray['emailIdError']="Invalid email format";
        }

    }

    private function validatePassword($user_password){
        if(strlen($user_password) <8 ){
            $this->errorArray['passwordError']="Password at least 8 characters";
        }

        /*function countDigits( $user_password ){
        return preg_match_all( "/[0-9]/", $user_password );
 
         } 
         
        if(countDigits($user_password) < 1 ){
            $this->errorArray['passwordError']="Password at least 1 digit";
        }*/
       
        $uppercase = preg_match('@[A-Z]@', $user_password);
        $lowercase = preg_match('@[a-z]@', $user_password);
        $number    = preg_match('@[0-9]@', $user_password);
        $specialChars = preg_match('@[^\w]@', $user_password);

        if(!$uppercase){
            $this->errorArray['passwordError']="Password at least one upper case letter";
        }
        if(!$lowercase){
            $this->errorArray['passwordError']="Password at least one lower case letter";
        }

        if(!$number){
            $this->errorArray['passwordError']="Password at least one digit";
        }

        if(!$specialChars){
            $this->errorArray['passwordError']="Password at least one special charcter";
        }


    }

    // public function getError($error)
    // {
    //     if (in_array($error, $this->errorArray)) {
    //         return $error;
    //     }
    // }

}
