<?php

include_once "../classes/core/Model.php";
include_once "HandlerFactory.php";

class TrainModel extends Model
{

    public $from;
    public $to;
    public $Traintype;
    public $newindex2;
    public $index1;
    public $index2;
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
    public $stationrouteError = [];
 
    public function getMyRoutsTime(){
        $query = APP::$APP->db->pdo->prepare("SELECT * FROM stops WHERE route_id = :route_id");
        $query->bindValue(":route_id", $this->index2);
        $query->execute();
        $this->resultArray = $query->fetchAll(PDO::FETCH_ASSOC);
        return $this->resultArray;

    }

    public function getMyRouts()
    {
        $sum = [];

        $stations = $this->index1;
   

        $length = sizeof($stations);

        for ($k = 0; $k < $length; $k++) {
            for ($j = $k + 1; $j < $length; $j++) {
                
                if ($stations[$k]["pathId"] > $stations[$j]["pathId"]) {
                    $temp = $stations[$k]["pathId"];
                    $stations[$k]["pathId"] = $stations[$j]["pathId"];
                    $stations[$j]["pathId"] = $temp;

                }

            }

        }
       
       

        for ($j = 0; $j < $length; $j++) {
            $getresult = $this->getStationId($stations[$j]["stationName"]);
         
            if (empty($getresult)) {
                $updateTrainrValidation = new TrainFormValidation();
                $validationState[$j] = $updateTrainrValidation->routeValidators($this->index2, $stations[$j]["arrTime"], $stations[$j]["deptTime"], 0, $stations[$j]["pathId"], $stations,$stations[$j]["stationName"],$j);
              
                // $this->routeValidators($this->index2, $stations[$j]["arrTime"], $stations[$j]["deptTime"],0, $stations[$j]["pathId"]);

            } else {
                $updateTrainrValidation = new TrainFormValidation();
                $validationState[$j] = $updateTrainrValidation->routeValidators($this->index2, $stations[$j]["arrTime"], $stations[$j]["deptTime"], $getresult[0]["station_id"], $stations[$j]["pathId"], $stations,$stations[$j]["stationName"],$j);
             
                // $this->routeValidators($this->index2, $stations[$j]["arrTime"], $stations[$j]["deptTime"], $getresult[0]["station_id"], $stations[$j]["pathId"]);
            }
         
        }
      
      $errorlength=0;
       for ($t = 0; $t < $length; $t++){
        if(!empty($validationState[$t])){
            $errorlength++;
           }
       }

        if ($errorlength==0) {

            for ($i = 0; $i < $length; $i++) {
                $stations[$i]["stationName"]= $this->sanitizeFormUsername($stations[$i]["stationName"]);

                
                $result = $this->getStationId($stations[$i]["stationName"]);
                $resultForRoute = $this->getDestStationId($stations[$i]["pathId"],$this->index2);

                if (empty($result)) {
 
                    $newquery = APP::$APP->db->pdo->prepare("INSERT INTO stations (station_name) VALUES (:stName)");
                    $newquery->bindValue(":stName", $stations[$i]["stationName"]);
                    $newquery->execute();
                    $result = $this->getStationId($stations[$i]["stationName"]);
 
                }
                  ////////////////////////////
                  if(empty($resultForRoute)){
                    $newquery1 = APP::$APP->db->pdo->prepare("UPDATE routes SET dest_station_id = :id  WHERE route_id = :route_id");
                    $newquery1->bindValue(":id", $result[0]["station_id"]);
                    $newquery1->bindValue(":route_id", $this->index2);
                    $newquery1->execute();

                   }
                   //////////////////

                $start_t = new DateTime($stations[$i]["arrTime"]);
                $current_t = new DateTime($stations[$i]["deptTime"]);
                $difference = $start_t->diff($current_t);
                $return_time = $difference->format('%H:%I:%S');
                $this->settimeduration($stations[$i]["pathId"], $return_time, $this->index2);
                $sum[$i] = $return_time;

                $query = APP::$APP->db->pdo->prepare("UPDATE stops SET path_id = path_id + 1 WHERE path_id >= :id AND route_id = :route_id ORDER BY path_id ASC");
                $query->bindValue(":id", $stations[$i]["pathId"]);
                $query->bindValue(":route_id", $this->index2);
                $query->execute();

                $query1 = APP::$APP->db->pdo->prepare("INSERT INTO stops (route_id,station_id,arrival_time,departure_time,path_id) VALUES (:route_id,:station_id,:arrTime,:depTime,:id)");
                $query1->bindValue(":id", $stations[$i]["pathId"]);
                $query1->bindValue(":route_id", $this->index2);
                $query1->bindValue(":station_id", $result[0]["station_id"]);
                $query1->bindValue(":arrTime", $stations[$i]["arrTime"]);
                $query1->bindValue(":depTime", $stations[$i]["deptTime"]);
                $query1->execute();
                for ($j = 0; $j < $i; $j++) {
                    $this->settimedurationForNew($stations[$i]["pathId"], $sum[$j], $this->index2);
                }

                // $secs = strtotime($stations[$i]["deptTime"]);
                // $result = date("H:i:s",strtotime($stations[$i]["arrTime"])+$secs);

            }

        }

        return $validationState;

    }

