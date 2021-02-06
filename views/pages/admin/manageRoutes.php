<div class="dashboard">
    <?php include_once '../views/layouts/adminSideNav.php';?>
    <div class="dash-content__container">
        <div class="dash-content">
          <?php
            include_once "../views/components/searchbarAdmin.php";
            echo renderAdminSearch(['routes', 'name', 'id'], '');
          ?>
          <a href="/utrance-railway/trains/add" class="btn btn-square-blue margin-t-m">
            <div class="btn-square-blue__text">Add Route</div>
            <svg class="btn-square-blue__icon">
              <use xlink:href="/utrance-railway/public/img/svg/sprite.svg#icon-circle-with-plus"></use>
            </svg>
          </a>
            <!-- <div class="search__results-container">
              <div class="search__result-card">
                
                <div class="search__result-route-idbox">
                  #<span class="route__id">1</span>
                </div>
                <div class="search__result-route-start">Matara</div>
                <div class="search__result-route-destination">Colombo Fort</div>
                <a href="/utrance-railway/routes/view?id=1" class="btn btn-box-white margin-r-s">View</a>
                <div class="btn">
                  <div class="btn-box-white btn-box-white--delete">Delete</div>
                </div>
              </div>
              <div class="search__result-card">
                
                <div class="search__result-route-idbox">
                  #<span class="route__id">2</span>
                </div>
                <div class="search__result-route-start">Matara</div>
                <div class="search__result-route-destination">Kandy</div>
                <a href="/utrance-railway/routes/view?id=2" class="btn btn-box-white margin-r-s">View</a>
                <div class="btn">
                  <div class="btn-box-white btn-box-white--delete">Delete</div>
                </div>
              </div>
            </div> -->
          </div>
</div>
        </div>
      </div>
