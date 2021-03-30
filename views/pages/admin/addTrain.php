<?php include_once '../views/components/backButton.php';?>
<div class="dashboard">
    <?php include_once '../views/layouts/adminSideNav.php';?>


<?php
if (isset($_SESSION['operation'] ) ) {
 
     if(App::$APP->session->get('operation')=='fail'){
  
    
    $html="<div class='alert hide'>";
    $html.="<span class='fas fa-exclamation-circle'></span>";
    $html.="<span class='msg'>Error:Something Went Wrong!!</span>";
    $html.="<span class='close-btn'>";
    $html.="<span class='fas fa-times'></span></span></div>";

    $dom = new DOMDocument();
    $dom->loadHTML($html);
    print_r($dom->saveHTML());
    

               
  }else if(App::$APP->session->get('operation')=='success'){
    
    $html="<div class='alert-Success hide-Success'>";
    $html.="<span class='fas fa-check-circle'></span>";
    $html.="<span class='msg-Success'>Sucess:Your File has been uploaded!!</span>";
    $html.="<span class='close-btn-Success'>";
     $html.="<span class='fas fa-times'></span></span></div>";

    $dom = new DOMDocument();
    $dom->loadHTML($html);
    print_r($dom->saveHTML());
    
  }
  App::$APP->session->remove('operation');
}

