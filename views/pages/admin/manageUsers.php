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
                <use xlink:href="/utrance-railway/public/img/pages/admin/svg/sprite.svg#icon-magnifying-glass"></use>
              </svg>
              <div class="dashboard-searchbar__dropdown">
               
                <select name="catogory" id="" class="dropdown__list">
                  <option value="name">Name</option>
                  <option value="id">Id</option>
                </select>

              </div>
            </form>

            <a href="/utrance-railway/admin/users/add" class="adduserbtn addbtn">
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
                  if(isset($users)){
                    foreach($users as $key=>$value){
                      //echo $value['first_name'];
                     $html =" <form class='search__result-card' id='form-card' method='get'>
                             <div class='search__result-user-mainbox search__result-mainbox'>
                             <div class='user-mainbox__img-box'>";


                      $html .="<img src='/utrance-railway/public/img/pages/admin/".$value['first_name'].".jpg' alt='profile-avatar' class='profile__avatar'/></div>";
                      $html .="<div class='user-mainbox__other'>";
                      $html .= "<div class ='user-mainbox__other-name'> " .$value['first_name']. "</div>";
                      $html .= "<div class ='user-mainbox__other-id'> # ";
                      $html .="<span class='user__id'> ".$value['id'] . "</span></div></div></div>";
                      if($value['user_active_status']==1){
                        $status="Deactivated";
                      }else{
                        $status="Active";
                      }
                      $html .="<div class='search__result-user-emailbox'> $status</div>";
                      $html .="<div class='search__result-user-rolebox'> " .$value['user_role'] ."</div>";

                      
                      $id = $value['id'];
                      $html .="<a href='/utrance-railway/admin/users/update?id=$id' class='search__result-user-managebtnbox'>";
                      $html .="<div class='search__result-managebtn btn-white'> View</div></a>";

                     
                     $html .="<a href='/utrance-railway/admin/users/delete?id=$id' class='search__result-user-deletebtnbox'>";
                      $html .="<div class='search__result-deletebtn btn-white' id='delete-btn'>Delete</div></a></form>";
                   
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
    


                
    