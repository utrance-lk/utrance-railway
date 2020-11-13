<body>

<!--?php

$first_name_error=$last_name_error=$street_line1_error=$street_line2_error=$city_error=$contact_num_error=$email_id_error=$user_password_error=$user_confirm_password_error="";
$first_name=$last_name=$street_line1=$street_line2=$city=$contact_num=$email_id=$user_password=$user_confirm_password=" ";
$errorFirstName=$errorLastName=$errorStreet_line1=$errorStreet_line2=$errorCity=$errorContactnum=$erroremail_id=$errorUser_password=$errorUser_confirm_password=1;
$error="";
$userError=0;

if($_SERVER["REQUEST_METHOD"]=="POST" ){
    
 
    
    if(empty($_POST["first_name"])){
        $first_name_error="First Name is required";
        
        $userError=1;
        
    }else{
        $first_name=input_data($_POST["first_name"]);

        if(!preg_match("/^[a-zA-Z ]*$/",$first_name)){
            $first_name_error="Only alphabets and white space are allowed";
           $userError=1;
        }
    }



    if(empty($_POST["last_name"])){
        $last_name_error="last name is required";
        
        $userError=2;
    }else{
        $last_name=input_data($_POST["last_name"]);
        if(!preg_match("/^[a-zA-Z ]*$/",$last_name)){
            $last_name_error="Only alphabets and white space are allowed";
            
           
            $userError=2;
        }
    }

    if(empty($_POST["email_id"])){
        $email_id_error="Email is Required";
       
       $userError=3;
    }else{
        $email_id=input_data($_POST["email_id"]);
        if(!filter_var($email_id,FILTER_VALIDATE_EMAIL)){
            $email_id_error="Invalid email format";
          
           $userError=3;

        }
    }

    if(empty($_POST["street_line1"])){
        $street_line1_error="Street line1 is required";
        
        $userError=4;
    }else{
        $street_line1=input_data($_POST["street_line1"]);
        if(!preg_match("/^[a-zA-Z ]*$/",$street_line1)){
            $street_line1_error="Only alphabets and white space are allowed";
          
           
            $userError=4;
        }
    }

    if(empty($_POST["street_line2"])){
        $street_line2_error="Street line2 is required";
      
       $userError=5;
    }else{
        $street_line2=input_data($_POST["street_line2"]);
        if(!preg_match("/^[a-zA-Z ]*$/",$street_line2)){
            $street_line2_error="Only alphabets and white space are allowed"; 
           $userError=5;
        }
    }

    if(empty($_POST["city"])){
        $city_error="City is required";
        $userError=6;
    }else{
        $city=input_data($_POST["city"]);
        if(!preg_match("/^[a-zA-Z ]*$/",$city)){
            $city_error="Only alphabets and white space are allowed"; 
            $userError=6;
        }
    }
     

    if(empty($_POST["contact_num"])){
        $contact_num_error="Mobile no is required";
       
       $userError=7;
    }else{
        $contact_num=input_data($_POST["contact_num"]);
        if(!preg_match("/^[0-9]*$/",$contact_num)){
            $contact_num_error="Only numeric value is allowed";
          
           $userError=7;
        }
        if(strlen($contact_num)!=10){
            $contact_num_error="Mobile no must contain 10 digits";
            
            $userError=7;
        }

   /* if(empty($_POST["user_password"])){
        $user_password_error="User password is required";
        //$errorUser_password=0;
        $userError=8;

    }else{
        $user_password=input_data($_POST["user_password"]);
        if(!preg_match("/^[a-zA-Z ]*$/",$user_password)){
            $user_password_error="Only alphabets and white space are allowed"; 
            
            //$errorUser_password=0;
            $userError=8;
        }
    }*/

    /*if(empty($_POST["user_confirm_password"])){
        $user_confirm_password_error="User confirm password is required";
      //  $errorUser_confirm_password=0;
      $userError=8;
    }else{*/
        /*$user_confirm_password=input_data($_POST["user_confirm_password"]);
        if(!preg_match("/^[a-zA-Z ]*$/",$user_confirm_password)){
            $user_confirm_password_error="Only alphabets and white space are allowed!!!!";
           
           // $errorUser_confirm_password=0; 
           $userError=9;
        }*/
        $user_password=input_data($_POST["user_password"]);
        $user_confirm_password=input_data($_POST["user_confirm_password"]);
        var_dump($user_password);
        if($user_password!=$user_confirm_password){
           
            $user_confirm_password_error="Your password both does not match!!!";
            $userError=8;

        }

    }


}

