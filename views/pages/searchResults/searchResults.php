<section class="heading-primary">
  <?php
    include_once '../views/components/searchbarMain.php';
    include_once '../views/components/searchResultsTrainCard.php';
    echo renderSearchBar($_POST['from'], $_POST['to'], $_POST['when']);
  ?>
</section>

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
</section>

<script type="text/javascript" src="/public/js/components/mainSearch.js"></script>

  </body>
</html>