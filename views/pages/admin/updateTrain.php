
<div class="load-content-container">

<div class="load-content">
 <!-- if(isset($TrainNameError)){echo $TrainNameError;}else{echo 'hello';}  -->
    <?php
        $dom = new DOMDocument;
        libxml_use_internal_errors(true);
        $dom->loadHTML('...');
        libxml_clear_errors();
   
        if(isset($trains))
        {
            foreach($trains as $key=>$value)
            {


                $travalArray =  explode(" ", $value['train_travel_days']);
               
                $html ="<div class='load-content--settings'> 
                <div class='content-title'>      
                ";
                $html .="<p>" .$value['train_name'] . " Profile Settings</p></div>";
                $html .="<form action='/utrance-railway/trains/update?id=".$value['train_id']."' class='form__train-data' method = 'post'>";
                // if(isset($newtrains)){foreach($newtrains as $item){ echo $item; }}
                 if(isset($newtrains['TravalDaysError'])){echo $newtrains['TravalDaysError'];};
              
                // if(isset($TrainNameError)){echo $TrainNameError;}else{echo 'hello';}
                $html .="<div class='content__fields'>";
                $html .="<div class='trainname-box content__fields-item'>";
                $html .="<label for='trainname' class='form__label'>Train Name</label>";
                if(isset($newtrains['TrainNameError'])){
                $error=$newtrains['TrainNameError'];
                $html .="<input type='text' name='train_name' class='form__input error__placeholder' placeholder='$error' required/></div>";
                }else if(isset($newtrains['train_name'])){
                    $html .="<input type='text' name='train_name' class='form__input' value='".$newtrains['train_name']." required/></div>";
                }else{
                    $train_name = $value['train_name'];
                $html .="<input type='text' name='train_name' class='form__input' value='$train_name' required/></div>";

                }
                
                $html .="<div class='traintype-box content__fields-item'>";
                $html .="<label for='traintype' class='form__label'>Train Type</label>";
                $train_type = $value['train_type'];
               
                $html .="<select name='train_type' id='traintype' class='form__input'>";
            
                if($train_type=='Express' || $train_type=='express'){
                    $html .="<option value='Express' selected>Express</option>";
                }else{
                    $html .="<option value='Express'>Express</option>";
                }
                if($train_type=='Slow'){
                    $html .="<option value='Slow' selected>Slow</option>";
                }else{
                    $html .="<option value='Slow'>Slow</option>";
                }
                if($train_type=='Intercity'){
                    $html .="<option value='Intercity' selected>Intercity</option></select></div>";
                }else{
                    $html .="<option value='Intercity'>Intercity</option></select></div>";
                }
                // $html .="<option value='Express'  <?php echo if(".$train_type." == 'Express') ? selected='selected' : ''; >Express</option>";
                // $html .="<option value='Slow' <?php echo if(".$train_type." == 'Slow') ?  selected='selected' : ''; >Slow</option>";
                // $html .=" <option value='Intercity' <?php echo if(".$train_type." == 'Intercity') ?  selected='selected' : ''; >Intercity</option></select></div>";
                $html .="<div class='routeid-box content__fields-item'>";
                $html .="<label for='routeid' class='form__label'>Route Id</label>";
                $html .="<input type='number' min='0' value=".$value['route_id']." name='route_id' id='routeid' class='form__input number__input route-id__number-input' readonly></div>";

                $html .="<fieldset class='traintaveldays-box content__fields-item'>";
                $html .="<legend class='form__label'>Train Travel Days</legend>";
                $html .="<div class='traveldaysbox__container checkbox__horizontal'>";

               
                $html .="<div class=''>";
                $isChecked = false;
                foreach($travalArray as $item) {if($item == 'monday') $isChecked = true; }
                if($isChecked) 
                {
                $html .="<input type='checkbox' id='monday' name='train_travel_days[]' value='monday'checked='checked'/>";
                } 
                else 
                {
                $html .="<input type='checkbox' id='monday' name='train_travel_days[]' value='monday'/>";
                }

                $html .="<label for='monday' class='checkbox__label'>Mon</label></div>";
                $html .="<div class=''>";
                $isChecked = false;
                foreach($travalArray as $item) {if($item == 'tuesday') $isChecked = true; }
                if($isChecked) 
                {
                $html .="<input type='checkbox' id='tuesday' name='train_travel_days[]' value='tuesday' checked='checked'/>";
                } else 
                {
                    $html .="<input type='checkbox' id='tuesday' name='train_travel_days[]' value='tuesday'/>";
                }

                $html .="<label for='tuesday' class='checkbox__label'>Tue</label></div>";
                $html .="<div class=''>";
                $isChecked = false;
                foreach($travalArray as $item) {if($item == 'wednesday') $isChecked = true; }
                if($isChecked) {
                    $html .="<input type='checkbox' id='wednesday' name='train_travel_days[]' value='wednesday' checked='checked'/>";
                } 
                else 
                {
                    $html .="<input type='checkbox' id='wednesday' name='train_travel_days[]' value='wednesday'/>";
                }

                $html .="<label for='wednesday' class='checkbox__label'>Wed</label></div>";
                $html .="<div class=''>";
                $isChecked = false;
                foreach($travalArray as $item) {if($item == 'thursday') $isChecked = true; }
                if($isChecked) 
                {
                $html .="<input type='checkbox' id='thursday' name='train_travel_days[]' value='thursday' checked='checked'/>";
                } 
                else 
                {
                $html .="<input type='checkbox' id='thursday' name='train_travel_days[]' value='thursday'/>";
                }

                $html .="<label for='thursday' class='checkbox__label'>Thurs</label></div>";
                $html .="<div class=''>";
                $isChecked = false;
                foreach($travalArray as $item) {if($item == 'friday') $isChecked = true; }
                if($isChecked) 
                {
                $html .="<input type='checkbox' id='friday' name='train_travel_days[]' value='friday' checked='checked'/>";
                } 
                else 
                {
                $html .="<input type='checkbox' id='friday' name='train_travel_days[]' value='friday'/>";
                }

                $html .="<label for='friday' class='checkbox__label'>Fri</label></div>";
                $html .="<div class=''>";
                $isChecked = false;
                foreach($travalArray as $item) {if($item == 'saturday') $isChecked = true; }
                if($isChecked) 
                {
                $html .="<input type='checkbox' id='saturday' name='train_travel_days[]' value='saturday' checked='checked'/>";
                } 
                else 
                {
                $html .="<input type='checkbox' id='saturday' name='train_travel_days[]' value='saturday'/>";
                }

                $html .="<label for='saturday' class='checkbox__label'>Sat</label></div>";
                $html .="<div class=''>";
                $isChecked = false;
                foreach($travalArray as $item) {if($item == 'sunday') $isChecked = true; }
                if($isChecked) 
                {
                $html .="<input type='checkbox' id='sunday' name='train_travel_days[]' value='sunday' checked='checked'/>";
                } 
                else 
                {
                $html .="<input type='checkbox' id='sunday' name='train_travel_days[]' value='sunday'/>";
                }

                $html .="<label for='sunday' class='checkbox__label'>Sun</label></div></div></fieldset>";

                $html .="<div class='trainactive-box content__fields-item'>";
                $html .="<label for='trainactive' class='form__label form__label--active'>Active Status</label>";
                
                if($value['train_active_status']==1)
                {
                $html .="<input type='checkbox' name='train_active_status' id='trainactivestatus' value='1' checked='checked'></div>";
                }
                else
                {
                $html .="<input type='checkbox' name='train_active_status' id='trainactivestatus' value='1' ></div>";  
                }

                $html .="<div class='freightallowed-box content__fields-item'>";
                $html .="<label for='freightsallowed' class='form__label form__label--freights-allowed'>Freights Allowed (Kg)</label>";
                if($value['train_freights_allowed']==1)
                {
                $html .="<input type='checkbox' name='train_freights_allowed' id='freightsallowed' value='1' checked='checked'>";
                $html .="<input type='number' min='0' value=".$value['train_total_weight']." name='train_total_weight' id='freights-quantity' class='form__input number__input freights-quantity__number-input'></div>";
                }
                else
                {
                $html .="<input type='checkbox' name='train_freights_allowed' id='freightsallowed' value='1' onclick='terms_changed(this)'>";
                $html .="<input type='number' min='0' value=".$value['train_total_weight']." name='train_total_weight' id='freights-quantity' class='form__input number__input freights-quantity__number-input' disabled></div>";
                
                }

                
                $html .="<fieldset class='classess-box content__fields-item'>";
                $html .="<legend class='form__label'>Reservation Categories</legend>";
                $html .="<div class='reservation-categorybox__container checkbox__horizontal'>";
                $html .="<div class='seatbox-firstclass reservation__category-item'>";
                $html .="<label for='firstclass'>First Class</label>";
                $html .="<input type='number' min='0' max='50' value=".$value['train_fc_seats']." name='train_fc_seats' id='firstclass' class='form__input number__input'></div>";
                $html .="<div class='seatbox-secondclass reservation__category-item'>";
                $html .="<label for='secondclas'>Second Class</label>";
                $html .="<input type='number' min='0' max='60' value=".$value['train_sc_seats']." name='train_sc_seats' id='secondclass' class='form__input number__input'></div>";
                $html .="<div class='seatbox-sleepingberths reservation__category-item'>";

                $html .="<label for='sleepingberths'>Sleeping Berths</label>";
                $html .="<input type='number' min='0' max='20' value=".$value['train_sleeping_berths']." name='train_sleeping_berths' id='sleepingberths' class='form__input number__input'></div></div>";
                $html .="<div class='reservation-categorybox__container checkbox__horizontal'>";
                $html .="<div class='seatbox-observation--saloon reservation__category-item'>";
                $html .="<label for='observation-saloon'>Observation Saloon</label>";

                if($value['train_observation_seats']==1)
                {
                $html .="<input type='checkbox' name='train_observation_seats' id='observation-saloon' value='1' checked='checked'></div></div></fieldset>";
                }
                else
                {
                $html .="<input type='checkbox' name='train_observation_seats' id='observation-saloon' value='1'></div></div></fieldset>";    
                }

                $html .="<div class='btn__save-box'>";
                // $html .="<div class='btn__save btn__add-train' type='submit'>Update Train</div></div></div></form></div>";
        
                    if(isset($newArray)){
                        
                    $html .="<button class='btn__save btn-settings' type='submit' disabled>Update Train</button></div></div></form></div>";
                }else{
                    $html .="<button class='btn__save btn-settings' type='submit'>Update Train</button></div></div></form></div>";        
                }
            
               
                    
               
                $dom = new DOMDocument();
                $dom->loadHTML($html);
                print_r($dom->saveHTML());
                

                // }

            }
        }  


    ?>
      
</div>
</div>
</div>
</div>
<!-- </div> -->

                   <script>
                    function terms_changed(termsCheckBox){
                        //If the checkbox has been checked
                        if(termsCheckBox.checked){
                            //Set the disabled property to FALSE and enable the button.
                            document.getElementById("freights-quantity").disabled = false;
                        } else{
                            //Otherwise, disable the submit button.
                            document.getElementById("freights-quantity").disabled = true;
                        }
                    }
                    </script>