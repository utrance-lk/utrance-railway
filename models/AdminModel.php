<?php

// Admin's specific functionalities

include_once "../classes/core/Model.php";
include_once "HandlerFactory.php";
include_once "../middlewares/FormValidation.php";
include_once "../middlewares/TrainFormValidation.php";

class AdminModel extends Model
{

    public $id;
    public $first_name;
    public $last_name;
    public $street_line1;
    public $street_line2;
    public $city;
    public $contact_num;
    public $email_id;
    public $user_role = "user";
    public $user_password;
    public $user_active_status = 1;
    public $user_confirm_password;
    public $searchUserByNameOrId;
    private $registerSetValueArray = [];
    public $userRole;
    // public $addUserImage = "Chris-user-profile.jpg";

    //////////////Train//////////////////

    public $from;
    public $to;
    public $Traintype;
    public $newindex2;
    public $index1;
    public $index2;
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
    public $searchRoute;
    private $errorArray = [];
    public $stationrouteError = [];

    public $details_type;
    public $news_headline;
    public $detail;
    public $imageError = [];

    private function populateValues()
    {
        return ['first_name' => details_typefirst_name, 'last_name' => $this->last_name, 'street_line1' => $this->street_line1, 'street_line2' => $this->street_line2, 'city' => $this->city, 'contact_num' => $this->contact_num, 'email_id' => $this->email_id, 'user_role' => $this->user_role, 'user_password' => $this->user_password, 'user_active_status' => $this->user_active_status];
    }


    private function populateValuesForAddUser() {
        return ['first_name' => $this->first_name, 'last_name' => $this->last_name, 'street_line1' => $this->street_line1, 'street_line2' => $this->street_line2, 'city' => $this->city, 'contact_num' => $this->contact_num, 'email_id' => $this->email_id, 'user_role' => $this->user_role, 'user_password' => $this->user_password, 'user_active_status' => $this->user_active_status,'details_provider_station' =>$this->station_details_provider];
    }


    

    public function getUsers() {
        $query = APP::$APP->db->pdo->prepare("SELECT id,last_name,user_role,first_name,user_active_status,user_image FROM users  ORDER BY user_active_status DESC");
        $query->execute();
        $this->resultArray["users"] = $query->fetchAll(PDO::FETCH_ASSOC);
       // var_dump($this->resultArray);
        return $this->resultArray;
    }

    // public function getTrains(){
    //     $query = APP::$APP->db->pdo->prepare("SELECT id,last_name,user_role,first_name,user_active_status FROM users");
    //     $query->execute();
    //     $this->resultArray["users"] = $query->fetchAll(PDO::FETCH_ASSOC);
    //     return $this->resultArray;

    // }

    public function addUser()
    {
        $array = ['first_name' => $this->first_name, 'last_name' => $this->last_name, 'street_line1' => $this->street_line1, 'street_line2' => $this->street_line2, 'city' => $this->city, 'contact_num' => $this->contact_num, 'email_id' => $this->email_id, 'user_password' => $this->user_password, 'user_confirm_password' => $this->user_confirm_password];
        $addUserValidation = new FormValidation();
        $validationState = $addUserValidation->runValidators($array);
        if ($validationState === "success") {
            $this->runSanitizationAdmin();
            $this->runPasswordSanitization();
            $createUser = new HandlerFactory();
            return $createUser->createOne('users', $this->populateValuesForAddUser());
        }

        return $validationState;
    }

    public function getUserDetails() ///Ashika ///After Click the view button
    {
        $query = APP::$APP->db->pdo->prepare("SELECT id,last_name,first_name,street_line1,street_line2,email_id,city,contact_num,details_provider_station,user_role FROM users WHERE id=:id ");
        $query->bindValue(":id", $this->id);

        $query->execute();
        $this->resultArray["users"] = $query->fetchAll(PDO::FETCH_ASSOC);
        return $this->resultArray;
    }

    public function getSearchUserResult() // selected user

