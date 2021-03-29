<div class="dashboard">
  <?php include_once '../views/layouts/adminSideNav.php';?>
  <div class="dash-content__container">
      <div class="dash-content">
        <?php
          include_once "../views/components/searchbarAdmin.php";
          echo renderAdminSearch(['trains', 'name', 'id'], '/utrance-railway/trains');
        ?>
        <a href="/utrance-railway/trains/add" class="btn btn-square-blue margin-t-m">
          <div class="btn-square-blue__text">Add Train</div>
          <svg class="btn-square-blue__icon">
            <use xlink:href="/utrance-railway/public/img/svg/sprite.svg#icon-circle-with-plus"></use>
          </svg>
        </a>
        <div class="filter__container margin-t-s">
          <?php
            include_once "../views/components/filtersAdmin.php";
            echo renderFilterItem('Train Type', ['All', 'Express', 'Slow', 'Intercity']);
            echo renderFilterItem('Active Status', ['All', 'Active', 'Deactivated']);
          ?>
        </div>
        <div class="manage-trains__search-results" id="manage-trains__search-results"></div>
        <div class="pagination" id="pagination"></div>
      </div>
  </div>
</div>

<script type="text/javascript" src="../../../utrance-railway/public/js/components/pagination.js"></script>
<script type="text/javascript" src="../../../utrance-railway/public/js/pages/admin/manageTrains.js"></script>

<?php if (isset($trains)): ?>
  <script>
    renderResults(<?php echo json_encode($trains); ?>);
    renderButtons();
  </script>
<?php endif;?>

<!-- <?php if (isset($result)): ?>
  <script>
    alert("Canot delete Train");
    
  </script>
<?php endif;?> -->

<script>
    var index;
    var newindex;
    $(document).ready(function(){
      $(".form__input").on('change', function() {
        index = $('#train__type').val();
        newindex = $('#active__status').val();
        console.log(index);
        console.log(newindex);
        
        $.ajax({
          url:'newmanageTrains',
          method:'post',
          data:{index1:newindex,index2:index}
        }).done(function(train){
          console.log(train)
          trains=JSON.parse(train)
          renderResults(trains);
          renderButtons();
        })
      })
    });
</script>