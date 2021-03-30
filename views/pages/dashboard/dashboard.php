<?php include_once '../views/components/backButton.php';?>
<div class="dashboard">
    <?php
        if(App::$APP->activeUser()['role'] == 'admin') {
            include_once '../views/layouts/adminSideNav.php';
        } else if(App::$APP->activeUser()['role'] == 'user') {
            include_once '../views/layouts/userSideNav.php';
          } else if(App::$APP->activeUser()['role'] == 'detailsProvider') {
            include_once '../views/layouts/detailsProviderSideNav.php';
        }
    ?>

<?php
if (isset($_SESSION['operation'] ) ) {
 
     if(App::$APP->session->get('operation')=='fail'){
  
    
    $html="<div class='alert hide'>";
    $html.="<span class='fas fa-exclamation-circle'></span>";
    $html.="<span class='msg'>Error:Something Went Wrong!!</span>";
    $html.="<span class='close-btn'>";
    $html.="<span class='fas fa-times'></span></span></div>";

    $dom = new DOMDocument();
    $dom->loadHTML($html);
    print_r($dom->saveHTML());
    

               
  }else if(App::$APP->session->get('operation')=='success'){
    
    $html="<div class='alert-Success hide-Success'>";
    $html.="<span class='fas fa-check-circle'></span>";
    $html.="<span class='msg-Success'>Sucess:Your File has been uploaded!!</span>";
    $html.="<span class='close-btn-Success'>";
     $html.="<span class='fas fa-times'></span></span></div>";

    $dom = new DOMDocument();
    $dom->loadHTML($html);
    print_r($dom->saveHTML());
    
  }
  App::$APP->session->remove('operation');
}

