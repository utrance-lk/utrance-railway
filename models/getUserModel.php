<?php

include_once "../classes/core/Model.php";




class getUserModel extends Model
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
    public $from2;
    public $to2;


    public function createOne()
    {
        $query = App::$APP->db->pdo->prepare("INSERT INTO users (first_name, last_name) VALUES (:fn, :ln)");

        $query->bindValue(":fn", $this->from2);
        $query->bindValue(":ln", $this->to2);

        return $query->execute();
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