?>
<script type="text/javascript" src="/public/js/components/flashMessages.js"></script>

    <div class="dash-content__container">
        <div class="dash-content">
            <div class="heading-secondary margin-b-m margin-t-m">
              <p class="center-text">New Train Profile Settings</p>
            </div>
            <form action="/trains/add" class="dash-content__form" method='post' >
            <?php if (isset($TravalDaysError)) {echo $TravalDaysError;}?>
                <div class="dash-content__input">
                    <label for="trainname" class="dash-content__label">Train Name</label>
                    <input type="text" name="train_name" class="form__input" placeholder="<?php echo isset($TrainNameError) ? $TrainNameError : 'Enter train name'; ?>" value="<?php echo isset($train_name) ? $train_name : ''; ?>" required>

                </div>
                <div class="dash-content__input">
                    <label for="traintype" class="dash-content__label">Train Type</label>
                    <select name="train_type" id="train_type" class="form__input" >
                        <option value="Express"<?php if (isset($train_type)) {if ($train_type == 'Express') {echo 'selected';}}?>>Express</option>
                        <option value="Slow"<?php if (isset($train_type)) {if ($train_type == 'Slow') {echo 'selected';}}?>>Slow</option>
                        <option value="Intercity"<?php if (isset($train_type)) {if ($train_type == 'Intercity') {echo 'selected';}}?>>Intercity</option>
                    </select>
                </div>
                <div class="dash-content__input">
                    <label for="routeid" class="dash-content__label">Route Id</label>
                    <?php
                        include '../views/layouts/helpers.php';
                        if (isset($routes) && !isset($route_id)) {
                            $html = " <select name='route_id' id='route_id' class='form__input'>";
                            foreach ($routes as $key => $value) {
                                $html .= "<option value=" . $value['route_id'] . ">" . $value['route_id'] . "</option>";
                            }
                            $html .= "</select>";
                            $dom = new DOMDocument();
                            $dom->loadHTML($html);
                            print_r($dom->saveHTML());
                        }
                    ?>
                    <?php
                        include '../views/layouts/helpers.php';
                        if (isset($route_id) && isset($routes)) {
                            $html = " <select name='route_id' id='route_id'>";
                            foreach ($routes as $key => $value) {
                                $isChecked = false;
                                if ($value['route_id'] == $route_id) {
                                    $html .= "<option value=" . $value['route_id'] . " selected='selected'> " . $value['route_id'] . "</option>";

                                }
                                if ($value['route_id'] == $route_id) {
                                    continue;
                                }

                                $html .= "<option value=" . $value['route_id'] . " > " . $value['route_id'] . "</option>";
                            }

                            $html .= "</select>";
                            $dom = new DOMDocument();
                            $dom->loadHTML($html);
                            print_r($dom->saveHTML());
                        }
                        if (!isset($route_id) && empty($routes)) {
                            echo '&nbsp &nbsp';
                            echo 'NOT VALID ROUTE ID';
                        }
                    ?>
                </div>
                <fieldset class="dash-content__input dash-content__input--border space">
                    <legend class="dash-content__label">Train Travel Days</legend>
                    <div class="add-train__travel-days" required>
                        <?php
                            $week = ['monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday'];
                            foreach ($week as $day) {
                                echo renderDay($day);
                            }
                        ?>
                    </div>
                </fieldset>
                <div class="flex-st-center margin-b-s">
                    <label for="trainactive" class="dash-content__label margin-r-xs">Active Status</label>
                    <input type="checkbox" name="train_active_status" id="trainactive" value="1" <?php if (isset($train_active_status)) {if ($train_active_status == 1) {echo "checked='checked'";}}?>checked>
                </div>
                <div class="flex-st-center margin-b-s">
                    <label for="freightsallowed" class="dash-content__label">Freights Allowed (Kg)</label>
                    <input type="hidden" name="train_freights_allowed" value="0">
                    <input type="checkbox" name="train_freights_allowed" id="freightsallowed" value="1" <?php if (isset($train_freights_allowed)) {if ($train_freights_allowed == 1) {echo "checked='checked'";}}?> onclick="terms_changed(this)">
                    <input type="number" min="0" name="train_total_weight" id="freights-quantity" class="form__input form__number freights-quantity__number-input" value="<?php echo isset($train_total_weight) ? $train_total_weight : '0'; ?>"disabled>
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
                <fieldset class="dash-content__input dash-content__input--border space">
                    <legend class="dash-content__label">Reservation Categories</legend>
                    <div class="flex-sa-center flex--row flex-wrap">
                        <div class="margin-b-s">
                            <label for="firstclass">First Class</label>
                            <input type="number" min="0" max="50" name="train_fc_seats" id="firstclass" class="form__input form__number"  value="<?php echo isset($train_fc_seats) ? $train_fc_seats : '0'; ?>" >
                        </div>
                        <div class="margin-b-s">
                            <label for="secondclas">Second Class</label>
                            <input type="number" min="0" max="60" name="train_sc_seats" id="secondclass" class="form__input form__number" placeholder="0" required value="<?php echo isset($train_sc_seats) ? $train_sc_seats : ''; ?>" >
                        </div>
                        <div class="margin-b-s">
                            <label for="sleepingberths">Sleeping Berths</label>
                            <input type="number" min="0" max="20" name="train_sleeping_berths" id="sleepingberths" class="form__input form__number" value="<?php echo isset($train_sleeping_berths) ? $train_sleeping_berths : '0'; ?>">
                        </div>
                        <div class="margin-b-s">
                            <label for="observation-saloon">Observation Saloon</label>
                            <input type="hidden" name="train_observation_seats" value="0">
                            <input type="checkbox" name="train_observation_seats" id="observation-saloon" class="form__number" value="1" <?php if (isset($train_observation_seats)) {if ($train_observation_seats == 1) {echo "checked='checked'";}}?>>
                        </div>
                    </div>
                </fieldset>
                <button class="btn btn-round-blue margin-b-l margin-t-s" type="submit">Add Train</button>
            </form>
        </div>
    </div>
</div>

<?php

function renderDay($day)
{
    $dayName = ucfirst(substr($day, 0, 3));
    $isChecked = false;

    if (isset($train_travel_days)) {
        foreach ($train_travel_days as $item) {
            if ($item === $day) {
                $isChecked = true;
            }
        }
    }

    $markup = "
            <div>
                <input type='hidden' name='train_travel_days[]' value='' >
    ";

    if ($isChecked) {
        $markup .= "
                <input type='checkbox' id='$day' name='train_travel_days[]' value='$day' checked>
        ";
    } else {
        $markup .= "
                <input type='checkbox' id='$day' name='train_travel_days[]' value='$day'>
        ";
    }

    return $markup .= "
                <label for='$day' class='margin-l-xs'>$dayName</label>
            </div>
    ";
}

?>