{{main}}

{{header}}

<?php
    if(App::$APP->activeUser()['role'] === 'admin' && $_REQUEST['url'] !== 'home') : ?>
    {{adminSideNav}}
<?php endif;?>

<?php
    if(App::$APP->activeUser()['role'] === 'user' && $_REQUEST['url'] !== 'home') : ?>
    {{userSideNav}}
<?php endif;?>

{{content}}

{{footer}}
