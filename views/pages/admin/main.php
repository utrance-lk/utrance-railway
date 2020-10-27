<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Utrance-account</title>
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css?family=Lato:300,300i,700"
    />
    <link rel="stylesheet" href="../../../../utrance-railway/public/css/base.css" />
    <link rel="stylesheet" href="../../../../utrance-railway/public/css/admin/style.css" />
  </head>

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
            <a href="/utrance-railway/admin" class="sidebar__nav-settings sidebar__nav-item js--sidebar__nav-settings">
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
            <a href="/utrance-railway/admin/manage-users" class="sidebar__nav-manage--users sidebar__nav-item js--sidebar__nav-manage--users">
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