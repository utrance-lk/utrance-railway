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
    public $othes;


    public function getFreightPrice(){
        
    }
}