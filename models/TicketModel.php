<?php

include_once "../classes/Model.php";
include_once "HandlerFactory.php";

class TicketModel extends Model
{

    public $start;
    public $destination;
    public $availbility_lines;
    public $resultLine = [];
    public $ticketPrice = [];
    public $firstClassPrice = [];
    public $secondClassPrice;
    public $thirdClassPrice;
    public $intLineStart = [];
    public $intLineEnd = [];
    public $end_lines = [];
    public $result = [];
    public $station_intersect_name;

    public function availabiltyLines($find_line)
    {
        $query = APP::$APP->db->pdo->prepare("SELECT availability_lines FROM ticket_price WHERE station_name=:station");
        $query->bindValue(":station", $find_line);
        $query->execute();
        $this->resultLine = $query->fetchAll(PDO::FETCH_ASSOC);

        if ($this->resultLine) {
            return $this->resultLine[0]['availability_lines'];
        }

        return null;

    }

    public function calculateTicketPrice($station, $class_type)
    {

        $query = APP::$APP->db->pdo->prepare("SELECT $class_type FROM ticket_price WHERE station_name=:place");
        $query->bindValue(":place", $station);
        $query->execute();
        $this->ClassPrice = $query->fetchAll(PDO::FETCH_ASSOC);
        return $this->ClassPrice[0][$class_type];

    }

    public function findStation($intersect_station_name)
    {
        $this->station_intersect_name = $intersect_station_name;
        $query = APP::$APP->db->pdo->prepare("SELECT station_name from ticket_price WHERE availability_lines LIKE '%{$this->station_intersect_name}%' LIMIT 1"); //Get a intersect station
        //$query->bindValue(":comma",$intersect_station_name);
        $query->execute();
        $station_name = $query->fetchAll(PDO::FETCH_ASSOC);
        return $station_name[0]['station_name'];
    }

    public function totalTicketPrice($start_price, $end_price)
    {
        if ($start_price > $end_price) {
            $total_ticket_price = $start_price - $end_price;
        } else {
            $total_ticket_price = $end_price - $start_price;
        }
        return $total_ticket_price;
    }

    public function explodeValues($val_explode)
    {

        if (strlen($val_explode) > 1) {
            $my_price = explode(',', $val_explode);
        } else {
            $my_price = explode(',', $val_explode);
        }
        return $my_price;

    }

