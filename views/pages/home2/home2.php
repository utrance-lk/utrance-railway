<body>
      <section class="heading-primary">
        <div class="header">
          <div class="logo-box">
            <img src="../../public/img/pages/home/logo-white.png" class="logo" alt="logo" />
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
                <a href="#">Login</a>
              </li>
            </ul>
          </nav>
        </div>
        <div class="search-bar__container">
          <div class="search-bar">
            <div class="search-bar__search">
              <!-- <div class="search-bar__from-func"> -->
                <div class="search-bar__from-container">
                  <div class="searchbar__from">
                    <span>From</span>
                    <div class="from__station js--from__station" id="js--from__station">Matara</div>
                  </div>
                  <div class="search-dropdown search-dropdown__from js--search-dropdown__from">
                    <input type="text" id="dropdown-from" name="dropdown-from" class="search-dropdown__search js--search-dropdown__search-from">
                  </div>
                  <ul class="search-dropdown__search-results js--results__list">
                      <!-- <li class="search-dropdown__search-results-item">Matara</li> -->
                      <!-- <li class="search-dropdown__search-results-item">Ambalangoda</li>  -->
                    </ul>
                </div>
              <!-- </div> -->
              <div class="search-bar__to-container">
                <div class="searchbar__to">
                  <span>To</span>
                  <div class="to__station">Galle</div>
                </div>
              </div>
              <div class="search-bar__when-container">
                <div class="searchbar__when">
                  <span>When</span>
                  <input type="date" class="when__date js--when__date" />
                </div>
              </div>
            </div>
            <div class="search-bar__search-btn">Search</div>
          </div>
        </div>
      </section>
      <section class="heading-secondary">
        <div class="morecontent-btn">
          <svg class="down-arrow">
            <use xlink:href="../../public/img/pages/home/svg/sprite.svg#icon-chevron-with-circle-down"></use>
          </svg>
        </div>
      </section>

      <script type="module" src="../../../utrance-railway/public/js/pages/home2/base.js"></script>

  </body>
</html>