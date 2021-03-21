
<div class="load-content-container js--load-content-container">
        <div class="load-content">
          <div class="load-content--settings">
            <div class="content-title">
              <p>Your Account Settings</p>
            </div>
            <!--form  action='/utrance-railway/settings' class='form__user-data' method='POST' enctype='multipart/form-data'>
            <div class="content__fields"!-->

            <?php
$dom = new DOMDocument;
libxml_use_internal_errors(true);
$dom->loadHTML('...');
libxml_clear_errors();
?>

            <?php
              if (isset($_SESSION['user'] ) ) {
                $html = "";
                
                $value='';
                $id = App::$APP->activeUser()['id'];
                
                $html .="<form action='/settings' class='dashboard__form' method='POST' enctype='multipart/form-data'>";
                $html .="<div class='content__fields'>";
                $html .= "<div class='firstname-box content__fields-item'>";
                $html .= "<label for='firstname' class='form__label'>First Name</label>";
                if(isset($firstNameError)){
                  $html .= "<input type='text' name='first_name' class='form__input error__placeholder'  placeholder='".$firstNameError."'   ></div>"; 
                 
                }else{
                  $html .= "<input type='text' name='first_name' class='form__input'   value='".App::$APP->activeUser()['first_name']."' ></div>"; 
                  
                }
               
                $html .= "<div class='lastname-box content__fields-item'>";
                $html .= "<label for='lastname' class='form__label'>Last Name</label>";

                if(isset($lastNameError)){
                  $html .= "<input type='text' name='last_name' class='form__input error__placeholder'  placeholder='".$lastNameError."'   ></div>"; 
                 
                }else{
                  $html .= "<input type='text' name='last_name' class='form__input'   value='".App::$APP->activeUser()['last_name']."' ></div>"; 
                  
                }
                $html .= "<div class='emai-box content__fields-item'>";
                $html .= "<label for='email' class='form__label'>Email</label>";
                if(isset($email_id_error)){
                  $html .= "<input type='text' name='email_id' class='form__input error__placeholder'  placeholder='".$email_id_error."'   ></div>"; 
                 
                }else{
                  $html .= "<input type='text' name='email_id' class='form__input'   value='".App::$APP->activeUser()['email_id']."' ></div>"; 
                  
                }
                
                $html .= "<div class='address-box content__fields-item'>";
                $html .= "<span class='adress-box__title'>Address</span>";
                $html .= "<div class='streetline-1 content__fields-item'>";
                $html .= "<label for='stl1' class='form__label'>Street Line 1</label>";
                if(isset($streetLine1Error)){
                  $html .= "<input type='text' name='street_line1' class='form__input error__placeholder' placeholder='".$streetLine1Error."' ></div>";
                }else{
                  $html .= "<input type='text' name='street_line1' class='form__input'  value='".App::$APP->activeUser()['street_line1']."'></div>";
                  
                }

                
                $html .= "<div class='streetline-2 content__fields-item'>";
                $html .= "<label for='stl2' class='form__label'>Street Line 2</label>";

                if(isset($streetLine2Error)){
                  $html .= "<input type='text' name='street_line2' class='form__input error__placeholder' placeholder='".$streetLine2Error."' ></div>";
                }else{
                  $html .= "<input type='text' name='street_line2' class='form__input'  value='".App::$APP->activeUser()['street_line2']."'></div>";
                  
                }

                
                $html .= "<div class='city content__fields-item'>";
                $html .= "<label for='city' class='form__label'>City</label>";
               
                  $cityArray=array("Ampara","Anuradhapura","Badulla","Batticaloa","Colombo","Galle","Gampaha","Hambantota","Jaffna","Kalutara","Kandy","Kegalle","Kilinochchi","Kurunagala","Mannar","Matale","Matara","Monaragala","Mullaitivu","Nuwara Eliye","Polonnaruwa","Puttalam","Ratnapura","Trincomalee","Vavuniya");
                  $html .="<select name='city' class='form__input'>";
                  $val=App::$APP->activeUser()['city'];
                  $html .="<option  value='$val'>$val</option>";
                  foreach($cityArray as $cities){
                    $html .="<option  value='$cities'>$cities</option>";
                   }
                
                  
                  $html .="</select></div></div>";

                
                $html .= "<div class='contactno-box content__fields-item'>";
                $html .= "<label for='contactno' class='form__label'>Contact No</label>";
                if(isset($contactNumError)){
                  $html .= "<input type='text' name='contact_num' class='form__input error__placeholder' placeholder='".$contactNumError."' ></div>";
                }else{
                  $html .= "<input type='text' name='contact_num' class='form__input'  value='" .App::$APP->activeUser()['contact_num']."'></div>";
                  
                }

                $user_img = App::$APP->activeUser()['user_image'];
                $html .= "<div class='userpicture-box' id='image_box' name='image_box'>";
                $html .= "<img src='/public/img/uploads/$user_img.jpg' alt='user-profile-picture' name='image_preview' id='image_preview' class=''/>";
                $html .= "<input type='file' name='photo' accept='image/*' class='form__upload' id='photo'    />";
                
                $html .= "<label for='photo'>Choose New Photo</label></div>";
               
                $html .="<div  class='search__result-user-managebtnbox'>";
                $html .= "<div class='btn__save-box'>";
                
                $html .= "<input type='submit' class='btn btn-round-blue margin-b-l margin-t-s' name='save' value='Save Settings'></div></div>";
                 

               $dom = new DOMDocument();
                $dom->loadHTML($html);
                print_r($dom->saveHTML());

            }

