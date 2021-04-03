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
    public $index1;
    public $index2;
    public $id;
    public $date;
    public $searchUserByNameOrId;
    public $male_count;
    public $female_count;

    public function getBookinDetails()
    {
        $query = APP::$APP->db->pdo->prepare("SELECT * FROM seat_availability INNER JOIN trains ON seat_availability.train_id=trains.train_id WHERE sa_date = :sa_date");
        $query->bindValue(":sa_date", $this->index1);
        $query->execute();
        $this->result = $query->fetchAll(PDO::FETCH_ASSOC);

        return $this->result;

    }

    public function getDetails()
    {

        $query = APP::$APP->db->pdo->prepare("SELECT * FROM (SELECT train_name, ticket_booking.train_id, customer_id, train_date, created_at FROM ticket_booking INNER JOIN trains ON ticket_booking.train_id=trains.train_id) AS a INNER JOIN users ON users.id=a.customer_id
        WHERE train_date = :train_date AND train_id = :id");
        $query->bindValue(":id", $this->id);
        $query->bindValue(":train_date", $this->date);
        $query->execute();
        $this->result = $query->fetchAll(PDO::FETCH_ASSOC);

        return $this->result;

    }

    public function searchBookingTrain()
    {

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
        $query = APP::$APP->db->pdo->prepare("INSERT INTO ticket_booking (customer_id, train_date, train_id, from_station, to_station, passengers, class, base_price, total_amount, other_booking, male_count, female_count) VALUES (:customer_id, :train_date, :train_id, :from_station, :to_station, :passengers, :class, :base_price, :total_amount, :other_booking, :male_count, :female_count)");
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
        $query->bindValue(":male_count", $this->male_count);
        $query->bindValue(":female_count", $this->female_count);

        $query->execute();

    }

    public function getAllMyBookings()
    {

        $this->cus_id = App::$APP->activeUser()['id'];
        $query = App::$APP->db->pdo->prepare("SELECT  group_concat(id) As 'booking_id',tb.customer_id, tb.train_date, group_concat(train_id) As 'train_id', group_concat(from_station) as 'from_stations', group_concat(to_station) As 'to_stations', group_concat(passengers) As total_passengers, group_concat(class) As class, group_concat(base_price) As 'base_price', tb.total_amount from ticket_booking tb group BY other_booking HAVING customer_id=:cus_id AND COUNT(tb.other_booking) >1 ");
        $query->bindValue(":cus_id", $this->cus_id);
        $query->execute();
        $this->getAllMyBookingArray["Intersection_results"][0] = $query->fetchAll(PDO::FETCH_ASSOC);

        $this->cus_id = App::$APP->activeUser()['id'];
        $query1 = App::$APP->db->pdo->prepare("SELECT  tb.id As 'booking_id',tb.customer_id, tb.train_date, tb.train_id As 'train_id', tb.from_station as 'from_station', tb.to_station As 'to_station',tb.passengers As total_passengers, tb.class As class, tb.base_price As 'base_price', tb.total_amount from ticket_booking tb group BY other_booking HAVING customer_id=:cus_id AND COUNT(tb.other_booking) =1 ");
        $query1->bindValue(":cus_id", $this->cus_id);
        $query1->execute();
        $this->getAllMyBookingArray["Direct_results"][0] = $query1->fetchAll(PDO::FETCH_ASSOC);

        return $this->getAllMyBookingArray;

    }

    public function getBookedTourIntersect()
    {
        $query1 = App::$APP->db->pdo->prepare("SELECT train_id,from_station,to_station FROM ticket_booking WHERE id=:book1_id");
        $query1->bindValue(":book1_id", $this->id1);
        $query1->execute();
        $book1_details = $query1->fetchAll(PDO::FETCH_ASSOC);

        $query2 = App::$APP->db->pdo->prepare("SELECT train_id,from_station,to_station FROM ticket_booking WHERE id=:book2_id");
        $query2->bindValue(":book2_id", $this->id2);
        $query2->execute();
        $book2_details = $query2->fetchAll(PDO::FETCH_ASSOC);

        $getStationId1 = $this->getStationId($book1_details);
        $getStationId2 = $this->getStationId($book2_details);
        $getRouteId1 = $this->getRouteId($book1_details[0]['train_id']);
        $getRouteId2 = $this->getRouteId($book2_details[0]['train_id']);
        $getInterTime1 = $this->getTime($getRouteId1[0]['route_id'], $getStationId1);
        $getInterTime2 = $this->getTime($getRouteId2[0]['route_id'], $getStationId2);

        $finalResultsArray = [];
        $getAllResult1 = $this->getAllResultsFirst($this->id1, $finalResultsArray);
        $getAllResult2 = $this->getAllResultsSecond($this->id2, $finalResultsArray);

        $finalResultsArray['train_1'] = $getAllResult1[0];
        $finalResultsArray['train_2'] = $getAllResult2[0];
        $finalResultsArray['train_1']['time_1'] = $getInterTime1;
        $finalResultsArray['train_2']['time_2'] = $getInterTime2;

        return $finalResultsArray;

    }

    public function getAllResultsFirst($id, $finalResultsArray)
    {
        $query = App::$APP->db->pdo->prepare("SELECT tb.train_date,tb.from_station,tb.to_station,tb.base_price,tb.total_amount,tb.class,tb.passengers,tr.train_type,tr.train_name FROM ticket_booking tb INNER JOIN trains tr ON tb.train_id=tr.train_id WHERE id=:id");
        $query->bindValue(":id", $id);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getAllResultsSecond($id, $finalResultsArray)
    {
        $query = App::$APP->db->pdo->prepare("SELECT tb.train_date,tb.from_station,tb.to_station,tb.base_price,tb.total_amount,tb.class,tb.passengers,tr.train_type,tr.train_name FROM ticket_booking tb INNER JOIN trains tr ON tb.train_id=tr.train_id WHERE id=:id");
        $query->bindValue(":id", $id);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);

    }

    public function getBookedTourDirect()
    {

        $query1 = App::$APP->db->pdo->prepare("SELECT train_id,from_station,to_station FROM ticket_booking WHERE id=:book1_id");
        $query1->bindValue(":book1_id", $this->id1);
        $query1->execute();
        $book1_details = $query1->fetchAll(PDO::FETCH_ASSOC);

        $getStationId1 = $this->getStationId($book1_details);

        $getRouteId1 = $this->getRouteId($book1_details[0]['train_id']);

        $getInterTime1 = $this->getTime($getRouteId1[0]['route_id'], $getStationId1);

        $finalResultsArray = [];
        $getAllResult1 = $this->getAllResultsFirst($this->id1, $finalResultsArray);
        $getAllResult2 = $this->getAllResultsSecond($this->id2, $finalResultsArray);

        $finalResultsArray['train_1'] = $getAllResult1[0];

        $finalResultsArray['train_1']['time_1'] = $getInterTime1;
        return $finalResultsArray;

    }

    private function findIntersect($arryIntersect)
    {
        $size = sizeof($arryIntersect["duplicate_other_bookings"]);
        $this->customer_id = App::$APP->activeUser()['id'];
        $j = 0;
        for ($i = 0; $i < $size; $i++) {
            if (($arryIntersect["duplicate_other_bookings"][$i]['customer_id'] == $this->customer_id)) {
                $date = date("Y-m-d");
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

    public function getStationId($book_details)
    {
        $query = App::$APP->db->pdo->prepare("SELECT station_id FROM stations WHERE station_name=:from1_name OR station_name=:to1_name");
        $query->bindValue(":from1_name", $book_details[0]['from_station']);
        $query->bindValue(":to1_name", $book_details[0]['to_station']);
        $query->execute();
        $stId = $query->fetchAll(PDO::FETCH_ASSOC);
        return $stId;

    }

    public function getRouteId($id)
    {
        $query = App::$APP->db->pdo->prepare("SELECT route_id FROM trains WHERE train_id=:tr1_id");
        $query->bindValue(":tr1_id", $id);
        $query->execute();
        $route_id = $query->fetchAll(PDO::FETCH_ASSOC);
        return $route_id;
    }

    public function getTime($route, $staion_id)
    {
        $i = 0;
        $size = sizeof($staion_id);
        for ($i = 0; $i < $size; $i++) {
            $query = App::$APP->db->pdo->prepare("SELECT arrival_time FROM stops WHERE route_id=:route_id AND station_id=:station_id");
            $query->bindValue(":station_id", $staion_id[$i]['station_id']);
            $query->bindValue(":route_id", $route);
            $query->execute();
            $getTime1[$i] = $query->fetchAll(PDO::FETCH_ASSOC);
        }
        return $getTime1;

    }

}
