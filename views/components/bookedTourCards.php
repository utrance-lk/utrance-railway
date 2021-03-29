<?php

function renderIntersectionCard($value)
{

   

    $time = strtotime($value[0]['train_date']);
    $date=date("d",$time);
    $month = date("F", $time);
    $year = date("Y", $time);

    $totalHoursFirst1 = "2021-10-15" . " " . $value[0]['time_1'][0][0]['arrival_time'];
    $totalHoursFirst2 = "2021-10-15" . " " . $value[0]['time_1'][1][0]['arrival_time'];
    $totalHoursLast1 = "2021-10-15" . " " . $value[1]['time_2'][0][0]['arrival_time'];
    $totalHoursLast2 = "2021-10-15" . " " . $value[1]['time_2'][1][0]['arrival_time'];

    $start_date1 = new DateTime($totalHoursFirst1);
    $since_start1 = $start_date1->diff(new DateTime($totalHoursLast2));

    $start_date1 = new DateTime($totalHoursFirst1);
    $since_start2 = $start_date1->diff(new DateTime($totalHoursFirst2));

    $start_date2 = new DateTime($totalHoursLast1);
    $since_start3 = $start_date2->diff(new DateTime($totalHoursLast2));

    //echo $since_start1->i+$since_start2->i;

    $html = "<div class='topic'>";
    $html .= "<div class='station__text-box'>";
    $html .= "<span class='start__station'>" . $value[0]['from_station'] . "</span>&nbsp;to&nbsp;<span class='destination__station'>" . $value[1]['to_station'] . "</span>";
    $html .= "</div>";
    $html .= "<div class='journey__date-box'>";
    $html .= "<span>journey date</span>&nbsp;&ndash;&nbsp;<span class='journey__date-day'>";
    $html .= "<span class='day'>$date</span>";
    $html .= "<span class='day__upper'>th&nbsp;</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
    $html .= "</span>";
    $html .= "<span class='journey__date-month'>&nbsp;$month</span>";
    $html .= "<span class='journey__date-year'>&nbsp;$year</span>";
    $html .= "</div>";
    $html .= "<div class='journey__time-box'>";
    $html .= "<span>journey time</span>&nbsp;&ndash;&nbsp;<span class='total__journey-time'> {$since_start1->h} hrs {$since_start1->i} min</span>";
    $html .= "</div>";
    $html .= "</div>";
    $html .= "<div class='booking__form'>";
    $html .= "<div class='train__booking-card'>";
    $html .= "<div class='train__number-box'>train 1</div>";
    $html .= "<div class='card__train-details card__item'>";
    $html .= "<div class='journey train__details-item'>";
    $html .= "<span class='journey__start-station'>" . $value[0]['from_station'] . "</span> &ndash; <span class='journey__destination-station'>" . $value[0]['to_station'] . "</span>";
    $html .= "</div>";
    $html .= "<div class='train__name train__details-item'>";
    $html .= "<span class='train__name--name'>" . $value[0]['train_name'] . "</span><span class='train__type'>" . $value[0]['train_type'] . "</span>";
    $html .= "</div>";
    $html .= "<div class='journey__start__end-time train__details-item'>" . $value[0]['time_1'][0][0]['arrival_time'] . " am - " . $value[0]['time_1'][1][0]['arrival_time'] . " am</div>";
    $html .= "<div class='journey__time train__details-item'>{$since_start2->h} h {$since_start2->i} min</div>";
    $html .= "</div>";
    $html .= "<div class='seperator'></div>";
    $html .= "<div class='card__persons card__item'>";
    if ($value[0]['passengers'] > 1) {
        $html .= "<span>" . $value[0]['passengers'] . " people</span>";
    } else if ($value[0]['passengers'] == 1) {
        $html .= "<span>" . $value[0]['passengers'] . " person</span>";
    }

    $html .= "</div>";
    $html .= "<div class='seperator'></div>";
    $html .= "<div class='card__class card__item'>";
    if( $value[0]['class'] =="secondClass"){
        $html .= "<span>Second Class</span>";
    }
    if( $value[0]['class'] =="firstClass"){
        $html .= "<span>First Class</span>";
    }
    //$html .= "<span>" . $value[0]['class'] . "</span>";
    $html .= "</div>";
    $html .= "<div class='seperator'></div>";
    $html .= "<div class='card__price card__item'>";
    $html .= "<span>Rs&nbsp;</span><span class='ticket__price'>" . $value[0]['base_price'] . "</span>";
    $html .= "</div>";
    $html .= "</div>";
    $html .= "<div class='train__booking-card'>";
    $html .= "<div class='train__number-box'>train 2</div>";
    $html .= "<div class='card__train-details card__item'>";
    $html .= "<div class='journey train__details-item'>";
    $html .= "<span class='journey__start-station'>" . $value[1]['from_station'] . "</span> &ndash; <span class='journey__destination-station'>" . $value[1]['to_station'] . "</span>";
    $html .= "</div>";
    $html .= "<div class='train__name train__details-item'>";
    $html .= "<span class='train__name--name'>" . $value[1]['train_name'] . "</span><span class='train__type'>" . $value[1]['train_type'] . "</span>";
    $html .= "</div>";
    $html .= "<div class='journey__start__end-time train__details-item'>" . $value[1]['time_2'][0][0]['arrival_time'] . "am - " . $value[1]['time_2'][1][0]['arrival_time'] . " am</div>";
    $html .= "<div class='journey__time train__details-item'>{$since_start3->h} h {$since_start3->i}min</div>";
    $html .= "</div>";
    $html .= "<div class='seperator'></div>";
    $html .= "<div class='card__persons card__item'>";
    if ($value[1]['passengers'] > 1) {
        $html .= "<span>5 people</span>";
    } else if ($value[1]['passengers'] == 1) {
        $html .= "<span>1 person</span>";
    }
    $html .= "</div>";
    $html .= "<div class='seperator'></div>";
    $html .= "<div class='card__class card__item'>";
    $html .= "<span>" . $value[1]['class'] . "</span>";
    $html .= "</div>";
    $html .= "<div class='seperator'></div>";
    $html .= "<div class='card__price card__item'>";
    $html .= "<span>Rs&nbsp;</span><span class='ticket__price'>" . $value[1]['base_price'] . "</span>";
    $html .= "</div>";
    $html .= "</div>";
    $html .= "<div class='total-price__box'>";
    $html .= "<span class='total-price__box--text'>final amount&nbsp;:</span>";
    $html .= "<div class='card__price'>";
    $html .= "<span>Rs</span>&nbsp;<span class='ticket__price'>" . $value[1]['total_amount'] . "</span>";
    $html .= "</div>";
    $html .= "</div>";
    $html .= "<div class='btn__container'>";
    $html .= "<button class='btn btn-round-blue'>Cancel Booking</button>";
    $html .= "</div>";
    $dom = new DOMDocument();
    $dom->loadHTML($html);
    print_r($dom->saveHTML());
    // $html.="</div>";

}

