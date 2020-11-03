<div class="load-content-container">
        <div class="load-content">
          <div class="load-content--manage-trains">
            <form class="dashboard-searchbar--container">
              <input
                type="text"
                class="dashboard-searchbar"
                placeholder="Search trains by name"
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
            <a href="/utrance-railway/admin/trains/add" class="adduserbtn addbtn">
              <div class="addtrainbtn-text addbtn-text">Add Train</div>
              <svg class="addtrainbtn-img addbtn-img">
                <use xlink:href="/utrance-railway/public/img/pages/admin/svg/sprite.svg#icon-circle-with-plus">
                </use>
              </svg> 
            </a>
            <div class="search__results-container">
                 <?php
                    if(isset($trains)){
                      foreach($trains as $key => $value){
                        $html ="<div class='search__result-card'>
                          <div class='search__result-train-idbox'>#
                      ";

                      $html .= "<span class='train__id ' name='id'>" .$value['train_id'] . "</span></div>";
                    

                      $html .= "<div class='search__result-train-namebox'>" .$value['train_name'] . "</div>";
                      $html .= "<div class='search__result-train-typebox'>" .$value['train_type'] . "</div>";
                      $html .= "<a href='/utrance-railway/admin/trains/update' class='search__result-train-managebtnbox'>";
                      $html .= "<div class='search__result-managebtn btn-white'>View</div></a>";
                      
                      $html .= "<div class='search__result-train-deletebtnbox'>";
                      $html .= "<div class='search__result-deletebtn btn-white'>Delete</div></div></div>";
                      

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





















  
