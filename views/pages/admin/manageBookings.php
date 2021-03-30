<?php include_once '../views/components/backButton.php';?>
<div class="dashboard">
    <?php include_once '../views/layouts/adminSideNav.php';?>

<div class="dash-content__container">
        <div class="dash-content">
          <div class="load-content--manage-bookings">
<<<<<<< HEAD
            <form class="dashboard-searchbar--container" method='POST' action="/users">
=======
            <!-- <form class="dashboard-searchbar--container" method='POST' action="">
>>>>>>> master

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
<<<<<<< HEAD
                <div class="train-booking__stat-card">
                    <div class="train-booking__stat-card--train-id">#1</div>
                    <div class="train-booking__stat-card--train-name">Dakshina Intercity</div>
                    <div class="train-booking__stat-card--seating fcseats">
                        <div class="fcseats__text">
                            FC seats
                        </div>
                        <div class="fcseats__seatnos">
                            20 / 50
                        </div>
                    </div>
                    <div class="train-booking__stat-card--seating scseats">
                        <div class="scseats__text">
                            SC seats
                        </div>
                        <div class="scseats__seatnos">
                            30 / 50
                        </div>
                    </div>
                    <div class="train-booking__stat-card--seating sleeping-berths">
                        <div class="sleeping-berths__text">
                            Sleeping berths
                        </div>
                        <div class="sleeping-berths__seatnos">
                            2 / 10
                        </div>
                    </div>
                    <div class="train-booking__stat-card--seating observation">
                        <div class="observation__text">
                            OS
                        </div>
                        <div class="observation__seatnos">
                            1 / 1
                        </div>
                    </div>
                    <a href="/booking-train" class="btn btn-box-white">
                        view
                    </a>
                </div>
                <div class="train-booking__stat-card">
                    <div class="train-booking__stat-card--train-id">#3</div>
                    <div class="train-booking__stat-card--train-name">Galu Kumari</div>
                    <div class="train-booking__stat-card--seating fcseats">
                        <div class="fcseats__text">
                            FC seats
                        </div>
                        <div class="fcseats__seatnos">
                            1 / 50
                        </div>
                    </div>
                    <div class="train-booking__stat-card--seating scseats">
                        <div class="scseats__text">
                            SC seats
                        </div>
                        <div class="scseats__seatnos">
                            22 / 50
                        </div>
                    </div>
                    <div class="train-booking__stat-card--seating sleeping-berths">
                        <div class="sleeping-berths__text">
                            Sleeping berths
                        </div>
                        <div class="sleeping-berths__seatnos">
                            10 / 10
                        </div>
                    </div>
                    <div class="train-booking__stat-card--seating observation">
                        <div class="observation__text">
                            OS
                        </div>
                        <div class="observation__seatnos">
                            0 / 1
                        </div>
                    </div>
                    <a href="/booking-train" class="btn btn-box-white">
                        view
                    </a>
                </div>
=======
               
>>>>>>> master
            </div>

          </div>
        </div>
</div>
</div>

<script type="text/javascript" src="../../../utrance-railway/public/js/pages/admin/manageBooking.js"></script>


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