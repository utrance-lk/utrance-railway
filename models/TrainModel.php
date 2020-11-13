<?php

include_once "../classes/core/Model.php";




class TrainModel extends Model
{

    
    // public $user_password;
    // public $email_id;
    // public $user_role="user";
    // public $user_image;
    // public $user_confirmPassword;
    public $from2;
    public $to2;
  
    public $id;
    public $train_name;
    public $train_type;
    public $train_id;
    public $route_id;
    public $train_travel_days;
    public $train_active_status;
    public $train_freights_allowed;
    public $train_fc_seats;
    public $train_sc_seats;
    public $train_observation_seats;
    public $train_sleeping_berths;
    public $train_total_weight;
    public $searchTrain;
    private $errorArray = [];
    private $registerSetValueArray = [];

    


    public function createOne()
    {
        $query = App::$APP->db->pdo->prepare("INSERT INTO users (first_name, last_name) VALUES (:fn, :ln)");

        $query->bindValue(":fn", $this->from2);
        $query->bindValue(":ln", $this->to2);

        return $query->execute();
    }
    // public function rules():array{
    //     return[
    //         'first_name' => [self::RULE_REQUIRED],
    //         'last_name' =>[self::RULE_REQUIRED],
    //         'street_line1' =>[self::RULE_REQUIRED],
    //         'street_line2'=>[self::RULE_REQUIRED],
    //         'city' => [self::RULE_REQUIRED],
    //         'contact_num' =>[self::RULE_REQUIRED],
    //         'user_password' =>[self::RULE_REQUIRED],
    //          'user_confirmPassword'=>[self::RULE_REQUIRED,[self::RULE_MATCH,'match'=>'user_password']],
    //         'email_id' =>[self::RULE_REQUIRED,self::RULE_EMAIL],
    //         'user_role' =>[self::RULE_REQUIRED],
    //         'user_image'=>[self::RULE_REQUIRED],
    //     ];
    // }
    
 


  
    //[self::RULE_MIN,'min=>8'],[self::RULE_MAX,'max'<=24]

    public function getTrains()
    {

        $query = APP::$APP->db->pdo->prepare("SELECT train_id, train_name, train_type, train_active_status FROM trains");
       

        $query->execute();
        
        $this->resultArray['trains'] = $query->fetchAll(PDO::FETCH_ASSOC);
       
        // var_dump($this->resultArray[0]['train_name']);  
        return $this->resultArray;     

        // if ($fromSearchId && $toSearchId) {

            

        // } else {
            // echo 'station not found!';
            // return 'station not found!!';
        // }

    }


    public function getManagTrains()
    {
        $query = APP::$APP->db->pdo->prepare("SELECT * FROM trains WHERE train_id = :train_id ");
        $query->bindValue(":train_id", $this->id);
        $query->execute();

        $this->resultArray["trains"] = $query->fetchAll(PDO::FETCH_ASSOC);
        // var_dump( $this->resultArray["trains"]);
       
        return $this->resultArray;
    }

    public function updateTrainDetails()
    {
        echo $this->train_active_status;
        $query = App::$APP->db->pdo->prepare("UPDATE trains SET train_name =:train_name, route_id=:route_id, train_type=:train_type, train_active_status=:train_active_status,train_travel_days=:train_travel_days,train_freights_allowed=:train_freights_allowed,train_fc_seats=:train_fc_seats,train_sc_seats=:train_sc_seats,train_observation_seats=:train_observation_seats,train_sleeping_berths=:train_sleeping_berths,train_total_weight=:train_total_weight WHERE train_id=:train_id");

        $query->bindValue(":train_id", $this->id);
        $query->bindValue(":train_name", $this->train_name);
        $query->bindValue(":route_id", $this->route_id);
        $query->bindValue(":train_type", $this->train_type);
        // $int = (int)$this->train_active_status;
        $query->bindValue(":train_active_status",$this->train_active_status);

        
        $query->bindValue(":train_travel_days", implode(" ",$this->train_travel_days));
             
        $query->bindValue(":train_freights_allowed", $this->train_freights_allowed);
        $query->bindValue(":train_fc_seats", $this->train_fc_seats);
        $query->bindValue(":train_sc_seats", $this->train_sc_seats);
        $query->bindValue(":train_observation_seats", $this->train_observation_seats);
        $query->bindValue(":train_sleeping_berths", $this->train_sleeping_berths);
        $query->bindValue(":train_total_weight", $this->train_total_weight);

        $query->execute();
    }

