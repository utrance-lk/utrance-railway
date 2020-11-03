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
    public $resultArray;
    public $id;

    public function register()
    {

        if ($this->first_name == null || $this->last_name == null || $this->street_line1 == null || $this->contact_num == null || $this->user_password == null || $this->email_id == null) {
            return false;
        } else {
            $query = App::$APP->db->pdo->prepare("INSERT INTO users (first_name, last_name,street_line1,street_line2,city,contact_num,user_password,email_id,user_role) VALUES (:fn, :ln,:st1,:st2,:city,:cn,:up,:eid,:us)");

            $query->bindValue(":fn", $this->first_name);
            $query->bindValue(":ln", $this->last_name);
            $query->bindValue(":st1", $this->street_line1);
            $query->bindValue(":st2", $this->street_line2);
            $query->bindValue(":city", $this->city);
            $query->bindValue(":cn", $this->contact_num);
            $query->bindValue(":up", $this->user_password);
            $query->bindValue(":eid", $this->email_id);
            $query->bindValue(":us", $this->user_role);
            return $query->execute();
        }

    }

    public function getUsers()
    {

        $this->resultArray['first_name'] = $this->first_name;
        $this->resultArray['last_name'] = $this->last_name;
        $this->resultArray['street_line1'] = $this->street_line1;
        $this->resultArray['street_line2'] = $this->street_line2;
        $this->resultArray['contact_num'] = $this->contact_num;
        $this->resultArray['city'] = $this->city;
        $this->resultArray['user_password'] = $this->user_password;
        $this->resultArray['email_id'] = $this->email_id;
        $this->resultArray['user_confirmPassword'] = $this->user_confirmPassword;
        return $this->resultArray;

    }
    public function valid()
    {
        if ($this->first_name == null || $this->last_name == null || $this->street_line1 == null || $this->street_line2 == null || $this->city == null || $this->contact_num == null || $this->user_password == null || $this->email_id == null) {
            return 0;
        } else {
            return 1;
        }
    }

    public function getManageUsers()
    {
        $query = APP::$APP->db->pdo->prepare("SELECT id,last_name,user_role,first_name FROM users ");
        $query->execute();


        $this->resultArray["users"] = $query->fetchAll(PDO::FETCH_ASSOC);


        //var_dump($this->resultArray);
        return $this->resultArray;
    }


    public function updateUserDetails(){
      //var_dump($id);
    //$query = APP::$APP->db->pdo->prepare("SELECT last_name,first_name,street_line1,street_line2,email_id,city,contact_num FROM users WHERE id=:email_id");
     
    //  $query->execute();
    //  $this->resultArray["users"]=$query1->fetchAll(PDO::FETCH_ASSOC);
  // var_dump($resultArray);
    //  return $this->resultArray;



    }
    
}
