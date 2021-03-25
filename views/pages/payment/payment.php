<form action="https://sandbox.payhere.lk/pay/checkout" method="POST" id="formid">
    <input readonly name="amount" id="finalAmount" value="<?php echo $_POST['amount'] ;?>" hidden>
    <input type="hidden" name="merchant_id" value="1216669">    <!-- Replace your Merchant ID -->
    <input type="hidden" name="return_url" value="http://localhost/utrance-railway/booking-success">
    <input type="hidden" name="cancel_url" value="http://sample.com/cancel">
    <input type="hidden" name="notify_url" value="https://utrance-railway.herokuapp.com/payment">
    <input type="text" name="order_id" value="" hidden readonly>
    <input type="text" name="items" value="<?php echo $_POST['items'] ;?>" hidden readonly>
    <input type="text" name="currency" value="LKR" hidden readonly>
    <input type="text" name="first_name" value="<?php echo App::$APP->activeUser()['first_name']; ?>" hidden readonly>
    <input type="text" name="last_name" value="<?php echo App::$APP->activeUser()['last_name']; ?>" hidden readonly>
    <input type="text" name="email" value="<?php echo App::$APP->activeUser()['email_id']; ?>" hidden readonly>
    <input type="text" name="phone" value="<?php echo App::$APP->activeUser()['contact_num']; ?>" hidden readonly>
    <input type="text" name="address" value="<?php echo App::$APP->activeUser()['street_line1']; ?>" hidden readonly>
    <input type="text" name="city" value="<?php echo App::$APP->activeUser()['city']; ?>" hidden readonly>
    <input type="hidden" name="country" value="Sri Lanka" hidden readonly>
    <input type="submit" value="Buy now" hidden>
</form>

<style>
    .header, .footer {
        visibility: hidden;
    }
</style>

<script type="text/javascript">
    window.addEventListener('load', function() {
        document.getElementById("formid").submit(); 
    });
</script>