function input_data($data){
    $data=trim($data);
    $data=stripcslashes($data);
    $data=htmlspecialchars($data);
    return $data;
}
?-->

	<div class="register__container">
		<div class="register__img-box register__container-item">
        
        </div>
		<div class="register__form-box register__container-item">
			<form class="form__container" method="POST">
				<div class="new-account-box-container form__container-item">
					<div class="register-text">
						Sign up
					</div>
					<div class="new-account-box">
						<span class="new-account-box--1">Already have an account?</span>&nbsp;<a href="/utrance-railway/login" class="new-account-box--2">Login here</a>
					</div>
				</div>
				<div class="firstname-box form__container-item register__form--inputs">
					<label for="first_name">First name</label>
                    <input type="text" id="first_name" name="first_name" placeholder="<?php echo isset($firstNameError) ? $firstNameError : 'Steven';?>" value="<?php echo isset($first_name) ? $first_name : '';?>" required>       
                   
				</div>
                
                
                
				<div class="lastname-box form__container-item register__form--inputs">
					<label for="last_name">Last name</label>
					<input type="text" id="last_name" name="last_name" placeholder="<?php echo isset($lastNameError) ? $lastNameError :'Smith';?>" value="<?php echo isset($last_name) ? $last_name : '';?>" required>
                   
                    
				</div>
				<div class="email-box form__container-item register__form--inputs">
					<label for="email_id">Email</label>
					<input type="email" id="email_id" name="email_id" placeholder="stevensmith@example.com"   value="<?php echo isset($email_id) ? $email_id : '';?>"required>
                   
				</div>
				<div class="streetline1-box form__container-item register__form--inputs">
					<label for="streetline1">Street line 1</label>
					<input type="text" id="streetline1" name="street_line1" placeholder="<?php echo isset($streetLine1Error) ? $streetLine1Error :'22/50, Agathuduwa Watta';?>" value="<?php echo isset($street_line1) ? $street_line1 : '';?>" required>
                    
				</div>
				<div class="streetline2-box form__container-item register__form--inputs">
					<label for="streetline2">Street line 2</label>
					<input type="text" id="streetline2" name="street_line2" placeholder="<?php echo isset($streetLine2Error) ? $streetLine2Error :'Godagama West';?>"  value="<?php echo isset($street_line2) ? $street_line2 : '';?>" required>
                    
				</div>
				<div class="city-box form__container-item register__form--inputs">
                    <label for="city">City</label>
                    <select name="city" id="city">
                        <option value="matara">Matara</option>
                        <option value="matara">Galle</option>
                        <option value="matara">Colombo</option>
                    </select>
				</div>
                <div class="contactno-box form__container-item register__form--inputs">
                    <label for="contactno">Contact No</label>
                    <input type="text" id="contactno" name="contact_num" placeholder="<?php echo isset($contactNumError) ? $contactNumError :'07*1234567';?>" value="<?php echo isset($contact_num) ? $contact_num : '';?>" required>
                   
                </div>
                <div class="password-box form__container-item register__form--inputs">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="user_password" placeholder="<?php echo isset($passwordError) ? $passwordError :'***************';?>" required>
                   
                </div>
                <div class="password-confirm-box form__container-item register__form--inputs">
                    <label for="password-confirm">Password Confirm</label>
                    <input type="password" id="password-confirm" name="user_confirm_password" placeholder="**********" required>
                   

                   
                </div>
                <!--?php
               
                var_dump($userError);
                   switch($userError){
                      
                       case 1:echo "<script>alert('$first_name_error');</script>";break;
                       case 2:echo "<script>alert('$last_name_error');</script>";break;
                       case 3:echo "<script>alert('$email_id_error');</script>";break;
                       case 4:echo "<script>alert('$street_line1_error');</script>";break;
                       case 5:echo "<script>alert('$street_line2_error');</script>";break;
                       case 6:echo "<script>alert('$city_error');</script>";break;
                       case 7:echo "<script>alert('$contact_num_error');</script>";break;
                       case 8:echo "<script>alert('$user_confirm_password_error');</script>";
                         

                   }
                   ?-->

				<!-- <div class="forgot-password-box form__container-item">
					<a href="#" class="forgort-password-box">Forgot Password?</a>
				</div> -->
				<button type="submit" class="register-btn form__container-item" formaction="#" onclick="myFunction()">
						Register
				</button>
			</form>
		</div>
		</div>
	</div>
</body>


</html>