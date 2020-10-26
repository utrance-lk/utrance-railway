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
      <section class="heading-secondary">
        <a class="morecontent-btn" href="#newsfeed">
          <svg class="down-arrow">
            <use xlink:href="../../../../utrance-railway/public/img/pages/home/svg/sprite.svg#icon-chevron-with-circle-down"></use>
          </svg>
        </a>
      </section>

      <?php include 'newsfeed.php'; ?>

      <script type="module" src="../../../utrance-railway/public/js/pages/home/main.js"></script>

  </body>
</html>