    { //Ashika
        $this->id = $this->searchUserByNameOrId;
        $this->first_name = $this->searchUserByNameOrId;
        $query = APP::$APP->db->pdo->prepare("SELECT id,last_name,user_role,first_name,user_active_status,user_image FROM users  WHERE first_name LIKE '%{$this->first_name}%' OR id LIKE '%{$this->id}%' ");
        $query->bindValue(":id", $this->id);
        $query->bindValue(":fn", $this->first_name);
        $query->execute();
        $this->resultArray["users"] = $query->fetchAll(PDO::FETCH_ASSOC);
        return $this->resultArray;

    }

    public function getSearchTrainResult() // selected Train

    { //Ashika
        $this->train_id = $this->searchTrainByNameOrId;
        $this->train_name = $this->searchTrainByNameOrId;
        $query = APP::$APP->db->pdo->prepare("SELECT train_id,train_name,train_type FROM train  WHERE train_id=:tid OR train_name=:tn ");
        $query->bindValue(":tid", $this->train_id);
        $query->bindValue(":tn", $this->train_name);
        $query->execute();
        $this->resultArray["users"] = $query->fetchAll(PDO::FETCH_ASSOC);
        return $this->resultArray;

    }

    public function updateUserDetails()
    { //Ashika
        //var_dump($this->city);
        $array = ['id' => $this->id, 'first_name' => $this->first_name, 'last_name' => $this->last_name, 'street_line1' => $this->street_line1, 'street_line2' => $this->street_line2, 'city' => $this->city, 'contact_num' => $this->contact_num, 'email_id' => $this->email_id];
        $updateUserValidation = new FormValidation();
        $validationState = $updateUserValidation->runUpdateValidators($array);
        //var_dump($validationState);

        if ($validationState === "success") {

//         $array=['id'=>$this->id,'first_name'=> $this->first_name,'last_name'=>$this->last_name,'street_line1' => $this->street_line1,'street_line2' => $this->street_line2,'city' => $this->city,'contact_num' => $this->contact_num,'email_id' => $this->email_id];
            //         $updateUserValidation=new FormValidation();
            //         $validationState=$updateUserValidation->runUpdateValidators($array);

//         if ($validationState ==="success") {

            $this->runSanitizationAdmin();
            $query = App::$APP->db->pdo->prepare("UPDATE users SET first_name =:first_name, last_name=:last_name, email_id=:email_id, city=:city,street_line1=:street_line1,street_line2=:street_line2,contact_num=:contact_num WHERE id=:id");
            $query->bindValue(":id", $this->id);
            $query->bindValue(":first_name", $this->first_name);
            $query->bindValue(":last_name", $this->last_name);
            $query->bindValue(":street_line1", $this->street_line1);
            $query->bindValue(":street_line2", $this->street_line2);
            $query->bindValue(":city", $this->city);
            $query->bindValue(":contact_num", $this->contact_num);
            $query->bindValue(":email_id", $this->email_id);
            $query->execute();
            return "success";
        } else {
            return $validationState;
        }

    }

    public function changeUserStatusDetails()
    {
        if ($this->user_active_status == 0) {
            $this->user_active_status = 1;
        } else {
            $this->user_active_status = 0;
        }

        $query = App::$APP->db->pdo->prepare("UPDATE users SET user_active_status=:uas WHERE id=:id");
        $query->bindValue(":id", $this->id);
        $query->bindValue(":uas", $this->user_active_status);
        $query->execute();

        // $resultArray=$this->getManageUsers();
        // return $resultArray;
    }

    public function registerSetValue($registerSetValueArray) //Ashika

    { //Ashika
        if (empty($registerSetValueArray['firstNameError'])) {
            $registerSetValueArray['first_name'] = $this->first_name;
        }
        if (empty($registerSetValueArray['lastNameError'])) {
            $registerSetValueArray['last_name'] = $this->last_name;
        }
        if (empty($registerSetValueArray['streetLine1Error'])) {
            $registerSetValueArray['street_line1'] = $this->street_line1;
        }

        if (empty($registerSetValueArray['streetLine2Error'])) {
            $registerSetValueArray['street_line2'] = $this->street_line2;
        }

        if (empty($registerSetValueArray['contactNumError'])) {
            $registerSetValueArray['contact_num'] = $this->contact_num;
        }
        if (empty($registerSetValueArray['email_id_error'])) {
            $registerSetValueArray['email_id'] = $this->email_id;
        }
        if (empty($registerSetValueArray['cityError'])) {
            $registerSetValueArray['city'] = $this->city;
        }
        
        return $registerSetValueArray;

    }

