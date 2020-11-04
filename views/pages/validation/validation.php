<?php


if(empty($first_name)||empty($email_id) || empty($last_name) || empty($street_line1) || empty($street_line2) || empty($contact_num) || empty($city) || empty($user_password) || empty($user_confirmPassword)){
       echo '<script>alert("Please Fill all the fields")</script>'; 
       
       //header('Location: /utrance-railway/registerPage');
}
       
if(!filter_var($email_id,FILTER_VALIDATE_EMAIL)){
        echo '<script>alert("Email is Invalid Please Enter it again!!")</script>'; 
        
        
}
if((!empty($first_name) && !empty($email_id) && !empty($last_name) && !empty($street_line1) && !empty($street_line2) && !empty($contact_num) && !empty($city) && !empty($user_password) && !empty($user_confirmPassword))){   
        
    header('Location: /utrance-railway/admin');
}else{
     header('Location: /utrance-railway/registerPage');
}
    



?>



   
   



















