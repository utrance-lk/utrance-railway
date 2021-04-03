<?php

include_once "../classes/Model.php";

class DetailsProviderModel extends Model

{

public $first_name;
public $last_name;
public $street_line1;
public $street_line2;

public $contact_num;
public $user_password;
//public $email_id;
public $user_role = "user";
public $user_confirm_password;
public $searchUserByNameOrId;
public $addUserImage="Chris-user-profile.jpg";
public $details_type;
public $detail;
public $to_email;



public $resultArray;
public $detailsArray;
public $defaultPassword;
public $id;
public $read_message;
public $user_active_status;
private $errorArray = [];
public $messageDate;
private $registerSetValueArray = [];



        

public function contactAdmin()

{ //Daranya
  
  $this->messageDate=date("Y-m-d");
  $this->read_message=0;
  
        $query = App::$APP->db->pdo->prepare("INSERT INTO give_details (first_name,email_id,details_type,detail,readMessage,receivedTime) VALUES (:fn,:eid,:dt,:de,:rm,:md)");
        $query->bindValue(":fn", $this->first_name);
        $query->bindValue(":eid", $this->to_email);
        $query->bindValue(":dt", $this->details_type);
        $query->bindValue(":de", $this->detail);
        $query->bindValue(":rm", $this->read_message);
        $query->bindValue(":md",$this->messageDate);
        $query->execute();
            
}


public function getAdminEmails(){
        $query = App::$APP->db->pdo->prepare("SELECT email_id FROM users WHERE user_role='admin' AND user_active_status=1");
        $query->execute();
        $this->getAllAdminEmails["admin_emails"]= $query->fetchAll(PDO::FETCH_ASSOC);
        return $this->getAllAdminEmails;

}
    

}
