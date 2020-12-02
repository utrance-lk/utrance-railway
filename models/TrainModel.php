<?php

include_once "../classes/core/Model.php";
include_once "HandlerFactory.php";

class TrainModel extends Model
{

    
    
    public $from;
    public $to;

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
    

    public function getTrains()
    {

        $query = APP::$APP->db->pdo->prepare("SELECT train_id, train_name, train_type, train_active_status FROM trains");

        $query->execute();

        $this->resultArray['trains'] = $query->fetchAll(PDO::FETCH_ASSOC);

        
        return $this->resultArray;

        

    }

    public function getManageTrains()
    {
        $manageTrain = New HandlerFactory();
        $valuesArray =['train_id' =>$this->id];
        // $query = APP::$APP->db->pdo->prepare("SELECT * FROM trains WHERE train_id = :train_id ");
        // $query->bindValue(":train_id", $this->id);
        // $query->execute();

        $this->resultArray["trains"] = $manageTrain->getAll('trains', 'train_id', $this->id);
        // $this->resultArray["trains"] = $query->fetchAll(PDO::FETCH_ASSOC);
        // var_dump( $this->resultArray["trains"]);

        return $this->resultArray;
    }

    public function updateTrainDetails()
    {
         $this->runValidators1();
         if (empty($this->errorArray)) {
           $this->runSanitization();

           $updateTrain = New HandlerFactory();
           $valuesArray = ['train_name' => $this->train_name, 'route_id' => $this->route_id, 'train_type' => $this->train_type, 'train_travel_days' => implode(" ",$this->train_travel_days),
            'train_freights_allowed' => $this->train_freights_allowed, 'train_fc_seats' => $this->train_fc_seats, 'train_sc_seats' => $this->train_sc_seats,
            'train_observation_seats' => $this->train_observation_seats, 'train_sleeping_berths' => $this->train_sleeping_berths, 'train_total_weight' => $this->train_total_weight, 'train_active_status' => $this->train_active_status];

       $updateTrain->updateOne('trains', 'train_id', $this->id, $valuesArray);
        // $query = App::$APP->db->pdo->prepare("UPDATE trains SET train_name =:train_name, route_id=:route_id, train_type=:train_type, train_active_status=:train_active_status,train_travel_days=:train_travel_days,train_freights_allowed=:train_freights_allowed,train_fc_seats=:train_fc_seats,train_sc_seats=:train_sc_seats,train_observation_seats=:train_observation_seats,train_sleeping_berths=:train_sleeping_berths,train_total_weight=:train_total_weight WHERE train_id=:train_id");

        // $query->bindValue(":train_id", $this->id);
        // $query->bindValue(":train_name", $this->train_name);
        // $query->bindValue(":route_id", $this->route_id);
        // $query->bindValue(":train_type", $this->train_type);
        // // $int = (int)$this->train_active_status;
        // $query->bindValue(":train_active_status", $this->train_active_status);

        
        // $query->bindValue(":train_travel_days", implode(" ",$this->train_travel_days));
             
        // $query->bindValue(":train_freights_allowed", $this->train_freights_allowed);
        // $query->bindValue(":train_fc_seats", $this->train_fc_seats);
        // $query->bindValue(":train_sc_seats", $this->train_sc_seats);
        // $query->bindValue(":train_observation_seats", $this->train_observation_seats);
        // $query->bindValue(":train_sleeping_berths", $this->train_sleeping_berths);
        // $query->bindValue(":train_total_weight", $this->train_total_weight);

        // $query->execute();
        //  return 'success';
        }
        $this->resultArray["newtrains"] = $this->errorArray;
         return $this->resultArray;
        

        
    }

    public function deleteTrains(){
        $query = APP::$APP->db->pdo->prepare("DELETE FROM trains WHERE train_id = :train_id ");
        $query->bindValue(":train_id", $this->id);
        $query->execute();
        $this->setRouteStatus();
    }