    private function sanitizeFormUsername($inputText)
    { 
        $inputText = strip_tags($inputText); //remove html tags
        // $inputText = str_replace(" ", "", $inputText); // remove white spaces
        $inputText = trim($inputText);
        return ucfirst($inputText); // remove white spaces
    }
    public function getDestStationId($path,$routeId){
        $query = APP::$APP->db->pdo->prepare("SELECT * FROM stops WHERE path_id=:id AND route_id = :route_id");
        $query->bindValue(":id", $path);
        $query->bindValue(":route_id", $routeId);
        $query->execute();
        $this->result = $query->fetchAll(PDO::FETCH_ASSOC);

        return $this->result;
    }
   

    public function settimedurationForNew($path, $time, $routeId)
    {
        $newtime = strtotime($time);
        $hourtime = date('H', $newtime);
        $minitetime = date('i', $newtime);

        $query = APP::$APP->db->pdo->prepare("UPDATE stops SET arrival_time = DATE_ADD(arrival_time,INTERVAL $hourtime hour) WHERE path_id = $path AND route_id = $routeId ORDER BY path_id ASC");

        $query->execute();

        $query1 = APP::$APP->db->pdo->prepare("UPDATE stops SET arrival_time = DATE_ADD(arrival_time,INTERVAL $minitetime MINUTE) WHERE path_id = $path AND route_id = $routeId ORDER BY path_id ASC");

        $query1->execute();

        $query2 = APP::$APP->db->pdo->prepare("UPDATE stops SET departure_time = DATE_ADD(departure_time,INTERVAL $hourtime hour) WHERE path_id = $path AND route_id = $routeId ORDER BY path_id ASC");

        $query2->execute();

        $query3 = APP::$APP->db->pdo->prepare("UPDATE stops SET departure_time = DATE_ADD(departure_time,INTERVAL $minitetime MINUTE) WHERE path_id = $path AND route_id = $routeId ORDER BY path_id ASC");

        $query3->execute();

    }

