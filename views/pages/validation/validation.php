<?php
var_dump($_POST);


if(isset($_POST['register-btn'])){
    $first_name=$_POST['first_name'];
    $last_name=$_POST['last_name'];
    $street_line1=$_POST['street_line1'];
    $street_line2=$_POST['street_line2'];
    $contact_num=$_POST['contact_num'];
    $email_id=$_POST["email_id"];
    $user_password=$_POST['user_password'];
    $city=$_POST['city'];

    $errorEmpty=false;
    $errorEmail=false;

    if(empty($first_name||$email_id || empty($last_name) || empty($street_line1) || empty($street_line2) || empty($contact_num) || empty($city))){
        echo "<span class='form-error'>Fill in all fields!!!";
        $errorEmpty=true;
    }
    elseif(!filter_var($email_id,FILTER_VALIDATE_EMAIL)){
         echo "<span class ='form-error'>Write a valid email email address!</span>";
         $errorEmail=true;
    }else{
        echo "<span class ='form-success'>Fill all filels!</span>";
    }

    
}else{
    echo "There was an error";
}




?>
<script>

   
$("#first_name,#last_name,#street_line1,#street_line2,#contact_num,#email_id,#user_password").removeClass("input-error");

 var errorEmpty="<?php echo $errorEmpty; ?>";
 var errorEmail="<?php echo $errorEmail; ?>";

 if(errorEmpty == true){
   $("#first_name,#last_name,#street_line1,#street_line2,#contact_num,#email_id,#user_password").addClass("input-error");
 }

 if(errorMail == true){
    $("#email_id").addClass("input-error");
 }

 if(errorEmpty == false && errorMail ==false){
           $("#first_name,#last_name,#street_line1,#street_line2,#contact_num,#email_id,#user_password").val("");
 }
</script>
