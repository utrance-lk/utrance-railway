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
        foreach ($directPaths as $key => $value) {
            $html = renderDirectPathCard($value);
            $dom = new DOMDocument();
            $dom->loadHTML($html);
            print_r($dom->saveHTML());
        }
    }
  ?>

  <?php
    if (isset($intersections)) {
        foreach ($intersections as $key => $value) {
            $html = renderIntersectCard($value);
            $dom = new DOMDocument();
            $dom->loadHTML($html);
            print_r($dom->saveHTML());
        }
    }
?>
  </div>
</section>

<script type="text/javascript" src="../../../utrance-railway/public/js/components/mainSearch.js"></script>

  </body>
</html>