<div class="load-content-container">
    <div class="load-content">
    <?php
                    $dom = new DOMDocument;
                    libxml_use_internal_errors(true);
                    $dom->loadHTML('...');
                    libxml_clear_errors();
                  ?>
        <?php
            if(isset($trains)){
                foreach($trains as $key=>$value){
                    
                    
                    $travalArray =  explode(" ", $value['train_travel_days']);
                   
                 
                    $html ="<div class='load-content--settings'> 
                    <div class='content-title'>      
                    ";
                    $html .="<p>" .$value['train_name'] . " Profile Settings</p></div>";
                    $html .="<form action='' class='form__train-data'>";
                    $html .="<div class='content__fields'>";
                    $html .="<div class='trainname-box content__fields-item'>";
                    $html .="<label for='trainname' class='form__label'>Train Name</label>";
                    $train_name = $value['train_name'];
                    $html .="<input type='text' name='trainname' class='form__input' value='$train_name' /></div>";
                    $html .="<div class='traintype-box content__fields-item'>";
                    $html .="<label for='traintype' class='form__label'>Train Type</label>";
                    $html .="<select name='traintype' id='traintype' class='form__input' value=".$value['train_type']." >";
                    $html .="<option value='express'>Express</option>";
                    $html .="<option value='Slow'>Slow</option>";
                    $html .=" <option value='Intercity'>Intercity</option></select></div>";
                    $html .="<div class='routeid-box content__fields-item'>";
                    $html .="<label for='routeid' class='form__label'>Route Id</label>";
                    $html .="<input type='number' min='0' value=".$value['route_id']." name='routeid' id='routeid' class='form__input number__input route-id__number-input'></div>";

                    $html .="<fieldset class='traintaveldays-box content__fields-item'>";
                    $html .="<legend class='form__label'>Train Travel Days</legend>";
                    $html .="<div class='traveldaysbox__container checkbox__horizontal'>";

                   
                    
             

                    $html .="<div class=''>";
                    $isChecked = false;
                    foreach($travalArray as $item) {if($item == 'monday') $isChecked = true; }
                    if($isChecked) {
                        $html .="<input type='checkbox' id='monday' name='traveldays' value='monday'checked='checked'/>";
                    } else {
                        $html .="<input type='checkbox' id='monday' name='traveldays' value='monday'/>";
                    }
                    $html .="<label for='monday' class='checkbox__label'>Mon</label></div>";
                    $html .="<div class=''>";
                    $isChecked = false;
                    foreach($travalArray as $item) {if($item == 'tuesday') $isChecked = true; }
                    if($isChecked) {
                        $html .="<input type='checkbox' id='tuesday' name='traveldays' value='tuesday' checked='checked'/>";
                    } else {
                        $html .="<input type='checkbox' id='tuesday' name='traveldays' value='tuesday'/>";
                    }
                    $html .="<label for='tuesday' class='checkbox__label'>Tue</label></div>";
                    $html .="<div class=''>";
                    $isChecked = false;
                    foreach($travalArray as $item) {if($item == 'wednesday') $isChecked = true; }
                    if($isChecked) {
                        $html .="<input type='checkbox' id='wednesday' name='traveldays' value='wednesday' checked='checked'/>";
                    } else {
                        $html .="<input type='checkbox' id='wednesday' name='traveldays' value='wednesday'/>";
                    }
                    $html .="<label for='wednesday' class='checkbox__label'>Wed</label></div>";
                    $html .="<div class=''>";
                    $isChecked = false;
                    foreach($travalArray as $item) {if($item == 'thursday') $isChecked = true; }
                    if($isChecked) {
                        $html .="<input type='checkbox' id='thursday' name='traveldays' value='thursday' checked='checked'/>";
                    } else {
                        $html .="<input type='checkbox' id='thursday' name='traveldays' value='thursday'/>";
                    }
                    $html .="<label for='thursday' class='checkbox__label'>Thurs</label></div>";
                    $html .="<div class=''>";
                    $isChecked = false;
                    foreach($travalArray as $item) {if($item == 'friday') $isChecked = true; }
                    if($isChecked) {
                        $html .="<input type='checkbox' id='friday' name='traveldays' value='friday' checked='checked'/>";
                    } else {
                        $html .="<input type='checkbox' id='friday' name='traveldays' value='friday'/>";
                    }
                    $html .="<label for='friday' class='checkbox__label'>Fri</label></div>";
                    $html .="<div class=''>";
                    $isChecked = false;
                    foreach($travalArray as $item) {if($item == 'saturday') $isChecked = true; }
                    if($isChecked) {
                        $html .="<input type='checkbox' id='saturday' name='traveldays' value='saturday' checked='checked'/>";
                    } else {
                        $html .="<input type='checkbox' id='saturday' name='traveldays' value='saturday'/>";
                    }
                    $html .="<label for='saturday' class='checkbox__label'>Sat</label></div>";
                    $html .="<div class=''>";
                    $isChecked = false;
                    foreach($travalArray as $item) {if($item == 'sunday') $isChecked = true; }
                    if($isChecked) {
                        $html .="<input type='checkbox' id='sunday' name='traveldays' value='sunday' checked='checked'/>";
                    } else {
                        $html .="<input type='checkbox' id='sunday' name='traveldays' value='sunday'/>";
                    }
                    $html .="<label for='sunday' class='checkbox__label'>Sun</label></div></div></fieldset>";

                    $html .="<div class='trainactive-box content__fields-item'>";
                    $html .="<label for='trainactive' class='form__label form__label--active'>Active Status</label>";
                    
                    if($value['train_active_status']==1){
                    $html .="<input type='checkbox' name='trainactivestatus' id='trainactive' value='1' checked='checked'></div>";
                    }else{
                    $html .="<input type='checkbox' name='trainactivestatus' id='trainactive' value='0' ></div>";  
                    }
                    $html .="<div class='freightallowed-box content__fields-item'>";
                    $html .="<label for='freightsallowed' class='form__label form__label--freights-allowed'>Freights Allowed (Kg)</label>";
                    if($value['train_freights_allowed']==1){
                    $html .="<input type='checkbox' name='freightsallowed' id='freightsallowed' value='1' checked='checked'>";
                    }else{
                        $html .="<input type='checkbox' name='freightsallowed' id='freightsallowed' value='0'>";
                    }
                    $html .="<input type='number' min='0' value=".$value['train_total_weight']." name='freights-quantity' id='freights-quantity' class='form__input number__input freights-quantity__number-input'></div>";
                    $html .="<fieldset class='classess-box content__fields-item'>";
                    $html .="<legend class='form__label'>Reservation Categories</legend>";
                    $html .="<div class='reservation-categorybox__container checkbox__horizontal'>";
                    $html .="<div class='seatbox-firstclass reservation__category-item'>";
                    $html .="<label for='firstclass'>First Class</label>";
                    $html .="<input type='number' min='0' value=".$value['train_fc_seats']." name='firstclass' id='firstclass' class='form__input number__input'></div>";
                    $html .="<div class='seatbox-secondclass reservation__category-item'>";
                    $html .="<label for='secondclas'>Second Class</label>";
                    $html .="<input type='number' min='0' value=".$value['train_sc_seats']." name='secondclass' id='secondclass' class='form__input number__input'></div>";
                    $html .="<div class='seatbox-sleepingberths reservation__category-item'>";

                    $html .="<label for='sleepingberths'>Sleeping Berths</label>";
                    $html .="<input type='number' min='0' value=".$value['train_sleeping_berths']." name='sleepingberths' id='sleepingberths' class='form__input number__input'></div></div>";
                    $html .="<div class='reservation-categorybox__container checkbox__horizontal'>";
                    $html .="<div class='seatbox-observation--saloon reservation__category-item'>";
                    $html .="<label for='observation-saloon'>Observation Saloon</label>";
                    if($value['train_observation_seats']==1){
                    $html .="<input type='checkbox' name='observation-saloon' id='observation-saloon value='1' checked='checked'></div></div></fieldset>";
                    }else{
                    $html .="<input type='checkbox' name='observation-saloon' id='observation-saloon value='0'></div></div></fieldset>";    
                    }
                    $html .="<div class='btn__save-box'>";
                    $html .="<div class='btn__save btn__add-train'>Update Train</div></div></div></form></div>";
                   
                    $dom = new DOMDocument();
                    $dom->loadHTML($html);
                    print_r($dom->saveHTML());
                    

                    // }

                }
            }  


        ?>
          
    </div>
</div>