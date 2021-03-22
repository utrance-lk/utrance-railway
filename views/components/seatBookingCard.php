<?php

function renderTrainBookingCard($train, $id)
{

    $timeDecide = timeDecider(substr($train['from_dept'], 0, 2));
    
    $fromHr = $timeDecide[0];
    $fromMin = substr($train['from_dept'], 3, 2);
    $fromDayTime = $timeDecide[1];
    
    $timeDecide = timeDecider(substr($train['to_arrt'], 0, 2));
    $toHr = $timeDecide[0];
    $toMin = substr($train['to_arrt'], 3, 2);
    $toDayTime = $timeDecide[1];
    
    $fullHr = substr($train['journey_time'], 0, 2);
    $fullMin = substr($train['journey_time'], 3, 2);


    return "
            <div class='seat-booking-card'>
                <div class='seat-booking-card__train-no'>
                    train {$train['train_no']}
                </div>
                <div class='seat-booking-card__train-details'>
                    <div class='padding-xs'>
                        <span id='from{$id}'>{$train['from']}</span> &ndash; <span id='to{$id}'>{$train['to']}</span>
                    </div>
                    <div class='padding-xs'>
                        <span class='margin-r-xs'>{$train['train_name']}</span><span class='seat-booking-card__train-type'>null</span>
                    </div>
                    <div class='padding-xs'>$fromHr&nbsp;&colon;&nbsp;$fromMin&nbsp;$fromDayTime&nbsp;&ndash;&nbsp;$toHr&nbsp;&colon;&nbsp;$toMin&nbsp;$toDayTime</div>
                    <div class='padding-xs'>$fullHr&nbsp;h&nbsp;$fullMin&nbsp;m</div>
                </div>
                <div class='seat-booking-card__seperator'></div>
                <div class='seat-booking-card__mini-box'>
                    <input type='number' id='persons{$id}' class='seat-booking-card__person-count' name='person__count' value='1' min='1' max='10'></input>&nbsp;<label for='person__count'>person(s)</label>
                </div>
                <div class='seat-booking-card__seperator'></div>
                <div class='seat-booking-card__mini-box'>
                    <select name='train_class' id='train_class{$id}' class='seat-booking-card__train-class'>
                        <option value='firstClass'>first class</option>
                        <option value='secondClass' selected>second class</option>
                    </select>
                </div>
                <div class='seat-booking-card__seperator'></div>
                <div class='seat-booking-card__mini-box seat-booking-card__price'>
                    <span>Rs&nbsp;</span><span id='tickprice{$id}'>{$train['ticket_sc']}</span>
                </div>
            </div>
    ";
}

function timeDecider($time)
{
    $dayTime = 'am';
    if ($time > 12) {
        $time = $time - 12;
        $time = '0' . $time;
        $dayTime = 'pm';
    }
    return [$time, $dayTime];
}

