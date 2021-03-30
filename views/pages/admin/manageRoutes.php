<?php include_once '../views/components/backButton.php';?>
<div class="dashboard">
    <?php include_once '../views/layouts/adminSideNav.php';?>
    <div class="dash-content__container">
        <div class="dash-content">
          <?php
include_once "../views/components/searchbarAdmin.php";
echo renderAdminSearch(['routes', 'name', 'id'], '');
?>
          <a href="/utrance-railway/routes/add" class="btn btn-square-blue margin-t-m">
            <div class="btn-square-blue__text">Add Route</div>
            <svg class="btn-square-blue__icon">
              <use xlink:href="/utrance-railway/public/img/svg/sprite.svg#icon-circle-with-plus"></use>
            </svg>
          </a>
            <div class="flex-col-stretch-center margin-t-m">
              <?php
              $dom = new DOMDocument;
              libxml_use_internal_errors(true);
              $dom->loadHTML('...');
              libxml_clear_errors();

              if (isset($routes)) {

                  foreach ($routes as $key => $value) {

                      $html = "<div class='manage-routes__route margin-b-m'>";
                      $html .= "<div class='search__result-route-idbox'>";
                      $html .= "#<span class='route__id'>" . $value['route'] . "</span></div>";
                      $html .= "<div class='search__result-route-start'>" . $value['sid'] . "</div>";
                      $html .= "<div class='search__result-route-destination'>" . $value['did'] . "</div>";
                      $html .= "<a href='/utrance-railway/routes/view?id=" . $value['route'] . "' class='btn btn-box-white margin-r-s'>View</a>";
                      $html .= "<div class='btn'>";
                      $html .= "</div></div>";

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
