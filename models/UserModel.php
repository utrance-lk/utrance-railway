<?php

include_once "../classes/core/Model.php";

class UserModel extends Model
{

    public $firstname;
    public $lastname;
    public $email;
    public $password;
    public $passwordConfirm;

    public function createOne()
    {
        $query = App::$APP->db->pdo->prepare("INSERT INTO users (first_name, last_name) VALUES (:fn, :ln)");

        $query->bindValue(":fn", $this->firstname);
        $query->bindValue(":ln", $this->lastname);

        return $query->execute();
    }

}