    public function settimeduration($path, $time, $routeId)
    {
        $newtime = strtotime($time);
        $hourtime = date('H', $newtime);
        $minitetime = date('i', $newtime);

        $query = APP::$APP->db->pdo->prepare("UPDATE stops SET arrival_time = DATE_ADD(arrival_time,INTERVAL $hourtime hour) WHERE path_id >= $path AND route_id = $routeId ORDER BY path_id ASC");
        $query->bindValue(":timeduration", $hourtime);
        $query->bindValue(":id", $path);
        $query->bindValue(":route_id", $routeId);
        $query->execute();

        $query1 = APP::$APP->db->pdo->prepare("UPDATE stops SET arrival_time = DATE_ADD(arrival_time,INTERVAL $minitetime MINUTE) WHERE path_id >= $path AND route_id = $routeId ORDER BY path_id ASC");
        $query1->bindValue(":timeduration", $minitetime);
        $query1->bindValue(":id", $path);
        $query1->bindValue(":route_id", $routeId);
        $query1->execute();

        $query2 = APP::$APP->db->pdo->prepare("UPDATE stops SET departure_time = DATE_ADD(departure_time,INTERVAL $hourtime hour) WHERE path_id >= $path AND route_id = $routeId ORDER BY path_id ASC");
        $query2->bindValue(":timeduration", $hourtime);
        $query2->bindValue(":id", $path);
        $query2->bindValue(":route_id", $routeId);
        $query2->execute();

        $query3 = APP::$APP->db->pdo->prepare("UPDATE stops SET departure_time = DATE_ADD(departure_time,INTERVAL $minitetime MINUTE) WHERE path_id >= $path AND route_id = $routeId ORDER BY path_id ASC");
        $query3->bindValue(":timeduration", $minitetime);
        $query3->bindValue(":id", $path);
        $query3->bindValue(":route_id", $routeId);
        $query3->execute();

    }
    public function getStationId($name)
    {
        $query = APP::$APP->db->pdo->prepare("SELECT station_id FROM stations WHERE station_name=:sname");
        $query->bindValue(":sname", $name);

        $query->execute();
        $this->result = $query->fetchAll(PDO::FETCH_ASSOC);

        return $this->result;

    }

    // public function routeValidators($route, $arrTime, $deptTime, $sid, $pathId)
    // {
    //     $newpathId = $pathId - 1;
    //     $query = APP::$APP->db->pdo->prepare("SELECT * FROM stops WHERE path_id = :id AND route_id = :route_id");
    //     $query->bindValue(":id", $newpathId);
    //     $query->bindValue(":route_id", $route);
    //     $query->execute();
    //     $this->result1 = $query->fetchAll(PDO::FETCH_ASSOC);

    //     $resultArrTime = $this->result1;

    //     $query1 = APP::$APP->db->pdo->prepare("SELECT * FROM stops WHERE path_id = :id AND route_id = :route_id");
    //     $query1->bindValue(":id", $pathId);
    //     $query1->bindValue(":route_id", $route);
    //     $query1->execute();
    //     $this->result2 = $query1->fetchAll(PDO::FETCH_ASSOC);

    //     $resultDeptTime = $this->result2;

    //     $date1 = DateTime::createFromFormat('H:i:s', $resultArrTime[0]["departure_time"]);
    //     $date2 = DateTime::createFromFormat('H:i', $arrTime);
    //     $date3 = DateTime::createFromFormat('H:i:s', $resultDeptTime[0]["arrival_time"]);
    //     $date4 = DateTime::createFromFormat('H:i', $deptTime);

    //     if ($date4 < $date2 || $date2 < $date1 || $date4 > $date3) {
    //         $this->routeError["route error"] = "invalid arrTime or deptTime on pathid" . $pathId . "";
    //     }

    //     $query2 = APP::$APP->db->pdo->prepare("SELECT * FROM stops WHERE station_id = :id");
    //     $query2->bindValue(":id", $sid);
    //     $query2->execute();
    //     $this->result3 = $query2->fetchAll(PDO::FETCH_ASSOC);

    //     if (!empty($this->result3)) {
    //         $this->routeError["station name error"] = "invalid stationname on pathid" . $pathId . "";
    //     }

    // }