?>
<script type="text/javascript" src="../../../utrance-railway/public/js/components/flashMessages.js"></script>




    <div class="dash-content__container js--load-content-container">
        <div class="dash-content">
          <div>
            <div class="heading-secondary margin-b-m margin-t-m">
              <p class="center-text">Your Account Settings</p>
            </div>
            
            <?php
              include '../views/layouts/helpers.php';
            ?>

            <?php
              if (isset($_SESSION['user'] ) ) {
                $html = "";
                
                $value='';
                $id = App::$APP->activeUser()['id'];
                
                $html .="<form action='/utrance-railway/settings' class='dash-content__form' method='POST' enctype='multipart/form-data'>";
                $html .= "<div class='dash-content__input'>";
                $html .= "<label for='firstname' class='dash-content__label'>First Name</label>";
                if(isset($firstNameError)){
                  $html .= "<input type='text' name='first_name' class='form__input error__placeholder'  placeholder='".$firstNameError."'   ></div>"; 
                 
                }else{
                  $html .= "<input type='text' name='first_name' class='form__input'   value='".App::$APP->activeUser()['first_name']."' ></div>"; 
                  
                }
               
                $html .= "<div class='dash-content__input'>";
                $html .= "<label for='lastname' class='dash-content__label'>Last Name</label>";

                if(isset($lastNameError)){
                  $html .= "<input type='text' name='last_name' class='form__input error__placeholder'  placeholder='".$lastNameError."'   ></div>"; 
                 
                }else{
                  $html .= "<input type='text' name='last_name' class='form__input'   value='".App::$APP->activeUser()['last_name']."' ></div>"; 
                  
                }
                $html .= "<div class='dash-content__input'>";
                $html .= "<label for='email' class='dash-content__label'>Email</label>";
                if(isset($email_id_error)){
                  $html .= "<input type='text' name='email_id' class='form__input error__placeholder'  placeholder='".$email_id_error."'   ></div>"; 
                 
                }else{
                  $html .= "<input type='text' name='email_id' class='form__input'   value='".App::$APP->activeUser()['email_id']."' ></div>"; 
                  
                }
                
                $html .= "<div class='dash-content__input'>";
                $html .= "<span class='dash-content__input-address'>Address</span>";
                $html .= "<div class='dash-content__input'>";
                $html .= "<label for='stl1' class='dash-content__label'>Street Line 1</label>";
                if(isset($streetLine1Error)){
                  $html .= "<input type='text' name='street_line1' class='form__input error__placeholder' placeholder='".$streetLine1Error."' ></div>";
                }else{
                  $html .= "<input type='text' name='street_line1' class='form__input'  value='".App::$APP->activeUser()['street_line1']."'></div>";
                  
                }
                
                $html .= "<div class='dash-content__input'>";
                $html .= "<label for='stl2' class='dash-content__label'>Street Line 2</label>";

                if(isset($streetLine2Error)){
                  $html .= "<input type='text' name='street_line2' class='form__input error__placeholder' placeholder='".$streetLine2Error."' ></div>";
                }else{
                  $html .= "<input type='text' name='street_line2' class='form__input'  value='".App::$APP->activeUser()['street_line2']."'></div>";
                  
                }

                
                $html .= "<div class='dash-content__input'>";
                $html .= "<label for='city' class='dash-content__label'>City</label>";
               
                  $cityArray=array("Ampara","Anuradhapura","Badulla","Batticaloa","Colombo","Galle","Gampaha","Hambantota","Jaffna","Kalutara","Kandy","Kegalle","Kilinochchi","Kurunagala","Mannar","Matale","Matara","Monaragala","Mullaitivu","Nuwara Eliye","Polonnaruwa","Puttalam","Ratnapura","Trincomalee","Vavuniya");

                  $html .="<select name='city' class='form__input'>";
                  $val=App::$APP->activeUser()['city'];
                  $html .="<option  value='$val'>$val</option>";
                  foreach($cityArray as $cities){
                    $html .="<option  value='$cities'>$cities</option>";
                   }
                  
                  $html .="</select></div></div>";

                
                $html .= "<div class='dash-content__input'>";
                $html .= "<label for='contactno' class='dash-content__label'>Contact No</label>";
                if(isset($contactNumError)){
                  $html .= "<input type='text' name='contact_num' class='form__input error__placeholder' placeholder='".$contactNumError."' ></div>";
                }else{
                  $html .= "<input type='text' name='contact_num' class='form__input'  value='" .App::$APP->activeUser()['contact_num']."'></div>";
                }
                //asimdu

                /*$user_img = App::$APP->activeUser()['user_image'];
                $html .= "<div id='image_box' name='image_box'>";
                $html .= "<img src='../../../../utrance-railway/public/img/uploads/$user_img' alt='user-profile-picture' name='image_preview' id='image_preview' class='settings__profile-img'/>";
                $html .= "<input type='file' name='photo' accept='image/*' class='form__upload' id='photo'    />";
                
                $html .= "<label for='photo' class='btn-square-upload' >Choose New Photo</label></div>";*/
               
                $html .= "<div class='settings__btn'>";
                
                $html .= "<input type='submit' class='btn btn-round-blue margin-b-l margin-t-s' name='save' value='Save Settings'></div>";
                 
               $dom = new DOMDocument();
                $dom->loadHTML($html);
                print_r($dom->saveHTML());

            }
          ?>
            </form>


            <?php

          $html = "";
          $html .= "<form action='/utrance-railway/upload' method='POST' enctype='multipart/form-data'>";
          $html .= "<div class='userpicture-box' id='image_box' name='image_box' >";
          $image_name = App::$APP->activeUser()['user_image'];

          $html .= "<img src='../../../../utrance-railway/public/img/uploads/$image_name' alt='user-profile-picture' name='image_preview' onClick='triggerClick()'  id='image_preview' style='width:128px;height:128px' />";

          $html .= "<input type='file' name='file' onChange='displayImage(this)'   accept='image/*' class='form__upload' id='photo' >";

          $html .= "<label for='photo'>Choose New Photo</label></div>";

          $html .= "<div class='btn__upload-box'>";

          $html .= "<input type='submit' class='btn btn-round-blue margin-b-l margin-t-s' name='upload' value='Upload Image'  id='upload-btn'></div></form>";

          $dom = new DOMDocument();
          $dom->loadHTML($html);
         print_r($dom->saveHTML());

          ?>

            <div class="seperator"></div>
            <div class="heading-secondary center-text margin-b-m">
              <p>Password Change</p>
            </div>
            
            <form action="/utrance-railway/update-password" method="POST" class="dash-content__form">
            <?php
            
              $html = "";
              $html .= "<div class='dash-content__input'>";
              $html .= "<label for='currentpassword' class='dash-content__label'>Current Password</label>";
              
              if(isset($passwordError)){
                $html .= "<input type='password' name='user_password' placeholder='".$passwordError."'  class='form__input error__placeholder'/></div>";
              }else{
                $html .= "<input type='password' name='user_password' placeholder='****************'  class='form__input'/></div>";
              }

              $html .= "<div class='dash-content__input'>";
              $html .= "<label for='newpassword' class='dash-content__label'>New Password</label>";
              
              if(isset($passwordMatchError)){
                $html .= "<input type='password' name='user_new_password'  placeholder='".$passwordMatchError."' class='form__input error__placeholder'></div>";
              }else{
                $html .= "<input type='password' name='user_new_password' placeholder='Password should contain at least 1 lowercase, 1 uppercase, 1 special character and a digit'   class='form__input'/></div>";
              }

              $html .= "<div class='dash-content__input'>";
              $html .= "<label for='confirmpassword' class='dash-content__label'>Confirm Password</label>";
              $html .= "<input type='password' name='user_confirm_password' placeholder='Password should contain at least 1 lowercase, 1 uppercase, 1 special character and a digit' class='form__input'></div>";

              $html .= "<div class='settings__btn'>";
              $html .= "<input type='submit' class='btn btn-round-blue margin-b-l margin-t-s' value='Save Password'></div>";

              $dom = new DOMDocument();
              $dom->loadHTML($html);
              print_r($dom->saveHTML());
            ?>
            </form>
          </div>

        </div>
    </div>
</div>
<script type="text/javascript" src="../../../utrance-railway/public/js/components/viewUserImage.js"></script>
</body>
</html>



