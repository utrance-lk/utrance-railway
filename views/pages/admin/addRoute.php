<?php include_once '../views/components/backButton.php';?>
<div class="dashboard">
    <?php include_once '../views/layouts/adminSideNav.php';?>
    <div class="dash-content__container">
        <div class="dash-content" id="addroute">
            <div class="heading-secondary margin-b-m margin-t-m">
              <p class="center-text">New Route</p>
              <div class="center-text">#<span>39</span></div>
            </div>
            <div class="view-routes__title margin-t-m margin-b-s">
                <div>Path id</div>
                <div>Station</div>
                <div>Arr. Time</div>
                <div>Dept. Time</div></div>
                <span class="btn btn-square-blue" id="add-first-stop">
                    <div class="btn-square-blue__text">Add First Stop</div>
                    <svg class="btn-square-blue__icon">
                        <use xlink:href="/utrance-railway/public/img/svg/sprite.svg#icon-circle-with-plus"></use>
                    </svg>
                </span>
          </div>
         </div>
</div>
<script type="text/javascript" src="/utrance-railway/public/js/pages/admin/addRoute.js"></script>
<script>
    addRouteEvents();
</script>