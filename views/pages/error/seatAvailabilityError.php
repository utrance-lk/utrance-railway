<section class="error">
    <div class="error-box margin-t-l margin-b-l flex-col-stretch-center">
        <div class="error__text center-text margin-b-l">
            <div class="error__text--heading">
                <?php if(App::$APP->activeUser()['role'] == 'admin'):?>
                    No records for seat availability for this train in database
                <?php else:?>
                    Internal Server Error
                <?php endif;?>
            </div>
            <div class="error__text--sub">
                Cannot complete the request
            </div>
        </div>
        <img src="/public/img/pages/error/error404.png" alt="Error image" class="error__img">
    </div>
</section>