    private function runPasswordSanitization()
    {
        $this->user_password = $this->sanitizeFormPassword($this->user_password);
        $this->passwordHashing();
    }

    private function runSanitizationAdmin()
    { //Ashika
        $this->first_name = $this->sanitizeFormUsername($this->first_name);
        $this->last_name = $this->sanitizeFormUsername($this->last_name);
        $this->email_id = $this->sanitizeFormEmail($this->email_id);
        $this->street_line1 = $this->sanitizeFormStreet($this->street_line1);
        $this->street_line2 = $this->sanitizeFormStreet($this->street_line2);
        $this->city = $this->sanitizeFormString($this->city);
        $this->contact_num = $this->sanitizeContactNumber($this->contact_num);

    }

    private function sanitizeFormString($inputText) //Asindu

    {
        $inputText = strip_tags($inputText); //remove html tags
        $inputText = str_replace(" ", "", $inputText); // remove white spaces
        $inputText = strtolower($inputText);
        $inputText = trim($inputText); // lowering the text
        return ucfirst($inputText); // capitalize first letter
    }

    private function sanitizeFormStreet($inputText)
    {
        $inputText = strip_tags($inputText);
        $inputText = strtolower($inputText); // lowering the text
        $inputText = trim($inputText);
        return ucfirst($inputText); // capitalize first letter

    }

    private function sanitizeContactNumber($inputText)
    {
        $inputText = strip_tags($inputText);
        $inputText = trim($inputText);
        return $inputText;
    }

    private function sanitizeFormUsername($inputText)
    { //Asindu
        $inputText = strip_tags($inputText); //remove html tags
        $inputText = str_replace(" ", "", $inputText); // remove white spaces
        $inputText = trim($inputText);
        return ucfirst($inputText); // remove white spaces
    }

    private function sanitizeFormEmail($inputText)
    { //Asindu
        $inputText = strip_tags($inputText); //remove html tags
        $inputText = trim($inputText);
        return str_replace(" ", "", $inputText); // remove white spaces
    }

    private function sanitizeFormPassword($inputText)
    {
        $inputText = trim($inputText);
        return strip_tags($inputText); //remove html tags
    }

    private function passwordHashing()
    {
        $this->user_password = password_hash($this->user_password, PASSWORD_BCRYPT);
    }

    public function getMyUsers()
    {
        //   $new= explode(" ",$this->Traintype);
        if ($this->index1 != "all-active__status") {
            if ($this->index1 == "active") {
                $activestate = 1;
            } else if ($this->index1 == "deactivated") {
                $activestate = 0;
            }

        }
        if ($this->index2 == "details provider") {
            $this->index2 = "detailsProvider";
        }
        if ($this->index2 != "all-user__role" && $this->index1 == "all-active__status") {
            $query = APP::$APP->db->pdo->prepare("SELECT * FROM users WHERE user_role = :user_type  ");
            $query->bindValue(":user_type", $this->index2);
            $query->execute();
            $this->resultArray = $query->fetchAll(PDO::FETCH_ASSOC);

            return $this->resultArray;

        } else if ($this->index1 != "all-active__status" && $this->index2 == "all-user__role") {
            $query = APP::$APP->db->pdo->prepare("SELECT * FROM users WHERE user_active_status = :user_status ");
            $query->bindValue(":user_status", $activestate);
            $query->execute();
            $this->resultArray = $query->fetchAll(PDO::FETCH_ASSOC);
            return $this->resultArray;

        } else if ($this->index1 != "all-active__status" && $this->index2 != "all-user__role") {
            $query = APP::$APP->db->pdo->prepare("SELECT * FROM users WHERE user_role = :user_type AND user_active_status = :user_status");
            $query->bindValue(":user_type", $this->index2);
            $query->bindValue(":user_status", $activestate);
            $query->execute();
            $this->resultArray = $query->fetchAll(PDO::FETCH_ASSOC);
            return $this->resultArray;

        } else if ($this->index1 == "all-active__status" && $this->index2 == "all-user__role") {
            $query = APP::$APP->db->pdo->prepare("SELECT * FROM users");

            $query->execute();
            $this->resultArray = $query->fetchAll(PDO::FETCH_ASSOC);
            return $this->resultArray;
        }

    }

