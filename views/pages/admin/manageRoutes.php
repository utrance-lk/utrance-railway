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
                <use xlink:href="/utrance-railway/public/img/pages/admin/svg/sprite.svg#icon-magnifying-glass"></use>
              </svg>
              <div class="dashboard-searchbar__dropdown">
                <!-- <svg class="dropdown-btn">
                            <use xlink:href="./icons/sprite.svg#icon-chevron-small-down"></use>
                        </svg> -->
                <select name="catogory" id="" class="dropdown__list">
                  <option value="name">Name</option>
                  <option value="id">Id</option>
                </select>
              </div>
            </form>
            <a href="/utrance-railway/admin/routes/add" class="adduserbtn addbtn">
              <div class="addroutebtn-text addbtn-text">Add Route</div>
              <svg class="addroutebtn-img addbtn-img">
                <use xlink:href="/utrance-railway/public/img/pages/admin/svg/sprite.svg#icon-circle-with-plus">
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
                <a href="/utrance-railway/admin/routes/update" class="search__result-route-managebtnbox">
                  <div class="search__result-managebtn btn-white">View</div>
                </a>
                <div class="search__result-route-deletebtnbox">
                  <div class="search__result-deletebtn btn-white">Delete</div>
                </div>
              </div>
              <div class="search__result-card">
                
                <div class="search__result-route-idbox">
                  #<span class="route__id">2</span>
                </div>
                <div class="search__result-route-start">Matara</div>
                <div class="search__result-route-destination">Kandy</div>
                <a href="/utrance-railway/admin/route/update" class="search__result-route-managebtnbox">
                  <div class="search__result-managebtn btn-white">View</div>
                </a>
                <div class="search__result-route-deletebtnbox">
                  <div class="search__result-deletebtn btn-white">Delete</div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>