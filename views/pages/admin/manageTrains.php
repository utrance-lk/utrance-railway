<div class="load-content-container">
    <div class="load-content">
        <div class="load-content--manage-trains">
              <form class="dashboard-searchbar--container" method='POST' action="/utrance-railway/trains" >
                <input type="text" class="dashboard-searchbar" placeholder="Search trains by name or id" name="searchTrain"/>
                <button>
                <svg class="search-icon__btn">
                  <use xlink:href="/utrance-railway/public/img/svg/sprite.svg#icon-magnifying-glass"></use>
                </svg>
                </button>
              </form>

              <a href="/utrance-railway/trains/add" class="btn btn-square-blue">
                <div class="addbtn-text">Add Train</div>
                <svg class="addbtn-img">
                  <use xlink:href="/utrance-railway/public/img/svg/sprite.svg#icon-circle-with-plus"></use>
                </svg> 
              </a>
              <div class="filters__container margin-t-s">
                <div class="filter__item">
                  <label for="train__type" class="margin-r-s">Train Type &colon;</label>
                  <select name="train__type" id="train__type" class="form__input">
                    <option value="express">All</option>
                    <option value="express">Express</option>
                    <option value="slow">Slow</option>
                    <option value="Intercity">Intercity</option>
                  </select>
                </div>
                <div class="filter__item">
                  <label for="active__status" class="margin-r-s">Active Status &colon;</label>
                  <select name="active__status" id="active__status" class="form__input">
                    <option value="active">All</option>
                    <option value="active">Active</option>
                    <option value="deactivated">Deactivated</option>
                  </select>
                </div>
              </div>
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

                      $html .= "<a href='/utrance-railway/trains/view?id=$train_id' class='btn btn-box-white margin-r-s'>";
                      $html .= "View</a>";
                      if($value['train_active_status']==0){
                        $html .= "<a href='/utrance-railway/trains/delete?id=$train_id' class='btn btn-box-white btn-box-white--delete' id='isActive'>";
                        $html .= "Deactivated</a></div></div>";
                      }else{
                        $html .= "<a href='/utrance-railway/trains/delete?id=$train_id' class='btn btn-box-white btn-box-white--delete' id='isActive'>";
                      $html .= "Active</a></div></div>";

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

<script>

</script>
























  
