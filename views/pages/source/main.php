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
    <link rel="stylesheet" href="../../../../utrance-railway/public/css/source/style.css" />
    <link rel="stylesheet" href="../../../../utrance-railway/public/css/layout/header.css" />
    <link rel="stylesheet" href="../../../../utrance-railway/public/css/layout/footer.css" />
  </head>

  <body>
  <div class="nav-container">
      <div class="navbar">
        <div class="main__nav">
          <div class="logobox">
            <img src="../../../../utrance-railway/public/img/pages/admin/logo.png" alt="logo" class="logo" />
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
            <a href="/utrance-railway/source" class="sidebar__nav-settings sidebar__nav-item js--sidebar__nav-settings">
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
          <div class="userrole-name">Details Provider</div>
          <div class="sidebar__nav-role-items">
            <a href="/utrance-railway/source/contactAdmin" class="sidebar__nav-manage--trains sidebar__nav-item">
              <svg class="train-icon sidebar__nav-icon">
                <use xlink:href="../../../../utrance-railway/public/img/pages/admin/svg/sprite.svg#icon-paper-plane"></use>
              </svg>
              <span class="manage--trains-name">Contact Admin</span>
            </a>
          </div>
        </div>
      </div>