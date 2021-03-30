<?php include_once '../views/components/backButton.php';?>
<div class="dashboard">
    <?php include_once '../views/layouts/adminSideNav.php';?>

<div class="dash-content__container">
        <div class="dash-content">
          <div class="load-content--manage-bookings">
            <!-- <form class="dashboard-searchbar--container" method='POST' action="">

              <input
                type="text"
                class="dashboard-searchbar"
                placeholder="Search trains by name or id" id="searchUserByNameOrId"  name="searchUserByNameOrId"
              />
              <svg class="search-icon__btn">
                <use xlink:href="public/img/pages/admin/svg/sprite.svg#icon-magnifying-glass"></use>
              </svg>
            </form> -->
            <div class="filters">
                <div class="date__picker">
                    <label for="date__select" class="select__date-label filter__label">Pick date</label>
                    <input type="date" id="datePicker" class="date__selecting--box" name="date__select" value="2020-11-29">
                </div>
                
            </div> 

            <div class="train-booking__stat-card--container">
               
            </div>

          </div>
        </div>
</div>
</div>

<script type="text/javascript" src="/public/js/pages/admin/manageBooking.js"></script>


<script>
document.getElementById('datePicker').valueAsDate = new Date();

</script>

<script>
 $(document).ready(function(){
    index = $(".date__selecting--box").val();
 
   ajCode();
       $(".date__selecting--box").on('change', function() {
        
        index = $(".date__selecting--box").val();
      
        console.log(index);
        
        ajCode();
        
      })
      function ajCode(){
        $.ajax({
          url:'getBookings',
          method:'post',
          data:{index1:index}
        }).done(function(data){
          
          trains=JSON.parse(data)
          console.log(trains)
          renderResults(trains,index);
        //   renderButtons();
        })
      }
    });
</script>