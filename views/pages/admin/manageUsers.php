  <div class="load-content-container">
      <div class="load-content">
          <div class="load-content--manage-users">
            <form class="dashboard-searchbar--container" method='POST' action="/utrance-railway/users">
              <input
                type="text"
                class="dashboard-searchbar"
                placeholder="Search users by name or id"  name="searchUserByNameOrId"
              />
              <a href="/utrance-railway/users">
              <svg class="search-icon__btn">
                <use xlink:href="/utrance-railway/public/img/svg/sprite.svg#icon-magnifying-glass"></use>
              </svg>
              </a>
            </form>

            <a href="/utrance-railway/users/add" class="btn btn-square-blue">
              <div class="addbtn-text">Add User</div>
              <svg class="addbtn-img">
                <use xlink:href="/utrance-railway/public/img/svg/sprite.svg#icon-circle-with-plus">
                </use>
              </svg>
            </a>

           <div method="POST"  name="manage_users"  id="manage_user_form" >
              <div class="search__results-container"></div>
              <div class="btn__container"></div>
           </div>
            </div>
         </div>
         </div>
         </div>

      <script type="text/javascript" src="../../../utrance-railway/public/js/components/pagination.js"></script>
      <script type="text/javascript" src="../../../utrance-railway/public/js/pages/admin/manageUsers.js"></script>
      <?php if (isset($users)): ?>
        <script>
          renderResults(<?php echo json_encode($users); ?>, <?php echo json_encode(App::$APP->activeUser()); ?>);
          renderButtons();
        </script>
      <?php endif;?>