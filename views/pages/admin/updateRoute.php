<div class="dashboard">
    <?php include_once '../views/layouts/adminSideNav.php';?>
    <div class="dash-content__container">
        <div class="dash-content">

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

    $html = "<div class='heading-secondary margin-b-m margin-t-m'>";
    $html .= "<p class='center-text'>" . $satrtStation . " - " . $endStation . "</p>";
    $html .= "<p class='center-text' id='newRouteId'>#" . $routes[0]['route_id'] . "</p></div>";
    $html .= " <div class='view-routes__title margin-t-m margin-b-s'>
    <div>Path id</div>
    <div>Station</div>
    <div>Arr. Time</div>
    <div>Dept. Time</div></div>";

    $i = 0;
    foreach ($routes as $key => $value) {
        $i++;

        $html .= " <div>";
        if (($i % 2) == 0) {

            $html .= "<div class='view-routes__stop view-routes__stop--even'>";
        } else {
            $html .= "<div class='view-routes__stop view-routes__stop--odd'>";
        }
        $html .= "<div class='view-routes__stop-details'>";
        $html .= "<div>#" . $value['path_id'] . "</div>";
        $html .= "<div class='view-routes__stop-station'>" . $value['station_name'] . "</div>";
        $html .= "<div>" . $value['arrival_time'] . "</div>";
        $html .= "<div>" . $value['departure_time'] . "</div></div>";
        $html .= "<div class='view-routes__btn-add'>";
        $html .= "<svg class='view-routes__btn-add-icon'>
        <use xlink:href='/public/img/svg/sprite2.svg#icon-add_circle_outline'></use></svg></div></div></div>";

    }

}
$dom = new DOMDocument();
$dom->loadHTML($html);
print_r($dom->saveHTML());

?>
                <div class="btn-update-route">
                    <button class="btn-round-blue margin-t-m margin-b-m" id="button">
                        Update Route
                    </button>
                </div>
        </div>
    </div>
</div>


<script type="text/javascript" src="/public/js/pages/admin/viewRoute.js"></script>
<script type="text/javascript" src="/public/js/pages/admin/viewaddRoutCard.js"></script>
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
               window.location.href = "/routes/";
            }else{
               console.log(data);
            }

        }
    })
  });
});



const newchangePathIdAndBG = function (changedPathId) {
  let newpathIdCount = 0;
  document.querySelectorAll(".view-routes__stop").forEach(function (e) {
    const newpathId = e.children[0].children[0].innerText.split("#")[1] * 1;

    if (newpathId == changedPathId) {
      newpathIdCount += 1;
    }
    if (newpathIdCount === 1) {
      e.children[0].children[0].innerHTML = `#${newpathId - 1}`;
      e.classList.toggle("view-routes__stop--odd");
      e.classList.toggle("view-routes__stop--even");
    }
  });
};

</script>
