{{main}}

<?php
    if($_REQUEST['url'] !== 'resetPassword' && $_REQUEST['url'] !== 'forgotPassword' && $_REQUEST['url'] !== 'login' && $_REQUEST['url'] !== 'register') :?>
        {{header}}
    <?php endif;?>

<?php
    if(App::$APP->activeUser()['role'] === 'admin' && ($_REQUEST['url'] === 'profile' || $_REQUEST['url'] === 'settings' || $_REQUEST['url'] === 'users' || $_REQUEST['url'] === 'routes' || $_REQUEST['url'] === 'bookings' || $_REQUEST['url'] === 'freight-bookings' || $_REQUEST['url'] === 'users/add' || $_REQUEST['url'] === 'users/view' || $_REQUEST['url'] === 'users/update' || $_REQUEST['url'] === 'users/updateSettings' || $_REQUEST['url'] === 'users/delete' || $_REQUEST['url'] === 'users/activate' || $_REQUEST['url'] === 'routes/add' || $_REQUEST['url'] === 'trains' || $_REQUEST['url'] === 'trains/update' || $_REQUEST['url'] === 'trains/delete' || $_REQUEST['url'] === 'trains/add' || $_REQUEST['url'] === 'update-password' || $_REQUEST['url'] === 'trains/view' || $_REQUEST['url'] === 'routes/')) : ?>
    {{adminSideNav}}
<?php endif;?>

<?php
    if(App::$APP->activeUser()['role'] === 'user' && ($_REQUEST['url'] === 'profile' || $_REQUEST['url'] === 'settings' || $_REQUEST['url'] === 'trains/update')) : ?>
    {{userSideNav}}
<?php endif;?>

<?php
    if(App::$APP->activeUser()['role'] === 'detailsProvider' && ($_REQUEST['url'] === 'profile' || $_REQUEST['url'] === 'settings' || $_REQUEST['url'] === 'trains/update' || $_REQUEST['url'] === 'contact-admin')) : ?>
    {{detailsProviderSideNav}}
<?php endif;?>

{{content}}

{{footer}}