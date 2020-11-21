  <div class="load-content-container">
      <div class="load-content">
          <div class="load-content--manage-users">
            <form class="dashboard-searchbar--container" method='POST' action="/utrance-railway/users">

              <input
                type="text"
                class="dashboard-searchbar"
                placeholder="Search users by name or id"  name="searchUserByNameOrId"
              />
              <!-- <button> -->
              <a href="/utrance-railway/users">
              <svg class="search-icon__btn">
                <use xlink:href="/utrance-railway/public/img/pages/admin/svg/sprite.svg#icon-magnifying-glass"></use>
              </svg>
              </a>
              <!-- </button> -->
              <!-- <div class="dashboard-searchbar__dropdown">

                <select name="catogory" id="" class="dropdown__list">
                  <option value="name">Name</option>
                  <option value="id">Id</option>
                </select>


              </div>

              </div> -->

            </form>

            <a href="/utrance-railway/users/add" class="adduserbtn addbtn">
              <div class="adduserbtn-text addbtn-text">Add User</div>
              <svg class="adduserbtn-img addbtn-img">
                <use xlink:href="/utrance-railway/public/img/pages/admin/svg/sprite.svg#icon-circle-with-plus">
                </use>
              </svg>
            </a>



           <div method="POST"  name="manage_users"  id="manage_user_form" >
                <div class="search__results-container">


                  <?php
             $dom = new DOMDocument;
             libxml_use_internal_errors(true);
             $dom->loadHTML('...');
              libxml_clear_errors();
             ?>

        <?php
        if (isset($users)) {
         foreach ($users as $key => $value) {
        //echo $value['first_name'];
        $html = " <form class='search__result-card' id='form-card' method='get'>
                  <div class='search__result-user-mainbox search__result-mainbox'>
                  <div class='user-mainbox__img-box'>";

        $html .= "<img src='/utrance-railway/public/img/uploads/Ashoka.jpg' alt='profile-avatar' class='profile__avatar'/></div>";
        $html .= "<div class='user-mainbox__other'>";
        $html .= "<div class ='user-mainbox__other-name'> " . $value['first_name'] . "</div>";
        $html .= "<div class ='user-mainbox__other-id'><span>#<span>";
        $html .= "<span class='user__id'> " . $value['id'] . "</span></div></div></div>";

        if ($value['user_active_status'] == 0) {
            $status = "Deactivated";
        } else {
            $status = "Active";
        }

        $html .= "<div class='search__result-user-emailbox'> $status</div>";
        if($value['user_role']==="admin"){
          $valueRole="Admin";
        }
        if($value['user_role']==="user"){
          $valueRole="User";

        }
        if($value['user_role'] === "detailsProvider"){
          $valueRole="Details Provider";
        }
        $html .= "<div class='search__result-user-rolebox'>$valueRole</div>";

        $id = $value['id'];
        $html .= "<a href='/utrance-railway/users/view?id=$id' class='search__result-user-managebtnbox'>";
        $html .= "<div class='search__result-managebtn btn-white'> View</div></a>";

        //$html .="<a href='/utrance-railway/admin/users/delete?id=$id' class='search__result-user-deletebtnbox'>";
        $user_active_status = $value['user_active_status'];
        if ($user_active_status == 1) {
            $html .= "<a href='/utrance-railway/users/deactivate?id=$id&user_active_status=$user_active_status' class='search__result-user-deletebtnbox'>";
            $html .= "<div class='search__result-deactivatebtn btn-white' id='deactivate-btn'>Deactivate</div></a></form>";
        } else {
            $html .= "<a href='/utrance-railway/users/activate?id=$id&user_active_status=$user_active_status' class='search__result-user-deletebtnbox'>";
            $html .= "<div class='search__result-activatebtn btn-white' id='activate-btn'>Activate</div></a></form>";
        }

        $dom = new DOMDocument();
        $dom->loadHTML($html);
        print_r($dom->saveHTML());

    }

}
?>

                </div>
             </div>
            </div>
         </div>
         </div>
         </div>

      <script type="module" src="../../../utrance-railway/public/js/pages/admin/main.js"></script>




