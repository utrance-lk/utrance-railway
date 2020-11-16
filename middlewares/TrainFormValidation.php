<?php
include_once "../models/UserModel.php";
include_once "../models/AdminModel.php";
include_once "../classes/core/Model.php";


class TrainFormValidation{

public $errorArray=[];
   public function runValidators($array)
    {
        
        $this->validateTrainName($array['train_name'], $array['route_id']); 
        $this->validateRouteId($array['route_id']); 
        $this->validateTravelDays(implode($array['train_travel_days'])); 
        $this->validateTrainFc($array['train_fc_seats']); 
        $this->validateTrainSc($array['train_sc_seats']); 
        $this->validateTrainSleepingB($array['train_sleeping_berths']); 
        $this->validateTrainweight($array['train_total_weight']); 
        return $this->errorArray;
       


    }

    public function validateTravelDays($tn) 

    {
        if (empty($tn)) {
            $this->errorArray['TravalDaysError'] = 'enter travel days';
           
        }
    }





    public function runValidators1($array)
    {
        $this->validateTrainName1($array['train_name']); 
        
        $this->validateTravelDays($array['train_travel_days']); 
        return $this->errorArray;
       
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
        $this->errorArray['TrainRouteError'] = 'route not valid';
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
        // $this->my($tn, $rn);
        $results = $this->sameTrains($tn, $rn);
        // var_dump($results);
        if($results==='success'){
           
                    $this->errorArray['RoutIdError'] = 'Route_id is not valid';
                    // echo $rid;
          
                    
        }
       
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

    // public function my( $inputText, $rid){
    //     $results = $this->sameTrains($inputText, $rid);
    //     // var_dump($results);
    //     if($results==='success'){
           
    //                 $this->errorArray['RoutIdError'] = 'Route_id is not valid';
    //                 // echo $rid;
          
                    
    //     }
    // }




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

    



    

}

?>