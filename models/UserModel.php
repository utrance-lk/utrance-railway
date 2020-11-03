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
    public $resultArray1;
    public $id;
    public $detailsArray;

     
    
  public function register(){
         
    if($this->first_name == NULL || $this->last_name == NULL ||  $this->street_line1 == NULL || $this->contact_num  == NULL  || $this->user_password  == NULL || $this->email_id  == NULL){
         return false;
    }else{
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
  public function getUsers(){
      
       $this->resultArray['first_name']=$this->first_name;
       $this->resultArray['last_name']=$this->last_name;
       $this->resultArray['street_line1']=$this->street_line1;
       $this->resultArray['street_line2']=$this->street_line2;
       $this->resultArray['contact_num']=$this->contact_num;
       $this->resultArray['city']=$this->city;
       $this->resultArray['user_password']=$this->user_password;
       $this->resultArray['email_id']=$this->email_id;
       $this->resultArray['user_confirmPassword']=$this->user_confirmPassword;
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
    public function getUserDetails(){
      $query = APP::$APP->db->pdo->prepare("SELECT first_name,last_name,email_id,street_line1,street_line2,city,contact_num,user_password FROM users WHERE id=10 ");
      $query->execute();

      $this->detailsArray["users"] = $query->fetchAll(PDO::FETCH_ASSOC);

        //var_dump($this->detailsArray);
        return $this->detailsArray;
    }

    public function getManageUsers()
    {
        $query = APP::$APP->db->pdo->prepare("SELECT id,last_name,user_role,first_name,street_line1,street_line2,city,contact_num,email_id FROM users ");
        $query->execute();

        $this->resultArray["users"] = $query->fetchAll(PDO::FETCH_ASSOC);

        //var_dump($this->resultArray);
        return $this->resultArray;
    }

    /*public function rules():array{
    return[
    'first_name' => [self::RULE_REQUIRED],
    'last_name' =>[self::RULE_REQUIRED],
    'street_line1' =>[self::RULE_REQUIRED],
    'street_line2'=>[self::RULE_REQUIRED],
    'city' => [self::RULE_REQUIRED],
    'contact_num' =>[self::RULE_REQUIRED],
    'user_password' =>[self::RULE_REQUIRED],
    'user_confirmPassword'=>[self::RULE_REQUIRED,[self::RULE_MATCH,'match'=>'user_password']],
    'email_id' =>[self::RULE_REQUIRED,self::RULE_EMAIL],
    'user_role' =>[self::RULE_REQUIRED],

    ];
    }*/
//[self::RULE_MIN,'min=>8'],[self::RULE_MAX,'max'<=24]

}
