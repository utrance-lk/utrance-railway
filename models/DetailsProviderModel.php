<?php

include_once "../classes/core/Model.php";

class DetailsProviderModel extends Model

{

public $first_name;
public $last_name;
public $street_line1;
public $street_line2;
public $city;
public $contact_num;
public $user_password;
public $email_id;
public $user_role = "user";
public $user_confirm_password;
public $searchUserByNameOrId;
public $addUserImage="Chris-user-profile.jpg";
public $details_type;
public $detail;


public $resultArray;
public $detailsArray;
public $defaultPassword;
public $id;
public $user_active_status;
private $errorArray = [];
private $registerSetValueArray = [];



        

public function contactAdmin()

{ //Daranya

        $query = App::$APP->db->pdo->prepare("INSERT INTO give_details (first_name,email_id,details_type,detail) VALUES (:fn,:eid,:dt,:de)");
        $query->bindValue(":fn", $this->first_name);
        $query->bindValue(":eid", $this->email_id);
        $query->bindValue(":dt", $this->details_type);
        $query->bindValue(":de", $this->detail);
        $query->execute();
            
}
    

}
