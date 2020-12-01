<div class="load-content-container">
        <div class="load-content">
          <div class="load-content--manage-users">
            <form class="dashboard-searchbar--container">
              <input
                type="text"
                class="dashboard-searchbar"
                placeholder="Search users by name"
              />
              <svg class="search-icon__btn">
                <use
                  xlink:href="../../public/img/pages/admin/svg/sprite.svg#icon-magnifying-glass"
                ></use>
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

            <div class="adduserbtn">
              <div class="adduserbtn-text">Add User</div>
              <svg class="adduserbtn-img">
                <use xlink:href="../../public/img/pages/admin/svg/sprite.svg#icon-circle-with-plus">
                </use>
              </svg> 
            </div>

            <div class="search__results-container">

              <div class="search__result-card">
                <div class="search__result-user-mainbox">
                  <div class="user-mainbox__img-box">
                    <img
                      src="../../../../utrance-railway/public/img/pages/admin/Chris-user-profile.jpg"
                      alt="profile-avatar"
                      class="profile__avatar"
                    />
                  </div>

                  <div class="user-mainbox__other">
                    <div class="user-mainbox__other-name">Chris</div>
                    <div class="user-mainbox__other-id">
                      #<span class="user__id">1</span>
                    </div>
                  </div>
                </div>
                <div class="search__result-user-emailbox">
                  chris@example.com
                </div>
                <div class="search__result-user-rolebox">Admin</div>
                <div class="search__result-user-managebtnbox">
                  <div class="search__result-managebtn">Manage</div>
                </div>

               <div class="search__result-user-deletebtnbox">
                  <div class="search__result-deletebtn">Delete</div>
                </div>
              </div>

              <div class="search__result-card">
                <div class="search__result-user-mainbox">
                  <div class="user-mainbox__img-box">
                    <img
                      src="../../../../utrance-railway/public/img/pages/admin/user-2.png"
                      alt="profile-avatar"
                      class="profile__avatar"
                    />
                  </div>

                  <div class="user-mainbox__other">
                    <div class="user-mainbox__other-name">Matt</div>
                    <div class="user-mainbox__other-id">
                      #<span class="user__id">2</span>
                    </div>
                  </div>
                </div>

                <div class="search__result-user-emailbox">matt@example.com</div>
                <div class="search__result-user-rolebox">User</div>
                <div class="search__result-user-managebtnbox">
                  <div class="search__result-managebtn">Manage</div>
                </div>
                <div class="search__result-user-deletebtnbox">
                  <div class="search__result-deletebtn">Delete</div>
                </div>
              </div>
            </div>//search result container
          </div>
          </div>

        </div>
      </div>
