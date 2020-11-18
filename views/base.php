{{main}}

{{header}}

<?php
    if(App::$APP->activeUser()['role'] === 'admin' && $_REQUEST['url'] !== 'home' && $_REQUEST['url'] !== 'myBookings' && $_REQUEST['url'] !== 'booked-tour' && $_REQUEST['url'] !== 'booking-train' && $_REQUEST['url'] !== 'freight-booking-train') : ?>
    {{adminSideNav}}
<?php endif;?>

<?php
    if(App::$APP->activeUser()['role'] === 'user' && $_REQUEST['url'] !== 'home') : ?>
    {{userSideNav}}
<?php endif;?>

{{content}}

{{footer}}