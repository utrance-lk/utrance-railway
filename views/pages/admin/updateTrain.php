<?php include_once '../views/components/backButton.php';?>
<div class="dashboard">
    <?php include_once '../views/layouts/adminSideNav.php';?>
    <div class="dash-content__container">
        <div class="dash-content">
            <?php include_once '../views/layouts/helpers.php';?>



            <?php
if (isset($_SESSION['operation'])) {

    if (App::$APP->session->get('operation') == 'fail') {

        $html = "<div class='alert hide'>";
        $html .= "<span class='fas fa-exclamation-circle'></span>";
        $html .= "<span class='msg'>Error:Something Went Wrong!!</span>";
        $html .= "<span class='close-btn'>";
        $html .= "<span class='fas fa-times'></span></span></div>";

        $dom = new DOMDocument();
        $dom->loadHTML($html);
        print_r($dom->saveHTML());

    } else if (App::$APP->session->get('operation') == 'success') {

        $html = "<div class='alert-Success hide-Success'>";
        $html .= "<span class='fas fa-check-circle'></span>";
        $html .= "<span class='msg-Success'>Sucess:Your File has been uploaded!!</span>";
        $html .= "<span class='close-btn-Success'>";
        $html .= "<span class='fas fa-times'></span></span></div>";

        $dom = new DOMDocument();
        $dom->loadHTML($html);
        print_r($dom->saveHTML());

    }
    App::$APP->session->remove('operation');
}

?>
<script type="text/javascript" src="../../../utrance-railway/public/js/components/flashMessages.js"></script>




            <div class="heading-secondary margin-b-m margin-t-m">
                <p class="center-text"><?php echo $trains[0]['train_name'] ?></p>
            </div>
            <form action="/trains/update?id=<?php echo $trains[0]['train_id']?>" class="dash-content__form" method='post' >
            <?php if(isset($newtrains['TravalDaysError'])){echo $newtrains['TravalDaysError'];}; ?>
                <div class="dash-content__input">
                    <label for="trainname" class="dash-content__label">Train Name</label>
                    <input type="text" name="train_name" class="form__input" placeholder="<?php echo isset($newtrains['TrainNameError']) ? $newtrains['TrainNameError'] : 'Enter train name'; ?>" value="<?php echo isset($trains) ? $trains[0]['train_name'] : ''; ?>" required>
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
                    <input type='number' min='0' value="<?php echo $trains[0]['route_id'] ?>" name='route_id' id='routeid' class='form__input' readonly>
                </div>
                <fieldset class="dash-content__input dash-content__input--border space">
                    <legend class="dash-content__label">Train Travel Days</legend>
                    <div class="add-train__travel-days" required>
                        <?php
$week = ['monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday'];
foreach ($week as $day) {
    echo renderDay($day, $trains);
}
?>
                    </div>
                </fieldset>
                <div class="flex-st-center margin-b-s">
                    <label for="trainactive" class="dash-content__label margin-r-xs">Active Status</label>
                    <input type="checkbox" name="train_active_status" id="trainactive" value="1" <?php if (isset($trains)) {if ($trains[0]['train_active_status'] == 1) {echo "checked='checked'";}}?>checked>
                </div>
                <div class="flex-st-center margin-b-s">
                    <label for="freightsallowed" class="dash-content__label">Freights Allowed (Kg)</label>
                    <input type="hidden" name="train_freights_allowed" value="0">
                    <input type="checkbox" name="train_freights_allowed" id="freightsallowed" value="1" <?php if (isset($trains)) {if ($trains[0]['train_freights_allowed'] == 1) {echo "checked='checked'";}}?> onclick="terms_changed(this)">
                    <input type="number" min="0" name="train_total_weight" id="freights-quantity" class="form__input form__number freights-quantity__number-input" value="<?php echo isset($trains) ? $trains[0]['train_total_weight'] : '0'; ?>"disabled>
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
                            <input type="number" min="0" max="50" name="train_fc_seats" id="firstclass" class="form__input form__number"  value="<?php echo isset($trains) ? $trains[0]['train_fc_seats'] : '0'; ?>" >
                        </div>
                        <div class="margin-b-s">
                            <label for="secondclas">Second Class</label>
                            <input type="number" min="0" max="60" name="train_sc_seats" id="secondclass" class="form__input form__number" placeholder="0" required value="<?php echo isset($trains) ? $trains[0]['train_sc_seats'] : ''; ?>" >
                        </div>
                        <div class="margin-b-s">
                            <label for="sleepingberths">Sleeping Berths</label>
                            <input type="number" min="0" max="20" name="train_sleeping_berths" id="sleepingberths" class="form__input form__number" value="<?php echo isset($trains) ? $trains[0]['train_sleeping_berths'] : '0'; ?>">
                        </div>
                        <div class="margin-b-s">
                            <label for="observation-saloon">Observation Saloon</label>
                            <input type="hidden" name="train_observation_seats" value="0">
                            <input type="checkbox" name="train_observation_seats" id="observation-saloon" class="form__number" value="1" <?php if (isset($trains)) {if ($trains[0]['train_observation_seats'] == 1) {echo "checked='checked'";}}?>>
                        </div>
                    </div>
                </fieldset>
                <button class="btn btn-round-blue margin-b-l margin-t-s" type="submit">Update</button>
            </form>
        </div>
    </div>
</div>

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

<?php

function renderDay($day, $trains)
{
    $dayName = ucfirst(substr($day, 0, 3));
    $isChecked = false;
    $dayArr = explode(" ", $trains[0]['train_travel_days']);

    if (isset($trains)) {
        foreach ($dayArr as $item) {
            if ($item === $day) {
                $isChecked = true;
            }
        }
    }

    $markup = "<div>";

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