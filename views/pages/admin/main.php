<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Utrance Railway</title>
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css?family=Lato:300,300i,700"
    />
    <link rel="stylesheet" href="../../../../utrance-railway/public/css/base.css" />
    <link rel="stylesheet" href="../../../../utrance-railway/public/css/layout/header.css" />
    <link rel="stylesheet" href="../../../../utrance-railway/public/css/admin/style.css" />
    <link rel="stylesheet" href="../../../../utrance-railway/public/css/layout/footer.css" />
  </head>

  <body>
    <div class="nav-container">
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
          <div class="notification-box">
            <svg class="notification__icon navbar__icon">
              <use xlink:href="../../../../utrance-railway/public/img/pages/admin/svg/sprite.svg#icon-chat"></use>
            </svg>
            <span class="notification__numbers">13</span>
          </div>
          <div class="userdetails-box">
            <a href="#">
              <img
                src="../../../../utrance-railway/public/img/pages/admin/Chris-user-profile.jpg"
                alt="profile picture"
                class="user-img"
              />
            </a>
            <a href="#" class="user-name"><?php echo App::$APP->activeUser()['first_name']?></a href="#">
            <div class="userdetails-box--dropdown">
               <ul>
                 <li>
                   <a href="/utrance-railway/profile">
                    <svg class="dropdown-icon">
                      <use xlink:href="/utrance-railway/public/img/pages/admin/svg/sprite.svg#icon-gauge"></use>
                    </svg>
                    <span class="userdetails-box--dropdown-text">Dashboard</span>
                   </a>
                 </li>
                 <li>
                   <a href="">
                    <svg class="dropdown-icon">
                      <use xlink:href="/utrance-railway/public/img/pages/admin/svg/sprite.svg#icon-suitcase"></use>
                    </svg>
                    <span class="userdetails-box--dropdown-text">My Bookings</span>
                   </a>
                 </li>
                 <li>
                   <a href="/utrance-railway/settings">
                    <svg class="dropdown-icon">
                      <use xlink:href="/utrance-railway/public/img/pages/admin/svg/sprite.svg#icon-cog"></use>
                    </svg>
                    <span class="userdetails-box--dropdown-text">Settings</span>
                   </a>
                 </li>
                 <li>
                   <a href="/utrance-railway/logout">
                    <svg class="dropdown-icon">
                      <use xlink:href="/utrance-railway/public/img/pages/admin/svg/sprite.svg#icon-log-out"></use>
                    </svg>
                    <span class="userdetails-box--dropdown-text">Logout</span>
                   </a>
                 </li>
               </ul>
             </div>
          </div>
        </div>
      </div>
    </div>

    <div class="main-container">
      <div class="sidebar">
        <div class="sidebar__nav">
          <div class="sidebar__nav-common-items">
            <a href="/utrance-railway/settings" class="sidebar__nav-settings sidebar__nav-item js--sidebar__nav-settings">
              <svg class="settings-icon sidebar__nav-icon">
                <use xlink:href="../../../../utrance-railway/public/img/pages/admin/svg/sprite.svg#icon-cog"></use>
              </svg>
              <span class="settings-name">Settings</span>
            </a>
            <a href="/utrance-railway/myBookings" class="sidebar__nav-mybookings sidebar__nav-item">
              <svg class="mybookings-icon sidebar__nav-icon">
                <use xlink:href="../../../../utrance-railway/public/img/pages/admin/svg/sprite.svg#icon-suitcase"></use>
              </svg>
              <span class="mybookings-name">My bookings</span>
            </a>
          </div>
          <div class="userrole-name">Admin</div>
          <div class="sidebar__nav-role-items">
            <a href="/utrance-railway/trains" class="sidebar__nav-manage--trains sidebar__nav-item">
              <svg class="train-icon sidebar__nav-icon">
                <use xlink:href="../../../../utrance-railway/public/img/pages/admin/svg/sprite.svg#icon-paper-plane"></use>
              </svg>
              <span class="manage--trains-name">Manage trains</span>
            </a>
            <a href="/utrance-railway/routes" class="sidebar__nav-manage--routes sidebar__nav-item">
              <svg class="route-icon sidebar__nav-icon">
                <use xlink:href="../../../../utrance-railway/public/img/pages/admin/svg/sprite.svg#icon-location"></use>
              </svg>
              <span class="manage--route-name">Manage routes</span>
            </a>
            <a href="/utrance-railway/users" class="sidebar__nav-manage--users sidebar__nav-item js--sidebar__nav-manage--users">
              <svg class="user-icon sidebar__nav-icon">
                <use xlink:href="../../../../utrance-railway/public/img/pages/admin/svg/sprite.svg#icon-man"></use>
              </svg>
              <span class="manage--users-name">Manage users</span>
            </a>
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
