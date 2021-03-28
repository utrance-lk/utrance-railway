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
    public $index1;
    public $index2;
    public $id;
    public $date;
    public $searchUserByNameOrId;


    public function getBookinDetails(){
        $query = APP::$APP->db->pdo->prepare("SELECT * FROM seat_availability INNER JOIN trains ON seat_availability.train_id=trains.train_id WHERE sa_date = :sa_date");
        $query->bindValue(":sa_date", $this->index1);
        $query->execute();
        $this->result = $query->fetchAll(PDO::FETCH_ASSOC);

        return $this->result;

    }

    public function getDetails(){
        
        $query = APP::$APP->db->pdo->prepare("SELECT * FROM (SELECT train_name, ticket_booking.train_id, customer_id, train_date, created_at FROM ticket_booking INNER JOIN trains ON ticket_booking.train_id=trains.train_id) AS a INNER JOIN users ON users.id=a.customer_id
        WHERE train_date = :train_date AND train_id = :id");
        $query->bindValue(":id",$this->id);
        $query->bindValue(":train_date",$this->date);
        $query->execute();
        $this->result = $query->fetchAll(PDO::FETCH_ASSOC);
      
        return $this->result;

    }

    public function searchBookingTrain(){
       
        $query = APP::$APP->db->pdo->prepare("SELECT * FROM seat_availability INNER JOIN trains ON seat_availability.train_id=trains.train_id WHERE trains.train_id LIKE '%{$this->searchUserByNameOrId}%' OR train_name LIKE '%{$this->searchUserByNameOrId}%'");
        $query->bindValue(":sa_date", $this->searchUserByNameOrId);
        $query->execute();
        $this->result = $query->fetchAll(PDO::FETCH_ASSOC);
        return $this->result;
        
    }

    // public function newsearchBookingTrain(){
      
    //     $query = APP::$APP->db->pdo->prepare("SELECT * FROM seat_availability INNER JOIN trains ON seat_availability.train_id=trains.train_id WHERE trains.train_id LIKE '%{$this->index1}%' OR train_name LIKE '%{$this->index1}%' AND train_date = :train_date");
    //     $query->bindValue(":train_date", $this->index2);
    //     $query->execute();
    //     $this->result = $query->fetchAll(PDO::FETCH_ASSOC);
    //     return $this->result;
        
    // }
}
