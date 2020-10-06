<?php

include_once "../classes/core/Model.php";

class ViewModel extends Model{

    public $from;
    public $to;
    public $date;

    public function getTours() {

        $fromId = APP::$APP->db->pdo->prepare("SELECT station_id FROM stations WHERE station_name=:from");
        $toId = APP::$APP->db->pdo->prepare("SELECT station_id FROM stations WHERE station_name=:to");

        $fromId->bindValue(":from", $this->from);
        $toId->bindValue(":to", $this->to);

        $fromId = $fromId->execute();
        $toId = $toId->execute();

        $fromRouteId = APP::$APP->db->pdo->prepare("SELECT route_id FROM stops WHERE station_id=:fromId");
        var_dump($fromRouteId);

    }


}