<?php

include_once "../classes/core/Model.php";
include_once "HandlerFactory.php";

class BookingModel extends Model
{

    public $customer_id;
    public $train_date;
    public $train_id;
    public $from_station;
    public $to_station;
    public $passengers;
    public $class;
    public $base_price;
    public $total_amount;
    public $other_booking;
    public $when;

    public function getAvailableSeatsCount()
    {
        $query = APP::$APP->db->pdo->prepare("SELECT sa_first_class, sa_second_class FROM seat_availability WHERE train_id=:train_id AND sa_date=:when");
        $query->bindValue(":train_id", $this->train_id);
        $query->bindValue(":when", $this->when);
        $query->execute();

        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function createBooking()
    {
        $query = APP::$APP->db->pdo->prepare("INSERT INTO ticket_booking (customer_id, train_date, train_id, from_station, to_station, passengers, class, base_price, total_amount, other_booking) VALUES (:customer_id, :train_date, :train_id, :from_station, :to_station, :passengers, :class, :base_price, :total_amount, :other_booking)");
        $query->bindValue(":customer_id", $this->customer_id);
        $query->bindValue(":train_date", $this->train_date);
        $query->bindValue(":train_id", $this->train_id);
        $query->bindValue(":from_station", $this->from_station);
        $query->bindValue(":to_station", $this->to_station);
        $query->bindValue(":passengers", $this->passengers);
        $query->bindValue(":class", $this->class);
        $query->bindValue(":base_price", $this->base_price);
        $query->bindValue(":total_amount", $this->total_amount);
        $query->bindValue(":other_booking", $this->other_booking);

        $query->execute();

    }

}
