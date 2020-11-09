<?php

include_once "../classes/core/Model.php";

class ViewModel extends Model
{

    public $from;
    public $to;
    public $when;
    public $resultsArr;

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

            // 1) search for a direct path
            $this->resultsArr['directPaths'] = $this->searchForDirectPath($fromId, $toId);

            // 2) search for an intersection
            $this->resultsArr['intersections'] = $this->searchForIntersection($fromId, $toId);

            return $this->resultsArr;

        } else {
            echo 'station not found!';
            return 'station not found!!';
        }

    }

    protected function searchForDirectPath($fromId, $toId)
    {
        $searchDirectPath = APP::$APP->db->pdo->prepare(
            "SELECT fssid, fssdt, fsspi, tseid, tseat, tsepi, fssn, tsen, train_name, timediff(tseat, fssdt) as total_time from
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
            on to_station_name.route_id = trains.route_id
            order by fssdt"
        );

        $searchDirectPath->bindValue(":from", $fromId);
        $searchDirectPath->bindValue(":to", $toId);

        $searchDirectPath->execute();

        return $searchDirectPath->fetchAll(PDO::FETCH_ASSOC);
    }

    protected function searchForIntersection($fromId, $toId)
    {
        $seachInterectionPath = APP::$APP->db->pdo->prepare(
            "SELECT isid, from_route_id, fssid, fssdt, fsiat, tsidt, tseat, tseid, to_route_id, isn, fssn, tsen, frtn, train_name as trtn, timediff(tsidt, fsiat) as wait_time, timediff(fsiat, fssdt) as ftitt, timediff(tseat, tsidt) as iterr from
                (select isid, from_route_id, fssid, fssdt, fsiat, tsidt, tseat, tseid, to_route_id, isn, fssn, tsen, train_name as frtn from
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
                                    where fsspi <= fsipi and tsepi >= tsipi and fsiat <= tsidt and fssid != isid and isid != tseid  and (from_route_id != to_route_id)) as big_table
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
            on to_route_id = trains.route_id
            order by fssdt");

        $seachInterectionPath->bindValue(":from", $fromId);
        $seachInterectionPath->bindValue(":to", $toId);

        $seachInterectionPath->execute();

        return $seachInterectionPath->fetchAll(PDO::FETCH_ASSOC);
    }

}
