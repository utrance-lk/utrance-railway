<?php

include_once "../classes/core/Model.php";

class ViewModel extends Model{

    public $from;
    public $to;
    public $date;

    public function getTours() {

        $from = APP::$APP->db->pdo->prepare("SELECT station_id FROM stations WHERE station_name=:from");
        $to = APP::$APP->db->pdo->prepare("SELECT station_id FROM stations WHERE station_name=:to");
        

    }


}