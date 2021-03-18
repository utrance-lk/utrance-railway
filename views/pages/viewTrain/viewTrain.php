<section class="view__train--container">
    <div class="topic">
    <?php
    if(isset($x)){
      
        $html="";
    
        $html.="<div class='train__name-box'>" .$x['train_name']. "</div>";
        $html.="<div class='station__text-box'>";
        $html.="<span class='start__station' id='start'>" .$x['start_station']. "</span>&nbsp;to&nbsp;<span class='destination__station' id='end'>" .$x['dest_station']. "</span>";
        $html.="</div>";
        $html.="<div class='journey__date-box'>";
        $html.="<span>journey days : </span>&nbsp;&nbsp;<span class='journey__date-day'>";
        $html.="<span class='day'>" .ucwords($x['train_travel_days']). "</span>";
        $html.="</span>";
        $html.="</div>";
        $html.="<div class='journey__time-box'>";
        $html.="<span>journey time</span>&nbsp;&nbsp;<span class='total__journey-time'>" .$x['total_time']. "</span>";
        $html.="</div>";

        $dom = new DOMDocument();
        $dom->loadHTML($html);
        print_r($dom->saveHTML());
    }
    
    ?>
    </div>

    <div id='map' style='width: 400px; height: 300px;margin-left: 54rem;margin-bottom:3rem'></div>
  <script>
    function initMap(){
        var directionService=new google.maps.DirectionsService;
        var directionDisplay=new google.maps.DirectionsRenderer;//render start and end
        var map=new google.maps.Map(document.getElementById('map'),{
            zoom:7,
            center:{lat:41.85,lng:-87.65}
        });
        directionDisplay.setMap(map);

        var onChangeHandler=function(){
            calculateAndDisplayRoute(directionService,directionDisplay);
        };
        document.getElementById('start').addEventListener('change',onChangeHandler);
        document.getElementById('end').addEventListener('change',onChangeHandler);
    }

    function calculateAndDisplayRoute(directionService,directionDisplay){
        directionService.route({
            origin:document.getElementById('start').value,
            destination:document.getElementById('end').value,
            travelMode:'DRIVING'
        },function(response,status){
            if(status === 'OK'){
                directionDisplay.setDirections(response);
            }else{
                window.alert('Direction request failed due to '+status);
            }
        });
    }
    </script>


    <script async
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCeZye_XdtgC-zE9u4n7hHOSOE51gjNzew&callback=initMap">
</script>
    <?php
    
     if(isset($get_train_details)){
           
            $html = "";
            $html.="<div class='schedule-container'>";
            $html.="<div class='schedule__headings'>";
            $html.="<div class='topic__station'>Station</div>";
            $html.="<div class='topic__arrival-time'>Arrival time</div>";
            $html.="<div class='topic__departure-time'>Departure time</div>";
            $html.="</div>";
        foreach($get_train_details as $key => $value) {
            $html.="<div class='schedule__results--odd'>";
            $html.="<div class='result__station'>" .$value['station_name'][0]['station_name']. "</div>";
            $html.="<div class='result__arrival-time'>" .$value[0]['arrival_time']. "</div>";
            $html.="<div class='result__departure-time'>" .$value[0]['departure_time']. "</div>";
            $html.="</div>";
            

             
        }
        $html.="</div>";
            $dom = new DOMDocument();
             $dom->loadHTML($html);
             print_r($dom->saveHTML());


        
     }

    ?>
   
</section>