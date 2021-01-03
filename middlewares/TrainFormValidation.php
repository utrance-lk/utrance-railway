<?php
include_once "../models/UserModel.php";
include_once "../models/AdminModel.php";
include_once "../classes/core/Model.php";

class TrainFormValidation
{

    public $errorArray = [];
    public $routeError = [];
    public function runValidators($array)
    {

        $this->validateTrainName(trim($array['train_name']), trim($array['route_id']));
        $this->validateRouteId(trim($array['route_id']));
        $this->validateTravelDays(implode($array['train_travel_days']));
        $this->validateTrainFc(trim($array['train_fc_seats']));
        $this->validateTrainSc(trim($array['train_sc_seats']));
        $this->validateTrainSleepingB(trim($array['train_sleeping_berths']));
        $this->validateTrainweight(trim($array['train_total_weight']));
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
        $this->validateTrainName1(trim($array['train_name']));

        $this->validateTravelDays($array['train_travel_days']);
        $this->validateRouteId(trim($array['route_id']));
        $this->validateTrainFc(trim($array['train_fc_seats']));
        $this->validateTrainSc(trim($array['train_sc_seats']));
        $this->validateTrainSleepingB(trim($array['train_sleeping_berths']));
        $this->validateTrainweight(trim($array['train_total_weight']));
        return $this->errorArray;
        return $this->errorArray;

    }

    private function validateTrainFc($tn)
    {
        if ($tn < 0) {
            $this->errorArray['TrainFcError'] = 'Number of seats greater than 0';
        }
        // if (ctype_digit($tn)) {
        //     $this->errorArray['TrainFcError'] = 'Num Wrong length';
        //  }

    }
    private function validateTrainSc($tn)
    {
        if ($tn < 0) {
            $this->errorArray['TrainscError'] = 'Number of seats greater than 0';
        }
        // if (ctype_digit($tn)) {
        //     $this->errorArray['TrainFcError'] = 'Num Wrong length';
        // }

    }
    private function validateTrainSleepingB($tn)
    {
        if ($tn < 0) {
            $this->errorArray['TrainSleepingBError'] = 'Number of seats greater than 0';
        }
        // if (ctype_digit($tn)) {
        //     $this->errorArray['TrainFcError'] = 'Num Wrong length';
        // }

    }
    private function validateTrainweight($tn)
    {
        if ($tn < 0) {
            $this->errorArray['TrainweightError'] = 'weight greter than 0';
        }

    }
    private function validateRouteId($tn)
    {
        if (empty($tn)) {
            $this->errorArray['TrainRouteError'] = 'Route not valid';
        }
    }

    private function validateTrainName($tn, $rn)
    {
        if (strlen($tn) < 2 || strlen($tn) > 50) {
            $this->errorArray['TrainNameError'] = 'Train name not valid';
        }

        if (is_numeric($tn)) {
            $this->errorArray['TrainNameError'] = 'Train name only letters required';
        }

        if (empty($tn)) {
            $this->errorArray['TrainNameError'] = 'Enter train name';

            // var_dump($this->errorArray);
        }
        // $this->my($tn, $rn);
        $results = $this->sameTrains($tn, $rn);
        $results1 = $this->sameTrainname($tn, $rn);
        if ($results1 === 'success') {

            $this->errorArray['TrainNameError'] = 'Train Name already exists';
            // echo $rid;

        }
        // var_dump($results);
        if ($results === 'success') {

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

    public function sameTrainname($inputText, $rid)
    {
        $query = APP::$APP->db->pdo->prepare("SELECT COUNT(train_name) FROM trains WHERE train_name = :train_name ");
        $query->bindValue(":train_name", $inputText);

        $query->execute();

        $this->resultArray = $query->fetchAll(PDO::FETCH_ASSOC);

        // var_dump( $this->resultArray["trains"]);
        if ($this->resultArray[0]['COUNT(train_name)'] == '2') {
            return 'success';

        }
    }

    public function routeValidators($route, $arrTime, $deptTime, $sid, $pathId, $stations, $sname,$x)
    {
       

        $newpathId = $pathId - 1 - $x;
        $query = APP::$APP->db->pdo->prepare("SELECT * FROM stops WHERE path_id = :id AND route_id = :route_id");
        $query->bindValue(":id", $newpathId);
        $query->bindValue(":route_id", $route);
        $query->execute();
        $this->result1 = $query->fetchAll(PDO::FETCH_ASSOC);

        $resultArrTime = $this->result1;
      

        $query1 = APP::$APP->db->pdo->prepare("SELECT * FROM stops WHERE path_id = :id AND route_id = :route_id");
        $query1->bindValue(":id", $pathId);
        $query1->bindValue(":route_id", $route);
        $query1->execute();
        $this->result2 = $query1->fetchAll(PDO::FETCH_ASSOC);

        $resultDeptTime = $this->result2;

        $date1 = DateTime::createFromFormat('H:i:s', $resultArrTime[0]["departure_time"]);
        $date2 = DateTime::createFromFormat('H:i', $arrTime);
        if (!empty($resultDeptTime)) {
            $date3 = DateTime::createFromFormat('H:i:s', $resultDeptTime[0]["arrival_time"]);
        }

        $date4 = DateTime::createFromFormat('H:i', $deptTime);
       

        $length = sizeof($stations);
        for ($j = 0; $j < $length; $j++) {
            if (($pathId - 1) == $stations[$j]["pathId"]) {
                $resultArrTime = $stations[$j]["deptTime"];
                $date1 = DateTime::createFromFormat('H:i', $resultArrTime);

            }
            if (($pathId + 1) == $stations[$j]["pathId"]) {
                $resultDeptTime = $stations[$j]["arrTime"];
                $date3 = DateTime::createFromFormat('H:i', $resultDeptTime);
            }

        }

        if (empty($resultDeptTime)) {
            if ($date4 < $date2 || $date2 < $date1) {
                $this->routeError["route error"] = "invalid arrTime or deptTime on pathid " . $pathId . "";
          
            }

        } else {
            if ($date4 < $date2 || $date2 < $date1 || $date4 > $date3) {
                $this->routeError["route error"] = "invalid arrTime or deptTime on pathid " . $pathId . "";
             
              
            }

        }

        if (empty($arrTime) || empty($deptTime)) {
            $this->routeError["route error"] = "time is required";
        }
        if (empty($sname)) {
            $this->routeError["route name error"] = "name is required";
        }
        for ($k = 0; $k < $length; $k++) {
            for ($j = $k + 1; $j < $length; $j++) {
                if ($stations[$k]["stationName"] == $stations[$j]["stationName"]) {
                    $this->routeError["station name error"] = "Dupplicate station name";
                }
            }
        }

        $query2 = APP::$APP->db->pdo->prepare("SELECT * FROM stops WHERE station_id = :id AND route_id = :route_id");
        $query2->bindValue(":id", $sid);
        $query2->bindValue(":route_id", $route);
        $query2->execute();
        $this->result3 = $query2->fetchAll(PDO::FETCH_ASSOC);

        if (!empty($this->result3)) {
            $this->routeError["station name error"] = "invalid stationname on pathid" . $pathId . "";
        }

        return $this->routeError;

    }

}
