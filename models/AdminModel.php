<?php

// Admin's specific functionalities

include_once "../classes/core/Model.php";
include_once "HandlerFactory.php";

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
    public $addUserImage = "Chris-user-profile.jpg";

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

    public function addUser() {
        $this->runValidators();
        if (empty($this->errorArray)) {

            $this->runSanitization();

            $createUser = new HandlerFactory();
            return $createUser->createOne('users', $this->populateValues());
        }

        return $this->errorArray;
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

    private function runValidators() {
        // validation
    }

    private function runSanitization() {
        // sanitization
    }





}