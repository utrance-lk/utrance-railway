<?php

include_once "../classes/core/Model.php";
include_once "HandlerFactory.php";

class BookingModel extends Model
{

    public $customer_id;
    public $train_date;
    public $train_id;
    public $passengers;
    public $class;
    public $base_price;
    public $total_amount;
    public $other_booking;
}