?>

              </div>


               <!--form action="/upload" method="POST" enctype="multipart/form-data">
              <div class="userpicture-box" id="image_box" name="image_box">
              <img src="../../../../public/img/uploads/Sugath.jpg" alt="user-profile-picture" name="image_preview"  id="image_preview" />
              <input type="file" name="file" accept="image/*"  class="form__upload" id="photo">

              <label for="photo">Choose New Photo</label></div>

              <div class="btn__upload-box">
              <input type="submit" class="btn btn-round-blue margin-b-l margin-t-s" name="upload" value="Upload Image"  id="upload-btn">
              </div>
              </form!-->

              <?php

$html = "";
$html .= "<form action='/upload' method='POST' enctype='multipart/form-data'>";
$html .= "<div class='userpicture-box' id='image_box' name='image_box'>";
$image_name = App::$APP->activeUser()['user_image'];

$html .= "<img src='/public/img/uploads/$image_name' alt='user-profile-picture' name='image_preview' onClick='triggerClick()'  id='image_preview' />";

$html .= "<input type='file' name='file' onChange='displayImage(this)'   accept='image/*' class='form__upload' id='photo' >";

$html .= "<label for='photo'>Choose New Photo</label></div>";

$html .= "<div class='btn__upload-box'>";

$html .= "<input type='submit' class='btn btn-round-blue margin-b-l margin-t-s' name='upload' value='Upload Image'  id='upload-btn'></div></form>";

$dom = new DOMDocument();
$dom->loadHTML($html);
print_r($dom->saveHTML());

?>


            <div class="seperator"></div>
            <div class="content-title">
              <p>Password Change</p>
            </div>

            <form action="/update-password" method="POST" class="password__change">
              <div class="content__fields">
            <?php

$html = "";
$html .= "<div class='currentpassword-box content__fields-item'>";
$html .= "<label for='currentpassword' class='form__label'>Current Password</label>";

if (isset($passwordError)) {
    $html .= "<input type='password' name='user_password' placeholder='" . $passwordError . "'  class='form__input error__placeholder'/></div>";
} else {

    $html .= "<input type='password' name='user_password' placeholder='****************'  class='form__input'/></div>";
}
// $html .= "<input type='password' name='user_password' class='form__input'/></div>";

$html .= "<div class='newpassword-box content__fields-item'>";
$html .= "<label for='newpassword' class='form__label'>New Password</label>";

if (isset($passwordMatchError)) {
    $html .= "<input type='password' name='user_new_password'  placeholder='" . $passwordMatchError . "' class='form__input error__placeholder'></div>";
} else {
    $html .= "<input type='password' name='user_new_password' placeholder='Password should contain at least 1 lowercase, 1 uppercase, 1 special character and a digit'   class='form__input'/></div>";
}

// $html .= "<input type='password' name='user_new_password' class='form__input'></div>";

$html .= "<div class='confirmpassword-box content__fields-item'>";
$html .= "<label for='confirmpassword' class='form__label'>Confirm Password</label>";
$html .= "<input type='password' name='user_confirm_password' placeholder='Password should contain at least 1 lowercase, 1 uppercase, 1 special character and a digit' class='form__input'></div>";

$html .= "<div class='btn__save-box'>";

//$html .= "<div class='btn__save btn__password'>Save Password</div></div>";
$html .= "<input type='submit' class='btn btn-round-blue margin-b-l margin-t-s' value='Save Password'></div>";

$dom = new DOMDocument();
$dom->loadHTML($html);
print_r($dom->saveHTML());
?>
              </div>
            </form>
          </div>

        </div>
    </div>
</div>

<script type="text/javascript" src="/public/js/components/viewUserImage.js"></script>
</body>
</html>


<?php

//     $fileNameNew="";
//     if(isset($_POST["upload"])){
//      $file=$_FILES['file'];

//      $fileName=$_FILES['file']['name'];
//      $fileTmpName=$_FILES['file']['tmp_name'];
//      $fileSize=$_FILES['file']['size'];
//      $fileError=$_FILES['file']['error'];
//      $fileType=$_FILES['file']['type'];

//      $fileExt=explode('.',$fileName);
//      $fileActualExt=strtolower(end($fileExt));

//      $allowed=array('jpg','jpeg','png');

//      if(in_array($fileActualExt,$allowed)){
//         if($fileError === 0){
//             if($fileSize < 1000000){
//                $fileNameNew=uniqid('',true).".".$fileActualExt;
//                $fileDestination='img/uploads/'.$fileNameNew;
//                move_uploaded_file($fileTmpName,$fileDestination);
//                echo "file Added Successfully";
//                var_dump($fileNameNew);
//                return $fileNameNew;
//             }else{
//                echo "Your file is too big!!!";
//             }
//         }else{
//            echo "There Was an error uploading your file!!!";
//         }

//      }else{
//         echo "You Can not Upload files of this type!!!";
//      }

//    /* if($_FILES["photo"]["name"]!= ''){

//        $test=explode(".",$_FILES["photo"]["name"]);

//        $extension=end($test);
//        $name=rand(100,999).".".$extension;
//        var_dump($name);
//        $location='/public/img/uploads/'.$name;
//        move_uploaded_file($_FILES["photo"]["tmp_name"],$location);
//        echo "Image Upload Successfully";

//    }*/
// }

?>












