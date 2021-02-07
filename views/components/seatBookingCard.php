<?php

function renderTrainBookingCard($trainNo, $fromStation, $toStation, $trainName, $trainType, $fromTime, $toTime, $journeyTime, $initialPrice)
{
    return "
            <div class='seat-booking-card'>
                <div class='seat-booking-card__train-no'>
                    train $trainNo
                </div>
                <div class='seat-booking-card__train-details'>
                    <div class='padding-xs'>
                        <span>$fromStation</span> &ndash; <span>$toStation</span>
                    </div>
                    <div class='padding-xs'>
                        <span class='margin-r-xs'>$trainName</span><span class='seat-booking-card__train-type'>$trainType</span>
                    </div>
                    <div class='padding-xs'>$fromTime - $toTime</div>
                    <div class='padding-xs'>$journeyTime</div>
                </div>
                <div class='seat-booking-card__seperator'></div>
                <div class='seat-booking-card__mini-box'>
                    <input type='number' class='seat-booking-card__person-count' name='person__count' value='1' min='1' max='10'></input>&nbsp;<label for='person__count'>person(s)</label>
                </div>
                <div class='seat-booking-card__seperator'></div>
                <div class='seat-booking-card__mini-box'>
                    <select name='train_class' id='train_class' class='seat-booking-card__train-class'>
                        <option value='firstClass'>first class</option>
                        <option value='secondClass'>second class</option>
                    </select>
                </div>
                <div class='seat-booking-card__seperator'></div>
                <div class='seat-booking-card__mini-box seat-booking-card__price'>
                    <span>Rs&nbsp;</span><span>$initialPrice</span>
                </div>
            </div>
    ";
}
