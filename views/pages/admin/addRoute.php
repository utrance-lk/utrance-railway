<div class="dashboard">
    <?php include_once '../views/layouts/adminSideNav.php';?>
    <div class="dash-content__container">
        <div class="dash-content" id="addroute">
            <div class="heading-secondary margin-b-m margin-t-m">
              <p class="center-text">New Route</p>
              <!-- <div class="center-text">#<span>39</span></div> -->
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
            <div class="view-routes__title margin-t-m margin-b-s">
                <div>Path id</div>
                <div>Station</div>
                <div>Arr. Time</div>
                <div>Dept. Time</div>
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
   
    $.ajax({
        url:'addnewmanageRoutes',
      method:'get',
      
      success : function (data) {
      
      trains=JSON.parse(data)
      
      var index4=parseInt(trains[0]['route_id']) +1;
      
      
      const markup1 = `<div class="center-text">#<span>${index4}</span></div>`;
      const newx1 = document.querySelector( ".center-text");
      newx1.insertAdjacentHTML("afterend", markup1);
      }

    });
   

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
    //   const markup1 = `<div class="center-text">#<span>${index4}</span></div>`;
    //   const newx1 = document.querySelector( ".dash-content__container");
    //   newx1.insertAdjacentHTML("beforeend", markup1);

        

     $.ajax({
      url:'newmanageRoutes',
      method:'post',
      data:{index1:newindex2,index2:newindex3},
      success : function (data) {
     
            if(data.length===4){
               window.location.href = "/utrance-railway/routes/";
            }else{
                const newmarkup = `<p style="color:red;font-weight: bold; font-size: 18px;" id ="myerror">Please enter valid station name.</p>`;
                 const newx = document.querySelector( ".dash-content__input");
                 newx.insertAdjacentHTML("afterend", newmarkup);
               console.log(data);
               
               window.location.href = "/utrance-railway/routes/add";


            }

        }
     })

        }
    })
 





  });
});

    
</script>