    public function setRouteStatus(){
        $query = APP::$APP->db->pdo->prepare("UPDATE routes SET route_status = 0 WHERE route_id=(SELECT routes.route_id FROM trains RIGHT JOIN routes ON trains.route_id = routes.route_id WHERE trains.train_id=:train_id)");
        $query->bindValue(":train_id", $this->id);
        $query->execute();
    }


    public function addNewTrainDetails()
    {
        
        $this->runValidators();

        if (empty($this->errorArray)) {
            $this->runSanitization();
            $addTrain = New HandlerFactory();
            $valuesArray = ['train_name'=>$this->train_name, 'route_id'=>$this->route_id, 'train_type'=>$this->train_type,'train_active_status'=>$this->train_active_status,'train_travel_days'=>implode(' ',$this->train_travel_days),
            'train_freights_allowed'=>$this->train_freights_allowed,'train_fc_seats'=>$this->train_fc_seats,'train_sc_seats'=>$this->train_sc_seats,'train_observation_seats'=>$this->train_observation_seats,'train_sleeping_berths'=>$this->train_sleeping_berths,
            'train_total_weight'=>$this->train_total_weight];
            
            $addTrain->createOne('trains', $valuesArray);
            $this->setRoute();

        //     $query = App::$APP->db->pdo->prepare("INSERT INTO trains (train_name, route_id, train_type, train_active_status, train_travel_days,
        //  train_freights_allowed, train_fc_seats, train_sc_seats, train_observation_seats, train_sleeping_berths, train_total_weight) VALUES (:train_name, :route_id, :train_type, :train_active_status, :train_travel_days, :train_freights_allowed,
        //  :train_fc_seats, :train_sc_seats, :train_observation_seats, :train_sleeping_berths, :train_total_weight)");
        // //  $query->bindValue(":train_id", $this->id);
       
        // $query->bindValue(":train_name", $this->train_name);
        // $query->bindValue(":route_id", $this->route_id);
        // $query->bindValue(":train_type", $this->train_type);
        // // // // $int = (int)$this->train_active_status;
        //   $query->bindValue(":train_active_status",$this->train_active_status);


        //    $trinTravalDays=implode(' ',$this->train_travel_days);
        //   $query->bindValue(":train_travel_days", $trinTravalDays);
             
        //   $query->bindValue(":train_freights_allowed", $this->train_freights_allowed);
        //   $query->bindValue(":train_fc_seats", $this->train_fc_seats);
        //   $query->bindValue(":train_sc_seats", $this->train_sc_seats);
        //   $query->bindValue(":train_observation_seats", $this->train_observation_seats);
        //   $query->bindValue(":train_sleeping_berths", $this->train_sleeping_berths);
        //   $query->bindValue(":train_total_weight", $this->train_total_weight);
           
           
        //    $query->execute();
        //    $this->setRoute();
          
        //    return 'success';
        
        }
        // var_dump($this->errorArray);
        return $this->errorArray;    
        
    }

    public function setRoute(){
        $query = App::$APP->db->pdo->prepare("UPDATE routes SET route_status = 1 wHERE route_id=:route_id");
        $query->bindValue(":route_id", $this->route_id);
        $query->execute();
    }