function renderDirectCard($value)
{

    $time = strtotime($value[0]['train_date']);
    $date=date("d",$time);
    $month = date("F", $time);
    $year = date("Y", $time);
    

    $totalHoursFirst1 = "2021-10-15" . " " . $value[0]['time_1'][0][0]['arrival_time'];
    $totalHoursFirst2 = "2021-10-15" . " " . $value[0]['time_1'][1][0]['arrival_time'];
    

    $start_date1 = new DateTime($totalHoursFirst1);
    $since_start1 = $start_date1->diff(new DateTime($totalHoursFirst2));

    
    $html = "<div class='topic'>";
    $html .= "<div class='station__text-box'>";
    $html .= "<span class='start__station'>" . $value[0]['from_station'] . "</span>&nbsp;to&nbsp;<span class='destination__station'>" . $value[0]['to_station'] . "</span>";
    $html .= "</div>";
    $html .= "<div class='journey__date-box'>";
    $html .= "<span>journey date</span>&nbsp;&ndash;&nbsp;<span class='journey__date-day'>";
    $html .= "<span class='day'>$date</span>";
    $html .= "<span class='day__upper'>th&nbsp;</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
    $html .= "</span>";
    $html .= "<span class='journey__date-month'>&nbsp;$month</span>";
    $html .= "<span class='journey__date-year'>&nbsp;$year</span>";
    $html .= "</div>";
    $html .= "<div class='journey__time-box'>";
    $html .= "<span>journey time</span>&nbsp;&ndash;&nbsp;<span class='total__journey-time'>{$since_start1->h} hrs</span>";
    $html .= "</div>";
    $html .= "</div>";
    $html .= "<div class='booking__form'>";
    $html .= "<div class='train__booking-card'>";
    $html .= "<div class='train__number-box'>train 1</div>";
    $html .= "<div class='card__train-details card__item'>";
    $html .= "<div class='journey train__details-item'>";
    $html .= "<span class='journey__start-station'>" . $value[0]['from_station'] . "</span> &ndash; <span class='journey__destination-station'>" . $value[0]['to_station'] . "</span>";
    $html .= "</div>";
    $html .= "<div class='train__name train__details-item'>";
    $html .= "<span class='train__name--name'>" . $value[0]['train_name'] . "</span><span class='train__type'>" . $value[0]['train_type'] . "</span>";
    $html .= "</div>";
    $html .= "<div class='journey__start__end-time train__details-item'>" . $value[0]['time_1'][0][0]['arrival_time'] . " am - " . $value[0]['time_1'][1][0]['arrival_time'] . " am</div>";
    $html .= "<div class='journey__time train__details-item'>{$since_start1 ->h} h {$since_start1->i} min</div>";
    $html .= "</div>";
    $html .= "<div class='seperator'></div>";
    $html .= "<div class='card__persons card__item'>";
    if ($value[0]['passengers'] > 1) {
        $html .= "<span>" . $value[0]['passengers'] . " people</span>";
    } else if ($value[0]['passengers'] == 1) {
        $html .= "<span>" . $value[0]['passengers'] . " person</span>";
    }

    $html .= "</div>";
    $html .= "<div class='seperator'></div>";
    $html .= "<div class='card__class card__item'>";
    if( $value[0]['class'] =="secondClass"){
        $html .= "<span>Second Class</span>";
    }
    if( $value[0]['class'] =="firstClass"){
        $html .= "<span>First Class</span>";
    }
    
    $html .= "</div>";
    $html .= "<div class='seperator'></div>";
    $html .= "<div class='card__price card__item'>";
    $html .= "<span>Rs&nbsp;</span><span class='ticket__price'>" . $value[0]['base_price'] . "</span>";
    $html .= "</div>";
    $html .= "</div>";
    $html .= "<div class='total-price__box'>";
    $html .= "<span class='total-price__box--text'>final amount&nbsp;:</span>";
    $html .= "<div class='card__price'>";
    $html .= "<span>Rs</span>&nbsp;<span class='ticket__price'>" . $value[0]['total_amount'] . "</span>";
    $html .= "</div>";
    $html .= "</div>";
    $html .= "<div class='btn__container'>";
    $html .= "<button class='btn btn-round-blue'>Cancel Booking</button>";
    $html .= "</div>";
    $dom = new DOMDocument();
    $dom->loadHTML($html);
    print_r($dom->saveHTML());

}