    /////////////////////////Trains model////////////////////////////////////////////
    public function getMyTrains()
    {

        if ($this->index1 != "all-active__status") {
            if ($this->index1 == "active") {
                $activestate = 1;
            } else if ($this->index1 == "deactivated") {
                $activestate = 0;
            }

        }

        if ($this->index2 != "all-train__type" && $this->index1 == "all-active__status") {
            $query = APP::$APP->db->pdo->prepare("SELECT * FROM trains WHERE train_type = :train_type  ");
            $query->bindValue(":train_type", $this->index2);
            $query->execute();
            $this->resultArray = $query->fetchAll(PDO::FETCH_ASSOC);
            return $this->resultArray;

        } else if ($this->index1 != "all-active__status" && $this->index2 == "all-train__type") {
            $query = APP::$APP->db->pdo->prepare("SELECT * FROM trains WHERE train_active_status = :train_status ");
            $query->bindValue(":train_status", $activestate);
            $query->execute();
            $this->resultArray = $query->fetchAll(PDO::FETCH_ASSOC);
            return $this->resultArray;

        } else if ($this->index1 != "all-active__status" && $this->index2 != "all-train__type") {
            $query = APP::$APP->db->pdo->prepare("SELECT * FROM trains WHERE train_type = :train_type AND train_active_status = :train_status");
            $query->bindValue(":train_type", $this->index2);
            $query->bindValue(":train_status", $activestate);
            $query->execute();
            $this->resultArray = $query->fetchAll(PDO::FETCH_ASSOC);
            return $this->resultArray;

        } else if ($this->index1 == "all-active__status" && $this->index2 == "all-train__type") {
            $query = APP::$APP->db->pdo->prepare("SELECT * FROM trains");

            $query->execute();
            $this->resultArray = $query->fetchAll(PDO::FETCH_ASSOC);
            return $this->resultArray;
        }

    }

    public function getTrains()
    {
        $query = APP::$APP->db->pdo->prepare("SELECT train_id, train_name, train_type, train_active_status FROM trains");
        $query->execute();
        $this->resultArray['trains'] = $query->fetchAll(PDO::FETCH_ASSOC);
        return $this->resultArray;
    }

    public function searchTrainDetails()
    {
        $this->train_name = $this->searchTrain;
        $query = APP::$APP->db->pdo->prepare("SELECT * FROM trains WHERE train_name LIKE '%{$this->train_name}%' OR train_id=:trainName");
        $query->bindValue(":trainName", $this->train_name);
        $query->execute();
        $this->resultArray["trains"] = $query->fetchAll(PDO::FETCH_ASSOC);
        return $this->resultArray;
    }

    public function getManagTrains()
    {
        $manageTrain = new HandlerFactory();
        $valuesArray = ['train_id' => $this->id];
        $this->resultArray["trains"] = $manageTrain->getAll('trains', 'train_id', $this->id);
        return $this->resultArray;
    }