    public function registerSetValue($registerSetValueArray)
    { 
        if (empty($registerSetValueArray['TrainNameError'])) {
            $registerSetValueArray['train_name'] = $this->train_name;
        }
        if (empty($registerSetValueArray['RoutIdError'])) {
            $registerSetValueArray['route_id'] = $this->route_id;
           
        }
        if (empty($registerSetValueArray['TravalDaysError'])) {
            $registerSetValueArray['train_travel_days'] = $this->train_travel_days;
            //  var_dump($registerSetValueArray['train_travel_days']);
        }
        if (empty($registerSetValueArray['TrainTypeError'])) {
            $registerSetValueArray['train_type'] = $this->train_type;
        }
        if (empty($registerSetValueArray['TrainFcError'])) {
            $registerSetValueArray['train_fc_seats'] = $this->train_fc_seats;
        }
        if (empty($registerSetValueArray['TrainScError'])) {
            $registerSetValueArray['train_sc_seats'] = $this->train_sc_seats;
        }
        if (empty($registerSetValueArray['TrainSleepingBError'])) {
            $registerSetValueArray['train_sleeping_berths'] = $this->train_sleeping_berths;
        }
        if (empty($registerSetValueArray['TrainweightError'])) {
            $registerSetValueArray['train_total_weight'] = $this->train_total_weight;
        }
        if (empty($registerSetValueArray['TrainActiveError'])) {
            $registerSetValueArray['train_active_status'] = $this->train_active_status;
        }
        if (empty($registerSetValueArray['TrainFreightError'])) {
            $registerSetValueArray['train_freights_allowed'] = $this->train_freights_allowed;
        }
        if (empty($registerSetValueArray['TrainobservationError'])) {
            $registerSetValueArray['train_observation_seats'] = $this->train_observation_seats;
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
        $this->validateTrainName($this->train_name, $this->route_id); 
         $this->validateRouteId($this->route_id); 
        $this->validateTravelDays(implode($this->train_travel_days)); 
        $this->validateTrainFc($this->train_fc_seats); 
        $this->validateTrainSc($this->train_sc_seats); 
        $this->validateTrainSleepingB($this->train_sleeping_berths); 
        $this->validateTrainweight($this->train_total_weight); 
       
       
    }

    private function runValidators1()
    {
        $this->validateTrainName1($this->train_name); 
        
        $this->validateTravelDays($this->train_travel_days); 
       
    }

    private function validateTrainFc($tn)
    {
        // if (is_numeric($tn)) {
        //     $this->errorArray['TrainFcError'] = 'Num Wrong ';
        // } 
        // if (ctype_digit($tn)) {
        //     $this->errorArray['TrainFcError'] = 'Num Wrong length';
        // }
        

    }
    private function validateTrainSc($tn)
    {
        // if (is_numeric($tn)) {
        //     $this->errorArray['TrainFcError'] = 'Num Wrong length';
        // } 
        // if (ctype_digit($tn)) {
        //     $this->errorArray['TrainFcError'] = 'Num Wrong length';
        // }

    }
    private function validateTrainSleepingB($tn)
    {
        // if (is_numeric($tn)) {
        //     $this->errorArray['TrainFcError'] = 'Num Wrong length';
        // } 
        // if (ctype_digit($tn)) {
        //     $this->errorArray['TrainFcError'] = 'Num Wrong length';
        // }

    }
    private function validateTrainweight($tn)
    {

    }
    private function validateRouteId($tn)
    {

    }


    private function validateTrainName($tn, $rn) 

    {
        if (strlen($tn) < 2 || strlen($tn) > 50) {
            $this->errorArray['TrainNameError'] = 'train name not valid';
        }    

        if (is_numeric($tn)) {
            $this->errorArray['TrainNameError'] = 'first name only letters required';
        }

        if (empty($tn)) {
            $this->errorArray['TrainNameError'] = 'enter valid train name';
            
            // var_dump($this->errorArray);
        }
        $this->my($tn, $rn);
       
        // $trains="";

        

    }

    private function validateTrainName1($tn) 

    {
        if (strlen($tn) < 2 || strlen($tn) > 50) {
            $this->errorArray['TrainNameError'] = 'train name not valid';
        }    

        if (is_numeric($tn)) {
            $this->errorArray['TrainNameError'] = 'first name only letters required';
        }

        if (empty($tn)) {
            $this->errorArray['TrainNameError'] = 'enter valid train name';
            
            // var_dump($this->errorArray);
        }

    }

    public function my($inputText , $rid){
        $results = $this->sameTrains($this->train_name , $this->route_id);
        // var_dump($results);
        if($results==='success'){
           
                    $this->errorArray['RoutIdError'] = 'Route_id is not valid';
                    // echo $rid;
          
                    
        }
    }




    public function sameTrains($inputText , $rid){
        $query = APP::$APP->db->pdo->prepare("SELECT * FROM trains WHERE (train_name = :train_name AND route_id=:route_id) OR route_id=:route_id ");
        $query->bindValue(":train_name",$inputText);
        $query->bindValue(":route_id",$rid);
        $query->execute();

        $this->resultArray["trains"] = $query->fetchAll(PDO::FETCH_ASSOC);
        // var_dump($this->resultArray["trains"]);
        // var_dump( $this->resultArray["trains"]);
       if(!empty($this->resultArray["trains"] )){
        return 'success';
       }
    }

    



    private function validateTravelDays($tn) 

    {

        if (empty($tn)) {
            $this->errorArray['TravalDaysError'] = 'enter travel days';
           
        }
       

    }

    private function runSanitization()
    {
        $this->train_name = $this->sanitizeFormtrainame($this->train_name);
        
  
    }

    private function sanitizeFormtrainame($inputText) //Asindu

    {
        $inputText = strip_tags($inputText); //remove html tags
        return ucfirst($inputText); // capitalize first letter
    }

    public function getAvailableRoute(){
        $query = APP::$APP->db->pdo->prepare("SELECT route_id FROM routes WHERE route_status=0");
        $query->execute();
        $this->resultArray['routes'] = $query->fetchAll(PDO::FETCH_ASSOC);

        return $this->resultArray;
        

    }

    // public function getPrice(){


    //     $query = APP::$APP->db->pdo->prepare("SELECT available_lines FROM ticket_price WHERE station_name=:stratStation OR station_name=:endStation");
    //     $query->bindValue(":stratStation",$this->from);
    //     $query->bindValue(":endStation",$this->to);
    //     $query->execute();
    //     $this->resultArray= $query->fetchAll(PDO::FETCH_ASSOC);
        
    //     var_dump($this->resultArray[0]['available_lines']);
    //     var_dump($this->resultArray[1]['available_lines']);
        
    

    //     $result = strstr($this->resultArray[1]['available_lines'], $this->resultArray[0]['available_lines']);
        
   
    //     $result1 = strstr($this->resultArray[0]['available_lines'], $this->resultArray[1]['available_lines']);
        
    
    //     if($this->resultArray[0]['available_lines']==$this->resultArray[1]['available_lines']){
    //         $TotalPrice=$this->totalPtice();
           
    //     }else if(strlen($this->resultArray[0]['available_lines'])==3 || strlen($this->resultArray[1]['available_lines'])==3){

    //     }
    //     else{
    //        $TotalPrice= $this->gettotalPtice($this->resultArray[0]['available_lines'],$this->resultArray[1]['available_lines'],$this->from,$this->to);
       

    //        echo $TotalPrice;
    //     }
        

    // }
    // public function totalPtice(){
    //     $query = APP::$APP->db->pdo->prepare("SELECT ( SELECT price from ticket_price WHERE station_name=:stratStation) - (SELECT price FROM ticket_price WHERE station_name=:endStation ) AS total_price");
    //     $query->bindValue(":stratStation",$this->from);
    //     $query->bindValue(":endStation",$this->to);
    //     $query->execute();
    //     $this->result= $query->fetchAll(PDO::FETCH_ASSOC);
    //     var_dump($this->result);

    // }
    // public function totalPtice3($lines){
    //     $price=$this->getpriz($lines);
      
    //     $myArray = explode(',', $price); 
        
    //     $StationendPrice=$myArray[0]; 
    
    //     $query = APP::$APP->db->pdo->prepare("SELECT ( SELECT price from ticket_price WHERE station_name=:stratStation) - :StationendPrice AS total_price");
    //     $query->bindValue(":stratStation",$this->from);
    //     $query->bindValue(":StationendPrice",$StationendPrice);
    //     $query->execute();
    //     $this->result= $query->fetchAll(PDO::FETCH_ASSOC);
    //     var_dump( $this->result);
     

    // }
    // public function totalPtice4($price){
    //     $myArray = explode(',', $price); 
    //     $StationendPrice=$myArray[1]; 
    //     $query = APP::$APP->db->pdo->prepare("SELECT ( SELECT price from ticket_price WHERE station_name=:endStation) - :StationendPrice AS total_price");
    //     $query->bindValue(":endStation",$this->to);
    //     $query->bindValue(":StationendPrice",$StationendPrice);
    //     $query->execute();
    //     $this->result= $query->fetchAll(PDO::FETCH_ASSOC);
    //     var_dump($this->result);

    // }
    // public function getpriz($lines){
       
    //     $query = APP::$APP->db->pdo->prepare("SELECT price FROM ticket_price WHERE available_lines=:lines");
    //     $query->bindValue(":lines",$lines);
    //     $query->execute();
    //     $this->result= $query->fetchAll(PDO::FETCH_ASSOC);
    //     return $this->result[0]['price'];
    //     // var_dump($this->result[0]['price']);
        
     
      


    // }
    // public function gettotalPtice($ss,$es,$fromsation,$tosation){
    //     $ss1=(int)$ss;
    //     $es1=(int)$es;
      
    //     $arr = array($ss,$es);
    //     $comma = implode(",",$arr);
        
    //     var_dump($comma);
        
        
    //     $query = APP::$APP->db->pdo->prepare("SELECT station_name FROM ticket_price WHERE available_lines LIKE '%{$comma}%'");
    //     $query->bindValue(":comma", $comma);
    //     $query->execute();
    //     $this->result1= $query->fetchAll(PDO::FETCH_ASSOC);
    //     var_dump($this->result1[0]['station_name']);
    //     $price=$this->newgettotalPtice($this->result1[0]['station_name']);
        
    //   $myArray = explode(',', $price);   
    //   var_dump($myArray); 
      
     
    //     $startStationendPrice=$myArray[0];
    //     $endStationendPrice=$myArray[1];
     
       
     
    //   $price1=$this->totalPtice1($startStationendPrice,$fromsation);
    //   $price2=$this->totalPtice2($endStationendPrice,$tosation);
    //  $newprice1 = (int)$price1;
    //  $newprice2 = (int)$price2;
     

    // $total_price=abs($newprice1)+abs($newprice2);
    // return $total_price;
   
        
    // }
    // public function newgettotalPtice($ss){
    //     $query = APP::$APP->db->pdo->prepare("SELECT price FROM ticket_price WHERE station_name=:name");
    //     $query->bindValue(":name", $ss);
    //     $query->execute();
    //     $this->result2= $query->fetchAll(PDO::FETCH_ASSOC);
    //     return $this->result2[0]['price'];
        
    // }
    // public function totalPtice1($startStationendPrice,$fromsation){
    //     $query = APP::$APP->db->pdo->prepare("SELECT ( SELECT price from ticket_price WHERE station_name=:fromsation) - :startStationendPrice  AS total_price");
    //     $query->bindValue(":fromsation",$fromsation);
    //     $query->bindValue(":startStationendPrice",$startStationendPrice);
    //     $query->execute();
    //     $this->result= $query->fetchAll(PDO::FETCH_ASSOC);
    //     return $this->result[0]['total_price'];
        

    // }
    // public function totalPtice2($endStationendPrice,$tosation){
    //     $query = APP::$APP->db->pdo->prepare("SELECT ( SELECT price from ticket_price WHERE station_name=:tosation) - :endStationendPrice AS total_price");
    //     $query->bindValue(":tosation",$tosation);
    //     $query->bindValue(":endStationendPrice",$endStationendPrice);
    //     $query->execute();
    //     $this->result= $query->fetchAll(PDO::FETCH_ASSOC);
    //     return $this->result[0]['total_price'];
    

    // }

    public function getPrice(){
        if($this->from =='Colombo Fort')
        {
            $query = APP::$APP->db->pdo->prepare("SELECT available_lines FROM ticket_price WHERE station_name=:endStation");
            $query->bindValue(":endStation",$this->to);
            $query->execute();
            $this->result= $query->fetchAll(PDO::FETCH_ASSOC);
            

        $query1 = APP::$APP->db->pdo->prepare("SELECT station_name FROM ticket_price WHERE station_name=:endStation AND available_lines=:lines");
        $query1->bindValue(":endStation",$this->from);
        $query1->bindValue(":lines",$this->result[0]['available_lines']);
        $query1->execute();
        $this->result1= $query1->fetchAll(PDO::FETCH_ASSOC);
        }else{
        $query = APP::$APP->db->pdo->prepare("SELECT available_lines FROM ticket_price WHERE station_name=:stratStation");
        $query->bindValue(":stratStation",$this->from);
        $query->execute();
        $this->result= $query->fetchAll(PDO::FETCH_ASSOC);
     

        $query1 = APP::$APP->db->pdo->prepare("SELECT station_name FROM ticket_price WHERE station_name=:endStation AND available_lines=:lines");
        $query1->bindValue(":endStation",$this->to);
        $query1->bindValue(":lines",$this->result[0]['available_lines']);
        $query1->execute();
        $this->result1= $query1->fetchAll(PDO::FETCH_ASSOC);

        

        }
        
      
        if(empty($this->result1)){
            $query = APP::$APP->db->pdo->prepare("SELECT available_lines FROM ticket_price WHERE station_name=:endStation");
            $query->bindValue(":endStation",$this->to);
            $query->execute();
            $this->newresult= $query->fetchAll(PDO::FETCH_ASSOC);

            $TotalPrice= $this->gettotalPrice($this->result[0]['available_lines'],$this->newresult[0]['available_lines']);
           
        }else{
            $TotalPrice=$this->totalPrice($this->result[0]['available_lines']);
            var_dump($TotalPrice);
        }



    }

    public function totalPrice($lines){
            $query = APP::$APP->db->pdo->prepare("SELECT ( SELECT price from ticket_price WHERE station_name=:stratStation AND available_lines=:lines) - (SELECT price FROM ticket_price WHERE station_name=:endStation AND available_lines=:lines) AS total_price");
            $query->bindValue(":stratStation",$this->from);
            $query->bindValue(":endStation",$this->to);
            $query->bindValue(":lines",$lines);
            $query->execute();
            $this->result= $query->fetchAll(PDO::FETCH_ASSOC);
            return $this->result;
        
        }

        public function gettotalPrice($startline,$endline){
           $arr = array($startline,$endline);
           $comma = implode(",",$arr);
           
           $query = APP::$APP->db->pdo->prepare("SELECT station_name FROM ticket_price WHERE available_lines=:comma LIMIT 1");
           $query->bindValue(":comma",$comma);
         
           $query->execute();
           $this->result= $query->fetchAll(PDO::FETCH_ASSOC);
        
          $price=$this->newgettotalPrice($this->result[0]['station_name'],$startline);
        
          $price1=$this->newgettotalPrice1($price[0]['price']);
        


          $newprice=$this->newgettotalPrice($this->result[0]['station_name'],$endline);
        
          $newprice1=$this->newgettotalPrice2($newprice[0]['price']);
       

          $newprice2 = (int)$price1;
     $newprice3 = (int)$newprice1;
     

    $total_price=abs($newprice2)+abs($newprice3);
    echo $total_price;
        
          




        }
        public function newgettotalPrice($ss,$startline){
            $query = APP::$APP->db->pdo->prepare("SELECT price FROM ticket_price WHERE station_name=:sname AND available_lines=:startline");
           $query->bindValue(":sname",$ss);
           $query->bindValue(":startline",$startline);
         
           $query->execute();
           $this->result1= $query->fetchAll(PDO::FETCH_ASSOC);
           return $this->result1;
           

        }
        public function newgettotalPrice1($price){
            $query = APP::$APP->db->pdo->prepare("SELECT ( SELECT price from ticket_price WHERE station_name=:fromsation) - :price  AS total_price");
           $query->bindValue(":price",$price);
           $query->bindValue(":fromsation",$this->from);
         
           $query->execute();
           $this->result1= $query->fetchAll(PDO::FETCH_ASSOC);
           return $this->result1[0]['total_price'];

        }
        public function newgettotalPrice2($price){
            $query = APP::$APP->db->pdo->prepare("SELECT ( SELECT price from ticket_price WHERE station_name=:fromsation) - :price  AS total_price");
           $query->bindValue(":price",$price);
           $query->bindValue(":fromsation",$this->to);
         
           $query->execute();
           $this->result1= $query->fetchAll(PDO::FETCH_ASSOC);
           return $this->result1[0]['total_price'];

        }

    
}




    
  

  