    public function getMyTrains()
    {
        //   $new= explode(" ",$this->Traintype);
        $firstName = substr($this->Traintype, 4);
        $lastName = $this->Traintype[0];
        if ($firstName != "all" && $lastName == "a") {
            $query = APP::$APP->db->pdo->prepare("SELECT * FROM trains WHERE train_type = :train_id  ");
            $query->bindValue(":train_id", $firstName);
            $query->execute();
            $this->resultArray = $query->fetchAll(PDO::FETCH_ASSOC);
            return $this->resultArray;

        } else if ($firstName == "all" && $lastName != "a") {
            $query = APP::$APP->db->pdo->prepare("SELECT * FROM trains WHERE train_active_status = :train_id  ");
            $query->bindValue(":train_id", $lastName);
            $query->execute();
            $this->resultArray = $query->fetchAll(PDO::FETCH_ASSOC);
            return $this->resultArray;

        } else if ($firstName != "all" && $lastName != "a") {
            $query = APP::$APP->db->pdo->prepare("SELECT * FROM trains WHERE train_type = :train_id AND train_active_status = :train_status");
            $query->bindValue(":train_id", $firstName);
            $query->bindValue(":train_status", $lastName);
            $query->execute();
            $this->resultArray = $query->fetchAll(PDO::FETCH_ASSOC);
            return $this->resultArray;

        } else if ($firstName == "all" && $lastName == "a") {
            $query = APP::$APP->db->pdo->prepare("SELECT * FROM trains");

            $query->execute();
            $this->resultArray = $query->fetchAll(PDO::FETCH_ASSOC);
            return $this->resultArray;
        }

    }

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
        $manageTrain = new HandlerFactory();
        $valuesArray = ['train_id' => $this->id];
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

