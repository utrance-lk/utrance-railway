









<body>
<?php

$first_name_error=$last_name_error=$street_line1_error=$street_line2_error=$city_error=$contact_num_error=$email_id_error=$user_password_error=$user_confirm_password_error="";
$first_name=$last_name=$street_line1=$street_line2=$city=$contact_num=$email_id=$user_password=$user_confirm_password=" ";
var_dump("hello");
if($_SERVER["REQUEST_METHOD"]=="POST"){
    var_dump("hy");
    
    if(empty($_POST["first_name"])){
        $first_name_error="First Name is required";
    }else{
        $first_name=input_data($_POST["first_name"]);

        if(!preg_match("/^[a-zA-Z ]*$/",$first_name)){
            $first_name_error="Only alphabets and white space are allowed";
        }
    }



    if(empty($_POST["last_name"])){
        $last_name_error="last name is required";
    }else{
        $last_name=input_data($_POST["last_name"]);
        if(!preg_match("/^[a-zA-Z ]*$/",$last_name)){
            $last_name_error="Only alphabets and white space are allowed";
        }
    }

    if(empty($_POST["street_line1"])){
        $street_line1_error="Street line1 is required";
    }else{
        $street_line1=input_data($_POST["street_line1"]);
        if(!preg_match("/^[a-zA-Z ]*$/",$street_line1)){
            $street_line1_error="Only alphabets and white space are allowed"; 
        }
    }

    if(empty($_POST["street_line2"])){
        $street_line2_error="Street line2 is required";
    }else{
        $street_line2=input_data($_POST["street_line2"]);
        if(!preg_match("/^[a-zA-Z ]*$/",$street_line2)){
            $street_line2_error="Only alphabets and white space are allowed"; 
        }
    }

    if(empty($_POST["city"])){
        $city_error="City is required";
    }else{
        $city=input_data($_POST["city"]);
        if(!preg_match("/^[a-zA-Z ]*$/",$city)){
            $city_error="Only alphabets and white space are allowed"; 
        }
    }


    if(empty($_POST["user_password"])){
        $user_password_error="User password is required";
    }else{
        $user_password=input_data($_POST["user_password"]);
        if(!preg_match("/^[a-zA-Z ]*$/",$user_password)){
            $user_password_error="Only alphabets and white space are allowed"; 
        }
    }

    if(empty($_POST["user_confirm_password"])){
        $user_confirm_password_error="User confirm password is required";
    }else{
        $user_confirm_password=input_data($_POST["user_confirm_password"]);
        if(!preg_match("/^[a-zA-Z ]*$/",$user_confirm_password)){
            $user_confirm_password_error="Only alphabets and white space are allowed"; 
        }
    }



    if(empty($_POST["email_id"])){
        $email_id_error="Email is Required";
    }else{
        $email_id=input_data($_POST["email_id"]);
        if(!filter_var($email_id,FILTER_VALIDATE_EMAIL)){
            $email_id_error="Invalid email format";

        }
    }

    if(empty($_POST["contact_num"])){
        $contact_num_error="Mobile no is required";
    }else{
        $contact_num=input_data($_POST["contact_num"]);
        if(!preg_match("/^[0-9]*$/",$contact_num)){
            $contact_num_error="Only numeric value is allowed";
        }
        if(strlen($contact_num)!=10){
            $contact_num="Mobile no must contain 10 digits";
        }
    }


}

function input_data($data){
    $data=trim($data);
    $data=stripcslashes($data);
    $data=htmlspecialchars($data);
    return $data;
}
?>


