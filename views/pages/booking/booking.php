<body>
    <nav class="nav-container">
        <div class="navbar">
            <div class="main__nav">
            <div class="logobox">
                <img src="../../../../utrance-railway/public/img/pages/booking/logo.png" alt="logo" class="logo" />
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
        
        <div class="booking__container">
            <div class="topic">
                <div class="station__text-box">
                    <span class="start__station">Matara</span>&nbsp;to&nbsp;<span class="destination__station">Kandy</span>
                </div>
                <div class="journey__date-box">
                    <span>journey date</span>&nbsp;&ndash;&nbsp;<span class="journey__date-day">
                        <span class="day">28</span>
                        <span class="day__upper">th</span>&nbsp;&nbsp;&nbsp;&nbsp;
                    </span>
                    <span class="journey__date-month">November</span>&nbsp;
                    <span class="journey__date-year">2020</span>
                </div>
                <div class="journey__time-box">
                    <span>journey time</span>&nbsp;&ndash;&nbsp;<span class="total__journey-time">6 hrs</span>
                </div>
            </div>
            <form action="#" class="booking__form">
                <div class="train__booking-card">
                    <div class="train__number-box">
                        train 1
                    </div>
                    <div class="card__train-details card__item">
                        <div class="journey train__details-item">
                            <span class="journey__start-station">Matara</span> &ndash; <span class="journey__destination-station">Colombo Fort</span>
                        </div>
                        <div class="train__name train__details-item">
                            <span class="train__name--name">Dakshina Intercity</span><span class="train__type">express</span>
                        </div>
                        <div class="journey__start__end-time train__details-item">02 : 42 am - 05 : 21 am</div>
                        <div class="journey__time train__details-item">02 h 39 min</div>
                    </div>
                    <div class="seperator"></div>
                    <div class="card__persons card__item">
                        <input type="number" class="person__count" name="person__count" value="1" min="1"></input>&nbsp;<label for="person__count">persons</label>
                    </div>
                    <div class="seperator"></div>
                    <div class="card__class card__item">
                        <select name="train_class" id="train_class" class="train_class">
                            <option value="firstClass">first class</option>
                            <option value="secondClass">second class</option>
                        </select>
                    </div>
                    <div class="seperator"></div>
                    <div class="card__price card__item">
                        <span>Rs&nbsp;</span><span class="ticket__price">200</span>
                    </div>
                </div>
                <div class="train__booking-card">
                    <div class="train__number-box">
                        train 2
                    </div>
                    <div class="card__train-details card__item">
                        <div class="journey train__details-item">
                            <span class="journey__start-station">Colombo Fort</span> &ndash; <span class="journey__destination-station">Kandy</span>
                        </div>
                        <div class="train__name train__details-item">
                            <span class="train__name--name">Intercity (Kandy)</span><span class="train__type">express</span>
                        </div>
                        <div class="journey__start__end-time train__details-item">09 : 00 am - 11 : 31 am</div>
                        <div class="journey__time train__details-item">02 h 31 min</div>
                    </div>
                    <div class="seperator"></div>
                    <div class="card__persons card__item">
                        <input type="number" class="person__count" name="person__count" value="1" min="1"></input>&nbsp;<label for="person__count">persons</label>
                    </div>
                    <div class="seperator"></div>
                    <div class="card__class card__item">
                        <select name="train_class" id="train_class" class="train_class">
                            <option value="firstClass">first class</option>
                            <option value="secondClass">second class</option>
                        </select>
                    </div>
                    <div class="seperator"></div>
                    <div class="card__price card__item">
                        <span>Rs&nbsp;</span><span class="ticket__price">300</span>
                    </div>
                </div>
                <div class="total-price__box">
                    <span class="total-price__box--text">final amount&nbsp;&colon;</span>
                    <div class="card__price">
                        <span>Rs</span>&nbsp;<span class="ticket__price">500</span>
                    </div>
                </div>
                <button class="btn__submit">
                    Book now
                </button>
            </form>
        </div>

    