<div class="dashboard">
    <?php include_once '../views/layouts/adminSideNav.php';?>


<div class="load-content-container">
        <div class="load-content">
          <div class="load-content--settings">
            <div class="content-title">
              <p>New Train Profile Settings</p>
            </div>
            <form action="/utrance-railway/trains/add" class="form__train-data" method='post' >
            <?php if(isset($TravalDaysError)){echo $TravalDaysError;}?> 
                <div class="content__fields">
                    <div class="trainname-box content__fields-item">
                        <label for="trainname" class="form__label">Train Name</label>
                        <input type="text" name="train_name" class="form__input" placeholder="<?php  echo isset($TrainNameError)? $TrainNameError : 'Enter train name';?>" value="<?php echo isset($train_name) ? $train_name : '';?>" required>
                      
                    </div>
                    <div class="traintype-box content__fields-item">
                        <label for="traintype" class="form__label">Train Type</label>
                        <select name="train_type" id="train_type" class="form__input" >
                            <option value="Express"<?php if(isset($train_type)){if($train_type=='Express'){echo 'selected'; }}?>>Express</option>
                            <option value="Slow"<?php if(isset($train_type)){if($train_type=='Slow'){echo 'selected'; }}?>>Slow</option>
                            <option value="Intercity"<?php if(isset($train_type)){if($train_type=='Intercity'){echo 'selected'; }}?>>Intercity</option>
                        </select>
                    </div>
                    <div class="routeid-box content__fields-item">
                        <label for="routeid" class="form__label">Route Id</label>
                        <!-- <input type="number" min="0"  name="route_id" id="routeid" class="form__input number__input route-id__number-input" placeholder="<?php echo isset($RoutIdError) ? $RoutIdError : '0';?>"value="<?php echo isset($route_id) ? $route_id : '';?>" required> -->
                        <?php
                        $dom = new DOMDocument;
                        libxml_use_internal_errors(true);
                        $dom->loadHTML('...');
                        libxml_clear_errors();
                        if(isset($routes) && !isset($route_id))
                        {
                          
                           
                        $html =" <select name='route_id' id='route_id'>";
                     
                        
                            foreach($routes as $key => $value)
                            {
                                
                             $html .= "<option value=".$value['route_id'].">".$value['route_id']."</option>";
    
                            }
                            
                          
                        $html .= "</select>"; 
                        

                        $dom = new DOMDocument();
                        $dom->loadHTML($html);
                        print_r($dom->saveHTML());
                        }
                        
                        ?>
                        <?php
                        $dom = new DOMDocument;
                        libxml_use_internal_errors(true);
                        $dom->loadHTML('...');
                        libxml_clear_errors();
                        if(isset($route_id) && isset($routes))
                         { 
                            
                            
                            $html =" <select name='route_id' id='route_id'>";
                            
                        
                            foreach($routes as $key => $value)
                            {
                                $isChecked = false;
                                if($value['route_id']==$route_id){
                                    $html .= "<option value=".$value['route_id']." selected='selected'> ".$value['route_id']."</option>";
    
                                }
                                if($value['route_id']==$route_id){
                                    continue;
                                }
                
                                $html .= "<option value=".$value['route_id']." > ".$value['route_id']."</option>";

    
                            }
                            
                          
                          $html .= "</select>"; 
                            // $html = "<input type='number' min='0'  name='route_id' id='routeid' class='form__input number__input route-id__number-input' value=".$route_id.">";
                            $dom = new DOMDocument();
                            $dom->loadHTML($html);
                            print_r($dom->saveHTML()); 
                        }
                        if(!isset($route_id) && empty($routes)){
                            echo '&nbsp &nbsp';
                            echo 'NOT VALIED ROUTE ID';
                        }
                        ?>
                        
                    </div>
                    <fieldset class="traintaveldays-box content__fields-item">
                        <legend class="form__label">Train Travel Days</legend>
                        <div class="traveldaysbox__container checkbox__horizontal" required>
                            <div class="">
                                <input type="hidden" name="train_travel_days[]" value="" >
                                <input type="checkbox" id="monday" name="train_travel_days[]" value="monday" <?php if(isset($train_travel_days)){foreach($train_travel_days as $item) {if($item === 'monday'){ echo "checked='checked'"; }}}?>checked>
                                <label for="monday" class="checkbox__label">Mon</label>
                            </div>
                            <div class="">
                                <input type="hidden" name="train_travel_days[]" value="">
                                <input type="checkbox" id="tuesday" name="train_travel_days[]" value="tuesday" <?php if(isset($train_travel_days)){foreach($train_travel_days as $item) {if($item === 'tuesday'){ echo "checked='checked'"; }}}?>>
                                <label for="tuesday" class="checkbox__label">Tue</label>
                            </div>
                            <div class="">
                                <input type="hidden" name="train_travel_days[]" value="">
                                <input type="checkbox" id="wednesday" name="train_travel_days[]" value="wednesday" <?php if(isset($train_travel_days)){foreach($train_travel_days as $item) {if($item === 'wednesday'){ echo "checked='checked'"; }}}?>>
                                <label for="wednesday" class="checkbox__label">Wed</label>
                            </div>
                            <div class="">
                                <input type="hidden" name="train_travel_days[]" value="">
                                <input type="checkbox" id="thursday" name="train_travel_days[]" value="thursday" <?php if(isset($train_travel_days)){foreach($train_travel_days as $item) {if($item === 'thursday'){ echo "checked='checked'"; }}}?>>
                                <label for="thursday" class="checkbox__label">Thurs</label>
                            </div>
                            <div class="">
                                <input type="hidden" name="train_travel_days[]" value="">
                                <input type="checkbox" id="friday" name="train_travel_days[]" value="friday" <?php if(isset($train_travel_days)){foreach($train_travel_days as $item) {if($item === 'friday'){ echo "checked='checked'"; }}}?>>
                                <label for="friday" class="checkbox__label">Fri</label>
                            </div>
                            <div class="">
                                <input type="hidden" name="train_travel_days[]" value="">
                                <input type="checkbox" id="saturday" name="train_travel_days[]" value="saturday" <?php if(isset($train_travel_days)){foreach($train_travel_days as $item) {if($item === 'saturday'){ echo "checked='checked'"; }}}?>>
                                <label for="saturday" class="checkbox__label">Sat</label>
                            </div>
                            <div class="">
                                <input type="hidden" name="train_travel_days[]" value="">
                                <input type="checkbox" id="sunday" name="train_travel_days[]" value="sunday" <?php if(isset($train_travel_days)){foreach($train_travel_days as $item) {if($item === 'sunday'){ echo "checked='checked'"; }}}?>>
                                <label for="sunday" class="checkbox__label">Sun</label>
                            </div>
                        </div>
                    </fieldset>
                    <div class="trainactive-box content__fields-item">
                        <label for="trainactive" class="form__label form__label--active">Active Status</label>
                
                        <input type="checkbox" name="train_active_status" id="trainactive" value="1" <?php if(isset($train_active_status)){if($train_active_status==1){echo "checked='checked'";}}?>checked>
                    </div>
                    <div class="freightallowed-box content__fields-item">
                        <label for="freightsallowed" class="form__label form__label--freights-allowed">Freights Allowed (Kg)</label>
                        <input type="hidden" name="train_freights_allowed" value="0">
                        <input type="checkbox" name="train_freights_allowed" id="freightsallowed" value="1" <?php if(isset($train_freights_allowed)){if($train_freights_allowed==1){echo "checked='checked'";}}?> onclick="terms_changed(this)">
                        
                        <input type="number" min="0" name="train_total_weight" id="freights-quantity" class="form__input number__input freights-quantity__number-input" value="<?php echo isset($train_total_weight) ? $train_total_weight : '0';?>"disabled>
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
                    </div>
                    <fieldset class="classess-box content__fields-item">
                        <legend class="form__label">Reservation Categories</legend>
                        <div class="reservation-categorybox__container checkbox__horizontal">
                            <div class="seatbox-firstclass reservation__category-item">
                                <label for="firstclass">First Class</label>
                                <input type="number" min="0" max="50" name="train_fc_seats" id="firstclass" class="form__input number__input"  value="<?php echo isset($train_fc_seats) ? $train_fc_seats : '0';?>" >
                            </div>
                            <div class="seatbox-secondclass reservation__category-item">
                                <label for="secondclas">Second Class</label>
                                <input type="number" min="0" max="60" name="train_sc_seats" id="secondclass" class="form__input number__input" placeholder="0" required value="<?php echo isset($train_sc_seats) ? $train_sc_seats : '';?>" >
                            </div>
                            <div class="seatbox-sleepingberths reservation__category-item">
                                <label for="sleepingberths">Sleeping Berths</label>
                                <input type="number" min="0" max="20" name="train_sleeping_berths" id="sleepingberths" class="form__input number__input" value="<?php echo isset($train_sleeping_berths) ? $train_sleeping_berths : '0';?>">
                            </div>
                        </div> 
                        <div class="reservation-categorybox__container checkbox__horizontal">
                            <div class="seatbox-observation--saloon reservation__category-item">
                                <label for="observation-saloon">Observation Saloon</label>
                                <input type="hidden" name="train_observation_seats" value="0">
                                <input type="checkbox" name="train_observation_seats" id="observation-saloon" value="1" <?php if(isset($train_observation_seats)){if($train_observation_seats==1){echo "checked='checked'";}}?>>
                            </div> 
                        </div>          
                    </fieldset>
                    <div class="btn__save-box">
                        <button class="btn btn-round-blue margin-b-l" type="submit">Add Train</button>
                    </div>
                </div>
            </form>
          </div>
        </div>
        </div>
</div>


