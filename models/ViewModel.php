<?php

include_once "../classes/core/Model.php";

class ViewModel extends Model
{

    public $from;
    public $to;
    public $when;
    public $resultsArr;
    public $train_id;
    public $dest_station;
    public $start_station;
    public $result_array;
    public $station_value_set;
    public $station_final_value_set;
    public $train_basic_deatils;
    public $searchTrain;
    public $searchRoute;
    public $index2;
    public $active_status = 1;
    public $train_name;
    public $train_type;

    public function rules()
    {
        //implement this
    }

    public function getTours()
    {

        $fromSearchId = APP::$APP->db->pdo->prepare("SELECT station_id FROM stations WHERE station_name=:from");
        $toSearchId = APP::$APP->db->pdo->prepare("SELECT station_id FROM stations WHERE station_name=:to");

        $fromSearchId->bindValue(":from", $this->from);
        $toSearchId->bindValue(":to", $this->to);

        $fromSearchId->execute();
        $toSearchId->execute();

        $fromSearchId = $fromSearchId->fetchAll(PDO::FETCH_ASSOC);
        $toSearchId = $toSearchId->fetchAll(PDO::FETCH_ASSOC);

        if ($fromSearchId && $toSearchId) {

            $fromId;
            $toId;

            foreach ($fromSearchId as $row) {
                $fromId = $row['station_id'];
            }

            foreach ($toSearchId as $row) {
                $toId = $row['station_id'];
            }

            $unixTimestamp = strtotime($this->when);
            $dayOfWeek = strtolower(date("l", $unixTimestamp));

            // 1) search for a direct path
            $this->resultsArr['directPaths'] = $this->searchForDirectPath($fromId, $toId, $dayOfWeek);

            $i = 0;
            foreach($this->resultsArr['directPaths'] as $unit) {
                $this->resultsArr['directPaths'][$i]['when'] = $this->when;
                $i++;
            }

            // 2) search for an intersection
            $this->resultsArr['intersections'] = $this->searchForIntersection($fromId, $toId, $dayOfWeek);
            $i = 0;
            foreach($this->resultsArr['intersections'] as $unit) {
                $this->resultsArr['intersections'][$i]['when'] = $this->when;
                $i++;
            }

            return $this->resultsArr;

        } else {
            return false;
        }

    }
//Ashika
    public function getTrainSchedules()
    {

        $query = APP::$APP->db->pdo->prepare("SELECT route_id,train_name,train_travel_days FROM trains WHERE train_id=:train_id");
        $query->bindValue(":train_id", $this->train_id);
        $query->execute();
        $this->resultArray = $query->fetchAll(PDO::FETCH_ASSOC);
        $this->train_basic_details = $this->findTrainDetails($this->resultArray);

        $query = APP::$APP->db->pdo->prepare("SELECT station_id  FROM stops WHERE route_id=:route_id");
        $query->bindValue(":route_id", $this->resultArray[0]['route_id']);
        $query->execute();
        $this->station_value_set['get_train_details'] = $query->fetchAll(PDO::FETCH_ASSOC);

        $query = APP::$APP->db->pdo->prepare("SELECT stn.station_name,stn.longitude,stn.latitude,stn.station_id,stp.arrival_time,stp.departure_time FROM stations stn  INNER JOIN stops stp ON stp.station_id=stn.station_id  WHERE stp.route_id=:route_id ORDER BY stp.path_id ASC");
        $query->bindValue(":route_id", $this->resultArray[0]['route_id']);
        $query->execute();
        $this->station_final_value_set['get_train_details'] = $query->fetchAll(PDO::FETCH_ASSOC);

        $this->station_final_value_set['x']['train_name'] = $this->train_basic_details[0]['train_name'];
        $this->station_final_value_set['x']['train_travel_days'] = $this->train_basic_details[0]['train_travel_days'];
        $this->station_final_value_set['x']['total_time'] = $this->train_basic_details['total_time'][0]['total_time'];
        $this->station_final_value_set['x']['start_station'] = $this->train_basic_details['start_station'][0]['station_name'];
        $this->station_final_value_set['x']['dest_station'] = $this->train_basic_details['dest_station'][0]['station_name'];

        return $this->station_final_value_set;

    }

