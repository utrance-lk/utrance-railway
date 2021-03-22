<div class="flex-col-stretch-center margin-t-m margin-b-m">
    <div class="flex-col-stretch-center margin-b-huge">
        <div class="heading-tertiary">
            <span><?php echo $all_start; ?></span>&nbsp;to&nbsp;<span><?php echo $all_end; ?></span>
        </div>
        <div class="topic-greyed margin-b-xxs">
            <span>journey date</span>&nbsp;&ndash;&nbsp;<span class="seat-booking__day">
                <span>28</span>
                <span class="seat-booking__day-up">th</span>&nbsp;&nbsp;&nbsp;&nbsp;
            </span>
            <span>November</span>&nbsp;
            <span>2020</span>
        </div>
        <div class="topic-greyed">
            <span>journey time</span>&nbsp;&ndash;&nbsp;<span><?php echo isset($trains['t2']) ? calcFullJourneyTime($trains['t1']['journey_time'], $trains['t2']['journey_time'], $wait_time) : calcFullJourneyTime($trains['t1']['journey_time']) ?></span>
        </div>
    </div>
    <div class="seat-booking__form">
        <?php
include_once "../views/components/seatBookingCard.php";

$i = 0;
foreach ($trains as $key => $value) {
    $i++;
    echo renderTrainBookingCard($value, $i);
}

?>
        <form action="https://sandbox.payhere.lk/pay/checkout" class="flex-col-stretch-center" method="POST">
            <div class="seat-booking__total-price margin-b-m flex-row-st-center">
                <span class="margin-r-xs">final amount&nbsp;&colon;</span>
                <div class="padding-xs" style="background-color: #fff;">
                    <span>Rs</span>&nbsp;<input readonly name="amount" id="finalAmount" class="seat-booking__final-amount"></input>
                </div>
            </div>
            <input type="hidden" name="merchant_id" value="1216669">    <!-- Replace your Merchant ID -->
            <input type="hidden" name="return_url" value="http://utrance-railway.herokuapp.com/payment">
            <input type="hidden" name="cancel_url" value="http://sample.com/cancel">
            <input type="hidden" name="notify_url" value="http://utrance-railway.herokuapp.com/payment">  
            <input type="text" name="order_id" value="" hidden readonly>
            <input type="text" name="items" value="<?php echo $all_start . ' to ' . $all_end;?>" hidden readonly>
            <input type="text" name="currency" value="LKR" hidden readonly>
            <input type="text" name="first_name" value="<?php echo App::$APP->activeUser()['first_name']; ?>" hidden readonly>
            <input type="text" name="last_name" value="<?php echo App::$APP->activeUser()['last_name']; ?>" hidden readonly>
            <input type="text" name="email" value="<?php echo App::$APP->activeUser()['email_id']; ?>" hidden readonly>
            <input type="text" name="phone" value="<?php echo App::$APP->activeUser()['contact_num']; ?>" hidden readonly>
            <input type="text" name="address" value="<?php echo App::$APP->activeUser()['street_line1']; ?>" hidden readonly>
            <input type="text" name="city" value="<?php echo App::$APP->activeUser()['city']; ?>" hidden readonly>
            <input type="hidden" name="country" value="Sri Lanka" hidden readonly>
            <div class="seat-booking__btn-container">
                <button class="btn btn-round-blue" type="submit">
                    Book now
                </button>
            </div>
        </form>
    </div>
</div>
<script type="text/javascript" src="../../../utrance-railway/public/js/pages/seatBooking.js"></script>
<?php
    $train2Available = isset($trains['t2']);
    if(!$train2Available) {
        $train2Available = 0;
    }
?>

<script>
    var arr = [];
    var t1 = {}; 
    var t2 = {};

    t1.fcBasePrice = "<?php echo $trains['t1']['ticket_fc'];?>" * 1;
    t1.scBasePrice = "<?php echo $trains['t1']['ticket_sc'];?>" * 1;
    arr.push(t1);
    var train2Available = "<?php echo $train2Available;?>" * 1;
    if(train2Available) {
        t2.fcBasePrice = "<?php echo isset($trains['t2']) ? $trains['t2']['ticket_fc'] : 0;?>" * 1;
        t2.scBasePrice = "<?php echo isset($trains['t2']) ? $trains['t2']['ticket_sc'] : 0;?>" * 1;
        arr.push(t2);
    }
    getValues(arr);
</script>

<?php
function calcFullJourneyTime($train1Time, $train2Time = null, $waitTime = null)
{

    $fullHr = (int) substr($train1Time, 0, 2);
    $fullMin = (int) substr($train1Time, 3, 2);

    if (isset($train2Time)) {
        $fullHr += (int) substr($train2Time, 0, 2);
        $fullMin += (int) substr($train2Time, 3, 2);

        $fullHr += (int) substr($waitTime, 0, 2);
        $fullMin += (int) substr($waitTime, 3, 2);

        $fullHr += (int) ($fullMin / 60);
        $fullMin = $fullMin % 60;
    }

    if ($fullHr < 10) {
        $fullHr = "0" . $fullHr;
    }

    return $fullHr . " h " . $fullMin . " m";
}

