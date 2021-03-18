<?php header('Access-Control-Allow-Origin: *'); ?>
<form method="post" action="https://sandbox.payhere.lk/pay/checkout">   
    <input type="hidden" name="merchant_id" value="1216669">    <!-- Replace your Merchant ID -->
    <input type="hidden" name="return_url" value="http://localhost/utrance-railway/checkout">
    <input type="hidden" name="cancel_url" value="http://sample.com/cancel">
    <input type="hidden" name="notify_url" value="http://localhost/utrance-railway/checkout">  
    <br><br>Item Details<br>
    <input type="text" name="order_id" value="ItemNo12345">
    <input type="text" name="items" value="Door bell wireless"><br>
    <input type="text" name="currency" value="LKR">
    <input type="text" name="amount" value="1000">  
    <br><br>Customer Details<br>
    <input type="text" name="first_name" value="Asindu">
    <input type="text" name="last_name" value="Perera"><br>
    <input type="text" name="email" value="samanp@gmail.com">
    <input type="text" name="phone" value="0771234567"><br>
    <input type="text" name="address" value="No.1, Galle Road">
    <input type="text" name="city" value="Colombo">
    <input type="hidden" name="country" value="Sri Lanka"><br><br> 
    <input type="submit" value="Buy Now">   
    
</form> 

<?php
// var_dump($_POST);


// $merchant_id = $_POST['merchant_id'];
// $order_id = $_POST['order_id'];
// $payhere_amount = $_POST['payhere_amount'];
// $payhere_currency = $_POST['payhere_currency'];
// $status_code = $_POST['status_code'];
// $md5sig = $_POST['md5sig'];

// $merchant_secret = '4pFoEGQkmjF49WTOwj17bQ4uTQbUJMUqc8W7p20s5aQW'; // Replace with your Merchant Secret (Can be found on your PayHere account's Settings page)

// $local_md5sig = strtoupper(md5($merchant_id . $order_id . $payhere_amount . $payhere_currency . $status_code . strtoupper(md5($merchant_secret))));

// if (($local_md5sig === $md5sig) && ($status_code == 2)) {
//     var_dump('checkout done');
// }
