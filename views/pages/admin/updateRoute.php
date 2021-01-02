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
    foreach ($routes as $key => $value){
        if($value['start_station_id']==$value['station_id']){
            $satrtStation = $value['station_name'];
        }
        if($value['dest_station_id']==$value['station_id']){
            $endStation = $value['station_name'];
        }
    }   

    $html = "<div class='content-title'>";
    $html .= "<p>" . $satrtStation . " - " . $endStation . "</p>";
    $html .= "<p id='newRouteId'>#" . $routes[0]['route_id'] . "</p></div>";
    $html .=" <div class='titles margin-t-m margin-b-s'>
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
<script>addStops();</script>

<script>
$(document).ready(function(){
  $("#button").click(function(){
     
 let newindex2=newStations;
let newindex3='<?php echo $x; ?>';
console.log(newindex3);
    $.ajax({
      url:'newmanageRoutes',
      method:'post',
      data:{index1:newindex2,index2:newindex3},
      success : function (data) {
            
            if(data.length===2){
               window.location.href = "/utrance-railway/routes/";  
            }else{
                console.log(data);
            }
            
        }
    })




  });
});
</script>
