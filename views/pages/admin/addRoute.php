<div class="dashboard">
    <?php include_once '../views/layouts/adminSideNav.php';?>
    <div class="dash-content__container">
        <div class="dash-content" id="addroute">
            <div class="heading-secondary margin-b-m margin-t-m">
              <p class="center-text">New Route</p>
              <div class="center-text">#<span>39</span></div>
            </div>
            <div class="view-routes__title margin-t-m margin-b-s">
                <div>Path id</div>
                <div>Station</div>
                <div>Arr. Time</div>
                <div>Dept. Time</div>
            </div>
            <div class="dash-content__input">
                    <label for="linetype" class="dash-content__label">Line Type</label>
                    <select name="train_type" id="line_type" class="form__input" >
                        <option value="Main">Main Line</option>
                        <option value="Puttalam" >Puttalam line</option>
                        <option value="Northern">Northern Line</option>
                        <option value="Batticaloa">Batticaloa Line</option>
                        <option value="Coastal">Coastal Line</option>
                    </select>
                </div>
                <span class="btn btn-square-blue" id="add-first-stop">
                    <div class="btn-square-blue__text">Add First Stop</div>
                    <svg class="btn-square-blue__icon">
                        <use xlink:href="/utrance-railway/public/img/svg/sprite.svg#icon-circle-with-plus"></use>
                    </svg>
                </span>

                <div class="btn-update-route" id = "updatebutton">
                    <button class="btn-round-blue margin-t-m" id="button">
                        Update Route
                    </button>
                </div>    
                
        </div>
        
    </div>
                
</div>




<?php $x=39 ?>
<script type="text/javascript" src="/utrance-railway/public/js/pages/admin/addRoute.js"></script>
<!-- <script type="text/javascript" src="/utrance-railway/public/js/pages/admin/viewaddRoutCard.js"></script> -->
<script type="text/javascript" src="/utrance-railway/public/js/pages/admin/addCard.js"></script>
<script>


$(document).ready(function(){
    $(".btn-square-blue__icon").click(function(){
        addRouteEvents(); 
    })
   
   
   

})
 


</script>

<script>
$(document).ready(function(){
    
  $("#updatebutton").click(function(){

 let newindex2=newStations;

 $.ajax({
      url:'addnewmanageRoutes',
      method:'get',
      
      success : function (data) {
      
      trains=JSON.parse(data)
      
      var index4=parseInt(trains[0]['route_id']) +1;
      
      let newindex4=document.getElementById("line_type").value;
      let newindex3=index4 + " " +newindex4;
      console.log(newindex3);
        

     $.ajax({
      url:'newmanageRoutes',
      method:'post',
      data:{index1:newindex2,index2:newindex3},
      success : function (data) {
     
            if(data.length===4){
               window.location.href = "/utrance-railway/routes/";
            }else{
               console.log(data);




            }

        }
     })

        }
    })
 





  });
});

    
</script>