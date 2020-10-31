      <div class="load-content-container js--load-content-container">
        <div class="load-content">
          <div class="load-content--settings">
            <div class="content-title">
              <p>Your Account Settings</p>
            </div>
            <form action="" class="form__user-data">
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
                    src="../../../../utrance-railway/public/img/pages/admin/Chris-user-profile.jpg"
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
            </form>
            <div class="seperator"></div>
            <div class="content-title">
              <p>Password Change</p>
            </div>
            <form action="" class="password__change">
              <div class="content__fields">
                <div class="currentpassword-box content__fields-item">
                  <label for="currentpassword" class="form__label">Current Password</label>
                  <input type="password" name="currentpassword" class="form__input" />
                </div>
                <div class="newpassword-box content__fields-item">
                  <label for="newpassword" class="form__label">New Password</label>
                  <input type="password" name="newpassword" class="form__input" />
                </div>
                <div class="confirmpassword-box content__fields-item">
                  <label for="confirmpassword" class="form__label">Confirm Password</label>
                  <input type="password" name="confirmpassword" class="form__input" />
                </div>
                <div class="btn__save-box">
                  <div class="btn__save btn__password">Save Password</div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>

  </div>
  
  <script type="module" src="../../../utrance-railway/public/js/pages/admin/main.js"></script>


  </body>
</html>