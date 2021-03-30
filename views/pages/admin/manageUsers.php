<?php include_once '../views/components/backButton.php';?>
<div class="dashboard">
    <?php include_once '../views/layouts/adminSideNav.php';?>
    <div class="dash-content__container">
      <div class="dash-content">
          <?php
            include_once "../views/components/searchbarAdmin.php";
            echo renderAdminSearch(['users', 'name', 'id'], '/utrance-railway/users');
          ?>
          <a href="/utrance-railway/users/add" class="btn btn-square-blue margin-t-m">
            <div class="btn-square-blue__text">Add User</div>
            <svg class="btn-square-blue__icon">
              <use xlink:href="/utrance-railway/public/img/svg/sprite.svg#icon-circle-with-plus"></use>
            </svg>
          </a>
          <div class="filter__container margin-t-s">
            <?php
              include_once "../views/components/filtersAdmin.php";
              echo renderFilterItem('User Role', ['All', 'Admin', 'User', 'Details Provider']);
              echo renderFilterItem('Active Status', ['All', 'Active', 'Deactivated']);
            ?>
          </div>
          <div class="flex-st-center flex--column manage-users__search-results" id="manage-users__search-results"></div>
          <div class="pagination" id="pagination"></div>
      </div>
    </div>
</div>

<script type="text/javascript" src="../../../utrance-railway/public/js/components/pagination.js"></script>
<script type="text/javascript" src="../../../utrance-railway/public/js/pages/admin/manageUsers.js"></script>
<?php if (isset($users)): ?>
  <script>
    renderResults(<?php echo json_encode($users); ?>, <?php echo json_encode(App::$APP->activeUser()); ?>);
    renderButtons();
  </script>
<?php endif;?>

<script>
  var index;
  var newindex;
  $(document).ready(function(){
    
    $(".form__input").on('change', function() {
      
      index = $('#user__role').val();
      newindex = $('#active__status').val();
      
    
      $.ajax({
        url:'newmanageUsers',
        method:'post',
        data:{index1:newindex,index2:index}
      }).done(function(user){
       
        users=JSON.parse(user)
        renderResults(users,<?php echo json_encode(App::$APP->activeUser()); ?>);
        renderButtons();

      })
    })

  })   
</script>