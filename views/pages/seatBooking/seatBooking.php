<div class="flex-col-stretch-center margin-t-m margin-b-m">
    <div class="flex-col-stretch-center margin-b-huge">
        <div class="heading-tertiary">
            <span><?php echo $all_start; ?></span>&nbsp;to&nbsp;<span><?php echo $all_end; ?></span>
        </div>
        <div class="topic-greyed margin-b-xxs">
            <span>journey date</span>&nbsp;&ndash;&nbsp;<span class="seat-booking__day">
                <span><?php echo explode("-",$when)[2];?></span>
                <span class="seat-booking__day-up">th</span>&nbsp;&nbsp;&nbsp;&nbsp;
            </span>
            <span><?php echo date("F", mktime(0, 0, 0, date("m", strtotime($when)), 10)) ;?></span>&nbsp;
            <span><?php echo explode("-",$when)[0];?></span>
        </div>
        <div class="topic-greyed">
            <span>journey time</span>&nbsp;&ndash;&nbsp;<span><?php echo isset($trains['t2']) ? calcFullJourneyTime($trains['t1']['journey_time'], $trains['t2']['journey_time'], $wait_time) : calcFullJourneyTime($trains['t1']['journey_time']) ?></span>
        </div>
    </div>
    <form class="seat-booking__form" action="/utrance-railway/book-seats" method="POST">
        <?php
include_once "../views/components/seatBookingCard.php";

$i = 0;
foreach ($trains as $key => $value) {
    $i++;
    echo renderTrainBookingCard($value, $i);
}

?>
        <!-- <form action="https://sandbox.payhere.lk/pay/checkout" class="flex-col-stretch-center" method="POST"> -->
        <div class="flex-col-stretch-center" >
        <input type="text" name="when" value="<?php echo $when;?>" hidden>
            <input type="text" name="train1_id" value="<?php echo $trains['t1']['train_id'];?>" hidden>
            <?php if(isset($trains['t2'])):?>
                <input type="text" name="train2_id" value="<?php echo $trains['t2']['train_id'];?>" hidden>
            <?php endif;?>
            <div class="seat-booking__total-price margin-b-m flex-row-st-center">
                <span class="margin-r-xs">final amount&nbsp;&colon;</span>
                <div class="padding-xs" style="background-color: #fff;">
                    <span>Rs</span>&nbsp;<input readonly name="amount" id="finalAmount" class="seat-booking__final-amount"></input>
                </div>
            </div>
            <input type="hidden" name="merchant_id" value="1216669">    <!-- Replace your Merchant ID -->
            <input type="hidden" name="return_url" value="https://utrance-railway.herokuapp.com/home">
            <!-- <input type="hidden" name="return_url" value="http://localhost/utrance-railway/home"> -->
            <input type="hidden" name="cancel_url" value="http://sample.com/cancel">
            <input type="hidden" name="notify_url" value="https://utrance-railway.herokuapp.com/payment">  
            <!-- <input type="hidden" name="notify_url" value="http://localhost/utrance-railway/payment">   -->
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
                <?php if ($trains['t1']['sa_second_class'] == 0) : ?>
                    <button class="btn btn-round-blue button-inactive" id="btn-book-now" type="submit" disabled>
                        Book now
                    </button>
                <?php elseif(isset($trains['t2'])) : ?> 
                    <?php if ($trains['t2']['sa_second_class'] == 0) : ?>
                        <button class="btn btn-round-blue button-inactive" id="btn-book-now" type="submit" disabled>
                            Book now
                        </button> 
                    <?php endif;?>
                <?php else: ?>
                    <button class="btn btn-round-blue" id="btn-book-now" type="submit">
                        Book now
                    </button>
                <?php endif;?>    
            </div>
        </div>
    </form>
</div>
<script type="text/javascript" src="/public/js/pages/seatBooking.js"></script>
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

    var seatArr = [];
    var tt1 = {};
    var tt2 = {};

    tt1.fcSeats = "<?php echo $trains['t1']['sa_first_class'];?>" * 1;
    tt1.scSeats = "<?php echo $trains['t1']['sa_second_class'];?>" * 1;

    seatArr.push(tt1);

    if(train2Available) {
        tt2.fcSeats = "<?php echo isset($trains['t2']) ? $trains['t2']['sa_first_class'] : 0;?>" * 1;
        tt2.scSeats = "<?php echo isset($trains['t2']) ? $trains['t2']['sa_second_class'] : 0;?>" * 1;
        seatArr.push(tt2);
    }

    getValues(arr, seatArr);
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

