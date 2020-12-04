<?php

include_once "../classes/core/Model.php";
include_once "HandlerFactory.php";

class TrainModel extends Model
{

    
    
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
    public $start;
    public $destination;
    public $availbility_lines;
    public $resultLine=[];
    public $ticketPrice=[];
    public $firstClassPrice=[];
    public $secondClassPrice;
    public $thirdClassPrice;
    public $intLineStart;
    public $intLineEnd;

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

    public function getTicketPrice(){
        $query = APP::$APP->db->pdo->prepare("SELECT availability_lines FROM ticket_price WHERE station_name=:start_place OR station_name=:end_place");
        $query->bindValue(":start_place", $this->start);
        $query->bindValue(":end_place", $this->destination);
        $query->execute();
        $this->resultLine=$query->fetchAll(PDO::FETCH_ASSOC);
        //var_dump($this->resultLine);
       // var_dump($this->resultPrice);
        //var_dump($this->resultPrice[0]);
       // var_dump($this->resultPrice[1]);

        $lineLengthStart=strlen($this->resultLine[0]['availability_lines']);
        $lineLengthEnd=strlen($this->resultLine[1]['availability_lines']);

        //var_dump($lineLengthEnd);
        //var_dump($lineLengthStart);

        
        if($lineLengthStart == 1 && $lineLengthEnd == 1){
            $this->intLineStart=(int) ($this->resultLine[0]['availability_lines']);
            $this->intLineEnd=(int) ($this->resultLine[1]['availability_lines']);
           // var_dump($intlineStart);
            //var_dump($intlineEnd);


        if($this->intLineStart ==  $this->intLineEnd ){
           $query=APP::$APP->db->pdo->prepare("SELECT ( SELECT first_class from ticket_price WHERE station_name=:start_place) - (SELECT first_class FROM ticket_price WHERE station_name=:end_place) As First_class_price");
           $query->bindValue(":start_place", $this->start);
           $query->bindValue(":end_place", $this->destination);
           $query->execute();
           $this->firstClassPrice=$query->fetchAll(PDO::FETCH_ASSOC);
           var_dump($this->firstClassPrice);



           $query=APP::$APP->db->pdo->prepare("SELECT ( SELECT second_class from ticket_price WHERE station_name=:start_place) - (SELECT second_class FROM ticket_price WHERE station_name=:end_place) As Second_class_price");
           $query->bindValue(":start_place", $this->start);
           $query->bindValue(":end_place", $this->destination);
           $query->execute();
           $this->secondClassPrice=$query->fetchAll(PDO::FETCH_ASSOC);
           var_dump($this->secondClassPrice);


           $query=APP::$APP->db->pdo->prepare("SELECT ( SELECT third_class from ticket_price WHERE station_name=:start_place) - (SELECT third_class FROM ticket_price WHERE station_name=:end_place) As Third_class_price");
           $query->bindValue(":start_place", $this->start);
           $query->bindValue(":end_place", $this->destination);
           $query->execute();
           $this->thirdClassPrice=$query->fetchAll(PDO::FETCH_ASSOC);
           var_dump($this->thirdClassPrice);



           
        }else{
            $arr=array($this->intLineStart,$this->intLineEnd);
            $comma=implode(",",$arr);

            $query=APP::$APP->db->pdo->prepare("SELECT station_name from ticket_price WHERE availability_lines=:comma");//Get a intersect station
            $query->bindValue(":comma", $comma);
            $query->execute();
            $station_name=$query->fetchAll(PDO::FETCH_ASSOC);
           // var_dump($station_name);

            $query=APP::$APP->db->pdo->prepare("SELECT first_class from ticket_price WHERE station_name=:station");
            $query->bindValue(":station",$station_name[0]['station_name']);
            $query->execute();
            $first_price=$query->fetchAll(PDO::FETCH_ASSOC);
            
            $value_first_price=$first_price[0]['first_class'];
            
            $my_first_price=explode(',',$value_first_price);// Get the value set ony by one in intersect
            //var_dump($my_first_price);
           


            $query=APP::$APP->db->pdo->prepare("SELECT availability_lines from ticket_price WHERE station_name=:station");
            $query->bindValue(":station", $station_name[0]['station_name']);
            $query->execute();
            $lines=$query->fetchAll(PDO::FETCH_ASSOC);

            $value_lines=$lines[0]['availability_lines'];
            $my_line=explode(',',$value_lines);

            $n = sizeof($my_line);

           // var_dump($n);
            


            $query=APP::$APP->db->pdo->prepare("SELECT availability_lines from ticket_price WHERE station_name=:station");
            $query->bindValue(":station", $this->start);
            $query->execute();
            $start_line=$query->fetchAll(PDO::FETCH_ASSOC);

            $query=APP::$APP->db->pdo->prepare("SELECT availability_lines from ticket_price WHERE station_name=:station");
            $query->bindValue(":station", $this->destination);
            $query->execute();
            $dest_line=$query->fetchAll(PDO::FETCH_ASSOC);

            $query=APP::$APP->db->pdo->prepare("SELECT first_class from ticket_price WHERE station_name=:station");
            $query->bindValue(":station", $this->start);
            $query->execute();
            $start_price=$query->fetchAll(PDO::FETCH_ASSOC);


            $query=APP::$APP->db->pdo->prepare("SELECT first_class from ticket_price WHERE station_name=:station");
            $query->bindValue(":station", $this->destination);
            $query->execute();
            $dest_price=$query->fetchAll(PDO::FETCH_ASSOC);

            $positionstart=0;
            $positionend=0;
            $find_posi_start=0;
            $find_posi_end=0;
            $i=0;
            $intersect_start=0;
            $intersect_end=0;

            for($i=0;$i<$n;$i++){
                if($my_line[$i] == $start_line[0]['availability_lines']){
                   $find_posi_start=$positionstart;
                }
                $positionstart=$positionstart+1;
            }
            
            for($i=0;$i<$n;$i++){
                if($my_line[$i] == $dest_line[0]['availability_lines']){
                   $find_posi_end=$positionend;
                }
                $positionend=$positionend+1;
            }



            for($i=0;$i<$n;$i++){
                if($i== $find_posi_start){
                    $intersect_start = $start_price[0]['first_class'] - $my_first_price[$i];
                }
            }
          var_dump($find_posi_end);
            for($i=0;$i<$n;$i++){
                if($i== $find_posi_end){
                    $intersect_end = $dest_price[0]['first_class'] - $my_first_price[$i];
                }
            }
            var_dump($intersect_start);
            var_dump($intersect_end);
            if($intersect_start < 0){
                $intersect_start=-($intersect_start);
            }
            if($intersect_end < 0){
                $intersect_end=-($intersect_end);
            }
            $total=$intersect_start+$intersect_end;
            var_dump($total);





        }
        }

        if($lineLengthStart!= $lineLengthEnd){
            
            if($lineLengthStart == 1 && $lineLengthEnd >1 || $lineLengthStart >1 && $lineLengthEnd ==1 ){
                $this->intLineStart=(int) ($this->resultLine[0]['availability_lines']);

            $value_lines=$this->resultLine[1]['availability_lines'];
            $my_lines=explode(',',$value_lines);

            $i=0;
            $position=0;
            $find_position=-1;

            $n = sizeof($my_lines);
            for($i;$i<$n;$i++){
                if($this->intLineStart == $my_lines[$i]){
                    $find_position=$find_position+1;
                    $find_position=$position;

                }
                $position=$position+1;

            }

            if($find_position != -1){

            $query=APP::$APP->db->pdo->prepare("SELECT first_class from ticket_price WHERE station_name=:station");
            $query->bindValue(":station", $this->start);
            $query->execute();
            $start_price=$query->fetchAll(PDO::FETCH_ASSOC);

            $start_prices=$start_price[0]['first_class'];

            if(strlen($start_prices) >1){
                $my_start_price=explode(',',$start_prices);

            }


            $query=APP::$APP->db->pdo->prepare("SELECT first_class from ticket_price WHERE station_name=:station");
            $query->bindValue(":station", $this->destination);
            $query->execute();
            $dest_price=$query->fetchAll(PDO::FETCH_ASSOC);

            $dest_prices=$dest_price[0]['first_class'];

            if(strlen($dest_prices) >1){
            $my_dest_price=explode(',',$dest_prices);
            }

            if(strlen($start_price[0]['first_class'])==1 && strlen($dest_price[0]['first_class']>1)){

                if($my_dest_price[$find_position] > $start_price[0]['first_class'] ){
                    $get_value=$my_dest_price[$find_position]-$start_price[0]['first_class'];
                }else{
                    $get_value=$start_price[0]['first_class']-$my_dest_price[$find_position];
                }

            }else{

                if($dest_price[0]['first_class']> $my_start_price[$find_position]){
                    $get_value=$dest_price[0]['first_class']-$my_start_price[$find_position];
                }else{
                    $get_value=$my_start_price[$find_position] - $dest_price[0]['first_class'];
                }

            }
            

            

            var_dump($get_value);

            




            }


            }
            

        }

        if($lineLengthStart == $lineLengthEnd && $lineLengthStart > 1 && $lineLengthEnd >1){

            $value_lines1=$this->resultLine[0]['availability_lines'];
            $value_lines2=$this->resultLine[1]['availability_lines'];

            $my_value_lines1=explode(',',$value_lines1);
            $my_value_lines2=explode(',',$value_lines2);

            $lines1=sizeof($my_value_lines1);
            $lines2=sizeof($my_value_lines2);

            $result1=array_intersect($my_value_lines1,$my_value_lines2);
            $result2=array_intersect($my_value_lines2,$my_value_lines1);

            var_dump($result1);
            var_dump($result2);
            if(sizeof($result1)>0){

            $query=APP::$APP->db->pdo->prepare("SELECT first_class from ticket_price WHERE station_name=:station");
            $query->bindValue(":station", $this->destination);
            $query->execute();
            $dest_price=$query->fetchAll(PDO::FETCH_ASSOC);

            $query=APP::$APP->db->pdo->prepare("SELECT first_class from ticket_price WHERE station_name=:station");
            $query->bindValue(":station", $this->start);
            $query->execute();
            $start_price=$query->fetchAll(PDO::FETCH_ASSOC);
              
            $start_prices=$start_price[0]['first_class'];
            $dest_prices=$dest_price[0]['first_class'];

            $my_dest_price=explode(',',$dest_prices);
            $my_start_price=explode(',',$start_prices);
             
            
            
            $key1=array_keys($result1);
            $key2=array_keys($result2);
            var_dump($key1);
           
            $i=0;
            $j=sizeof($key1);
            $k=sizeof($key2);
            $array1=[];
            $pos1=0;
            $pos2=0;

            for($i=0;$i<$j;$i++){
                
                $pos1=$key1[$i];

            }

            for($i=0;$i<$k;$i++){
                $pos2=$key2[$i];
            }
            //var_dump($my_dest_price[$key2]);
            if($result1[$pos2] == $result2[$pos1]){
                if($my_dest_price[$pos2]> $my_start_price[$pos1]){
                    $get_value=$my_dest_price[$pos2]-$my_start_price[$pos1];
                }else{
                    $get_value=$my_start_price[$pos1] - $my_dest_price[$pos2];
                }
            }
            

            var_dump($get_value);



            }
            

        }


    }
    

    
}




    
  

  