    public function getTicketPrice()
    {

        $lineLengthStart = strlen($this->availabiltyLines($this->start));
        $lineLengthEnd = strlen($this->availabiltyLines($this->destination));
        // var_dump($lineLengthStart);
        // var_dump($lineLengthEnd);

        $this->intLineStart = $this->availabiltyLines($this->start);
        $this->intLineEnd = $this->availabiltyLines($this->destination);

        if ($lineLengthStart == $lineLengthEnd) {

            if ($lineLengthStart == 1 && $lineLengthEnd == 1) {

                if ($this->intLineStart == $this->intLineEnd) {

                    $train_class = ["first_class", "second_class", "third_class"];
                    $i = 0;
                    $j = 0;
                    $total_ticket_amount = [];

                    for ($i = 0; $i < sizeof($train_class); $i++) {
                        //var_dump("hello");
                        $start_val = $this->calculateTicketPrice($this->start, $train_class[$i]);
                        $end_val = $this->calculateTicketPrice($this->destination, $train_class[$i]);
                        $total_ticket_amount[$j] = $this->totalTicketPrice($start_val, $end_val);
                        $result["tickets"][$train_class[$j]] = $total_ticket_amount[$j];
                        $j = $j + 1;
                    }
                    $result["tickets"]["start"] = $this->start;
                    $result["tickets"]["destination"] = $this->destination;
                    return $result; // print all class values;

                } else {
                    $train_class = ["first_class", "second_class", "third_class"];
                    $arr = array($this->intLineStart, $this->intLineEnd);
                    sort($arr); //start -> 1 line End -> 2 end find intersect 1,2 include line
                    $comma = implode(",", $arr);

                    $get_intersect_station = $this->findStation($comma);

                    $i = 0;
                    $j = 0;
                    $total_ticket_amount = [];
                    $my_price = [];

                    for ($i = 0; $i < sizeof($train_class); $i++) {

                        $get_ticket_price = $this->calculateTicketPrice($get_intersect_station, $train_class[$i]);

                        $my_price[$i] = $this->explodeValues($get_ticket_price);

                    }
                    $get_intersect_station_lines = [];
                    $get_start_lines = [];
                    $get_destination_lines = [];
                    $get_intersect_lines = $this->availabiltyLines($get_intersect_station);
                    $get_intersect_station_lines = $this->explodeValues($get_intersect_lines);
                    $n = sizeof($get_intersect_station_lines);

                    $get_start_lines = $this->availabiltyLines($this->start);
                    $get_destination_lines = $this->availabiltyLines($this->destination);

                    $get_start_lines = $this->explodeValues($get_start_lines);
                    $get_destination_lines = $this->explodeValues($get_destination_lines);

                    $get_ticket_price_start = [];
                    $get_ticket_price_end = [];

                    for ($i = 0; $i < sizeof($train_class); $i++) {
                        $get_ticket_price_start[$i] = $this->calculateTicketPrice($this->start, $train_class[$i]);

                    }
                    //var_dump($get_ticket_price_start);

                    for ($i = 0; $i < sizeof($train_class); $i++) {
                        $get_ticket_price_end[$i] = $this->calculateTicketPrice($this->destination, $train_class[$i]);

                    }
                    //var_dump($get_ticket_price_end);

                    $positionstart = 0;
                    $positionend = 0;
                    $find_posi_start = 0;
                    $find_posi_end = 0;
                    $i = 0;
                    $intersect_start = 0;
                    $intersect_end = 0;

                    for ($i = 0; $i < $n; $i++) {
                        if ($get_intersect_station_lines[$i] == $get_start_lines[0]) {
                            $find_posi_start = $positionstart;
                        }
                        $positionstart = $positionstart + 1; /// find start station position
                    }

                    for ($i = 0; $i < $n; $i++) {
                        if ($get_intersect_station_lines[$i] == $get_destination_lines[0]) {
                            $find_posi_end = $positionend;
                        }
                        $positionend = $positionend + 1; // find dest position
                    }

                    $intersect_start = [];
                    $j = 0;
                    $k = 0;

                    for ($i = 0; $i < $n; $i++) {
                        if ($i == $find_posi_start) {
                            for ($k = 0; $k < sizeof($train_class); $k++) {
                                if ($get_ticket_price_start[$k] > $my_price[$k][$i]) {
                                    $intersect_start[$j] = $get_ticket_price_start[$k] - $my_price[$k][$i];

                                    $j = $j + 1;

                                } else {

                                    $intersect_start[$j] = $my_price[$k][$i] - $get_ticket_price_start[$k];

                                    $j = $j + 1;

                                }

                            }

                        }
                    }

                    $j = 0;
                    $k = 0;
                    $intersect_end = [];
                    for ($i = 0; $i < $n; $i++) {
                        if ($i == $find_posi_end) {
                            for ($k = 0; $k < sizeof($train_class); $k++) {
                                if ($get_ticket_price_end[$k] > $my_price[$k][$i]) {
                                    $intersect_end[$j] = $get_ticket_price_end[$k] - $my_price[$k][$i];
                                    // var_dump( $intersect_end[$j]);

                                    $j = $j + 1;

                                } else {
                                    $intersect_end[$j] = $my_price[$k][$i] - $get_ticket_price_end[$k];

                                    $j = $j + 1;
                                    // var_dump( $intersect_end[$j]);
                                }

                            }
                        }
                    }

                    $total_value = [];
                    for ($i = 0; $i < sizeof($train_class); $i++) {
                        $total_value[$i] = $intersect_start[$i] + $intersect_end[$i];
                        $result["tickets"][$train_class[$i]] = $total_value[$i];
                    }

                    /*for ($i = 0; $i < sizeof($train_class); $i++) {
                    var_dump($total_value[$i]);
                    }*/
                    $result["tickets"]["start"] = $this->start;
                    $result["tickets"]["destination"] = $this->destination;
                    return $result;

                }

            } elseif ($lineLengthStart > 1 && $lineLengthEnd > 1) {
                //var_dump("hy");
                $train_class = ["first_class", "second_class", "third_class"];
                $start_line1 = [];
                $value_start_lines = $this->intLineStart;
                $start_line1 = $this->explodeValues($value_start_lines);

                $end_line1 = [];
                $value_end_lines = $this->intLineEnd;
                $end_line1 = $this->explodeValues($value_end_lines);

                $i = 0;
                $j = 0;
                $position = 0;
                $find_position = -1;
                $p1_start = 0;
                $p2_end = 0;

                $n = sizeof($end_line1);
                //var_dump($n);
                for ($i = 0; $i < $n; $i++) {

                    for ($j = 0; $j < $n; $j++) {
                        if ($start_line1[$i] == $end_line1[$j]) {
                            $find_position = $find_position + 1;
                            $find_position = $position;
                            $p1_start = $i;
                            $p2_end = $j;

                        }
                        $position = $position + 1;
                    }

                }

                if ($find_position != -1) {
                    $get_explode_start = [];
                    $get_ticket_price_start = [];
                    $get_ticket_price_end = [];
                    $get_explode_end = [];

                    for ($i = 0; $i < sizeof($train_class); $i++) {
                        $get_ticket_price_start[$i] = $this->calculateTicketPrice($this->start, $train_class[$i]);
                        $get_explode_start[$i] = $this->explodeValues($get_ticket_price_start[$i]);

                    }

                    for ($i = 0; $i < sizeof($train_class); $i++) {
                        $get_ticket_price_end[$i] = $this->calculateTicketPrice($this->destination, $train_class[$i]);
                        $get_explode_end[$i] = $this->explodeValues($get_ticket_price_end[$i]);

                    }

                    $get_value = [];
                    $j = 0;
                    //var_dump( $get_ticket_price_end);
                    for ($i = 0; $i < sizeof($train_class); $i++) {

                        if ($get_explode_end[$i][$p2_end] > $get_explode_start[$i][$p1_start]) {
                            // var_dump($get_explode_end[$i][$p2_end]);
                            $get_value[$j] = $get_explode_end[$i][$p2_end] - $get_explode_start[$i][$p1_start];
                            //  var_dump($get_value[$j]);
                            $j = $j + 1;
                        } else {
                            $get_value[$j] = $get_explode_start[$i][$p1_start] - $get_explode_end[$i][$p2_end];
                            //var_dump($get_value[$j]);
                            $j = $j + 1;
                        }

                    }

                    for ($i = 0; $i < sizeof($train_class); $i++) {

                        $result["tickets"][$train_class[$j]] = $get_value[$i];
                    }
                    $result["tickets"]["start"] = $this->start;
                    $result["tickets"]["destination"] = $this->destination;
                    return $result;

                } else {
                    $train_class = ["first_class", "second_class", "third_class"];
                    $i = 0;
                    $k = 0;
                    //var_dump($this->intLineStart);
                    $this->intLineStart1 = explode(',', $this->intLineStart);
                    $this->intLineStart2 = explode(',', $this->intLineEnd);
                    $size1 = sizeof($this->intLineStart1);
                    $size2 = sizeof($this->intLineStart2);
                    $size = $size1 + $size2;

                    for ($i = 0; $i < $size1; $i++) {
                        $merge[$i] = $this->intLineStart1[$i];
                    }

                    for ($i = 0, $k = $size1; $k < $size && $i < $size2; $i++, $k++) {
                        $merge[$k] = $this->intLineStart2[$i];
                    }
                    sort($merge);
                    $arrNew = implode(",", $merge);

                    $get_intersect_station = $this->findStation($arrNew);
                    $get_intersect_lines = $this->availabiltyLines($get_intersect_station);

                    $common1 = [];
                    $line_New = [];
                    $i = 0;
                    $j = 0;
                    $n1 = 0;
                    $p = 0;
                    $intLineStart1 = [];
                    $intLineStart1 = $this->explodeValues($this->intLineStart);
                    $n1 = sizeof($intLineStart1);
                    //var_dump($intLineStart1);

                    //$value_lines = $line_set[0]['availability_lines'];

                    $get_intersect_station_lines = $this->explodeValues($get_intersect_lines);
                    $start_posi = 0;
                    $mid_posi1 = 0;

                    $n2 = sizeof($get_intersect_station_lines);

                    $j = 0;
                    while ($i < $n1 && $j < $n2) {
                        if ($intLineStart1[$i] == $get_intersect_station_lines[$j]) {
                            $common1[$p] = $intLineStart1[$i];
                            $start_posi = $i;
                            $mid_posi1 = $j;
                            $i = $i + 1;
                            $j = $j + 1;
                            $p = $p + 1;
                        } else if ($intLineStart1[$i] < $get_intersect_station_lines[$j]) {
                            $i = $i + 1;

                        } else {
                            $j = $j + 1;
                        }
                    }

                    $i = 0;
                    $j = 0;
                    $p = 0;
                    $mid_posi2 = 0;
                    $end_posi = 0;
                    $intLineStart2 = [];
                    $intLineStart2 = $this->explodeValues($this->intLineEnd);
                    $n3 = sizeof($intLineStart2);

                    while ($i < $n3 && $j < $n2) {

                        if ($intLineStart2[$i] == $get_intersect_station_lines[$j]) {

                            $common2[$p] = $intLineStart2[$i];
                            $mid_posi2 = $j;
                            $end_posi = $i;
                            $p = $p + 1;
                            $i = $i + 1;
                            $j = $j + 1;
                        } else if ($intLineStart2[$i] < $get_intersect_station_lines[$j]) {
                            $i = $i + 1;

                        } else {
                            $j = $j + 1;
                        }
                    }

                    $get_ticket_price_start = [];
                    $get_explode_start = [];
                    $get_ticket_price_mid = [];
                    $get_explode_mid = [];

                    for ($i = 0; $i < sizeof($train_class); $i++) {
                        $get_ticket_price_start[$i] = $this->calculateTicketPrice($this->start, $train_class[$i]);
                        $get_explode_start[$i] = $this->explodeValues($get_ticket_price_start[$i]);

                    }

                    for ($i = 0; $i < sizeof($train_class); $i++) {
                        $get_ticket_price_mid[$i] = $this->calculateTicketPrice($get_intersect_station, $train_class[$i]);
                        $get_explode_mid[$i] = $this->explodeValues($get_ticket_price_mid[$i]);

                    }

                    $get_mid_value = [];
                    $j = 0;
                    $i = 0;
                    //var_dump($get_explode_mid);
                    //var_dump($get_explode_start);
                    for ($i = 0; $i < sizeof($train_class); $i++) {

                        if ($get_explode_mid[$i][$mid_posi1] > $get_explode_start[$i][$start_posi]) {
                            $get_mid_value[$j] = $get_explode_mid[$i][$mid_posi1] - $get_explode_start[$i][$start_posi];
                            $j = $j + 1;
                        } else {
                            $get_mid_value[$j] = $get_explode_start[$i][$start_posi] - $get_explode_mid[$i][$mid_posi1];
                            $j = $j + 1;
                        }

                    }
                    $get_ticket_price_end = [];
                    $get_explode_end = [];
                    for ($i = 0; $i < sizeof($train_class); $i++) {
                        $get_ticket_price_end[$i] = $this->calculateTicketPrice($this->destination, $train_class[$i]);
                        $get_explode_end[$i] = $this->explodeValues($get_ticket_price_end[$i]);

                    }

                    $get_end_value = [];
                    $j = 0;

                    for ($i = 0; $i < sizeof($train_class); $i++) {

                        if ($get_explode_mid[$i][$mid_posi2] > $get_explode_end[$i][$end_posi]) {
                            $get_end_value[$j] = $get_explode_mid[$i][$mid_posi2] - $get_explode_end[$i][$end_posi];
                            $j = $j + 1;
                        } else {
                            $get_end_value[$j] = $get_explode_end[$i][$end_posi] - $get_explode_mid[$i][$mid_posi2];
                            $j = $j + 1;
                        }

                    }

                    $get_final_value = [];
                    for ($i = 0; $i < sizeof($train_class); $i++) {
                        $get_final_value[$i] = $get_end_value[$i] + $get_mid_value[$i];

                    }

                    for ($i = 0; $i < sizeof($train_class); $i++) {

                        $result["tickets"][$train_class[$j]] = $get_final_value[$i];

                    }
                    $result["tickets"]["start"] = $this->start;
                    $result["tickets"]["destination"] = $this->destination;
                    return $result;

                }

            }
        }

        if ($lineLengthStart != $lineLengthEnd) {
            $train_class = ["first_class", "second_class", "third_class"];
            //var_dump("hello");

            if ($lineLengthStart >= 1 && $lineLengthEnd > 1 || $lineLengthStart >= 1 && $lineLengthEnd == 1) {

                $value_start_lines = $this->intLineStart;
                $this->intLineStart = $this->explodeValues($value_start_lines);

                $value_lines = $this->intLineEnd;
                $this->intLineEnd = $this->explodeValues($value_lines);

                //var_dump($this->intLineEnd);
                //var_dump($this->intLineStart);

                $i = 0;
                $j = 0;
                $position = 0;
                $find_position = -1;
                $p1_start = 0;
                $p2_end = 0;

                $x = sizeof($this->intLineEnd);
                $y = sizeof($this->intLineStart);

                //var_dump($n);
                for ($i; $i < $y; $i++) {
                    $j = 0;
                    for ($j; $j < $x; $j++) {
                        if ($this->intLineStart[$i] == $this->intLineEnd[$j]) {
                            $find_position = $find_position + 1;
                            $find_position = $position;
                            $p1_start = $i;
                            $p2_end = $j;

                        }
                        $position = $position + 1;
                    }

                }

                $get_ticket_price_start = [];
                $get_explode_price_start = [];
                $get_ticket_price_end = [];
                $get_explode_price_end = [];
                if ($find_position != -1) {

                    for ($i = 0; $i < sizeof($train_class); $i++) {
                        $get_ticket_price_start[$i] = $this->calculateTicketPrice($this->start, $train_class[$i]);
                        $get_explode_price_start[$i] = $this->explodeValues($get_ticket_price_start[$i]);

                    }

                    for ($i = 0; $i < sizeof($train_class); $i++) {
                        $get_ticket_price_end[$i] = $this->calculateTicketPrice($this->destination, $train_class[$i]);
                        $get_explode_price_end[$i] = $this->explodeValues($get_ticket_price_end[$i]);

                    }

                    $j = 0;

                    for ($i = 0; $i < sizeof($train_class); $i++) {
                        if ($get_explode_price_end[$i][$p2_end] > $get_explode_price_start[$i][$p1_start]) {
                            $get_value[$j] = $get_explode_price_end[$i][$p2_end] - $get_explode_price_start[$i][$p1_start];
                            $j = $j + 1;
                        } else {
                            $get_value[$j] = $get_explode_price_start[$i][$p1_start] - $get_explode_price_end[$i][$p2_end];
                            $j = $j + 1;
                        }
                    }

                    for ($i = 0; $i < sizeof($train_class); $i++) {
                        $result["tickets"][$train_class[$i]] = $get_value[$i];
                    }
                    $result["tickets"]["start"] = $this->start;
                    $result["tickets"]["destination"] = $this->destination;
                    return $result;

                } else { // example beliatta line 1 maradna line 2,3 find intesect station and get a value
                    $i = 0;
                    $k = 0;

                    //var_dump($this->intLineStart);
                    $newStart = [];
                    $newEnd = [];
                    $newStart = $this->intLineStart;
                    $newEnd = $this->intLineEnd;

                    $size1 = sizeof($newStart);
                    $size2 = sizeof($newEnd);
                    $size = $size1 + $size2;
                    $merge = [];

                    //var_dump($size);

                    for ($i = 0; $i < $size1; $i++) {
                        $merge[$i] = $newStart[$i];
                    }

                    for ($i = 0, $k = $size1; $k < $size && $i < $size2; $i++, $k++) {
                        $merge[$k] = $newEnd[$i];
                    }
                    sort($merge);
                    $arrNew = implode(",", $merge);

                    $get_explode_intersect = [];
                    $get_intersect_station = $this->findStation($arrNew);
                    $get_intersect_lines = $this->availabiltyLines($get_intersect_station);
                    $get_explode_intersect = $this->explodeValues($get_intersect_lines);

                    $common1 = [];
                    $line_New = [];
                    $i = 0;
                    $j = 0;
                    $n1 = 0;
                    $n1 = $size1;
                    $n2 = sizeof($get_explode_intersect);
                    $n3 = $size2;
                    //var_dump($line_New);

                    $p = 0;
                    $start_posi = 0;
                    $mid_posi1 = 0;
                    $mid_posi2 = 0;
                    $end_posi = 0;

                    while ($i < $n1 && $j < $n2) {
                        if ($newStart[$i] == $get_explode_intersect[$j]) {
                            $common1[$p] = $newStart[$i];
                            $start_posi = $i;
                            $mid_posi1 = $j;
                            $i = $i + 1;
                            $j = $j + 1;
                            $p = $p + 1;
                        } else if ($newStart[$i] < $get_explode_intersect[$j]) {
                            $i = $i + 1;

                        } else {
                            $j = $j + 1;
                        }
                    }

                    $i = 0;
                    $j = 0;
                    $p = 0;

                    while ($i < $n3 && $j < $n2) {

                        if ($newEnd[$i] == $get_explode_intersect[$j]) {

                            $common2[$p] = $newEnd[$i];
                            $mid_posi2 = $j;
                            $end_posi = $i;
                            $p = $p + 1;
                            $i = $i + 1;
                            $j = $j + 1;
                        } else if ($newEnd[$i] < $get_explode_intersect[$j]) {
                            $i = $i + 1;

                        } else {
                            $j = $j + 1;
                        }
                    }
                    $get_ticket_price_start = [];
                    $get_explode_price_start = [];
                    $get_ticket_price_mid = [];
                    $get_explode_price_mid = [];
                    for ($i = 0; $i < sizeof($train_class); $i++) {
                        $get_ticket_price_start[$i] = $this->calculateTicketPrice($this->start, $train_class[$i]);
                        $get_explode_price_start[$i] = $this->explodeValues($get_ticket_price_start[$i]);

                    }

                    for ($i = 0; $i < sizeof($train_class); $i++) {
                        $get_ticket_price_mid[$i] = $this->calculateTicketPrice($get_intersect_station, $train_class[$i]);
                        $get_explode_price_mid[$i] = $this->explodeValues($get_ticket_price_mid[$i]);

                    }

                    $get_mid_value = [];
                    $j = 0;

                    for ($i = 0; $i < sizeof($train_class); $i++) {
                        if ($get_explode_price_mid[$i][$mid_posi1] > $get_explode_price_start[$i][$start_posi]) {
                            $get_mid_value[$j] = $get_explode_price_mid[$i][$mid_posi1] - $get_explode_price_start[$i][$start_posi];
                            $j = $j + 1;
                        } else {
                            $get_mid_value[$j] = $get_explode_price_start[$i][$start_posi] - $get_explode_price_mid[$i][$mid_posi1];
                            $j = $j + 1;
                        }
                    }
                    $get_ticket_price_end = [];
                    $get_explode_price_end = [];
                    // var_dump($get_explode_price_mid);
                    for ($i = 0; $i < sizeof($train_class); $i++) {
                        $get_ticket_price_end[$i] = $this->calculateTicketPrice($this->destination, $train_class[$i]);
                        $get_explode_price_end[$i] = $this->explodeValues($get_ticket_price_end[$i]);

                    }

                    $get_end_value = [];
                    $j = 0;
                    for ($i = 0; $i < sizeof($train_class); $i++) {
                        if ($get_explode_price_mid[$i][$mid_posi2] > $get_explode_price_end[$i][$end_posi]) {
                            $get_end_value[$j] = $get_explode_price_mid[$i][$mid_posi2] - $get_explode_price_end[$i][$end_posi];
                            $j = $j + 1;
                        } else {
                            $get_end_value[$j] = $get_explode_price_end[$i][$end_posi] - $get_explode_price_mid[$i][$mid_posi2];
                            $j = $j + 1;
                        }
                    }

                    $get_final_value = [];
                    for ($i = 0; $i < sizeof($train_class); $i++) {
                        $get_final_value[$i] = $get_end_value[$i] + $get_mid_value[$i];

                    }

                    for ($i = 0; $i < sizeof($train_class); $i++) {

                        $result["tickets"][$train_class[$i]] = $get_final_value[$i];

                    }
                    $result["tickets"]["start"] = $this->start;
                    $result["tickets"]["destination"] = $this->destination;
                    return $result;
                }

            }

        }

    }

}
