{{main}}

<?php if(isset($_REQUEST['url'])) : ?>
        <?php if ($_REQUEST['url'] !== 'resetPassword' && $_REQUEST['url'] !== 'forgotPassword'): ?>
                {{header}}
        <?php endif;?>
<?php endif;?>
<?php
if (App::$APP->activeUser()['role'] === 'detailsProvider' && ($_REQUEST['url'] === 'profile' || $_REQUEST['url'] === 'settings' || $_REQUEST['url'] === 'trains/update' || $_REQUEST['url'] === 'contact-admin')): ?>
    {{detailsProviderSideNav}}
<?php endif;?>

{{content}}

<?php if(isset($_REQUEST['url'])) : ?>
        <?php if ($_REQUEST['url'] !== 'resetPassword' && $_REQUEST['url'] !== 'forgotPassword'): ?>
                {{footer}}
        <?php endif;?>
<?php endif;?>