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
    public $user_role="user";
    public $user_image;
    public $user_confirmPassword;
    
  public function register(){
      
    echo $first_name;
        
    /*$query = App::$APP->db->pdo->prepare("INSERT INTO users (first_name, last_name,street_line1,street_line2,city,contact_num,user_password,email_id,user_role,user_image) VALUES (:uid1,:fn, :ln,:st1,:st2,:city,:cn,:up,:eid,:us,:ui)");
    echo " displaydwef";
    
   
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
    return $query->execute();*/
  }


  public function rules():array{
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
        'user_image'=>[self::RULE_REQUIRED],
    ];
}
//[self::RULE_MIN,'min=>8'],[self::RULE_MAX,'max'<=24]

   


        
    
  



}
