
<section class="booking__users">
    <!-- <div class="booking__users--topic">
        <div class="topic__text">
            Dakshina Intercity Bookings
        </div>
        <div class="topic__travel-date">
            journey date - 28th November 2020
        </div>
    </div> -->
    
    
   
    <?php 
    if (isset($reArray)){
        if(!empty($reArray)){
        $html ="<div class='booking__users--topic'>";
        $html .="<div class='topic__text'>".$reArray[0]['train_name']."</div>";
        $html .="<div class='topic__travel-date'>Journey date : ".$reArray[0]['train_date']."</div></div>";
        
        $html .="<div class='booking__users--card-container'>";
        
        foreach ($reArray as $key => $value){

            $dateTime = explode(" ", $value['created_at']);
            $date = $dateTime[0];
            $Time = $dateTime[1];
           
            
            $html .="<div class='booking__users--card'>";
            $html .="<div class='booking__users--id'>#" . $value['id'] . "</div>";
            $html .="<div class='booking__users--email'>" . $value['email_id'] . "</div>";
            $html .="<div class='booking__users--booking-date'>" . $date . "</div>";
            $html .="<div class='booking__users--booking-time'>" . $Time . "</div></div>";
            
           
           
        }
        $html .="</div><a class='btn__refund-all'>Refund all</a>";
        $dom = new DOMDocument();
        $dom->loadHTML($html);
        print_r($dom->saveHTML());

        }
        

    }
    ?>
        
   
</section>