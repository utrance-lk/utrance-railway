<div class="load-content-container">
        <div class="load-content">
          <div class="load-content--settings">
            <div class="content-title">
              <p>Chris's Account Settings</p>
            </div>
            <form action="" class="form__user-data">
            <div class="content__fields">
            <?php
                  if(isset($users)){
                    foreach($users as $key=>$value){
                     
                     $html =" 
                               
                  
                  ";
                    $html .="<div class='firstname-box content__fields-item'>";
                    $html .="<label for='firstname' class='form__label'>First Name</label>";
                    $html .="<input type='text' name='firstname' class='form_input' value=".$value['first_name']."></div>";
                    $html .="<div class='lastname-box content__fields-item'>";
                    $html .="<label for='lastname' class='form__label'>Last Name</label>";
                    $html .="<input type='text' name='lastname' class='form__input' value=".$value['last_name']."></div>";
                    $html .="<div class='emai-box content__fields-item'>";
                    $html .="<label for='email' class='form__label'>Email</label>";
                    $html .="<input type='email' name='email' class='form__input' value=".$value['email_id']."></div>";
                    $html .="<div class='address-box content__fields-item'>";
                    $html .="<span class='adress-box__title'>Address</span>";
                    $html .="<div class='streetline-1 content__fields-item'>";
                    $html .="<label for='stl1' class='form__label'>Street Line 1</label>";
                    $html .="<input type='text' name='strl1' class='form__input'  value=".$value['street_line1']."></div>";
                    $html .="<div class='streetline-2 content__fields-item'>";
                    $html .="<label for='stl2' class='form__label'>Street Line 2></label>";
                    $html .="<input type='text' name='strl2' class='form__input' value=".$value['street_line2']."></div>";
                    $html .="<div class='city content__fields-item'>";
                    $html .="<label for='city' class='form__label'>City</label>";
                    $html .="<input type='text' name='city' class='form__input'  value=".$value['city']."></div>";
                    $html .="<div class='contactno-box content__fields-item'>";
                    $html .="<label for='contactno' class='form__label'>Contact No</label>";
                    $html .="<input type='text' name='contactno' class='form__input' value=".$value['contact_num']." ></div>";
                    $html .=" <div class='userpicture-box'>";
                    $html .="<img src='/utrance-railway/public/img/pages/admin/ ".$value['first_name'].".jpg'  alt='user-profile-picture' class='' />";
                    $html .="<input type='file' name='photo'  accept='image/*' class='form__upload'  id='photo'/>";
                    $html .="<label for='photo'>Choose New Photo</label></div>";
                    $html .="<div class='btn__save-box'>";
                    $html .="<div class='btn__save btn-settings'>Save Settings</div></div>";
                   
                    $dom = new DOMDocument();
                    $dom->loadHTML($html);
                    print_r($dom->saveHTML());
                  
                    }
                  }
                  



                  ?>



            <!--form action="" class="form__user-data">
              <div class="content__fields">
                <div class="firstname-box content__fields-item">
                  <label for="firstname" class="form__label">First Name</label>
                  <input type="text" name="firstname" class="form__input" />
                </div>
                <div class="lastname-box content__fields-item">
                  <label for="lastname" class="form__label">Last Name</label>
                  <input type="text" name="lastname" class="form__input" />
                </div>
                <div class="emai-box content__fields-item">
                  <label for="email" class="form__label">Email</label>
                  <input type="email" name="email" class="form__input" />
                </div>
                <div class="address-box content__fields-item">
                  <span class="adress-box__title">Address</span>
                  <div class="streetline-1 content__fields-item">
                    <label for="stl1" class="form__label">Street Line 1</label>
                    <input type="text" name="strl1" class="form__input" />
                  </div>
                  <div class="streetline-2 content__fields-item">
                    <label for="stl2" class="form__label">Street Line 2</label>
                    <input type="text" name="strl2" class="form__input" />
                  </div>
                  <div class="city content__fields-item">
                    <label for="city" class="form__label">City</label>
                    <input type="text" name="city" class="form__input" />
                  </div>
                </div>
                <div class="contactno-box content__fields-item">
                  <label for="contactno" class="form__label">Contact No</label>
                  <input type="text" name="contactno" class="form__input" />
                </div>
                <div class="userpicture-box">
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
                </div>
                <div class="btn__save-box">
                  <div class="btn__save btn-settings">Save Settings</div>
                </div>
              </div>
            </form!-->
            </div>
            </div>
           </form>
        </div>
      </div>
    </div>