    public function getAllTrainResults()
    {

        $query = APP::$APP->db->pdo->prepare("SELECT train_id, train_name, train_type, train_active_status FROM trains WHERE train_active_status=1");

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

    public function findTrainDetails($array1)
    {
        $query = APP::$APP->db->pdo->prepare("SELECT total_time FROM routes WHERE route_id=:route_id");
        $query->bindValue(":route_id", $array1[0]['route_id']);
        $query->execute();
        $array1['total_time'] = $query->fetchAll(PDO::FETCH_ASSOC);

        $query = APP::$APP->db->pdo->prepare("SELECT start_station_id,dest_station_id FROM routes WHERE route_id=:route_id");
        $query->bindValue(":route_id", $array1[0]['route_id']);
        $query->execute();
        $array1['start_dest'] = $query->fetchAll(PDO::FETCH_ASSOC);
        $query = APP::$APP->db->pdo->prepare("SELECT station_name,longitude,latitude FROM stations WHERE station_id=:station_id");
        $query->bindValue(":station_id", $array1['start_dest'][0]['start_station_id']);
        $query->execute();
        $array1['start_station'] = $query->fetchAll(PDO::FETCH_ASSOC);

        $query = APP::$APP->db->pdo->prepare("SELECT station_name,longitude,latitude FROM stations WHERE station_id=:station_id");
        $query->bindValue(":station_id", $array1['start_dest'][0]['dest_station_id']);
        $query->execute();
        $array1['dest_station'] = $query->fetchAll(PDO::FETCH_ASSOC);

        return $array1;
    }

    protected function searchForDirectPath($fromId, $toId, $dayOfWeek)
    {

        $dayString = "%" . $dayOfWeek . "%";

        $searchDirectPath = APP::$APP->db->pdo->prepare(
            "SELECT fssid, fssdt, fsspi, tseid, tseat, tsepi, fssn, tsen, train_only.train_id as train_id, train_name, train_type, total_time from
                (SELECT fssid, fssdt, fsspi, tseid, tseat, tsepi, fssn, tsen, train_id, train_name, train_type, timediff(tseat, fssdt) as total_time from
                    (select route_id, fssid, fssdt, fsspi, tseid, tseat, tsepi, fssn, station_name as tsen from
                        (select route_id, fssid, fssdt, fsspi, tseid, tseat, tsepi, station_name as fssn from
                            (select * from
                                (select fromt.route_id as route_id,
                                        fromt.station_id as fssid, fromt.departure_time as fssdt, fromt.path_id as fsspi,
                                        tot.station_id as tseid, tot.arrival_time as tseat, tot.path_id as tsepi
                                from
                                    (select route_id, path_id, departure_time, station_id from stops where station_id = :from) fromt
                                inner join
                                    (select route_id, path_id, arrival_time, station_id from stops where station_id = :to) tot
                                on fromt.route_id = tot.route_id) matching_table
                            where fsspi <= tsepi) as basic_table
                        inner join stations
                        on basic_table.fssid = stations.station_id) from_station_name
                    inner join stations
                    on from_station_name.tseid = stations.station_id) to_station_name
                inner join trains
                on to_station_name.route_id = trains.route_id) train_only
            inner join
                (select train_id, train_travel_days from trains where train_travel_days like :dayOfWeek and train_active_status = 1) train_days
            on train_only.train_id = train_days.train_id    
            order by fssdt"
        );

        $searchDirectPath->bindValue(":from", $fromId);
        $searchDirectPath->bindValue(":to", $toId);
        $searchDirectPath->bindValue(":dayOfWeek", $dayString);

        $searchDirectPath->execute();

        return $searchDirectPath->fetchAll(PDO::FETCH_ASSOC);
    }

    protected function searchForIntersection($fromId, $toId, $dayOfWeek)
    {

        $dayString = "%" . $dayOfWeek . "%";

        $seachInterectionPath = APP::$APP->db->pdo->prepare(
            "SELECT isid, from_route_id, fssid, fssdt, fsiat, tsidt, tseat, tseid, to_route_id, isn, fssn, tsen, frtn, frti, trti, trtn, frtt, trtt, wait_time, ftitt, iterr from
                (SELECT isid, from_route_id, fssid, fssdt, fsiat, tsidt, tseat, tseid, to_route_id, isn, fssn, tsen, frtn, frti, trti, trtn, frtt, trtt, wait_time, ftitt, iterr from
                    (SELECT isid, from_route_id, fssid, fssdt, fsiat, tsidt, tseat, tseid, to_route_id, isn, fssn, tsen, frtn, frti, train_id as trti,train_name as trtn, frtt,  train_type as trtt, timediff(tsidt, fsiat) as wait_time, timediff(fsiat, fssdt) as ftitt, timediff(tseat, tsidt) as iterr from
                        (select isid, from_route_id, fssid, fssdt, fsiat, tsidt, tseat, tseid, to_route_id, isn, fssn, tsen, train_id as frti, train_name as frtn, train_type as frtt from
                            (select isid, from_route_id, fssid, fssdt, fsiat, tsidt, tseat, tseid, to_route_id, isn, fssn, station_name as tsen from
                                (select isid, from_route_id, fssid, fssdt, fsiat, tsidt, tseat, tseid, to_route_id, isn, station_name as fssn from
                                    (select isid, from_route_id, fssid, fssdt, fsiat, tsidt, tseat, tseid, to_route_id, station_name as isn from
                                        (select * from
                                            (select * from
                                                (select fromta.fsiid as isid,
                                                        fromta.route_id as from_route_id, fromta.fssid as fssid, fromta.fssdt as fssdt, fromta.fsspi as fsspi, fromta.fsiat as fsiat, fromta.fsipi as fsipi,
                                                        tota.tsipi as tsipi, tota.tsidt as tsidt, tota.tsepi as tsepi, tota.tseat as tseat, tota.tseid as tseid, tota.route_id as to_route_id from
                                                        (select frt.route_id as route_id, frt.station_id as fssid, frt.path_id as fsspi, frt.departure_time as fssdt, s.station_id as fsiid, s.path_id as fsipi, s.arrival_time as fsiat from
                                                            (select route_id, path_id, departure_time, station_id from stops where station_id =:from) frt
                                                        left join stops s
                                                        on frt.route_id = s.route_id) fromta
                                                    inner join
                                                        (select trt.route_id as route_id, trt.station_id as tseid, trt.path_id as tsepi, trt.arrival_time as tseat,  s.station_id as tsiid, s.path_id as tsipi, s.departure_time as tsidt from
                                                            (select route_id, path_id, arrival_time, station_id from stops where station_id =:to) trt
                                                        left join stops s
                                                        on trt.route_id = s.route_id) tota
                                                    on fromta.fsiid = tota.tsiid) matching_station
                                            where fsspi <= fsipi and tsepi >= tsipi and fsiat <= tsidt and fssdt < fsiat and tsidt < tseat and fssid != isid and isid != tseid  and (from_route_id != to_route_id)) as big_table
                                        left join
                                            (select route_id as path_indexer_route_id, path_id as fsdnppi from stops where station_id =:to) path_indexer
                                        on path_indexer.path_indexer_route_id = big_table.from_route_id
                                        where path_indexer_route_id is null) basic_table
                                    inner join stations
                                    on isid = stations.station_id) basic_table_2
                                inner join stations
                                on fssid = stations.station_id) basic_table_3
                            inner join stations
                            on tseid = stations.station_id) basic_table_4
                        inner join trains
                        on from_route_id = trains.route_id) basic_table_5
                    inner join trains
                    on to_route_id = trains.route_id) train_only
                inner join 
                    (select train_id, train_travel_days from trains where train_travel_days like :dayOfWeek and train_active_status = 1) train_days1
                on train_only.frti = train_days1.train_id) day_include1
            inner join
                (select train_id, train_travel_days from trains where train_travel_days like :dayOfWeek and train_active_status = 1) train_days2
            on day_include1.trti = train_days2.train_id
            order by fssdt");

        $seachInterectionPath->bindValue(":from", $fromId);
        $seachInterectionPath->bindValue(":to", $toId);
        $seachInterectionPath->bindValue(":dayOfWeek", $dayString);

        $seachInterectionPath->execute();

        return $seachInterectionPath->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getTrainStations($trainId, $routeId)
    {

        $getRouteIdFromTrainId = APP::$APP->db->pdo->prepare('SELECT route_id FROM trains WHERE train_id=:id');
        $getRouteIdFromTrainId->bindValue(':id', $trainId);
        $getRouteIdFromTrainId->execute();

        return $getRouteIdFromTrainId->fetch(PDO::FETCH_ASSOC);

    }

    public function getStations() {
        $query=APP::$APP->db->pdo->prepare("SELECT station_name FROM stations");
        $query->execute();
        $stationsArray = $query->fetchAll(PDO::FETCH_ASSOC);
        $stations = [];
        foreach ($stationsArray as $key => $value) {
            array_push($stations, $value['station_name']);
        }
        return $stations;
    }


}