    public function updateTrainDetails()
    {
       
        $array = ['train_name' => $this->train_name, 'route_id' => $this->route_id, 'train_type' => $this->train_type, 'train_travel_days' => $this->train_travel_days,
            'train_freights_allowed' => $this->train_freights_allowed, 'train_fc_seats' => $this->train_fc_seats, 'train_sc_seats' => $this->train_sc_seats,
            'train_observation_seats' => $this->train_observation_seats, 'train_sleeping_berths' => $this->train_sleeping_berths, 'train_total_weight' => $this->train_total_weight, 'train_active_status' => $this->train_active_status];
        $updateTrainrValidation = new TrainFormValidation();
        $validationState = $updateTrainrValidation->runValidators1($array);

        if (empty($validationState)) {
            $this->runSanitization();
            if ($this->train_freights_allowed == 0) {
                $this->train_total_weight = 0;
            }

            $updateTrain = new HandlerFactory();
            $valuesArray = ['train_name' => $this->train_name, 'route_id' => $this->route_id, 'train_type' => $this->train_type, 'train_travel_days' => implode(" ", $this->train_travel_days),
                'train_freights_allowed' => $this->train_freights_allowed, 'train_fc_seats' => $this->train_fc_seats, 'train_sc_seats' => $this->train_sc_seats,
                'train_observation_seats' => $this->train_observation_seats, 'train_sleeping_berths' => $this->train_sleeping_berths, 'train_total_weight' => $this->train_total_weight, 'train_active_status' => $this->train_active_status];

            $getsuccess = $updateTrain->updateOne('trains', 'train_id', $this->id, $valuesArray);

            return $getsuccess;

        }
        $this->resultArray["newtrains"] = $validationState;
        return $this->resultArray;

    }

    public function activeTrains()
    {
        $query = APP::$APP->db->pdo->prepare("UPDATE trains SET train_active_status=1 WHERE train_id = :train_id ");
        $query->bindValue(":train_id", $this->id);
        $this->setRouteStatus2();
        $query->execute();

    }

    public function deleteTrains()
    {
        $query = APP::$APP->db->pdo->prepare("UPDATE trains SET train_active_status=0 WHERE train_id = :train_id ");

        $query->bindValue(":train_id", $this->id);
        $this->setRouteStatus();
        $query->execute();

    }

    public function setRouteStatus2()
    {

        $query = APP::$APP->db->pdo->prepare("UPDATE routes SET route_status=1 WHERE route_id=(SELECT trains.route_id FROM trains INNER JOIN routes ON trains.route_id = routes.route_id WHERE trains.train_id=:train_id)");
        $query->bindValue(":train_id", $this->id);
        $query->execute();
    }

    public function setRouteStatus()
    {

        $query = APP::$APP->db->pdo->prepare("UPDATE routes SET route_status=0 WHERE route_id=(SELECT trains.route_id FROM trains INNER JOIN routes ON trains.route_id = routes.route_id WHERE trains.train_id=:train_id)");
        $query->bindValue(":train_id", $this->id);
        $query->execute();
    }

    public function addNewTrainDetails()
    {
        $array = ['train_name' => $this->train_name, 'route_id' => $this->route_id, 'train_type' => $this->train_type, 'train_travel_days' => $this->train_travel_days,
            'train_freights_allowed' => $this->train_freights_allowed, 'train_fc_seats' => $this->train_fc_seats, 'train_sc_seats' => $this->train_sc_seats,
            'train_observation_seats' => $this->train_observation_seats, 'train_sleeping_berths' => $this->train_sleeping_berths, 'train_total_weight' => $this->train_total_weight, 'train_active_status' => $this->train_active_status];
        $updateTrainrValidation = new TrainFormValidation();
        $validationState = $updateTrainrValidation->runValidators($array);

        if (empty($validationState)) {
            $this->runSanitization();
            if ($this->train_freights_allowed == 0) {
                $this->train_total_weight = 0;
            }

            $query = App::$APP->db->pdo->prepare("INSERT INTO trains (train_name, route_id, train_type, train_active_status, train_travel_days,
         train_freights_allowed, train_fc_seats, train_sc_seats, train_observation_seats, train_sleeping_berths, train_total_weight) VALUES (:train_name, :route_id, :train_type, :train_active_status, :train_travel_days, :train_freights_allowed,
         :train_fc_seats, :train_sc_seats, :train_observation_seats, :train_sleeping_berths, :train_total_weight)");
            //   $query->bindValue(":train_id", $this->id);

            $query->bindValue(":train_name", $this->train_name);
            $query->bindValue(":route_id", $this->route_id);
            $query->bindValue(":train_type", $this->train_type);
            // // // $int = (int)$this->train_active_status;
            $query->bindValue(":train_active_status", $this->train_active_status);

            $trinTravalDays = implode(' ', $this->train_travel_days);
            $query->bindValue(":train_travel_days", $trinTravalDays);

            $query->bindValue(":train_freights_allowed", $this->train_freights_allowed);
            $query->bindValue(":train_fc_seats", $this->train_fc_seats);
            $query->bindValue(":train_sc_seats", $this->train_sc_seats);
            $query->bindValue(":train_observation_seats", $this->train_observation_seats);
            $query->bindValue(":train_sleeping_berths", $this->train_sleeping_berths);
            $query->bindValue(":train_total_weight", $this->train_total_weight);

            $query->execute();

            $this->setRoute();

            return 'success';

        }

        //  var_dump($validationState);
        return $validationState;

    }

