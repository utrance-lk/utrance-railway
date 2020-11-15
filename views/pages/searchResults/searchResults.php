<body>
      <nav class="nav-container">
      <div class="navbar">
        <div class="main__nav">
          <div class="logobox">
            <img src="../../../../utrance-railway/public/img/pages/home/logo-white.png" alt="logo" class="logo" />
          </div>
          <div class="main__nav-items">
            <a href="/utrance-railway/home" class="home-box nav-items-little">
              <svg class="home__icon navbar__icon">
                <use xlink:href="/utrance-railway/public/img/pages/admin/svg/sprite.svg#icon-home"></use>
              </svg>
              <span class="nav__items-text-box">Home</span>
            </a>
            <div class="ticket-box nav-items-little">
              <svg class="ticket__icon navbar__icon">
                <use xlink:href="/utrance-railway/public/img/pages/admin/svg/sprite.svg#icon-ticket"></use>
              </svg>
              <span class="nav__items-text-box">Tickets</span>
            </div>
            <div class="news-box nav-items-little">
              <svg class="news__icon navbar__icon">
                <use xlink:href="/utrance-railway/public/img/pages/admin/svg/sprite.svg#icon-news"></use>
              </svg>
              <span class="nav__items-text-box">News</span>
            </div>
          </div>
        </div>
        <div class="user__nav">
          <div class="userdetails-box">
             <?php if(isset($_SESSION['user'])) : ?>
              <img
                src="../../../../utrance-railway/public/img/pages/admin/Chris-user-profile.jpg"
                alt="profile picture"
                class="user-img"
              />
              <a href="/utrance-railway/logout" class="user-name"><?php echo App::$APP->activeUser()['first_name'];?></a>
              
             <?php else: ?>
              <svg class="guest-user user-img">
                <use xlink:href="/utrance-railway/public/img/pages/admin/svg/sprite.svg#icon-user"></use>
              </svg>
              <a href="/utrance-railway/login" class="user-name">Login</a>
             <?php endif; ?>  
          </div>
        </div>
      </div>
    </nav>

      <section class="heading-primary">
        <form class="search-bar__container" method="POST" action="/utrance-railway/search">
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
                    <input type="text" id="dropdown-from" name="from" class="search-dropdown__search js--search-dropdown__search-from" value="Matara">
                  </div>
                  <ul class="search-dropdown__search-results js--results__list-from"></ul>
                </div>
              <div class="search-bar__to-container">
                <div class="searchbar__to">
                  <span>To</span>
                  <div class="to__station js--to__station" id="js--to__station">Galle</div>
                </div>
                <div class="search-dropdown search-dropdown__to js--search-dropdown__to">
                    <input type="text" id="dropdown-to" name="to" class="search-dropdown__search js--search-dropdown__search-to" value="Galle">
                </div>
                <ul class="search-dropdown__search-results js--results__list-to"></ul>
              </div>
              <div class="search-bar__when-container">
                <div class="searchbar__when">
                  <span>When</span>
                  <input type="date" class="when__date js--when__date" name="when" />
                </div>
              </div>
            </div>
            <input type="submit" class="search-bar__search-btn js--searchbar__search-btn" value="Search">
          </div>
        </form>
      </section>
      <section class="searchResults">
        <div class="filters-container">
          filters container
        </div>
        <div class="search__results-cards-container">

        <?php
          $dom = new DOMDocument;
          libxml_use_internal_errors(true);
          $dom->loadHTML('...');
          libxml_clear_errors();
        ?>

          <?php 
            if(isset($directPaths)) {
              foreach($directPaths as $key => $value) {
                $html = renderCardDirect($value);
                $dom = new DOMDocument();
                $dom->loadHTML($html);
                print_r($dom->saveHTML());
              }
            }
          ?>

          <?php
            if(isset($intersections)) {
              foreach($intersections as $key => $value) {
                $html = renderCardIntersect($value);
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

<?php
  
  function renderCardDirect($value) {
      // foreach($pathCategory as $key => $value) {     
        $html ="<div class='search__results-card search__results-card--small'>
                <div class='search__results-card-main'>
                <div class='search__results-card-primary'>
                <div class='search__card-detailbox'>
                <div class='search__card-detailbox--train-time'>";

        $time = substr($value['fssdt'], 0, 2);
        $dayTime = 'am';
        if($time > 12) {
          $time = $time - 12;
          $time = '0' . $time;
          $dayTime = 'pm';
        }
        $html .= "<span>  $time </span>";
        $html .= "<span> : </span>";
        $html .= "<span>" . substr($value['fssdt'], 3, 2) . "</span>";
        $html .= "<span>  $dayTime </span>";
        $html .= "<span> - </span>";

        $time = substr($value['tseat'], 0, 2);
        $dayTime = 'am';
        if($time > 12) {
          $time = $time - 12;
          $time = '0' . $time;
          $dayTime = 'pm';
        }

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
        $html .= "<span> min </span></div></div>";
        $html .= "</div>";

        $html .= "<div class='search__results-card-sub'>";
            
        $html .= "<div class='search__card-classbox'>";
        $html .= "<a href='/utrance-railway/book-seats' class='search__card-classbox--btnproceed'><p>Proceed</p></a></div></div></div>";
        // print_r($dom->saveHTML());
        return $html;
      }
    // }

      function renderCardIntersect($value) {
        $html = "<div class='search__results-card search__results-card--big'>
                <div class='search__results-card-main'>
                <div class='search__results-card-primary'>
                <div class='search__card-detailbox'>
                <div class='search__card-detailbox--train-time'>";

        $time = substr($value['fssdt'], 0, 2);
        $dayTime = 'am';
        if ($time > 12) {
          $time = $time - 12;
          $time = '0' . $time;
          $dayTime = 'pm';
        }

        $html .= "<span>  $time </span>";
        $html .= "<span> : </span>";
        $html .= "<span>" . substr($value['fssdt'], 3, 2) . "</span>";
        $html .= "<span>  $dayTime </span>";
        $html .= "<span> - </span>";

        $time = substr($value['fsiat'], 0, 2);
        $dayTime = 'am';
        if ($time > 12) {
            $time = $time - 12;
            $time = '0' . $time;
            $dayTime = 'pm';
        }

        $html .= "<span> $time </span>";
        $html .= "<span> : </span>";
        $html .= "<span>" . substr($value['fsiat'], 3, 2) . "</span>";
        $html .= "<span> $dayTime </span></div>";

        $html .= "<div class='search__card-detailbox--train-name'>";
        $html .= "<a href='#'>" . $value['frtn'] . "</a></div>";
        $html .= "<div class='search__card-detailbox--train-journey'>";
        $html .= "<span>" . $value['fssn'] . "</span>";
        $html .= "<span> to </span>";
        $html .= "<span>" . $value['isn'] . "</span></div></div>";

        $html .= "<div class='search__card-durationbox'>";
        $html .= "<span>" . substr($value['ftitt'], 0, 2) . "</span>";
        $html .= "<span> h </span>";
        $html .= "<span>" . substr($value['ftitt'], 3, 2) . "</span>";
        $html .= "<span> min </span></div></div>";

        // switch card
        $html .= "
            <div class='switch-card'>
            <div class='switch-card__container'>
              <div class='switch-card__container-main'>
                <div class='switch-card__icon-text-container'>
                  <div class='swich-card__icon-box'>
                    <svg class='swap-icon swap-icon__switch-card'>
                      <use xlink:href='../../../../utrance-railway/public/img/pages/home/svg/sprite.svg#icon-swap'></use>
                    </svg>
                  </div>
                  <div class='switch-card__content-box'>
                    <div class='switch-card__text-box'>
                      <span>switch at</span>
                    </div>";

        $html .= "<div class='switch-card__station-box'>" . $value['isn'] . "</div></div></div>";

        $timeHr = substr($value['wait_time'], 0, 2);
        $timeMin = substr($value['wait_time'], 3, 2);
        if($timeHr == '00') {
          $html .= "<div class='switch-card__waittime-box'><div class='wait'> wait approx. $timeMin min </div></div></div>";
        } else {
          $html .= "<div class='switch-card__waittime-box'><div class='wait'> wait approx. $timeHr h $timeMin min </div></div></div>";
        }

        $html .= "</div></div>";

        // other card
        
        $html .= "<div class='search__results-card-primary'>
                  <div class='search__card-detailbox'>
                  <div class='search__card-detailbox--train-time'>";

        $time = substr($value['tsidt'], 0, 2);
        $dayTime = 'am';
        if ($time > 12) {
            $time = $time - 12;
            $time = '0' . $time;
            $dayTime = 'pm';
        }

        $html .= "<span>  $time </span>";
        $html .= "<span> : </span>";
        $html .= "<span>" . substr($value['tsidt'], 3, 2) . "</span>";
        $html .= "<span>  $dayTime </span>";
        $html .= "<span> - </span>";

        $time = substr($value['tseat'], 0, 2);
        $dayTime = 'am';
        if ($time > 12) {
            $time = $time - 12;
            $time = '0' . $time;
            $dayTime = 'pm';
        }

        $html .= "<span> $time </span>";
        $html .= "<span> : </span>";
        $html .= "<span>" . substr($value['tseat'], 3, 2) . "</span>";
        $html .= "<span> $dayTime </span></div>";

        $html .= "<div class='search__card-detailbox--train-name'>";
        $html .= "<a href='#'>" . $value['trtn'] . "</a></div>";
        $html .= "<div class='search__card-detailbox--train-journey'>";
        $html .= "<span>" . $value['isn'] . "</span>";
        $html .= "<span> to </span>";
        $html .= "<span>" . $value['tsen'] . "</span></div></div>";

        $html .= "<div class='search__card-durationbox'>";
        $html .= "<span>" . substr($value['iterr'], 0, 2) . "</span>";
        $html .= "<span> h </span>";
        $html .= "<span>" . substr($value['iterr'], 3, 2) . "</span>";
        $html .= "<span> min </span></div>";


        

        $html .= "</div>";

        // other card

        $html .= "</div>";

        $html .= "<div class='search__results-card-sub'>";

        $html .= "<div class='search__card-classbox'>";
        $html .= "<a href='/utrance-railway/book-seats' class='search__card-classbox--btnproceed'><p>Proceed</p></a></div></div></div>";
        

        


        return $html;
      }

?>


