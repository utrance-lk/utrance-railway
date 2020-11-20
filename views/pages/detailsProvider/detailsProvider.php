<div class="load-content-container js--load-content-container">
        <div class="load-content">
          <div class="load-content--settings">
            <div class="content-title">
              <p>Your Account Settings</p>
            </div>
            <form formaction="/utrance-railway/settings" class="form__user-data" method="POST">
            <div class="content__fields">
            <?php
              $dom = new DOMDocument;
              libxml_use_internal_errors(true);
              $dom->loadHTML('...');
              libxml_clear_errors();
            ?>

            <?php
              if (isset($_SESSION['user'])) {
                $html = "";
               
                $html .= "<div class='firstname-box content__fields-item'>";
                $html .= "<label for='firstname' class='form__label'>First Name</label>";
                
                if(isset($firstNameError)){
                  $html .= "<input type='text' name='first_name' class='form__input' placeholder='".$firstNameError."' ></div>";
                }else{
                  $html .= "<input type='text' name='first_name' class='form__input' value=" . App::$APP->activeUser()['first_name'] . "></div>";
                }
               // $html .= "<input type='text' name='first_name' class='form__input' value=" . App::$APP->activeUser()['first_name'] . "></div>";
                $html .= "<div class='lastname-box content__fields-item'>";
                $html .= "<label for='lastname' class='form__label'>Last Name</label>";
                
                if(isset($lastNameError)){
                  $html .= "<input type='text' name='last_name' class='form__input'  placeholder='".$lastNameError."'></div>";
                }else{
                  $html .= "<input type='text' name='last_name' class='form__input' value=" . App::$APP->activeUser()['last_name'] . "></div>";
                }
                //$html .= "<input type='text' name='last_name' class='form__input' value=" . App::$APP->activeUser()['last_name'] . "></div>";
                
                $html .= "<div class='emai-box content__fields-item'>";
                $html .= "<label for='email' class='form__label'>Email</label>";

                if(isset($email_id_error)){
                  $html .= "<input type='email' name='email_id' class='form__input' placeholder='".$email_id_error."' ></div>";
                }else{
                  $html .= "<input type='email' name='email_id' class='form__input' value=" . App::$APP->activeUser()['email_id'] . "></div>";
                }


                //$html .= "<input type='email' name='email_id' class='form__input' value=" . App::$APP->activeUser()['email_id'] . "></div>";
                $html .= "<div class='address-box content__fields-item'>";
                $html .= "<span class='adress-box__title'>Address</span>";
                $html .= "<div class='streetline-1 content__fields-item'>";
                $html .= "<label for='stl1' class='form__label'>Street Line 1</label>";

                if(isset($streetLine1Error)){
                  $html .= "<input type='text' name='street_line1' class='form__input' placeholder='".$streetLine1Error."' ></div>";
                }else{
                  $val=App::$APP->activeUser()['street_line1'];
                  $html .= "<input type='text' name='street_line1' class='form__input' value='$val'></div>";
                }

                //$html .= "<input type='text' name='street_line1' class='form__input' value=" . App::$APP->activeUser()['street_line1'] . "></div>";
                $html .= "<div class='streetline-2 content__fields-item'>";
                $html .= "<label for='stl2' class='form__label'>Street Line 2</label>";
                
                if(isset($streetLine2Error)){
                  $html .= "<input type='text' name='street_line2' class='form__input' placeholder='".$streetLine2Error."'></div>";
                }else{
                  $val=App::$APP->activeUser()['street_line2'];
                  $html .= "<input type='text' name='street_line2' class='form__input' value='$val'></div>";
                }
                //$html .= "<input type='text' name='street_line2' class='form__input' value=" . App::$APP->activeUser()['street_line2'] . "></div>";
                $html .= "<div class='city content__fields-item'>";
                $html .= "<label for='city' class='form__label'>City</label>";
               
                if(isset($cityError)){
                  $html .= "<input type='text' name='city' class='form__input'  placeholder='".$cityError."'></div></div></div>";
                }else{
                  $html .= "<input type='text' name='city' class='form__input' value=" . App::$APP->activeUser()['city'] . "></div></div></div>";
                }
                //$html .= "<input type='text' name='city' class='form__input' value=" . App::$APP->activeUser()['city'] . "></div></div></div>";
                $html .= "<div class='contactno-box content__fields-item'>";
                $html .= "<label for='contactno' class='form__label'>Contact No</label>";

                if(isset($contactNumError)){
                  $html .= "<input type='text' name='contact_num' class='form__input' placeholder='".$contactNumError."'></div>";
                }else{
                  $html .= "<input type='text' name='contact_num' class='form__input' value=" . App::$APP->activeUser()['contact_num'] . "></div>";
                }

                //$html .= "<input type='text' name='contact_num' class='form__input' value=" . App::$APP->activeUser()['contact_num'] . "></div>";
                $html .= "<div class='userpicture-box'>";
                $html .= "<img src='../../../../utrance-railway/public/img/pages/admin/Chris-user-profile.jpg' alt='user-profile-picture' class=''/>";
                $html .= "<input type='file' name='photo' accept='image/*' class='form__upload' id='photo' />";
                $html .= "<label for='photo'>Choose New Photo</label></div>";
                $html .= "<div class='btn__save-box'>";
                $html .= "<button type='submit' class='btn__save btn-settings'  name='submit'>Save Settings</button></div>";

                $dom = new DOMDocument();
                $dom->loadHTML($html);
                print_r($dom->saveHTML());
              }
            ?>
              </div>
              </form>

            <div class="seperator"></div>
            <div class="content-title">
              <p>Password Change</p>
            </div>
            <form action="/utrance-railway/updatePassword" method="POST" class="password__change">
              <div class="content__fields">
            <?php
              $html = "";

              $html .= "<div class='currentpassword-box content__fields-item'>";
              $html .= "<label for='currentpassword' class='form__label'>Current Password</label>";
              if(isset($passwordError)){
                $html .= "<input type='password' name='user_password' placeholder='".$passwordError."' class='form__input'/></div>";
              }else{
                $html .= "<input type='password' name='user_password' class='form__input'/></div>";
              }
             

              $html .= "<div class='newpassword-box content__fields-item'>";
              $html .= "<label for='newpassword' class='form__label'>New Password</label>";



              if(isset($passwordMatchError)){
                $html .= "<input type='password' name='newpassword' placeholder='".$passwordMatchError."' class='form__input'></div>";
              }else{
                $html .= "<input type='password' name='user_new_password' class='form__input'></div>";

              }
              //$html .= "<input type='password' name='newpassword' class='form__input'></div>";

              $html .= "<div class='confirmpassword-box content__fields-item'>";
              $html .= "<label for='confirmpassword' class='form__label'>Confirm Password</label>";
              $html .= "<input type='password' name='user_confirm_password' class='form__input'></div>";

              $html .= "<div class='btn__save-box'>";
              $html .= "<div class='btn__save btn__password'>Save Password</div></div>";

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

</body>
</html>