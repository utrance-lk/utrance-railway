<?php

include_once "../classes/core/Model.php";

class ViewModel extends Model{

    public $from2;
    public $to2;
    public $when;

    public function getTours() {

        $fromSearchId = APP::$APP->db->pdo->prepare("SELECT station_id FROM stations WHERE station_name=:from");
        $toSearchId = APP::$APP->db->pdo->prepare("SELECT station_id FROM stations WHERE station_name=:to");

        $fromSearchId->bindValue(":from", $this->from2);
        $toSearchId->bindValue(":to", $this->to2);

        $fromSearchId->execute();
        $toSearchId->execute();


        $fromSearchId = $fromSearchId->fetchAll(PDO::FETCH_ASSOC);
        $toSearchId = $toSearchId->fetchAll(PDO::FETCH_ASSOC);

        $fromId;
        $toId;

        foreach($fromSearchId as $row) {
            $fromId = $row['station_id'];
        }
        foreach($toSearchId as $row) {
            $toId = $row['station_id'];
        }

        $fromSearchRouteId = APP::$APP->db->pdo->prepare("SELECT route_id FROM stops WHERE station_id=:from");

        $fromSearchRouteId->bindValue(":from", $fromId);
        $fromSearchRouteId->execute();

        $fromSearchRouteId = $fromSearchRouteId->fetchAll(PDO::FETCH_ASSOC);

        foreach($fromSearchRouteId as $row) {
            var_dump($row);
        }

    }


}