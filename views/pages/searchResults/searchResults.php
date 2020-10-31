<body>
      <section class="heading-primary">
        <div class="header">
          <div class="logo-box">
            <img src="../../../../utrance-railway/public/img/pages/home/logo-white.png" class="logo" alt="logo" />
          </div>
          <nav class="navbar">
            <ul class="navbar__list">
              <li class="navbar__list-items">
                <a href="#">Tickets</a>
              </li>
              <li class="navbar__list-items">
                <a href="#">Freights</a>
              </li>
              <li class="navbar__list-items">
                <a href="login">Login</a>
              </li>
            </ul>
          </nav>
        </div>
        <div class="search-bar__container">
          <div class="search-bar">
            <div class="search-bar__search">
                <div class="search-bar__from-container">
                  <div class="searchbar__from">
                    <span>From</span>
                    <div class="from__station-container">
                      <div class="from__station js--from__station" id="js--from__station">Matara</div>
                      <div class="swap-button js--swap-btn">
                        <svg class="swap-icon">
                          <use xlink:href="../../../../utrance-railway/public/img/pages/home/svg/sprite.svg#icon-swap"></use>
                        </svg>
                      </div>
                    </div>
                  </div>
                  <div class="search-dropdown search-dropdown__from js--search-dropdown__from">
                    <input type="text" id="dropdown-from" name="dropdown-from" class="search-dropdown__search js--search-dropdown__search-from">
                  </div>
                  <ul class="search-dropdown__search-results js--results__list-from"></ul>
                </div>
              <div class="search-bar__to-container">
                <div class="searchbar__to">
                  <span>To</span>
                  <div class="to__station js--to__station" id="js--to__station">Galle</div>
                </div>
                <div class="search-dropdown search-dropdown__to js--search-dropdown__to">
                    <input type="text" id="dropdown-to" name="dropdown-to" class="search-dropdown__search js--search-dropdown__search-to">
                </div>
                <ul class="search-dropdown__search-results js--results__list-to"></ul>
              </div>
              <div class="search-bar__when-container">
                <div class="searchbar__when">
                  <span>When</span>
                  <input type="date" class="when__date js--when__date" />
                </div>
              </div>
            </div>
            <div class="search-bar__search-btn js--searchbar__search-btn">Search</div>
          </div>
        </div>
      </section>
      <section class="searchResults">
        <div class="filters-container">
          filters container
        </div>
        <div class="search__results-cards-container">

          <?php
            if($directPaths) {
              foreach($directPaths as $key => $value) {
                
                $html ="
                        <div class='search__results-card'>
                          <div class='search__card-detailbox'>
                          <div class='search__card-detailbox--train-time'>
                      ";

                $time = substr($value['fssdt'], 0, 2);
                $dayTime = 'am';
                if($time > 12) {
                  $time = $time - 12;
                  $dayTime = 'pm';
                };
                $html .= "<span>  $time </span>";
                $html .= "<span> : </span>";
                $html .= "<span>" . substr($value['fssdt'], 3, 2) . "</span>";
                $html .= "<span>  $dayTime </span>";
                $html .= "<span> - </span>";

                $time = substr($value['tseat'], 0, 2);
                $dayTime = 'am';
                if($time > 12) {
                  $time = $time - 12;
                  $dayTime = 'pm';
                };

                $html .= "<span> $time </span>";
                $html .= "<span> : </span>";
                $html .= "<span>" . substr($value['tseat'], 3, 2) . "</span>";
                $html .= "<span> $dayTime </span></div>";
                      
                $html .= "<div class='search__card-detailbox--train-name'>";       
                $html .= "<a href='#'>" .$value['train_name'] . "</a></div>";
                $html .= "<div class='search__card-detailbox--train-journey'>";
                $html .= "<span>" . $value['fssn'] . "</span>";
                $html .= "<span> to </span>";
                $html .= "<span>" . $value['tsen'] . "</span></div></div>";
                    
                $html .= "<div class='search__card-durationbox'>";
                $html .= "<span>" . substr($value['total_time'], 0, 2) . "</span>";
                $html .= "<span> h </span>";
                $html .= "<span>" . substr($value['total_time'], 3, 2) . "</span>";
                $html .= "<span> min </span></div>";
                    
                $html .= "<div class='search__card-classbox'>";
                $html .= "<form action='' class='search__card-classbox--form'>";
                $html .= "<select name='class' id='search__card-classbox--selectclass' class='search__card-classbox--selectclass'>";    
                $html .= "<option value='first-class'>First Class</option>";
                $html .= "<option value='second-class'>Second Class</option></select>";
                $html .= "<div class='search__card-classbox--pricebox'>";
                $html .= "Rs <span>210</span></div>";
                $html .= "<div class='btn-cta'>";
                $html .= "<button class='search__card-classbox--btnproceed'><p>Proceed</p></button></div></form></div></div>";
                        
                $dom = new DOMDocument();
                $dom->loadHTML($html);
                print_r($dom->saveHTML());
              }

            }
          
          ?>
          

        </div>
      </section>

      <script type="module" src="../../../utrance-railway/public/js/pages/home/main.js"></script>

  </body>
</html>
