<?php

include_once "../classes/core/Model.php";

class ViewModel extends Model{

    public $from2;
    public $to2;
    public $when;
    public $resultsArr;

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
            $resultsArr['directPaths'] = $this->searchForDirectPath($fromId, $toId);

            // 2) search for an intersection
            $resultsArr['intersections'] = $this->searchForIntersection($fromId, $toId);

            return $resultsArr;
            
        } else {
            echo 'station not found!';
            return 'station not found!!';
        }

    }

    protected function searchForDirectPath($fromId, $toId) {
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

        return $searchDirectPath->fetchAll(PDO::FETCH_ASSOC);

        // foreach ($searchDirectPath as $row) {
        //     var_dump($row);
        // echo "</br>";
        // }

    }

    protected function searchForIntersection($fromId, $toId) {
        $seachInterectionPath = APP::$APP->db->pdo->prepare(
            "SELECT * from
                (SELECT * FROM
                    (SELECT fromta.fsiid AS isid,
                        fromta.route_id AS from_route_id, fromta.fssid AS fssid, fromta.fssdt AS fssdt, fromta.fsspi AS fsspi, fromta.fsiat AS fsiat, fromta.fsipi AS fsipi,
                         tota.tsipi AS tsipi, tota.tsidt AS tsidt, tota.tsepi AS tsepi, tota.tseat AS tseat, tota.tseid AS tseid, tota.route_id AS to_route_id FROM
                            (SELECT frt.route_id AS route_id, frt.station_id AS fssid, frt.path_id AS fsspi, frt.departure_time AS fssdt, s.station_id AS fsiid, s.path_id AS fsipi, s.arrival_time AS fsiat FROM
                                (SELECT route_id, path_id, departure_time, station_id FROM stops WHERE station_id =:from) frt
                            LEFT JOIN stops s
                            ON frt.route_id = s.route_id) fromta
                    INNER JOIN
                            (SELECT trt.route_id AS route_id, trt.station_id AS tseid, trt.path_id AS tsepi, trt.arrival_time AS tseat,  s.station_id AS tsiid, s.path_id AS tsipi, s.departure_time AS tsidt FROM
                                (SELECT route_id, path_id, arrival_time, station_id FROM stops WHERE station_id =:to) trt
                            LEFT JOIN stops s
                            ON trt.route_id = s.route_id) tota
                    ON fromta.fsiid = tota.tsiid) matching_station
                WHERE fsspi <= fsipi AND tsepi >= tsipi AND fsiat <= tsidt AND fssid != isid AND isid != tseid  AND (from_route_id != to_route_id)) AS big_table
            LEFT JOIN
                (SELECT route_id AS path_indexer_route_id, path_id AS fsdnppi FROM stops WHERE station_id =:to) path_indexer
            ON path_indexer.path_indexer_route_id = big_table.from_route_id
            WHERE path_indexer_route_id IS NULL");


        $seachInterectionPath->bindValue(":from", $fromId);
        $seachInterectionPath->bindValue(":to", $toId);

        $seachInterectionPath->execute();

        return $seachInterectionPath->fetchAll(PDO::FETCH_ASSOC);

        // foreach($seachInterectionPath as $row) {
        //     // var_dump($row);
        //     echo "</br>";
        // }
    }


}