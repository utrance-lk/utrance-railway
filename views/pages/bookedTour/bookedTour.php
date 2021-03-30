        <div class="booking__container">

        <?php
include_once '../views/components/bookedTourCards.php';
?>
        <?php
$dom = new DOMDocument;
libxml_use_internal_errors(true);
$dom->loadHTML('...');
libxml_clear_errors();
?>

<?php

if (isset($train_1) && isset($train_2)) {

    $i = 0;
    $newArray = [];
    array_push($newArray, $train_1);
    array_push($newArray, $train_2);

    $html = renderIntersectionCard($newArray);

}

if(isset($train_1) && !(isset($train_2))){
    $i = 0;
    $newArray = [];
    array_push($newArray, $train_1);
    $html = renderDirectCard($newArray);
}
?>
























            <!-- <div class="topic">
                <div class="station__text-box">
                    <span class="start__station">Matara</span>&nbsp;to&nbsp;<span class="destination__station">Kandy</span>
                </div>
                <div class="journey__date-box">
                    <span>journey date</span>&nbsp;&ndash;&nbsp;<span class="journey__date-day">
                        <span class="day">28</span>
                        <span class="day__upper">th</span>&nbsp;&nbsp;&nbsp;&nbsp;
                    </span>
                    <span class="journey__date-month">November</span>&nbsp;
                    <span class="journey__date-year">2020</span>
                </div>
                <div class="journey__time-box">
                    <span>journey time</span>&nbsp;&ndash;&nbsp;<span class="total__journey-time">6 hrs</span>
                </div>
            </div>
            <div class="booking__form">
                <div class="train__booking-card">
                    <div class="train__number-box">
                        train 1
                    </div>
                    <div class="card__train-details card__item">
                        <div class="journey train__details-item">
                            <span class="journey__start-station">Matara</span> &ndash; <span class="journey__destination-station">Colombo Fort</span>
                        </div>
                        <div class="train__name train__details-item">
                            <span class="train__name--name">Dakshina Intercity</span><span class="train__type">express</span>
                        </div>
                        <div class="journey__start__end-time train__details-item">02 : 42 am - 05 : 21 am</div>
                        <div class="journey__time train__details-item">02 h 39 min</div>
                    </div>
                    <div class="seperator"></div>
                    <div class="card__persons card__item">
                        <span>1 person(s)</span>
                    </div>
                    <div class="seperator"></div>
                    <div class="card__class card__item">
                        <span>first class</span>
                    </div>
                    <div class="seperator"></div>
                    <div class="card__price card__item">
                        <span>Rs&nbsp;</span><span class="ticket__price">200</span>
                    </div>
                </div>
                <div class="train__booking-card">
                    <div class="train__number-box">
                        train 2
                    </div>
                    <div class="card__train-details card__item">
                        <div class="journey train__details-item">
                            <span class="journey__start-station">Colombo Fort</span> &ndash; <span class="journey__destination-station">Kandy</span>
                        </div>
                        <div class="train__name train__details-item">
                            <span class="train__name--name">Intercity (Kandy)</span><span class="train__type">express</span>
                        </div>
                        <div class="journey__start__end-time train__details-item">09 : 00 am - 11 : 31 am</div>
                        <div class="journey__time train__details-item">02 h 31 min</div>
                    </div>
                    <div class="seperator"></div>
                    <div class="card__persons card__item">
                        <span>5 person(s)</span>
                    </div>
                    <div class="seperator"></div>
                    <div class="card__class card__item">
                        <span>second class</span>
                    </div>
                    <div class="seperator"></div>
                    <div class="card__price card__item">
                        <span>Rs&nbsp;</span><span class="ticket__price">300</span>
                    </div>
                </div>
                <div class="total-price__box">
                    <span class="total-price__box--text">final amount&nbsp;&colon;</span>
                    <div class="card__price">
                        <span>Rs</span>&nbsp;<span class="ticket__price">500</span>
                    </div>
                </div>
                <div class="btn__container">
                    <button class="btn btn-round-blue">
                        Cancel Booking
                    </button>
                </div>
                </div> -->
                </div>
        </div>

