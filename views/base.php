<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Utrance Railway</title>

    <link href='https://api.mapbox.com/mapbox-gl-js/v2.1.1/mapbox-gl.css' rel='stylesheet' />

    <link
    href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;500;700&family=Sora:wght@400;500&display=swap"
    rel="stylesheet"
    />
    <link
    href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@300&display=swap"
    rel="stylesheet"
    />
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css?family=Lato:300,300i,700"
    />
    <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css"
    />

    <link rel="stylesheet" href="/public/css/style.concat.css" />
    <link rel="stylesheet" href="/public/css/pages/newsFeed/newsFeed.css" />
    <link rel="stylesheet" href="/public/css/pages/myBookings/myBookings.css" />
    <link rel="stylesheet" href="/public/css/pages/booking/booking.css" />
    <link rel="stylesheet" href="/public/css/layout/flashError.css"/>
    <link rel="stylesheet" href="/public/css/layout/flashSuccess.css"/>
    <link rel="stylesheet" href="/public/css/pages/admin/admin.css" />
    <link rel="stylesheet" href="/public/css/pages/resetPassword/resetPassword.css" />
    <link rel="stylesheet" href="/public/css/layout/flashErrorlogin.css"/>
    <link rel="stylesheet" href="/public/css/layout/flashSuccesslogin.css"/>
    <link rel="stylesheet" href="/public/css/pages/forgotPassword/forgotPassword.css" />

    <script src='https://api.mapbox.com/mapbox-gl-js/v2.1.1/mapbox-gl.js'></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

  </head>

  <body>

<?php if (isset($_REQUEST['url'])): ?>
        <?php if ($_REQUEST['url'] !== 'resetPassword' && $_REQUEST['url'] !== 'forgotPassword'): ?>
                {{header}}
        <?php endif;?>
<?php endif;?>
<?php
if (App::$APP->activeUser()['role'] === 'detailsProvider' && ($_REQUEST['url'] === 'profile' || $_REQUEST['url'] === 'settings' || $_REQUEST['url'] === 'trains/update' || $_REQUEST['url'] === 'contact-admin')): ?>

<?php endif;?>

{{content}}

<?php if (isset($_REQUEST['url'])): ?>
        <?php if ($_REQUEST['url'] !== 'resetPassword' && $_REQUEST['url'] !== 'forgotPassword'): ?>
                {{footer}}
        <?php endif;?>
<?php endif;?>

</body>