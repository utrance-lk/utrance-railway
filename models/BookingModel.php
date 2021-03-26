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
    public $getAllMyBookingArray=[];
    public $getInterSectionBooking=[];




    public function getAllMyBookings(){
        $this->customer_id = App::$APP->activeUser()['id'];

        $query = App::$APP->db->pdo->prepare("SELECT tb.customer_id,tb.other_booking FROM ticket_booking tb  GROUP BY other_booking HAVING COUNT(tb.other_booking) >1");
        $query->execute();
        $this->getAllMyBookingArray["duplicate_other_bookings"] = $query->fetchAll(PDO::FETCH_ASSOC);

        $size=sizeof($this->getAllMyBookingArray["duplicate_other_bookings"]);
        
        
        $maxSize=2*$size;
        $j=0;
        $count=1;
        

          for($i=0;$i<$size;$i++){
            if(($this->getAllMyBookingArray["duplicate_other_bookings"][$i]['customer_id']==$this->customer_id)){
                $query = App::$APP->db->pdo->prepare("SELECT tb.train_id,tb.passengers,tb.class,tb.total_amount,tb.other_booking,tr.train_name,tb.from_station,tb.to_station FROM ticket_booking tb INNER JOIN trains tr ON tb.train_id=tr.train_id WHERE tb.customer_id=:cus_id AND tb.other_booking=:other_booking");
                $query->bindValue(":cus_id", $this->customer_id);
                $query->bindValue(":other_booking", $this->getAllMyBookingArray["duplicate_other_bookings"][$i]['other_booking']);
                $query->execute();
                $this->getInterSectionBooking["intersect"][$j] = $query->fetchAll(PDO::FETCH_ASSOC);
                 $j++;

            }
        
        
        }
        var_dump($this->getInterSectionBooking);
        return $this->getInterSectionBooking;

        
        
        // $query = App::$APP->db->pdo->prepare("SELECT tb.train_id,tb.passengers,tb.class,tb.total_amount,DISTINCT(tb.other_booking),tr.train_name,tb.from_station,tb.to_station FROM ticket_booking tb INNER JOIN trains tr ON tb.train_id=tr.train_id WHERE customer_id=:cus_id ");
        // $query->bindValue(":cus_id", $this->customer_id);
        // $query->execute();
        // $this->getAllMyBookingArray["bookings"] = $query->fetchAll(PDO::FETCH_ASSOC);
        
        // $booking_reference=$this->findOtherBookings($this->getAllMyBookingArray);
        // $this->getAllMyBookingArray["other_reference"]=$booking_reference;
        // //var_dump($this->getAllMyBookingArray);
        

    }


    // private function findOtherBookings($arrayAllBookings){
    //     //var_dump($arrayAllBookings);
    //     $otherBooking_reference=[];
    //     $k=0;
    //     $length = sizeof($arrayAllBookings["bookings"]);  
    //     var_dump($length);
    //     for($i = 0; $i < $length; $i++) {    
    //         for($j = $i + 1; $j < $length; $j++) {    
    //             if($arrayAllBookings["bookings"][$i]['other_booking']== $arrayAllBookings["bookings"][$j]['other_booking'])    
    //                 $otherBooking_reference[$k]= $arrayAllBookings["bookings"][$i]['other_booking'];
    //                 $k++;
                    
    //         }    
    //     } 
    //     return $otherBooking_reference;   


    // }



    
}


