<section class="margin-t-m margin-b-m flex-row-sa-center">
    <div style="height:calc(100vh - 8rem)">
        <div class="center-text margin-b-l">
            <?php
            if(isset($x)){
            
                $html="";
            
                $html.="<div class='heading-tertiary'>".$x['train_name']."</div>";
                $html.="<div class='topic-greyed margin-b-xxs'>";
                $html.="<span class='start__station' id='start'>" .$x['start_station']. "</span>&nbsp;to&nbsp;<span class='destination__station' id='end'>" .$x['dest_station']. "</span>";
                $html.="</div>";
                $html.="<div class='topic-greyed margin-b-xxs'>";
                $html.="<span>journey days : </span>&nbsp;&nbsp;<span class='journey__date-day'>";
                $html.="<span class='day'>" .ucwords($x['train_travel_days']). "</span>";
                $html.="</span>";
                $html.="</div>";
                $html.="<div class='topic-greyed margin-b-xxs'>";
                $html.="<span>journey time</span>&nbsp;&nbsp;<span class='total__journey-time'>" .$x['total_time']. "</span>";
                $html.="</div>";

                $dom = new DOMDocument();
                $dom->loadHTML($html);
                print_r($dom->saveHTML());
            }
            
            ?>
        </div>

    <?php
    $i=0;
     if(isset($get_train_details)){
         
           
            $html = "";
            $html.="<div class='view-train__schedule' style='overflow-y:scroll;overflow-x:hidden;height:70%'>";
            $html.="<div class='view-train__table-heading'>";
            $html.="<div class='view-train__table-heading-text'>Station</div>";
            $html.="<div class='view-train__table-heading-text-time'>Arrival time</div>";
            $html.="<div class='view-train__table-heading-text-time'>Departure time</div>";
            $html.="</div>";
        foreach($get_train_details as $key => $value) {
         
            $html.="<div class='view-train__result-row view-train__result-row--odd'>";
            $html.="<div class='view-train__result-row-item'>" .$value['station_name']. "</div>";
            $html.="<div class='view-train__result-row-item'>" .$value['arrival_time']. "</div>";
            $html.="<div class='view-train__result-row-item'>" .$value['departure_time']. "</div>";
            $html.="</div>";
            

             
        }

        $html.="</div>";
            $dom = new DOMDocument();
             $dom->loadHTML($html);
             print_r($dom->saveHTML());
     }

    ?>
    
    
   
</div>
<div class="map-container">
    <div id='map' data-locations="<?php echo htmlspecialchars(json_encode($get_train_details));?>"></div>
</div>
   
</section>
<script type="text/javascript" src="public/js/pages/users/viewTrain.js"></script>