    public function deleteTrains(){
        $query = APP::$APP->db->pdo->prepare("DELETE FROM trains WHERE train_id = :train_id ");
        $query->bindValue(":train_id", $this->id);
        // $query->bindValue(":train_active_status",$this->train_active_status);
        $query->execute();
    }


    public function addNewTrainDetails()
    {
        
        $this->runValidators();

        if (empty($this->errorArray)) {
            $this->runSanitization();

            $query = App::$APP->db->pdo->prepare("INSERT INTO trains (train_name, route_id, train_type, train_active_status, train_travel_days,
         train_freights_allowed, train_fc_seats, train_sc_seats, train_observation_seats, train_sleeping_berths, train_total_weight) VALUES (:train_name, :route_id, :train_type, :train_active_status, :train_travel_days, :train_freights_allowed,
         :train_fc_seats, :train_sc_seats, :train_observation_seats, :train_sleeping_berths, :train_total_weight)");
        //  $query->bindValue(":train_id", $this->id);
          $query->bindValue(":train_name", $this->train_name);
          $query->bindValue(":route_id", $this->route_id);
          $query->bindValue(":train_type", $this->train_type);
        // // // $int = (int)$this->train_active_status;
          $query->bindValue(":train_active_status",$this->train_active_status);


           $trinTravalDays=implode(' ',$this->train_travel_days);
          $query->bindValue(":train_travel_days", $trinTravalDays);
             
          $query->bindValue(":train_freights_allowed", $this->train_freights_allowed);
          $query->bindValue(":train_fc_seats", $this->train_fc_seats);
          $query->bindValue(":train_sc_seats", $this->train_sc_seats);
          $query->bindValue(":train_observation_seats", $this->train_observation_seats);
          $query->bindValue(":train_sleeping_berths", $this->train_sleeping_berths);
          $query->bindValue(":train_total_weight", $this->train_total_weight);
           
           
           $query->execute();
          
           return 'success';
        
        }
        // var_dump($this->errorArray);
        return $this->errorArray;
      
      
         
        
    }

    public function registerSetValue($registerSetValueArray)
    { //Ashika
        if (empty($registerSetValueArray['TrainNameError'])) {
            $registerSetValueArray['train_name'] = $this->train_name;
        }
        if (empty($registerSetValueArray['RoutIdError'])) {
            $registerSetValueArray['route_id'] = $this->route_id;
        }
        if (empty($registerSetValueArray['TravalDaysError'])) {
            $registerSetValueArray['train_travel_days'] = $this->train_travel_days;

        }

        
        return $registerSetValueArray;

    }


    public function searchTrainDetails()
    {
        $this->train_name = $this->searchTrain;
    // $query = APP::$APP->db->pdo->prepare("SELECT * FROM trains WHERE train_name = :trainName");
    $query = APP::$APP->db->pdo->prepare("SELECT * FROM trains WHERE train_name LIKE '%{$this->train_name}%'");
    $query->bindValue(":trainName", $this->train_name);
    //    echo (:trainName);


        $query->execute();
        
        $this->resultArray["trains"] = $query->fetchAll(PDO::FETCH_ASSOC);
        
        // var_dump($this->resultArray[0]['train_name']);  
        return $this->resultArray; 
        
        
       

    }

    private function runValidators()
    {
        $this->validateTrainName($this->train_name); 
        $this->validateRouteId($this->route_id); 
        $this->validateTravelDays(implode($this->train_travel_days)); 
       
    }

    private function validateTrainName($tn) 

    {
        if (strlen($tn) < 2 || strlen($tn) > 50) {
            $this->errorArray['TrainNameError'] = 'train name not valid';
        }    

        if (is_numeric($tn)) {
            $this->errorArray['TrainNameError'] = 'first name only letters required';
        }

        if (empty($tn)) {
            $this->errorArray['TrainNameError'] = 'enter valid train name';
            echo "hegf";
            // var_dump($this->errorArray);
        }

    }

    private function validateRouteId($tn) 

    {
        
        if ($tn == 0) {
            $this->errorArray['RoutIdError'] = 'Please enter valid route';
        }

    }

    private function validateTravelDays($tn) 

    {

        if (empty($tn)) {
            $this->errorArray['TravalDaysError'] = 'enter travel days';
           
        }
        var_dump($this->errorArray);

    }

    private function runSanitization()
    {
        $this->first_name = $this->sanitizeFormtrainame($this->train_name);
  
    }

    private function sanitizeFormtrainame($inputText) //Asindu

    {
        $inputText = strip_tags($inputText); //remove html tags
        return ucfirst($inputText); // capitalize first letter
    }


    
  
}
  



