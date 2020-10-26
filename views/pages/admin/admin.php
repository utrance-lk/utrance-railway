<body>
    <div class="nav-container">
      <div class="navbar">
        <div class="logobox">
          <img src="../../../../utrance-railway/public/img/pages/admin/logo.png" alt="logo" class="logo" />
        </div>
        <div class="user__nav">
          <div class="notification-box">
            <svg class="notification__icon">
              <use xlink:href="../../../../utrance-railway/public/img/pages/admin/svg/sprite.svg#icon-chat"></use>
            </svg>
            <span class="notification__numbers">13</span>
          </div>
          <div class="userdetails-box">
            <img
              src="../../../../utrance-railway/public/img/pages/admin/Chris-user-profile.jpg"
              alt="profile picture"
              class="user-img"
            />
            <span class="user-name">Chris</span>
          </div>
        </div>
      </div>
    </div>

    <div class="main-container">
      <div class="sidebar">
        <div class="sidebar__nav">
          <div class="sidebar__nav-common-items">
            <a class="sidebar__nav-settings sidebar__nav-item js--sidebar__nav-settings">
              <svg class="settings-icon sidebar__nav-icon">
                <use xlink:href="../../../../utrance-railway/public/img/pages/admin/svg/sprite.svg#icon-cog"></use>
              </svg>
              <span class="settings-name">Settings</span>
            </a>
            <div class="sidebar__nav-mybookings sidebar__nav-item">
              <svg class="mybookings-icon sidebar__nav-icon">
                <use xlink:href="../../../../utrance-railway/public/img/pages/admin/svg/sprite.svg#icon-suitcase"></use>
              </svg>
              <span class="mybookings-name">My bookings</span>
            </div>
          </div>
          <div class="userrole-name">Admin</div>
          <div class="sidebar__nav-role-items">
            <div class="sidebar__nav-manage--trains sidebar__nav-item">
              <svg class="train-icon sidebar__nav-icon">
                <use xlink:href="../../../../utrance-railway/public/img/pages/admin/svg/sprite.svg#icon-paper-plane"></use>
              </svg>
              <span class="manage--trains-name">Manage trains</span>
            </div>
            <div class="sidebar__nav-manage--routes sidebar__nav-item">
              <svg class="route-icon sidebar__nav-icon">
                <use xlink:href="../../../../utrance-railway/public/img/pages/admin/svg/sprite.svg#icon-location"></use>
              </svg>
              <span class="manage--route-name">Manage routes</span>
            </div>
            <div class="sidebar__nav-manage--users sidebar__nav-item js--sidebar__nav-manage--users">
              <svg class="user-icon sidebar__nav-icon">
                <use xlink:href="../../../../utrance-railway/public/img/pages/admin/svg/sprite.svg#icon-man"></use>
              </svg>
              <span class="manage--users-name">Manage users</span>
            </div>
            <div class="sidebar__nav-manage--bookings sidebar__nav-item">
              <svg class="bookings-icon sidebar__nav-icon">
                <use xlink:href="../../../../utrance-railway/public/img/pages/admin/svg/sprite.svg#icon-map"></use>
              </svg>
              <span class="manage--bookings-name">Manage bookings</span>
            </div>
            <div class="sidebar__nav-manage--freights sidebar__nav-item">
              <svg class="freights-icon sidebar__nav-icon">
                <use xlink:href="../../../../utrance-railway/public/img/pages/admin/svg/sprite.svg#icon-shopping-cart"></use>
              </svg>
              <span class="manage--freights-name">Manage freights</span>
            </div>
          </div>
        </div>
      </div>
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
                  <div class="btn__password btn-settings">Save Password</div>
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