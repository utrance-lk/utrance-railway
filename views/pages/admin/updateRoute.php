    <div class="load-content-container">
        <div class="load-content">
            <div class="load-content--stations">
                <?php

if (isset($users)) {
    foreach ($users as $key => $value) {
        $html = "";
        $html .= "<div class='content-title'>";
        //$html .="<p >".$value['first_name']." 's Account Settings</p></div>";
        if (isset($updateSetValue['first_name'])) {
            $html .= "<p >" . $updateSetValue['first_name'] . " 's Account Settings</p></div>";

        } else {
            $html .= "<p >" . $value['first_name'] . " 's Account Settings</p></div>";
        }

        $dom = new DOMDocument();
        $dom->loadHTML($html);
        print_r($dom->saveHTML());
    }
}
?>

<?php
$dom = new DOMDocument;
libxml_use_internal_errors(true);
$dom->loadHTML('...');
libxml_clear_errors();

if (isset($routes)) {
    $x = $routes[0]['route_id'];
    foreach ($routes as $key => $value) {
        if ($value['start_station_id'] == $value['station_id']) {
            $satrtStation = $value['station_name'];
        }
        if ($value['dest_station_id'] == $value['station_id']) {
            $endStation = $value['station_name'];
        }
    }

    $html = "<div class='content-title'>";
    $html .= "<p>" . $satrtStation . " - " . $endStation . "</p>";
    $html .= "<p id='newRouteId'>#" . $routes[0]['route_id'] . "</p></div>";
    $html .= " <div class='titles margin-t-m margin-b-s'>
    <div class='titles__id'>Path id</div>
    <div class='titles__station'>Station</div>
    <div class='titles__arr-time'>Arr. Time</div>
    <div class='titles__dept-time'>Dept. Time</div></div>";

    $i = 0;
    foreach ($routes as $key => $value) {
        $i++;

        $html .= " <div class='schedule'>";
        if (($i % 2) == 0) {

            $html .= "<div class='stop-card back-even'>";
        } else {
            $html .= "<div class='stop-card back-odd'>";
        }
        $html .= "<div class='stop-card__details'>";
        $html .= "<div class='stop-card__path-id'>#" . $value['path_id'] . "</div>";
        $html .= "<div class='stop-card__station'>" . $value['station_name'] . "</div>";
        $html .= "<div class='stop-card__arr-time'>" . $value['arrival_time'] . "</div>";
        $html .= "<div class='stop-card__dept-time'>" . $value['departure_time'] . "</div></div>";
        $html .= "<div class='stop-card__add-btn'>";
        $html .= "<svg class='add-icon'>
        <use xlink:href='/utrance-railway/public/img/svg/sprite2.svg#icon-add_circle_outline'></use></svg></div></div></div>";

    }

}
$dom = new DOMDocument();
$dom->loadHTML($html);
print_r($dom->saveHTML());

?>


                <div class="btn-update-route">
                    <button class="btn-round-blue margin-t-m" id="button">
                        Update Route
                    </button>
                </div>

            </div>
        </div>
    </div>
</div>


<script type="text/javascript" src="/utrance-railway/public/js/pages/admin/viewRoute.js"></script>
<script type="text/javascript" src="/utrance-railway/public/js/pages/admin/viewaddRoutCard.js"></script>
<script>addStops(<?php echo $x; ?>);</script>

<script>
$(document).ready(function(){
  $("#button").click(function(){

 let newindex2=newStations;
let newindex3='<?php echo $x; ?>';

    $.ajax({
      url:'newmanageRoutes',
      method:'post',
      data:{index1:newindex2,index2:newindex3},
      success : function (data) {

            if(data.length===2){
               window.location.href = "/utrance-railway/routes/";
            }else{
               
                var errorResult = JSON.parse(data);
                console.log(errorResult);
                x1 = document.querySelectorAll(".schedule");
                var y = document.querySelectorAll(".stop-card__details");

                // console.log(z.innerText);
                var lenthOfError = parseInt(errorResult.length);
                  var k;
                  var m;

                   for(k =0; k<errorResult.length;k++)
                   {
                    for( m =0; m<y.length;m++){
                        var samepath=y[m].querySelector(".stop-card__path-id").innerText.split("#")[1] * 1;
                        if(samepath==errorResult[k].pathId){
                        console.log("jj");
                       z = y[m].querySelector(".stop-card__path-id");
                     
                    //   let newparentPathId = errorResult[k].pathId;
                    //   newchangePathIdAndBG(newparentPathId);
                    let tt = z.parentNode.parentNode;
                    console.log(tt);
                    tt.parentNode.removeChild(tt);
                    // newaddStops(m);
                
                    var index=0;
                    for (let n = 0; n < newStations.length; n++) {

                        if (newStations[n].pathId == errorResult[k].pathId) {
                       
                        index = n;  
                        }
                    }
                  
                        newStations.splice(index, 1);
                       
                       }
                        
                    }

                   }
                   

            }

        }
    })




  });
});

// var return_first;
// function callback(response) {
//   return_first = response;
//   console.log(return_first);
// }



// document
// .querySelector(".btn-update-route")
// .addEventListener("click", function (){
//     x = document.querySelectorAll(".schedule");
// y = document.querySelectorAll(".stop-card__details");
// z = y[2].querySelector(".stop-card__path-id");
// // console.log(z.innerText);
// let newparentPathId = 3;
// newchangePathIdAndBG(newparentPathId);
// let tt = z.closest(".schedule");
// tt.parentNode.removeChild(tt);


// });

const newchangePathIdAndBG = function (changedPathId) {
  let newpathIdCount = 0;
  document.querySelectorAll(".stop-card").forEach(function (e) {
    const newpathId = e.children[0].children[0].innerText.split("#")[1] * 1;

    if (newpathId == changedPathId) {
      newpathIdCount += 1;
    }
    if (newpathIdCount === 1) {
      e.children[0].children[0].innerHTML = `#${newpathId - 1}`;
      e.classList.toggle("back-odd");
      e.classList.toggle("back-even");
    }
  });
};














</script>
