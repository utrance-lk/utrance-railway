<section class="heading-primary">
  <?php
    include_once '../views/components/searchbarMain.php';
    include_once '../views/components/searchResultsTrainCard.php';
    echo renderSearchBar($_POST['from'], $_POST['to'], $_POST['when']);
  ?>
</section>

<?php if(isset($error)):?>

<section class="error">
  <div class="error-box margin-t-l margin-b-l flex-col-stretch-center">
      <div class="error__text center-text margin-b-l">
          <div class="error__text--sub">
              Station Not Found!
          </div>
      </div>
      <img src="/utrance-railway/public/img/pages/error/stationNotFound.png" alt="Error image" class="error__img--small">
  </div>
</section>

<?php elseif(empty($directPaths) && empty($intersections)):?>

<section class="error">
  <div class="error-box margin-t-l margin-b-l flex-col-stretch-center">
      <div class="error__text center-text margin-b-l">
          <div class="error__text--sub">
              No trains Available!
          </div>
      </div>
      <img src="/utrance-railway/public/img/pages/error/noTrainAvail.png" alt="Error image" class="error__img--small">
  </div>
</section>
  
<?php else: ?>

<section class="searchResults">

  <div class="filters-container"></div>
  <div class="search-results-train-card__container">

  <?php
    $dom = new DOMDocument;
    libxml_use_internal_errors(true);
    $dom->loadHTML('...');
    libxml_clear_errors();
  ?>

  <?php
    if (isset($directPaths)) {
        $i = 0;
        foreach ($directPaths as $key => $value) {
            $i++;
            $html = renderDirectPathCard($value, $i);
            $dom = new DOMDocument();
            $dom->loadHTML($html);
            print_r($dom->saveHTML());
        }
    }
  ?>

  <?php
    if (isset($intersections)) {
      $i = 0;
      foreach ($intersections as $key => $value) {
            $i++;
            $html = renderIntersectCard($value, $i);
            $dom = new DOMDocument();
            $dom->loadHTML($html);
            print_r($dom->saveHTML());
        }
    }
?>
  </div>

<?php endif;?>  
</section>

<script type="text/javascript" src="../../../utrance-railway/public/js/components/mainSearch.js"></script>
  <script type="text/javascript" src="../../../utrance-railway/public/js/components/currentDate.js"></script>

  </body>
</html>