    public function setRoute()
    {
        $query = App::$APP->db->pdo->prepare("UPDATE routes SET route_status = 1 wHERE route_id=:route_id");
        $query->bindValue(":route_id", $this->route_id);
        $query->execute();
    }

    public function getAvailableRoute()
    {
        $query = APP::$APP->db->pdo->prepare("SELECT route_id FROM routes WHERE route_status=0");
        $query->execute();
        $this->resultArray = $query->fetchAll(PDO::FETCH_ASSOC);

        return $this->resultArray;

    }

    public function trainSetValue($registerSetValueArray1)
    {
        if (empty($registerSetValueArray1['TrainNameError'])) {
            $registerSetValueArray1['train_name'] = $this->train_name;
        }
        if (empty($registerSetValueArray1['RoutIdError'])) {
            $registerSetValueArray1['route_id'] = $this->route_id;

        }
        if (empty($registerSetValueArray1['TravalDaysError'])) {
            $registerSetValueArray1['train_travel_days'] = $this->train_travel_days;
            //  var_dump($registerSetValueArray['train_travel_days']);
        }
        if (empty($registerSetValueArray1['TrainTypeError'])) {
            $registerSetValueArray1['train_type'] = $this->train_type;
        }
        if (empty($registerSetValueArray1['TrainFcError'])) {
            $registerSetValueArray1['train_fc_seats'] = $this->train_fc_seats;
        }
        if (empty($registerSetValueArray1['TrainScError'])) {
            $registerSetValueArray1['train_sc_seats'] = $this->train_sc_seats;
        }
        if (empty($registerSetValueArray1['TrainSleepingBError'])) {
            $registerSetValueArray1['train_sleeping_berths'] = $this->train_sleeping_berths;
        }
        if (empty($registerSetValueArray1['TrainweightError'])) {
            $registerSetValueArray1['train_total_weight'] = $this->train_total_weight;
        }
        if (empty($registerSetValueArray1['TrainActiveError'])) {
            $registerSetValueArray1['train_active_status'] = $this->train_active_status;
        }
        if (empty($registerSetValueArray1['TrainFreightError'])) {
            $registerSetValueArray1['train_freights_allowed'] = $this->train_freights_allowed;
        }
        if (empty($registerSetValueArray1['TrainobservationError'])) {
            $registerSetValueArray1['train_observation_seats'] = $this->train_observation_seats;
        }

        return $registerSetValueArray1;

    }

    private function runSanitization()
    {
        $this->train_name = $this->sanitizeFormtrainame($this->train_name);

    }

    private function sanitizeFormtrainame($inputText) //Asindu

    {
        $inputText = strtolower($inputText);
        $inputText = trim($inputText);
        $inputText = strip_tags($inputText); //remove html tags
        return ucfirst($inputText); // capitalize first letter
    }

