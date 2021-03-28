    <div class="upcoming__trips-container margin-b-huge">
        <div class="upcoming__trips--header" style="margin-bottom:4rem">
            <div class="upcoming__trips--header-text">
                Upcoming trips
            </div>
        </div>
    <div class='upcoming__trips--cards-container' style="justify-content: space-around;width:95%;flex-wrap:wrap">
       
        
        

        <?php
       include_once '../views/components/myBookingCards.php';
       ?>
        <?php
          $dom = new DOMDocument;
          libxml_use_internal_errors(true);
         $dom->loadHTML('...');
        libxml_clear_errors();
       ?>

<?php


if(isset($intersect)){
    //var_dump($intersect);
$i=0;
    foreach ($intersect as $key => $value) {
           $i++;
                    $html = renderIntersectionCard($value,$i);
                    $dom = new DOMDocument();
                    $dom->loadHTML($html);
                    print_r($dom->saveHTML());
                }

}

if(isset($direct)){
    $i=0;
   // var_dump($direct);
    foreach ($direct as $key => $value) {
        $i++;
        $html = renderSinglePath($value,$i++);
       
    }
}



    
   




?>


        </div>
        
        </div>
       
    </div>
    
    

</body>