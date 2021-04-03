<?php

include_once "../classes/core/Model.php";
include_once "HandlerFactory.php";

class FreightModel extends Model
{
    public $start;
    public $destination;
    public $metal_price;
    public $timber;
    public $agricultural_products;
    public $textile_products;
    public $others;
    public $start_station_id;
    public $dest_station_id;
    public $route_id;
    public $freight_price_array = [];
    public $freight_results = [];

    public function getFreightPrice()
    {

        $query = APP::$APP->db->pdo->prepare("SELECT station_id FROM stations WHERE station_name=:start_station ");
        $query->bindValue(":start_station", $this->start);
        $query->execute();
        $this->start_station_id = $query->fetchAll(PDO::FETCH_ASSOC);
//var_dump($this->destination);

        $query1 = APP::$APP->db->pdo->prepare("SELECT station_id FROM stations WHERE station_name=:dest_station ");
        $query1->bindValue(":dest_station", $this->destination);
        $query1->execute();
        $this->dest_station_id = $query1->fetchAll(PDO::FETCH_ASSOC);
//var_dump($this->dest_station_id);

        $query2 = APP::$APP->db->pdo->prepare("SELECT route_id FROM routes WHERE start_station_id=:start_station AND dest_station_id=:dest_station LIMIT 1");
        $query2->bindValue(":dest_station", $this->dest_station_id[0]['station_id']);
        $query2->bindValue(":start_station", $this->start_station_id[0]['station_id']);
        $query2->execute();
        $this->route_id = $query2->fetchAll(PDO::FETCH_ASSOC);

        $query3 = APP::$APP->db->pdo->prepare("SELECT metal,agricultural_products,textile_products,timber FROM freight_price WHERE route_id=:route_id");
        $query3->bindValue(":route_id", $this->route_id[0]['route_id']);
        $query3->execute();
        $this->freight_results = $query3->fetchAll(PDO::FETCH_ASSOC);
        $this->freight_price_array['freight']['metal'] = $this->freight_results[0]['metal'];
        $this->freight_price_array['freight']['agricultural_products'] = $this->freight_results[0]['agricultural_products'];
        $this->freight_price_array['freight']['textile_products'] = $this->freight_results[0]['textile_products'];
        $this->freight_price_array['freight']['timber'] = $this->freight_results[0]['timber'];

        $this->freight_price_array['freight']['start'] = $this->start;
        $this->freight_price_array['freight']['destination'] = $this->destination;
// var_dump($this->freight_price_array);
        return $this->freight_price_array;

    }
}
