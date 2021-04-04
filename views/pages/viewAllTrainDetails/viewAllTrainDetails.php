<?Php include_once "../views/components/backButton.php";?>
<div class="dashboard">

  <div class="dash-content__container" style="margin:auto">
      <div class="dash-content">
        <?php
include_once "../views/components/searchbarAdmin.php";
echo renderAdminSearch(['trains', 'name', 'id'], '/utrance-railway/train-details');
?>
        <div class="filter__container margin-t-s">
          <?php
include_once "../views/components/filtersAdmin.php";
echo renderFilterItem('Train Type', ['All', 'Express', 'Slow', 'Intercity']);
?>
        </div>
        <div class="manage-trains__search-results" id="manage-trains__search-results"></div>
        <div class="pagination" id="pagination"></div>
      </div>
  </div>
</div>

<script type="text/javascript" src="/public/js/components/pagination.js"></script>
<script type="text/javascript" src="/public/js/pages/viewAllTrainDetails.js"></script>


<?php if (isset($trains)): ?>
  <script>
    renderResults(<?php echo json_encode($trains); ?>);
    renderButtons();
  </script>
<?php endif;?>

<script>
    var index;
    var newindex;
    $(document).ready(function(){
      $(".form__input").on('change', function() {
        index = $('#train__type').val();
        
        $.ajax({
          url:'getSelect',
          method:'post',
          data:{index2:index}
        }).done(function(train){
          trains=JSON.parse(train)
          renderResults(trains);
          renderButtons();
        })
      })
    });
</script>