            $updateTrain = new HandlerFactory();
            $valuesArray = ['train_name' => $this->train_name, 'route_id' => $this->route_id, 'train_type' => $this->train_type, 'train_travel_days' => implode(" ", $this->train_travel_days),
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

    public function deleteTrains()
    {
        $query = APP::$APP->db->pdo->prepare("DELETE FROM trains WHERE train_id = :train_id ");
        $query->bindValue(":train_id", $this->id);
        $query->execute();
        $this->setRouteStatus();
    }

    public function setRouteStatus()
    {
        $query = APP::$APP->db->pdo->prepare("UPDATE routes SET route_status = 0 WHERE route_id=(SELECT routes.route_id FROM trains RIGHT JOIN routes ON trains.route_id = routes.route_id WHERE trains.train_id=:train_id)");
        $query->bindValue(":train_id", $this->id);
        $query->execute();
    }

    public function addNewTrainDetails()
    {

        $this->runValidators();

        if (empty($this->errorArray)) {
            $this->runSanitization();
            $addTrain = new HandlerFactory();
            $valuesArray = ['train_name' => $this->train_name, 'route_id' => $this->route_id, 'train_type' => $this->train_type, 'train_active_status' => $this->train_active_status, 'train_travel_days' => implode(' ', $this->train_travel_days),
                'train_freights_allowed' => $this->train_freights_allowed, 'train_fc_seats' => $this->train_fc_seats, 'train_sc_seats' => $this->train_sc_seats, 'train_observation_seats' => $this->train_observation_seats, 'train_sleeping_berths' => $this->train_sleeping_berths,
                'train_total_weight' => $this->train_total_weight];

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

    public function setRoute()
    {
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

    public function my($inputText, $rid)
    {
        $results = $this->sameTrains($this->train_name, $this->route_id);
        // var_dump($results);
        if ($results === 'success') {

            $this->errorArray['RoutIdError'] = 'Route_id is not valid';
            // echo $rid;

        }
    }

    public function sameTrains($inputText, $rid)
    {
        $query = APP::$APP->db->pdo->prepare("SELECT * FROM trains WHERE (train_name = :train_name AND route_id=:route_id) OR route_id=:route_id ");
        $query->bindValue(":train_name", $inputText);
        $query->bindValue(":route_id", $rid);
        $query->execute();

        $this->resultArray["trains"] = $query->fetchAll(PDO::FETCH_ASSOC);
        // var_dump($this->resultArray["trains"]);
        // var_dump( $this->resultArray["trains"]);
        if (!empty($this->resultArray["trains"])) {
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

    public function getAvailableRoute()
    {
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

    public function getPrice()
    {
        if ($this->from == 'Colombo Fort' || $this->from == 'Maradana') {
            $query2 = APP::$APP->db->pdo->prepare("SELECT available_lines FROM ticket_price WHERE station_name=:endStation");
            $query2->bindValue(":endStation", $this->to);
            $query2->execute();
            $this->result = $query2->fetchAll(PDO::FETCH_ASSOC);
            $result = $this->result;
            $i = 0;
            foreach ($this->result as $key => $value) {

                $query1 = APP::$APP->db->pdo->prepare("SELECT station_name FROM ticket_price WHERE station_name=:endStation AND available_lines=:lines");
                $query1->bindValue(":endStation", $this->from);
                $query1->bindValue(":lines", $value['available_lines']);
                $query1->execute();
                $this->result1 = $query1->fetchAll(PDO::FETCH_ASSOC);
                $i++;
                if (!empty($this->result1)) {
                    $newline = $value['available_lines'];
                    var_dump($newline);

                    break;
                }
            }

        } else {
            $query2 = APP::$APP->db->pdo->prepare("SELECT available_lines FROM ticket_price WHERE station_name=:stratStation");
            $query2->bindValue(":stratStation", $this->from);
            $query2->execute();
            $this->result = $query2->fetchAll(PDO::FETCH_ASSOC);

            $query1 = APP::$APP->db->pdo->prepare("SELECT station_name FROM ticket_price WHERE station_name=:endStation AND available_lines=:lines");
            $query1->bindValue(":endStation", $this->to);
            $query1->bindValue(":lines", $this->result[0]['available_lines']);
            $query1->execute();
            $this->result1 = $query1->fetchAll(PDO::FETCH_ASSOC);

        }

        if (empty($this->result1)) {
            if ($this->from == 'Colombo Fort' || $this->from == 'Maradana') {
                $query = APP::$APP->db->pdo->prepare("SELECT available_lines FROM ticket_price WHERE station_name=:endStation LIMIT 1");
                $query->bindValue(":endStation", $this->from);
                $query->execute();
                $this->newresult = $query->fetchAll(PDO::FETCH_ASSOC);
                $TotalPrice = $this->gettotalPrice($result[0]['available_lines'], $this->newresult[0]['available_lines']);

            } else {

                $query = APP::$APP->db->pdo->prepare("SELECT available_lines FROM ticket_price WHERE station_name=:endStation LIMIT 1");
                $query->bindValue(":endStation", $this->to);
                $query->execute();
                $this->newresult = $query->fetchAll(PDO::FETCH_ASSOC);
                $TotalPrice = $this->gettotalPrice($this->result[0]['available_lines'], $this->newresult[0]['available_lines']);

            }

        } else {
            if ($this->from == 'Colombo Fort' || $this->from == 'Maradana') {
                $TotalPrice = $this->totalPrice($newline);
                $newTotalPrice = (int) $TotalPrice[0]['total_price'];
                echo $newTotalPrice;

            } else {
                $TotalPrice = $this->totalPrice($this->result[0]['available_lines']);
                $newTotalPrice = (int) $TotalPrice[0]['total_price'];
                echo $newTotalPrice;
            }

        }

    }

    public function totalPrice($lines)
    {
        $query = APP::$APP->db->pdo->prepare("SELECT ( SELECT price from ticket_price WHERE station_name=:stratStation AND available_lines=:lines) - (SELECT price FROM ticket_price WHERE station_name=:endStation AND available_lines=:lines) AS total_price");
        $query->bindValue(":stratStation", $this->from);
        $query->bindValue(":endStation", $this->to);
        $query->bindValue(":lines", $lines);
        $query->execute();
        $this->result = $query->fetchAll(PDO::FETCH_ASSOC);
        return $this->result;

    }

    public function gettotalPrice($startline, $endline)
    {

        $arr = array($startline, $endline);
        $comma = implode(",", $arr);
        $arr1 = array($endline, $startline);
        $comma1 = implode(",", $arr1);

        $query = APP::$APP->db->pdo->prepare("SELECT station_name FROM ticket_price WHERE available_lines LIKE :comma OR available_lines LIKE :comma1");
        $query->bindValue(":comma", $comma);
        $query->bindValue(":comma1", $comma1);

        $query->execute();
        $this->result = $query->fetchAll(PDO::FETCH_ASSOC);

        $price = $this->newgettotalPrice($this->result[0]['station_name'], $startline);

        $price1 = $this->newgettotalPrice1($price[0]['price'], $startline);

        $newprice = $this->newgettotalPrice($this->result[0]['station_name'], $endline);

        $newprice1 = $this->newgettotalPrice2($newprice[0]['price'], $endline);

        $newprice2 = (int) $price1;
        $newprice3 = (int) $newprice1;

        $total_price = abs($newprice2) + abs($newprice3);
        echo $total_price;

    }
    public function newgettotalPrice($ss, $startline)
    {
        $query = APP::$APP->db->pdo->prepare("SELECT price FROM ticket_price WHERE station_name=:sname AND available_lines=:startline");
        $query->bindValue(":sname", $ss);
        $query->bindValue(":startline", $startline);

        $query->execute();
        $this->result1 = $query->fetchAll(PDO::FETCH_ASSOC);

        return $this->result1;

    }
    public function newgettotalPrice1($price, $startline)
    {
        if ($this->from == 'Colombo Fort' || $this->from == 'Maradana') {
            $query = APP::$APP->db->pdo->prepare("SELECT ( SELECT price from ticket_price WHERE station_name=:fromsation AND available_lines=:startline) - :price  AS total_price");
            $query->bindValue(":price", $price);
            $query->bindValue(":fromsation", $this->to);
            $query->bindValue(":startline", $startline);

            $query->execute();
            $this->result1 = $query->fetchAll(PDO::FETCH_ASSOC);

            return $this->result1[0]['total_price'];

        } else {

            $query = APP::$APP->db->pdo->prepare("SELECT ( SELECT price from ticket_price WHERE station_name=:fromsation AND available_lines=:startline) - :price  AS total_price");
            $query->bindValue(":price", $price);
            $query->bindValue(":fromsation", $this->from);
            $query->bindValue(":startline", $startline);

            $query->execute();
            $this->result1 = $query->fetchAll(PDO::FETCH_ASSOC);

            return $this->result1[0]['total_price'];
        }

    }
    public function newgettotalPrice2($price, $endline)
    {

        if ($this->from == 'Colombo Fort' || $this->from == 'Maradana') {
            $query = APP::$APP->db->pdo->prepare("SELECT (SELECT price from ticket_price WHERE station_name=:fromsation AND available_lines=:startline) - :price  AS total_price");
            $query->bindValue(":price", $price);
            $query->bindValue(":fromsation", $this->from);
            $query->bindValue(":startline", $endline);

            $query->execute();
            $this->result1 = $query->fetchAll(PDO::FETCH_ASSOC);
            return $this->result1[0]['total_price'];

        } else {

            $query = APP::$APP->db->pdo->prepare("SELECT (SELECT price from ticket_price WHERE station_name=:fromsation AND available_lines=:startline) - :price  AS total_price");
            $query->bindValue(":price", $price);
            $query->bindValue(":fromsation", $this->to);
            $query->bindValue(":startline", $endline);

            $query->execute();
            $this->result1 = $query->fetchAll(PDO::FETCH_ASSOC);
            return $this->result1[0]['total_price'];
        }

    }

    /////////////////////////////////new comand/////////////////////////////////////////////

}
