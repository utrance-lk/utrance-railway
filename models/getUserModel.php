<?php
include_once "../classes/core/Model.php";

class getUserModel extends Model{
    public $firstname;
    public $lastname;
    public $email;
    public $password;
    public $passwordConfirm;
    public $from2;
    public $to2;

}

public function createOne()
{
    $query = App::$APP->db->pdo->prepare("INSERT INTO users (first_name, last_name) VALUES (:fn, :ln)");

    $query->bindValue(":fn", $this->from2);
    $query->bindValue(":ln", $this->to2);

    return $query->execute();
}
?>