<div class="auth-content">
  
  
    <form   method="POST" name="register"  id="register_form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" >
        <h2 class="form-title" style="font-size:2.7rem">Sign Up</h2>
    <div class="div-sub">
        <label class="lbl-user"><i class="fa fa-user" aria-hidden="true" style="padding-right: 1.5rem;"></i>User Name</label>
        <input type="text"  placeholder="First name" style="margin-bottom: 10px;float:left" id="first_name" name="first_name"     class="text-input" >
        <span class="error">*<?php echo $first_name_error;?></span>
        <input type="text"    id="last_name"  name="last_name" class="text-input" placeholder="Last name">
        <span class="error">*<?php echo $last_name_error;?></span>
    <form   method="post" name="register"  id="register_form"  >


        

        <h2 class="form-title" style="font-size:2.2rem">Sign Up</h2>
    <div class="div-sub">
        <label class="lbl-user"><i class="fa fa-user" aria-hidden="true" style="padding-right: 1.5rem;"></i>User Name</label>

        <input type="text" id="user-first-name" name="first_name"  class="text-input" placeholder="First name" style="margin-bottom: 10px;"  >
        
        <input type="text"  id="user-last-name"  name="last_name" class="text-input" placeholder="Last name">

        <input type="text" id="first_name" name="first_name"  class="text-input" placeholder="First name" style="margin-bottom: 10px;" >
        <input type="text"    id="last_name"  name="last_name" class="text-input" placeholder="Last name">


       
     

    </div>

    <div class="div-sub">
        <label  class="lbl-user"><i class="fa fa-envelope" aria-hidden="true" style="padding-right: 1rem;"></i>Email</label>

        <input type="email"   class="text-input" id="email_id" name="email_id" >
        <span class="error">*<?php echo $email_id_error;?></span>

        <input type="email" class="text-input" id="user-email" name="email_id">

    </div>
    <div  class="div-sub">
        <label  class="lbl-user"><i class="fa fa-map-marker" aria-hidden="true" style="padding-right: 1rem;"></i>Address</label>

        <input type="text"    id="street_line1" class="text-input" name="street_line1" placeholder="Street First line"style="margin-bottom: 10px;">
        <span class="error">*<?php echo $street_line1_error;?></span>
        <input type="text"   id="street_line2"  class="text-input"  name="street_line2" placeholder="Street Second line" style="margin-bottom: 10px;">
        <span class="error">*<?php echo $street_line2_error;?></span>

        <input type="text"   class="text-input" name="street_line1" placeholder="Street First line"style="margin-bottom: 10px;">
        <input type="text"  class="text-input"  name="street_line2" placeholder="Street Second line" style="margin-bottom: 10px;">
    

    </div>

    <div  class="div-sub">
        <label  class="lbl-user" style="display: block;"><i class="fas fa-city"></i>
            <i class="fa fa-home" aria-hidden="true"  style="padding-right: 1rem;"></i>City</label>
        <select  id="city_values"  name="city" >
            <option class="cityvalues">Matara</option>
            <option class="cityvalues">Galle</option>
            <option class="cityvalues">Colombo</option>
        </select>
    </div>
    

    <div class="div-sub">
        <label  class="lbl-user" ><i class="fa fa-phone" aria-hidden="true" style="padding-right: 1rem;"></i>Contact number</label>

        <input type="text" id="user-contact-number" class="text-input" placeholder="Ex:071-1234567" name="contact_num">

        <input type="text"   id="contact_num" class="text-input" placeholder="Ex:071-1234567" name="contact_num">
        <span class="error">*<?php echo $contact_num_error;?></span>
 </div>

    


        </div>
        <div class="div-sub">

    </div>

    <div class="div-sub">

            <label  class="lbl-user" ><i class="fa fa-picture-o" aria-hidden="true" style="padding-right: 1rem;"></i>Choose profile photo</label>
            <input type="file"  id="user-profile-image" name="user_image">
    </div>


        <div class="div-sub">
            <label  class="lbl-user"><i class="fa fa-key" aria-hidden="true" style="padding-right: 1rem;"></i>Password</label>

            <input type="password"  id="user-password" class="text-input" name="user_password" >

            <input type="password"   id="user_password" class="text-input" name="user_password" >

            <span class="error">*<?php echo $user_password_error;?></span>


            </div>


        </div>



            <div class="div-sub">
                <label  class="lbl-user"><i class="fa fa-check-circle" aria-hidden="true" style="padding-right: 1rem;"></i>Confirm Password</label>

                <input type="password"  id="user-confirm-password" name="user_confirmPassword" class="text-input" >

                <input type="password" id="user_confirmPassword" name="user_confirmPassword" class="text-input" >

                <span class="error">*<?php echo $user_confirm_password_error;?></span>



                </div>



                


            </div>


               <div id="btn-register">
                   
                    <input type="submit"  id="register-button" name="submit" class="btn btn-big" value="Submit">
               </div>
                <div class="div-sub1" style="display: inline;">
                <input type="checkbox"  id="check1" >
                <text id="sign-in">I agree with the Terms and Conditions and the privacy policy</p>
                </div>
               
    
    </form>
</div>
    <?php  
    if(isset($_POST['submit'])) {  
        echo "hello123";
    /*if($first_name_error == "" && $last_name_error == "" && $street_line1_error == "" && $street_line2_error == "" && $email_id_error == "" && $contact_num_error == "" && $user_password_error =="" && $user_confirm_password_error =="") {  
        echo "<h3 color = #FF0001> <b>You have sucessfully registered.</b> </h3>";  
        echo "<h2>Your Input:</h2>";  
        echo "Name: " .$first_name;  
        echo "<br>";  
        echo "Email: " .$email_id;  
        echo "<br>";  
        echo "Mobile No: " .$contact_num;  
        echo "<br>";  
        echo "Street Line 1: " .$street_line1;  
        echo "<br>";  
        echo "street line 2: " .$street_line2;  
    } else {  
        echo "<h3> <b>You didn't filled up the form correctly.</b> </h3>";  
    }*/  
    }  
?>  









</body>



      </html>
        