    public function validateTrains($trains)
    {

        foreach ($trains as $key => $value) {
            $route = $value[0]['route_id'];
        }

        $currentdate = date('w');

        if ($currentdate == 0) {
            $crrent = 'sunday';
        }
        if ($currentdate == 1) {
            $crrent = 'monday';
        }
        if ($currentdate == 2) {
            $crrent = 'tuesday';
        }
        if ($currentdate == 3) {
            $crrent = 'wednesday';
        }
        if ($currentdate == 4) {
            $crrent = 'thursday';
        }
        if ($currentdate == 5) {
            $crrent = 'friday';
        }
        if ($currentdate == 6) {
            $crrent = 'saturday';
        }

        $this->results1 = $this->vTrains($crrent, $route);

        $query = APP::$APP->db->pdo->prepare("SELECT MAX(stops.arrival_time) AS maxlue,MIN(stops.arrival_time) AS minlue FROM stops RIGHT JOIN trains ON trains.route_id = stops.route_id WHERE stops.route_id=$route");
        $query->bindValue(":route_id", $route);
        $query->execute();
        $this->resultArray = $query->fetchAll(PDO::FETCH_ASSOC);

        $this->results = $this->validateTrainsMin($this->resultArray, $this->results1);
        return $this->results;

    }
    public function validateTrainsMin($t, $results1)
    {

        foreach ($t as $key => $value) {
            $min = $value['minlue'];
            $max = $value['maxlue'];
        }

        $currentTime = date('H:i:s');

        $results2 = 0;

        $date1 = DateTime::createFromFormat('H:i:s', $max);
        $date2 = DateTime::createFromFormat('H:i:s', $currentTime);
        $date3 = DateTime::createFromFormat('H:i:s', $min);

        if ($date2 > $date3 && $date2 < $date1) {
            $results2 = 1;
        }
        if (($results2 == 1) && !empty($results1)) {

            return $results1;

        }

    }

    public function vTrains($crrent, $route)
    {

        $query = APP::$APP->db->pdo->prepare("SELECT * FROM trains WHERE train_travel_days LIKE '%{$crrent}%' AND route_id=:route_id");
        $query->bindValue(":route_id", $route);
        $query->execute();
        $this->resultArray = $query->fetchAll(PDO::FETCH_ASSOC);

        return $this->resultArray;

    }

    /////routes/////////

    public function getManagRoutes()
    {
        $query = APP::$APP->db->pdo->prepare("SELECT * FROM stops JOIN stations ON stops.station_id = stations.station_id JOIN routes ON stops.route_id = routes.route_id WHERE stops.route_id=:route_id ORDER BY stops.path_id ASC");
        $query->bindValue(":route_id", $this->id);
        $query->execute();
        $this->resultArray['routes'] = $query->fetchAll(PDO::FETCH_ASSOC);

        return $this->resultArray;

    }

    public function getRoutes()
    {
        $query = APP::$APP->db->pdo->prepare("SELECT o.route, sid, did FROM (SELECT routes.route_id as route,stations.station_name as sid FROM stations INNER JOIN routes WHERE routes.start_station_id=stations.station_id) as o INNER JOIN (SELECT routes.route_id as route,stations.station_name as did FROM stations INNER JOIN routes WHERE routes.dest_station_id=stations.station_id) as p WHERE p.route=o.route");
        $query->execute();
        $this->resultArray['routes'] = $query->fetchAll(PDO::FETCH_ASSOC);

        return $this->resultArray;

    }

    public function searchRouteDetails()
    {
      
        $query = APP::$APP->db->pdo->prepare("SELECT * FROM (SELECT o.route, sid, did FROM (SELECT routes.route_id as route,stations.station_name as sid FROM stations INNER JOIN routes WHERE routes.start_station_id=stations.station_id) as o INNER JOIN (SELECT routes.route_id as route,stations.station_name as did FROM stations INNER JOIN routes WHERE routes.dest_station_id=stations.station_id) as p WHERE p.route=o.route) AS t
         WHERE t.sid LIKE '%{$this->searchTrain}%' OR t.did LIKE '%{$this->searchTrain}%' OR t.route=:routeName");
        $query->bindValue(":routeName", $this->searchTrain);
        $query->execute();
        $this->resultArray['routes'] = $query->fetchAll(PDO::FETCH_ASSOC);
        return $this->resultArray;
    }

    public function getMyRoutsStations()
    {
        $query = APP::$APP->db->pdo->prepare("SELECT stations.station_name FROM stations");
        // $query->bindValue(":route_id", $this->index1);
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
                $validationState = $updateTrainrValidation->routeValidators($this->index2, $stations[$j]["arrTime"], $stations[$j]["deptTime"], 0, $stations[$j]["pathId"], $stations,$stations[$j]["stationName"],$j);
              
                // $this->routeValidators($this->index2, $stations[$j]["arrTime"], $stations[$j]["deptTime"],0, $stations[$j]["pathId"]);

            } else {
                $updateTrainrValidation = new TrainFormValidation();
                $validationState = $updateTrainrValidation->routeValidators($this->index2, $stations[$j]["arrTime"], $stations[$j]["deptTime"], $getresult[0]["station_id"], $stations[$j]["pathId"], $stations,$stations[$j]["stationName"],$j);
             
                // $this->routeValidators($this->index2, $stations[$j]["arrTime"], $stations[$j]["deptTime"], $getresult[0]["station_id"], $stations[$j]["pathId"]);
            }
            if(!empty($validationState)){
                break;
            }
         
        }
      
     

