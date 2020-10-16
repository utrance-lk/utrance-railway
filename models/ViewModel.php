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

        
        if($fromSearchId && $toSearchId) {

            $fromId;
            $toId;

            foreach ($fromSearchId as $row) {
                $fromId = $row['station_id'];
            }

            foreach ($toSearchId as $row) {
                $toId = $row['station_id'];
            }
            
            // 1) search for a direct path
            $this->searchDirectPath($fromId, $toId);
            
        } else {
            echo 'station not found!';
            return 'station not found!!';
        }

    }

    protected function searchDirectPath($fromId, $toId) {
        $searchDirectPath = APP::$APP->db->pdo->prepare(
                "SELECT * FROM
                    (SELECT fromt.route_id AS route_id,
                            fromt.station_id AS fssid, fromt.departure_time AS fssdt, fromt.path_id AS fsspi,
                            tot.station_id AS tseid, tot.arrival_time AS tseat, tot.path_id AS tsepi
                    FROM
                        (SELECT route_id, path_id, departure_time, station_id FROM stops WHERE station_id =:from) fromt
                    INNER JOIN
                        (SELECT route_id, path_id, arrival_time, station_id FROM stops WHERE station_id =:to) tot
                    ON fromt.route_id = tot.route_id) AS matching_table
                WHERE fsspi <= tsepi
            ");

        $searchDirectPath->bindValue(":from", $fromId);
        $searchDirectPath->bindValue(":to", $toId);

        $searchDirectPath->execute();

        $searchDirectPath = $searchDirectPath->fetchAll(PDO::FETCH_ASSOC);

        foreach ($searchDirectPath as $row) {
            var_dump($row);
        echo "</br>";
        }

    }


}