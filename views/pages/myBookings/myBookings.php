<body>
    <nav class="nav-container">
      <div class="navbar">
        <div class="main__nav">
          <div class="logobox">
            <img src="../../../../utrance-railway/public/img/pages/admin/UtranceLogo.png" alt="logo" class="logo" />
          </div>
          <div class="main__nav-items">
            <a href="/utrance-railway/home" class="home-box nav-items-little">
              <svg class="home__icon navbar__icon">
                <use xlink:href="/utrance-railway/public/img/pages/admin/svg/sprite.svg#icon-home"></use>
              </svg>
              <span class="nav__items-text-box">Home</span>
            </a>
            <div class="ticket-box nav-items-little">
              <svg class="ticket__icon navbar__icon">
                <use xlink:href="/utrance-railway/public/img/pages/admin/svg/sprite.svg#icon-ticket"></use>
              </svg>
              <span class="nav__items-text-box">Tickets</span>
            </div>
            <div class="news-box nav-items-little">
              <svg class="news__icon navbar__icon">
                <use xlink:href="/utrance-railway/public/img/pages/admin/svg/sprite.svg#icon-news"></use>
              </svg>
              <span class="nav__items-text-box">News</span>
            </div>
          </div>
        </div>
        <div class="user__nav">
          <div class="userdetails-box">
             <?php if(isset($_SESSION['user'])) : ?>
              <a href="#">
                <img
                  src="../../../../utrance-railway/public/img/pages/admin/Chris-user-profile.jpg"
                  alt="profile picture"
                  class="user-img"
                />
              </a>
              <a href="#" class="user-name"><?php echo App::$APP->activeUser()['first_name'];?></a>
              <div class="userdetails-box--dropdown">
               <ul>
                 <li>
                   <a href="/utrance-railway/profile">
                    <svg class="dropdown-icon">
                      <use xlink:href="/utrance-railway/public/img/pages/admin/svg/sprite.svg#icon-gauge"></use>
                    </svg>
                    <span>Dashboard</span>
                   </a>
                 </li>
                 <li>
                   <a href="">
                    <svg class="dropdown-icon">
                      <use xlink:href="/utrance-railway/public/img/pages/admin/svg/sprite.svg#icon-suitcase"></use>
                    </svg>
                    <span>My Bookings</span>
                   </a>
                 </li>
                 <li>
                   <a href="/utrance-railway/settings">
                    <svg class="dropdown-icon">
                      <use xlink:href="/utrance-railway/public/img/pages/admin/svg/sprite.svg#icon-cog"></use>
                    </svg>
                    <span>Settings</span>
                   </a>
                 </li>
                 <li>
                   <a href="/utrance-railway/logout">
                    <svg class="dropdown-icon">
                      <use xlink:href="/utrance-railway/public/img/pages/admin/svg/sprite.svg#icon-log-out"></use>
                    </svg>
                    <span>Logout</span>
                   </a>
                 </li>
               </ul>
             </div>
             <?php else: ?>
              <svg class="guest-user user-img">
                <use xlink:href="/utrance-railway/public/img/pages/admin/svg/sprite.svg#icon-user"></use>
              </svg>
              <a href="/utrance-railway/login" class="user-name">Login</a>
             <?php endif; ?>  
          </div>
        </div>
      </div>
    </nav>
    <div class="upcoming__trips-container">
        <div class="upcoming__trips--header">
            <div class="upcoming__trips--header-text">
                Upcoming trips
            </div>
        </div>
        <div class="upcoming__trips--cards-container">
            <div class="upcoming__trips--card">
                <div class="start-destination--box">
                    <span>Matara</span>&nbsp;&ndash;&nbsp;<span>Kandy</span>
                </div>
                <div class="basic__details--box">
                    <div class="date__box">
                        <svg class="basic__detials--box-icon">
                            <use xlink:href="/utrance-railway/public/img/pages/admin/svg/sprite.svg#icon-calendar"></use>
                        </svg>
                        <div class="basic__details--box-text">
                            28th Nov 2020
                        </div>
                    </div>
                </div>
                <div class="train__details--box">
                    <div class="train train__details--box-item">
                        <svg class="train__detials--box-icon">
                            <use xlink:href="/utrance-railway/public/img/pages/admin/svg/sprite2.svg#icon-directions_train"></use>
                        </svg>
                        <div class="train__details--box-text">
                            Dakshina Intercity
                        </div>
                    </div>
                    <div class="people__box train__details--box-item">
                        <svg class="train__detials--box-icon">
                            <use xlink:href="/utrance-railway/public/img/pages/admin/svg/sprite.svg#icon-users"></use>
                        </svg>
                        <div class="train__details--box-text">
                            5 people
                        </div>
                    </div>
                    <div class="class__box train__details--box-item">
                        <svg class="train__detials--box-icon">
                            <use xlink:href="/utrance-railway/public/img/pages/admin/svg/sprite.svg#icon-emoji-happy"></use>
                        </svg>
                        <div class="train__details--box-text">
                            First class
                        </div>
                    </div>     
                </div>
                <div class="train__details--box">
                    <div class="train train__details--box-item">
                        <svg class="train__detials--box-icon">
                            <use xlink:href="/utrance-railway/public/img/pages/admin/svg/sprite2.svg#icon-directions_train"></use>
                        </svg>
                        <div class="train__details--box-text">
                            Colombo - Kandy (Intercity)
                        </div>
                    </div>
                    <div class="people__box train__details--box-item">
                        <svg class="train__detials--box-icon">
                            <use xlink:href="/utrance-railway/public/img/pages/admin/svg/sprite.svg#icon-users"></use>
                        </svg>
                        <div class="train__details--box-text">
                            4 people
                        </div>
                    </div>
                    <div class="class__box train__details--box-item">
                        <svg class="train__detials--box-icon">
                            <use xlink:href="/utrance-railway/public/img/pages/admin/svg/sprite.svg#icon-emoji-neutral"></use>
                        </svg>
                        <div class="train__details--box-text">
                            Second class
                        </div>
                    </div>     
                </div>
                <div class="price--box">
                    Rs 500
                </div>
                <div class="btn__container">
                    <a href="/utrance-railway/booked-tour" class="btn__view-more">
                        View more
                    </a>
                </div>
            </div>
            <div class="upcoming__trips--card">
                <div class="start-destination--box">
                    <span>Matara</span>&nbsp;&ndash;&nbsp;<span>Kandy</span>
                </div>
                <div class="basic__details--box">
                    <div class="date__box">
                        <svg class="basic__detials--box-icon">
                            <use xlink:href="/utrance-railway/public/img/pages/admin/svg/sprite.svg#icon-calendar"></use>
                        </svg>
                        <div class="basic__details--box-text">
                            28th Nov 2020
                        </div>
                    </div>
                </div>
                <div class="train__details--box one__train">
                    <div class="train train__details--box-item">
                        <svg class="train__detials--box-icon">
                            <use xlink:href="/utrance-railway/public/img/pages/admin/svg/sprite2.svg#icon-directions_train"></use>
                        </svg>
                        <div class="train__details--box-text">
                            Dakshina Intercity
                        </div>
                    </div>
                    <div class="people__box train__details--box-item">
                        <svg class="train__detials--box-icon">
                            <use xlink:href="/utrance-railway/public/img/pages/admin/svg/sprite.svg#icon-users"></use>
                        </svg>
                        <div class="train__details--box-text">
                            5 people
                        </div>
                    </div>
                    <div class="class__box train__details--box-item">
                        <svg class="train__detials--box-icon">
                            <use xlink:href="/utrance-railway/public/img/pages/admin/svg/sprite.svg#icon-emoji-happy"></use>
                        </svg>
                        <div class="train__details--box-text">
                            First class
                        </div>
                    </div>     
                </div>
                <div class="price--box">
                    Rs 500
                </div>
                <div class="btn__container">
                    <a href="/utrance-railway/booked-tour" class="btn__view-more">
                        View more
                    </a>
                </div>
            </div>
            <div class="upcoming__trips--card">
                <div class="start-destination--box">
                    <span>Matara</span>&nbsp;&ndash;&nbsp;<span>Kandy</span>
                </div>
                <div class="basic__details--box">
                    <div class="date__box">
                        <svg class="basic__detials--box-icon">
                            <use xlink:href="/utrance-railway/public/img/pages/admin/svg/sprite.svg#icon-calendar"></use>
                        </svg>
                        <div class="basic__details--box-text">
                            28th Nov 2020
                        </div>
                    </div>
                </div>
                <div class="train__details--box one__train">
                    <div class="train train__details--box-item">
                        <svg class="train__detials--box-icon">
                            <use xlink:href="/utrance-railway/public/img/pages/admin/svg/sprite2.svg#icon-directions_train"></use>
                        </svg>
                        <div class="train__details--box-text">
                            Dakshina Intercity
                        </div>
                    </div>
                    <div class="people__box train__details--box-item">
                        <svg class="train__detials--box-icon">
                            <use xlink:href="/utrance-railway/public/img/pages/admin/svg/sprite.svg#icon-users"></use>
                        </svg>
                        <div class="train__details--box-text">
                            5 people
                        </div>
                    </div>
                    <div class="class__box train__details--box-item">
                        <svg class="train__detials--box-icon">
                            <use xlink:href="/utrance-railway/public/img/pages/admin/svg/sprite.svg#icon-emoji-happy"></use>
                        </svg>
                        <div class="train__details--box-text">
                            First class
                        </div>
                    </div>     
                </div>
                <div class="price--box">
                    Rs 500
                </div>
                <div class="btn__container">
                    <a href="/utrance-railway/booked-tour" class="btn__view-more">
                        View more
                    </a>
                </div>
            </div>
        </div>
    </div>

</body>