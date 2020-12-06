<section class="heading-primary">
        <form class="search-bar__container" method="POST" action="/utrance-railway/search">
          <div class="search-bar">
            <div class="search-bar__search">
                <div class="search-bar__from-container">
                  <div class="searchbar__from">
                    <span>From</span>
                    <div class="from__station-container">
                      <div class="from__station js--from__station" id="js--from__station"></div>
                      <div class="swap-button js--swap-btn">
                        <svg class="swap-icon">
                          <use xlink:href="../../../../utrance-railway/public/img/pages/home/svg/sprite.svg#icon-swap"></use>
                        </svg>
                      </div>
                    </div>
                  </div>
                  <div class="search-dropdown search-dropdown__from js--search-dropdown__from">
                    <input type="text" id="dropdown-from" name="from" class="search-dropdown__search js--search-dropdown__search-from">
                  </div>
                  
                  <!--?php echo "<script>document.writeln(fromStation);</script>";?-->
                  <ul class="search-dropdown__search-results js--results__list-from"></ul>
                </div>
              <div class="search-bar__to-container">
                <div class="searchbar__to">
                  <span>To</span>
                  <div class="to__station js--to__station" id="js--to__station"></div>
                </div>
                <div class="search-dropdown search-dropdown__to js--search-dropdown__to">
                    <input type="text" id="dropdown-to" name="to" class="search-dropdown__search js--search-dropdown__search-to">
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
            <input type="submit" value="Search" class="search-bar__search-btn js--searchbar__search-btn">
          </div>
        </form>
      </section>

      <?php include 'newsfeed.php'; ?>

      <script type="text/javascript" src="../../../utrance-railway/public/js/components/mainSearch.js"></script>
      <script type="text/javascript" src="../../../utrance-railway/public/js/components/currentDate.js"></script>
      <script>
        document.querySelector(".js--from__station").textContent = stationsArray[3];
        document.querySelector(".js--to__station").textContent = stationsArray[0];
        document.querySelector(".js--search-dropdown__search-from").value = stationsArray[3];
        document.querySelector(".js--search-dropdown__search-to").value = stationsArray[0];
      </script>
  </body>
</html>
