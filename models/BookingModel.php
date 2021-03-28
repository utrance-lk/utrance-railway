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
    public $id1;
    public $id2;
    public $base_price;
    public $total_amount;
    public $other_booking;
    public $getAllMyBookingArray=[];
    public $interSectArray=[];
    public $getBooking=[];
    public $bookArray=[];




    public function getAllMyBookings(){
        $this->customer_id = App::$APP->activeUser()['id'];

        $query = App::$APP->db->pdo->prepare("SELECT tb.customer_id,tb.id,tb.other_booking FROM ticket_booking tb  GROUP BY other_booking HAVING COUNT(tb.other_booking) >1");
        $query->execute();
        $this->getAllMyBookingArray["duplicate_other_bookings"] = $query->fetchAll(PDO::FETCH_ASSOC);
        $this->bookArray=$this->findIntersect($this->getAllMyBookingArray);
        

        $query = App::$APP->db->pdo->prepare("SELECT tb.customer_id,tb.other_booking FROM ticket_booking tb  GROUP BY other_booking HAVING COUNT(tb.other_booking) =1");
        $query->execute();
        $this->getAllMyBookingArray["no_duplicates"] = $query->fetchAll(PDO::FETCH_ASSOC);
        $this->bookArray=$this->findDirect($this->getAllMyBookingArray);
        
        
        
        
        
       
        //var_dump($this->bookArray);
        return $this->bookArray;

        
        
        

    }

    public function getBookedTourIntersect(){
        var_dump($this->id2);
        $query = App::$APP->db->pdo->prepare("SELECT tb.from_station,tb.to_station,tb.base_price,,tb.total_amount,tb.class,tb.passengers,tr.train_type,tr.train_name FROM ticket_booking tb INNER JOIN trains tr ON tb.train_id=tr.train_id INNER JOIN stops st ON  WHERE tb.customer_id=:cus_id");
        $query->execute();

    }
    public function getBookedTourDirect(){

    }

    private function findIntersect($arryIntersect){
        $size=sizeof($arryIntersect["duplicate_other_bookings"]);
        $this->customer_id = App::$APP->activeUser()['id'];
        $j=0;
        for($i=0;$i<$size;$i++){
          if(($arryIntersect["duplicate_other_bookings"][$i]['customer_id']==$this->customer_id)){
              $date=date("Y-m-d");
             
              $query = App::$APP->db->pdo->prepare("SELECT tb.train_id,tb.id,tb.passengers,tb.class,tb.total_amount,tb.other_booking,tr.train_name,tb.from_station,tb.to_station,tb.train_date FROM ticket_booking tb INNER JOIN trains tr ON tb.train_id=tr.train_id WHERE tb.customer_id=:cus_id AND tb.other_booking=:other_booking AND tb.train_date >= $date ORDER BY tb.train_date ASC");
              $query->bindValue(":cus_id", $this->customer_id);
              $query->bindValue(":other_booking", $arryIntersect["duplicate_other_bookings"][$i]['other_booking']);
              $query->execute();
              $this->getBooking["intersect"][$j] = $query->fetchAll(PDO::FETCH_ASSOC);
              
               $j++;

          }
      
      }
      return $this->getBooking;

    }


    private function findDirect($arryDirect){

        $size=sizeof($arryDirect["no_duplicates"]);
        $this->customer_id = App::$APP->activeUser()['id'];
        $i=0;
        $j=0;
        
        $date=date("Y-m-d");
        for($i=0;$i<$size;$i++){
                $query = App::$APP->db->pdo->prepare("SELECT tb.train_id,tb.id,tb.passengers,tb.class,tb.total_amount,tb.other_booking,tr.train_name,tb.from_station,tb.to_station,tb.train_date FROM ticket_booking tb INNER JOIN trains tr ON tb.train_id=tr.train_id WHERE tb.customer_id=:cus_id AND tb.other_booking=:other_booking AND tb.train_date >= $date ORDER BY tb.train_date ASC");
                $query->bindValue(":cus_id", $this->customer_id);
                $query->bindValue(":other_booking", $arryDirect["no_duplicates"][$i]['other_booking']);
                $query->execute();
                $this->getBooking["direct"][$j] = $query->fetchAll(PDO::FETCH_ASSOC);
                 $j++;
  
            
        
        }
        return $this->getBooking;

    }



    

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


