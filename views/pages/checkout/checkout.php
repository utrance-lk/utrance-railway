<?php header('Access-Control-Allow-Origin: *'); ?>
<form method="post" action="https://sandbox.payhere.lk/pay/checkout">   
    <input type="hidden" name="merchant_id" value="1216669">    <!-- Replace your Merchant ID -->
    <input type="hidden" name="return_url" value="http://localhost/utrance-railway/checkout">
    <input type="hidden" name="cancel_url" value="http://sample.com/cancel">
    <input type="hidden" name="notify_url" value="http://localhost/utrance-railway/checkout">  
    <br><br>Item Details<br>
    <input type="text" name="order_id" >
    <input type="text" name="items"><br>
    <input type="text" name="currency">
    <input type="text" name="amount">  
    <br><br>Customer Details<br>
    <input type="text" name="first_name" >
    <input type="text" name="last_name" ><br>
    <input type="text" name="email"">
    <input type="text" name="phone"><br>
    <input type="text" name="address">
    <input type="text" name="city">
    <input type="hidden" name="country"><br><br> 
    <input type="submit">   
    
</form> 