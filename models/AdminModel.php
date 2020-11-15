<?php

// Admin's specific functionalities

include_once "../classes/core/Model.php";
include_once "HandlerFactory.php";
include_once "../middlewares/FormValidation.php";

class AdminModel extends Model {

    public $id;
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
    private $registerSetValueArray = [];
    public $addUserImage = "Chris-user-profile.jpg";


    //////////////Train//////////////////



    public $train_name;
    public $train_type;
    public $train_id;
    public $route_id;
    public $train_travel_days;
    public $train_active_status;
    public $train_freights_allowed;
    public $train_fc_seats;
    public $train_sc_seats;
    public $train_observation_seats;
    public $train_sleeping_berths;
    public $train_total_weight;




    private $errorArray = [];

    private function populateValues() {
        return ['first_name' => $this->first_name, 'last_name' => $this->last_name, 'street_line1' => $this->street_line1, 'street_line2' => $this->street_line2, 'city' => $this->city, 'contact_num' => $this->contact_num, 'email_id' => $this->email_id, 'user_role' => $this->user_role, 'user_password' => $this->user_password, 'user_active_status' => $this->user_active_status];
    }

    public function getUsers() {
        $query = APP::$APP->db->pdo->prepare("SELECT id,last_name,user_role,first_name,user_active_status FROM users  ORDER BY user_active_status DESC");
        $query->execute();
        $this->resultArray["users"] = $query->fetchAll(PDO::FETCH_ASSOC);
        return $this->resultArray;
    }

    public function getTrains(){
        $query = APP::$APP->db->pdo->prepare("SELECT id,last_name,user_role,first_name,user_active_status FROM users");
        $query->execute();
        $this->resultArray["users"] = $query->fetchAll(PDO::FETCH_ASSOC);
        return $this->resultArray;

    }

    public function addUser() {
        $array=['first_name'=> $this->first_name,'last_name'=>$this->last_name,'street_line1' => $this->street_line1,'street_line2' => $this->street_line2,'city'=> $this->city,'contact_num' => $this->contact_num,'email_id' => $this->email_id,'user_password' =>$this->user_password,'user_confirm_password' => $this->user_confirm_password];
        $addUserValidation=new FormValidation();
        $validationState=$addUserValidation->runValidators($array);
        if ($validationState ==="success") {
            $this->runSanitizationAdmin();
            $this->runPasswordSanitization();
            $createUser = new HandlerFactory();
            return $createUser->createOne('users', $this->populateValues());
        }

        return $validationState;
    }

    public function getUserDetails() ///Ashika

    {
        $query = APP::$APP->db->pdo->prepare("SELECT last_name,first_name,street_line1,street_line2,email_id,city,contact_num FROM users WHERE id=:id ");
        $query->bindValue(":id", $this->id);

        $query->execute();
        $this->resultArray["users"] = $query->fetchAll(PDO::FETCH_ASSOC);
        return $this->resultArray;
    }

    public function getSearchUserResult() // selected user
    { //Ashika
        $this->id = $this->searchUserByNameOrId;
        $this->first_name = $this->searchUserByNameOrId;
        $query = APP::$APP->db->pdo->prepare("SELECT id,last_name,user_role,first_name,user_active_status FROM users  WHERE id=:id OR first_name=:fn ");
        $query->bindValue(":id", $this->id);
        $query->bindValue(":fn", $this->first_name);
        $query->execute();
        $this->resultArray["users"] = $query->fetchAll(PDO::FETCH_ASSOC);
        return $this->resultArray;

    }


    public function getSearchTrainResult() // selected Train
    { //Ashika
        $this->train_id = $this->searchTrainByNameOrId;
        $this->train_name = $this->searchTrainByNameOrId;
        $query = APP::$APP->db->pdo->prepare("SELECT train_id,train_name,train_type FROM train  WHERE train_id=:tid OR train_name=:tn ");
        $query->bindValue(":tid", $this->train_id);
        $query->bindValue(":tn", $this->train_name);
        $query->execute();
        $this->resultArray["users"] = $query->fetchAll(PDO::FETCH_ASSOC);
        return $this->resultArray;

    }



    public function updateUserDetails(){//Ashika
        $array=['id'=>$this->id,'first_name'=> $this->first_name,'last_name'=>$this->last_name,'street_line1' => $this->street_line1,'street_line2' => $this->street_line2,'city'=> $this->city,'contact_num' => $this->contact_num,'email_id' => $this->email_id];
        $updateUserValidation=new FormValidation();
        $validationState=$updateUserValidation->runUpdateValidators($array);

        if ($validationState ==="success") {
        $this->runSanitizationAdmin();
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
        return "success";
        }
        return $validationState;
    }

    public function changeUserStatusDetails() { 
        if ($this->user_active_status == 0) {
            $this->user_active_status = 1;
        } else {
            $this->user_active_status = 0;
        }

        $query = App::$APP->db->pdo->prepare("UPDATE users SET user_active_status=:uas WHERE id=:id");
        $query->bindValue(":id", $this->id);
        $query->bindValue(":uas", $this->user_active_status);
        $query->execute();

        // $resultArray=$this->getManageUsers();
        // return $resultArray;
    }

    



    public function registerSetValue($registerSetValueArray)//Ashika
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



  private function runPasswordSanitization(){
    $this->user_password = $this->sanitizeFormPassword($this->user_password);
    $this->passwordHashing();
  }

   private function runSanitizationAdmin(){//Ashika
        $this->first_name = $this->sanitizeFormUsername($this->first_name);
        $this->last_name = $this->sanitizeFormUsername($this->last_name);
        $this->email_id = $this->sanitizeFormEmail($this->email_id);
        $this->street_line1 = $this->sanitizeFormStreet($this->street_line1);
        $this->street_line2 = $this->sanitizeFormStreet($this->street_line2);
        $this->city=$this->sanitizeFormString($this->city);
        $this->contact_num=$this->sanitizeContactNumber($this->contact_num);
        
    }

     private function sanitizeFormString($inputText) //Asindu

     {
        $inputText = strip_tags($inputText); //remove html tags
        $inputText = str_replace(" ", "", $inputText); // remove white spaces
        $inputText = strtolower($inputText);
        $inputText=trim($inputText); // lowering the text
        return ucfirst($inputText); // capitalize first letter
    }

    private function sanitizeFormStreet($inputText){
        $inputText = strip_tags($inputText);
        $inputText = strtolower($inputText); // lowering the text
        $inputText=trim($inputText); 
        return ucfirst($inputText); // capitalize first letter
  
    }

    private function sanitizeContactNumber($inputText){
        $inputText = strip_tags($inputText);
        $inputText=trim($inputText);
        return $inputText; 
    }

    private function sanitizeFormUsername($inputText){//Asindu
        $inputText = strip_tags($inputText); //remove html tags
        $inputText = ucfirst($inputText);
        $inputText=trim($inputText); 
        return str_replace(" ", "", $inputText); // remove white spaces
    }


    private function sanitizeFormEmail($inputText){//Asindu
        $inputText = strip_tags($inputText); //remove html tags
        $inputText=trim($inputText); 
        return str_replace(" ", "", $inputText); // remove white spaces
    }


    private function sanitizeFormPassword($inputText){
        $inputText=trim($inputText); 
        return strip_tags($inputText); //remove html tags
    }

    private function passwordHashing()
    {
        $this->user_password = password_hash($this->user_password, PASSWORD_BCRYPT);
    }

   







}