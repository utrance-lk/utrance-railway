<?php

include_once "../classes/core/Model.php";

class UserModel extends Model
{

    public $first_name;
    public $last_name;
   public $users_id;
    public $street_line1;
    public $street_line2;
    public $city;
    public $contact_num;
    public $user_password;
    public $email_id;
    
    public $user_role;
    public $user_image;
    

    public function createOne()
    {

        echo " display";
        $user_role="user";
        $query = App::$APP->db->pdo->prepare("INSERT INTO users (users_id,first_name, last_name,street_line1,street_line2,city,contact_num,user_password,email_id,user_role,user_image) VALUES (:uid1,:fn, :ln,:st1,:st2,:city,:cn,:up,:eid,:us,:ui)");
        echo " displaydwef";
        
        $query->bindValue(":uid1", $this->users_id);
        $query->bindValue(":fn", $this->first_name);
        $query->bindValue(":ln", $this->last_name);
        $query->bindValue(":st1", $this->street_line1);
        $query->bindValue(":st2", $this->street_line2);
        $query->bindValue(":city", $this->city);
        $query->bindValue(":cn", $this->contact_num);
        $query->bindValue(":up", $this->user_password);
        $query->bindValue(":eid", $this->email_id);
        $query->bindValue(":us", $this->user_role);
        $query->bindValue(":ui", $this->user_image);
        echo " display12343";
        return $query->execute();
    }



}
