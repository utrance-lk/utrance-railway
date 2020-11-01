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
    public $user_role="User";
    public $user_confirmPassword;
    public $resultArray;
    public $resultArray1;
    
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
   public function valid(){
     if($this->first_name == NULL || $this->last_name == NULL || $this ->street_line1 == NULL || $this->street_line2 == NULL || $this->city == NULL || $this->contact_num == NULL || $this->user_password ==NULL || $this->email_id == NULL){
          return 0;
     }else{
       return 1;
     }
   }



   public function getManageUsers(){
    $query = APP::$APP->db->pdo->prepare("SELECT id,email_id,user_role,first_name FROM users ");
    $query->execute();
  //  $count=0;
    $this->resultArray= $query->fetchAll(PDO::FETCH_ASSOC);
    /*foreach($query1 as $row){
      $this->resultArray1[$count]['first_name']=$row['first_name'];
      $this->resultArray1[$count]['id']=$row['id'];
      $this->resultArray1[$count]['email_id']=$row['email_id'];
      $this->resultArray1[$count]['user_role']=$row['user_role'];
      $count++;
    }*/
    // echo $count;
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
