<div class="dashboard">
    <?php include_once '../views/layouts/adminSideNav.php';?>

<div class="load-content-container">
        <div class="load-content">
          <div class="load-content--manage-trains">
            <form class="dashboard-searchbar--container">
              <input
                type="text"
                class="dashboard-searchbar"
                placeholder="Search routes by name"
              />
              <svg class="search-icon__btn">
                <use xlink:href="/utrance-railway/public/img/svg/sprite.svg#icon-magnifying-glass"></use>
              </svg>
            </form>
            <a href="/utrance-railway/routes/add" class="btn btn-square-blue">
              <div class="addbtn-text">Add Route</div>
              <svg class="addbtn-img">
                <use xlink:href="/utrance-railway/public/img/svg/sprite.svg#icon-circle-with-plus">
                </use>
              </svg> 
            </a>
            <div class="search__results-container">
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
            </div>
          </div>
</div>
        </div>
      </div>