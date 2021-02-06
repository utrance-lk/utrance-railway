<div class="dashboard">
    <?php include_once '../views/layouts/adminSideNav.php';?>

<div class="load-content-container">
        <div class="load-content">
          <div class="load-content--settings">
            <div class="content-title">
              <p>New User Account Settings</p>
            </div>
            <form action="/utrance-railway/users/add" class="form__user-data" method="POST">
              
                <?php
                    $dom = new DOMDocument;
                    libxml_use_internal_errors(true);
                    $dom->loadHTML('...');
                    libxml_clear_errors();
                  ?>
                  
               <?php
               //if(isset($user)){
               // foreach($user as $key=>$value){
               
                
                
                  $html =" ";
                  
                  $html .="<div class='content__fields'>";
                  $html .="<div class='firstname-box content__fields-item'>";
                  $html .="<label for='firstname' class='form__label'>First Name </label>";
                  if(empty($first_name) && empty($firstNameError)){
                    $html .="<input type='text' name='first_name' class='form__input' required /></div>";
                  }
                  if(!empty($first_name) && empty($firstNameError)){
                    $html .="<input type='text' name='first_name' class='form__input' value='$first_name' required /></div>";
                  }
                  if(empty($first_name) && !empty($firstNameError)){
                    $html .="<input type='text' name='first_name' class='form__input error__placeholder' placeholder='".$firstNameError."' required /></div>";
                  }

                  //$html .="<input type='text' name='first_name' class='form__input' required /></div>";

                  $html .="<div class='lastname-box content__fields-item'>";
                  $html .="<label for='lastname' class='form__label'>Last Name</label>";
                    
                  if(empty($last_name) && empty($lastNameError)){
                    $html .="<input type='text' name='last_name' class='form__input' required /></div>";
                  }
                  if(!empty($last_name) && empty($lastNameError)){
                    $html .="<input type='text' name='last_name' class='form__input' value='$last_name' required /></div>";
                  }
                  if(empty($last_name) && !empty($lastNameError)){
                    $html .="<input type='text' name='last_name' class='form__input error__placeholder' placeholder='".$lastNameError."' required /></div>";
                  }



                  //$html .="<input type='text' name='last_name' class='form__input' required/></div>";

                  $html .="<div class='emai-box content__fields-item'>";
                  $html .="<label for='email' class='form__label'>Email</label>";

                  if(empty($email_id) && empty($email_id_error)){
                    $html .="<input type='text' name='email_id' class='form__input' required /></div>";
                  }
                  if(!empty($email_id) && empty($email_id_error)){
                    $html .="<input type='text' name='email_id' class='form__input' value='$email_id' required /></div>";
                  }
                  if(empty($email_id) && !empty($email_id_error)){
                    $html .="<input type='text' name='email_id' class='form__input error__placeholder' placeholder='".$email_id_error."' required /></div>";
                  }



                  //$html .="<input type='email' name='email_id' class='form__input' required/></div>";
                  
                  $html .="<div class='address-box content__fields-item'>";
                  $html .="<span class='adress-box__title'>Address</span>";
                  $html .="<div class='streetline-1 content__fields-item'>";
                  $html .="<label for='stl1' class='form__label'>Street Line 1</label>";

                  if(empty($street_line1) && empty($streetLine1Error)){
                    $html .="<input type='text' name='street_line1' class='form__input' required /></div>";
                  }
                  if(!empty($street_line1) && empty($streetLine1Error)){
                    $html .="<input type='text' name='street_line1' class='form__input' value='$street_line1' required /></div>";
                  }
                  if(empty($street_line1) && !empty($streetLine1Error)){
                    $html .="<input type='text' name='email_id' class='form__input error__placeholder' placeholder='".$streetLine1Error."' required /></div>";
                  }




                  //$html .="<input type='text' name='street_line1' class='form__input' required /></div>";

                  $html .="<div class='streetline-2 content__fields-item'>";
                  $html .="<label for='stl2' class='form__label'>Street Line 2</label>";

                  if(empty($street_line2) && empty($streetLine2Error)){
                    $html .="<input type='text' name='street_line2' class='form__input' required /></div>";
                  }

                  if(!empty($street_line2) && empty($streetLine2Error)){
                    $html .="<input type='text' name='street_line2' class='form__input' value='$street_line2' required /></div>";
                  }
                  if(empty($street_line1) && !empty($streetLine2Error)){
                    $html .="<input type='text' name='street_line2' class='form__input error__placeholder' placeholder='".$streetLine2Error."' required /></div>";
                  }


                  //$html .="<input type='text' name='street_line2' class='form__input' required /></div>";

                  $html .="<div class='city content__fields-item'>";
                  $html .="<label for='city' class='form__label'>City</label>";
                  $cityArray=array("Ampara","Anuradhapura","Badulla","Batticaloa","Colombo","Galle","Gampaha","Hambantota","Jaffna","Kalutara","Kandy","Kegalle","Kilinochchi","Kurunagala","Mannar","Matale","Matara","Monaragala","Mullaitivu","Nuwara Eliye","Polonnaruwa","Puttalam","Ratnapura","Trincomalee","Vavuniya");
                  $html .="<select name='city' class='form__input'>";
                  foreach($cityArray as $cities){
                    $html .="<option value='$cities'>$cities</option>";
                   }
                  //$html .="<select name='city' id='city' class='form__input'>";
                  //$html .="<option value='Matara'>Matara</option>";
                 // $html .="<option value='Colombo'>Colombo</option></select></div></div>";
                  $html .="</select></div></div>";
                  $html .="<div class='contactno-box content__fields-item'>";
                  $html .="<label for='contactno' class='form__label'>Contact No</label>";

                  if(empty($contact_num) && empty($contactNumError)){
                  $html .="<input type='text' name='contact_num' class='form__input'  required/> </div>";
                  }
                  if(!empty($contact_num) && empty($contactNumError)){
                    $html .="<input type='text' name='contact_num' class='form__input' value='$contact_num' required/> </div>";
                  }

                  if(empty($contact_num) && !empty($contactNumError)){
                    $html .="<input type='text' name='contact_num' class='form__input error__placeholder' placeholder='".$contactNumError."' required/> </div>";
                  }

                  //$html .="<input type='text' name='contact_num' class='form__input'  required/> </div>";
                  $html .="<div class='role-box content__fields-item'>";
                  $html .="<label for='role' class='form__label'>Role</label>";
                  $html .="<select name='user_role' id='role' class='form__input'>";
                  $html .="<option value='admin'>Admin</option>";
                  $html .="<option value='detailsProvider'>Details Provider</option></select></div>";


                  $html .="<div class='seperator'></div>";
                  $html .="<div class='content-title'>";
                  $html .="<p>Create Password</p></div>";

                  $html .="<div>";
                  $html .="<div class='newpassword-box content__fields-item'>";
                  $html .="<label for='newpassword' class='form__label'>Create Password</label>";
                   
                  if(empty($user_password) && empty($passwordError)){
                    $html .="<input type='password'  name='user_password' class='form__input' placeholder='Password should contain at least 1 lowercase, 1 uppercase, 1 special character and a digit' required/></div>";
                  }
                  if(!empty($user_password) && empty($passwordError)){
                    $html .="<input type='password'  name='user_password' class='form__input' placeholder='Password should contain at least 1 lowercase, 1 uppercase, 1 special character and a digit' required/></div>";
                  }
                  if(empty($user_password) && !empty($passwordError)){
                    $html .="<input type='password'  name='user_password' class='form__input error__placeholder' placeholder='".$passwordError."' required/></div>";
                  }



                  //$html .="<input type='password'  name='user_password' class='form__input' required/></div>";


                  $html .="<div class='confirmpassword-box content__fields-item'>";
                  $html .="<label for='confirmpassword' class='form__label'>Confirm Password</label>";
                  $html .="<input type='password' name='user_confirm_password' class='form__input' required/></div>";


                  $html .="<div class='btn__save-box'>";
                  $html .="<button class='btn btn-round-blue margin-b-l' type='Submit'>Add User</button></div></div>";

                  
                  $dom = new DOMDocument();
                  $dom->loadHTML($html);
                  print_r($dom->saveHTML());
                //}
               //}
                ?>


          </div>
        </div>
      </div>
             


              <!--div class="content__fields">
                <div class="firstname-box content__fields-item">
                  <label for="firstname" class="form__label">First Name</label>
                  <input type="text" name="first_name" class="form__input" />
                </div>

                <div class="lastname-box content__fields-item">
                  <label for="lastname" class="form__label">Last Name</label>
                  <input type="text" name="last_name" class="form__input" />
                </div>

                <div class="emai-box content__fields-item">
                  <label for="email" class="form__label">Email</label>
                  <input type="email" name="email_id" class="form__input" />
                </div>


                <div class="address-box content__fields-item">
                  <span class="adress-box__title">Address</span>
                  <div class="streetline-1 content__fields-item">
                    <label for="stl1" class="form__label">Street Line 1</label>
                    <input type="text" name="street_line1" class="form__input" />
                  </div>


                  <div class="streetline-2 content__fields-item">
                    <label for="stl2" class="form__label">Street Line 2</label>
                    <input type="text" name="street_line2" class="form__input" />
                  </div>

                  <div class="city content__fields-item">
                    <label for="city" class="form__label">City</label>
                    <select name="city" id="city" class="form__input">
                    <option value="Matara">Matara</option>
                    <option value="Colombo">Colombo</option>
                    
                  </select>
                  </div>
                </div>

                <div class="contactno-box content__fields-item">
                  <label for="contactno" class="form__label">Contact No</label>
                  <input type="text" name="contact_num" class="form__input" />
                </div>


                <div class="role-box content__fields-item">
                  <label for="role" class="form__label">Role</label>
                  <!-- <input type="text" name="role" class="form__input" /> -->
                  <!--select name="user_role" id="role" class="form__input">
                    <option value="admin">Admin</option>
                    <option value="detailsProvider">Details Provider</option>
                    
                  </select>
                </div>
                <!--div class="userpicture-box">
                  <img
                    src="/utrance-railway/public/img/pages/admin/Chris-user-profile.jpg"
                    alt="user-profile-picture"
                    class=""
                  />
                  <input
                    type="file"
                    name="photo"
                    accept="image/*"
                    class="form__upload"
                    id="photo"
                  />
                  <label for="photo">Choose New Photo</label>
                </div!-->
                <!-- <div class="btn__save-box">
                  <div class="btn__save btn-settings">Save Settings</div>
                </div> -->
              
            <!-- </form> -->
            <!--div class="seperator"></div>
            <div class="content-title">
              <p>Create Password</p>
            </div>
            <!-- <form action="" class="password__change"> -->
              <!--div class="content__fields">
                <!-- <div class="currentpassword-box content__fields-item">
                  <label for="currentpassword" class="form__label"
                    >Current Password</label
                  >
                  <input
                    type="password"
                    name="currentpassword"
                    class="form__input"
                  />
                </div> -->
                <!--div class="newpassword-box content__fields-item">
                  <label for="newpassword" class="form__label">Create Password</label>
                  <input
                    type="password"
                    name="user_password"
                    class="form__input"
                  />
                </div>


                <div class="confirmpassword-box content__fields-item">
                  <label for="confirmpassword" class="form__label"
                    >Confirm Password</label
                  >
                  <input
                    type="password"

                    name="user_confirmpassword"

                    name="user_confirmPassword"

                    class="form__input"
                  />
                </div>


                <div class="btn__save-box">
                  <button class="btn__save btn__password" type="Submit">Add User</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>