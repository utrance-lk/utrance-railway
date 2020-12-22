

<div class="load-content-container">
    <div class="load-content">
        <div class="load-content--manage-trains">
              <form class="dashboard-searchbar--container" method='POST' action="/utrance-railway/trains" >
                <input type="text" class="dashboard-searchbar" placeholder="Search trains by name or id" name="searchTrain"/>
                <button>
                <svg class="search-icon__btn">
                  <use xlink:href="/utrance-railway/public/img/svg/sprite.svg#icon-magnifying-glass"></use>
                </svg>
                </button>
              </form>

              <a href="/utrance-railway/trains/add" class="btn btn-square-blue">
                <div class="addbtn-text">Add Train</div>
                <svg class="addbtn-img">
                  <use xlink:href="/utrance-railway/public/img/svg/sprite.svg#icon-circle-with-plus"></use>
                </svg> 
              </a>
              <div class="filters__container margin-t-s">
                <div class="filter__item">
                  <label for="train__type" class="margin-r-s">Train Type &colon;</label>
                  <select name="train__type"  id="train__type" class="form__input">
                    <option value="all">All</option>
                    <option value="Express">Express</option>
                    <option value="Slow">Slow</option>
                    <option value="Intercity">Intercity</option>
                  </select>
                </div>
                <div class="filter__item">
                  <label for="active__status" class="margin-r-s">Active Status &colon;</label>
                  <select name="active__status" id="active__status" class="form__input">
                    <option value="a">All</option>
                    <option value="1">Active</option>
                    <option value="0">Deactivated</option>
                  </select>
                </div>
              </div>
              <div class="search__results-container"></div>  
              <div class="btn__container"></div>  
        </div>
    </div>
</div>
</div>

<script type="text/javascript" src="../../../utrance-railway/public/js/components/pagination.js"></script>
      <script type="text/javascript" src="../../../utrance-railway/public/js/pages/admin/manageTrains.js"></script>
      <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
      <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
    
     
      <!-- <?php if (isset($trains)): ?>
        <script>
             var y;
             var l;
             document.getElementById("train__type").addEventListener("change", function () {
             y = train__type.value;  
           
             renderResults(<?php echo json_encode($trains); ?>,y,l);
             
           
  });
  document.getElementById("active__status").addEventListener("change", function () {
    l= active__status.value;
    
    renderResults(<?php echo json_encode($trains); ?>,y,l);
 
 

});
var r = document.getElementById("train__type").value;

      renderResults(<?php echo json_encode($trains); ?>);

          renderButtons();
        </script>
        renderResults(<?php echo json_encode($trains); ?>);
      <?php endif;?> -->
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
         newindex = $('#active__status').val();
         console.log(index);
         console.log(newindex +" "+index);
         newindex2=newindex +" "+index;
          $.ajax({
            url:'newmanageTrains.php?Traintype='+newindex2,
            method:'get',
            data:{index1:newindex2}
          }).done(function(book){
            console.log(book)
            trains=JSON.parse(book)
            renderResults(trains);
            renderButtons();

          })
    

        })

      })

      // $(document).ready(function(){
      //   $("#active__status").on('change', function() {
       
      //    newindex = this.value;
      //    $.ajax({
      //       url:'newmanageTrains.php?Traintype='+index+'&status'+newindex,
      //       method:'get',
      //       data:{index1:index, index2:newindex}
      //     }).done(function(book){
      //       trains=JSON.parse(book)
      //       renderResults(trains);
      // renderButtons();

      //     })
        
      //   })
      // })
 </script>






     
























  