        if (empty($validationState)) {

            for ($i = 0; $i < $length; $i++) {
                $stations[$i]["stationName"]= $this->sanitizeFormUsername1($stations[$i]["stationName"]);

                
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

    private function sanitizeFormUsername1($inputText)
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

    public function uploadNews()
    {
        $file_name = $_FILES['photo']['name'];
        $file_type = $_FILES['photo']['type'];
        $file_size = $_FILES['photo']['size'];
        $temp_name = $_FILES['photo']['tmp_name'];
        $upload_to = '../public/img/NewsImages/';

        if($file_type == 'image/jpeg' ||  $file_type == 'image/jpg' ||  $file_type == 'image/png'){
            $file_uploaded = move_uploaded_file($temp_name,$upload_to . $file_name);

            $this->news_headline = $this->sanitizeFormStreet($this->news_headline);
            $this->detail = $this->sanitizeFormStreet($this->detail);

            $query = APP::$APP->db->pdo->prepare("INSERT INTO news_feed (News_type,Headline,Content,NewsImage) VALUES (:News_type,:Headline,:Content,:file_nam)");
            $query->bindValue(":News_type", $this->details_type);
            $query->bindValue(":Headline", $this->news_headline);
            $query->bindValue(":Content", $this->detail);
            $query->bindValue(":file_nam", $file_name);
            $query->execute();
            
        }else{
            $this->imageError = "Only JPEG/PNG/JPG are allowed.";
        }

       
        
        
        if(!empty($this->imageError)){
            return $this->imageError;
        }
    }

    public function getNews(){
        $query = APP::$APP->db->pdo->prepare("SELECT * FROM news_feed order by News_id DESC LIMIT 6");
        $query->execute();
        $this->resultArray = $query->fetchAll(PDO::FETCH_ASSOC);
        return $this->resultArray;
    }

    public function getMyNews(){
     
       $query = APP::$APP->db->pdo->prepare("SELECT * FROM news_feed WHERE News_id  = :content");
       $query->bindValue(":content", $this->id);
       $query->execute();
       $this->resultArray =$query->fetchAll(PDO::FETCH_ASSOC);
       return $this->resultArray;

    }

    public function getAllNews(){
        $query = APP::$APP->db->pdo->prepare("SELECT * FROM news_feed order by News_id DESC");
        $query->execute();
        $this->resultArray =$query->fetchAll(PDO::FETCH_ASSOC);

        // $query1 = APP::$APP->db->pdo->prepare("SELECT * FROM news_feed WHERE News_type  = 'ticket_price' order by News_id DESC LIMIT 2");
        // $query1->execute();
        // $resultArray2 =$query1->fetchAll(PDO::FETCH_ASSOC);

        // $query2 = APP::$APP->db->pdo->prepare("SELECT * FROM news_feed WHERE News_type  = 'ticket_price' order by News_id DESC LIMIT 2");
        // $query2->execute();
        // $resultArray3 =$query2->fetchAll(PDO::FETCH_ASSOC);
        // $this->resultArray = array_merge($resultArray1,$resultArray2,$resultArray3);
        return $this->resultArray;
    }

}
