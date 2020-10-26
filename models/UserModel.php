<?php

include_once "../classes/core/Model.php";

class UserModel extends Model
{

    public $first_name;
    public $last_name;
    public $email;
    public $street_line1;
    public $street_line2;
    public $city;
    public $contact_num;
    public $password;
    public $email_id;
    public $passwordConfirm;
    public $user_role;
    public $user_image;
    

    public function createOne()
    {
        $query = App::$APP->db->pdo->prepare("INSERT INTO users (first_name, last_name) VALUES (:fn, :ln)");

        $query->bindValue(":fn", $this->from2);
        $query->bindValue(":ln", $this->to2);

        return $query->execute();
    }

    public function saveUser(){

    }



}
