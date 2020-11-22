<div class="load-content-container">
    <div class="load-content">
        <div class="load-content--manage-trains">
              <form class="dashboard-searchbar--container" method='POST' action="/utrance-railway/trains" >
                <input type="text" class="dashboard-searchbar" placeholder="Search trains by name or id" name="searchTrain"/>
                <button>
                <svg class="search-icon__btn">
                  <use xlink:href="/utrance-railway/public/img/pages/admin/svg/sprite.svg#icon-magnifying-glass"></use>
                </svg>
                </button>
                <div class="dashboard-searchbar__dropdown">
                  <!-- <svg class="dropdown-btn">
                              <use xlink:href="./icons/sprite.svg#icon-chevron-small-down"></use>
                          </svg> -->
                  <!-- <select name="catogory" id="" class="dropdown__list">
                    <option value="name">Name</option>
                    <option value="id">Id</option>
                  </select> -->
                </div>
              </form>

              <a href="/utrance-railway/trains/add" class="adduserbtn addbtn">
                <div class="addtrainbtn-text addbtn-text">Add Train</div>
                <svg class="addtrainbtn-img addbtn-img">
                  <use xlink:href="/utrance-railway/public/img/pages/admin/svg/sprite.svg#icon-circle-with-plus"></use>
                </svg> 
              </a>
              <div class="search__results-container">
                <?php
                        $dom = new DOMDocument;
                        libxml_use_internal_errors(true);
                        $dom->loadHTML('...');
                        libxml_clear_errors();
                    
                        if(isset($trains))
                        {
                          foreach($trains as $key => $value)
                          {
                            $html ="<div class='search__result-card'>
                              <div class='search__result-train-idbox'>#
                            ";

                            $html .= "<span class='train__id ' name='id'>" .$value['train_id'] . "</span></div>";
                          

                            $html .= "<div class='search__result-train-namebox'>" .$value['train_name'] . "</div>";
                            $html .= "<div class='search__result-train-typebox'>" .$value['train_type'] . "</div>";
                            $train_id=$value['train_id'];
                            // $train_active_status=$value['train_active_status'];

                            $html .= "<a href='/utrance-railway/trains/view?id=$train_id' class='search__result-train-managebtnbox'>";
                            $html .= "<div class='search__result-managebtn btn-white'>View</div></a>";
                            
                            $html .= "<a href='/utrance-railway/trains/delete?id=$train_id' class='search__result-train-deletebtnbox' >";
                            $html .= "<div class='search__result-deletebtn btn-white' onclick=\"return confirm('Are you sure?');\">Delete</div></a></div></div>";
                            

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
























  
