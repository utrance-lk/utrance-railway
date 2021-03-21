<div class="dashboard">
  <?php include_once '../views/layouts/adminSideNav.php';?>
  <div class="dash-content__container">
    <div class="dash-content">
      <div class="heading-secondary margin-b-m margin-t-m">
        <p class="center-text">
          <?php
            if (isset($users)) {
                foreach ($users as $key => $value) {
                    if (isset($updateSetValue['first_name'])) {
                        echo "{$updateSetValue['first_name']} 's Account Settings";
                    } else {
                        echo "{$value['first_name']} 's Account Settings";
                    }
                }
            }
          ?>
        </p>
      </div>

      <form action="/users/update?id=<?php echo $users[0]['id']; ?>" class="dash-content__form" method="POST">
            <?php if (isset($users)): ?>
              <?php
                if (!isset($updateSetValue)) {
                    $updateSetValue = null;
                }
                foreach ($users as $key => $value) {
                    echo renderInput($updateSetValue, $value, 'First Name', 'firstname', 'first_name', 'firstNameError');
                    echo renderInput($updateSetValue, $value, 'Last Name', 'lastname', 'last_name', 'lastNameError');
                    echo renderInput($updateSetValue, $value, 'Email', 'email', 'email_id', 'email_id_error', 'email');
                    echo renderInput($updateSetValue, $value, 'Street Line 1', 'stl1', 'street_line1', 'streetLine1Error');
                    echo renderInput($updateSetValue, $value, 'Street Line 2', 'stl2', 'street_line2', 'streetLine2Error');
                    echo renderInput($updateSetValue, $value, 'City', 'city');
                    echo renderInput($updateSetValue, $value, 'Contact No', 'contactno', 'contact_num', 'contactNumError');
                }
              ?>
            <?php endif;?>
            <button class="btn btn-round-blue margin-b-l margin-t-s" type="submit">Save Settings</button>
      </form>
    </div>
  </div>
</div>

<?php

function renderInput($updateSetValue, $value, $labelName, $labelFor, $inputName = null, $error = null, $inputType = 'text')
{
    $markup = "
    <div class='dash-content__input'>
      <label for=$labelFor class='dash-content__label'>$labelName</label>
  ";

    if ($labelFor === 'city') {

        $cityArray = array("Ampara", "Anuradhapura", "Badulla", "Batticaloa", "Colombo", "Galle", "Gampaha", "Hambantota", "Jaffna", "Kalutara", "Kandy", "Kegalle", "Kilinochchi", "Kurunagala", "Mannar", "Matale", "Matara", "Monaragala", "Mullaitivu", "Nuwara Eliye", "Polonnaruwa", "Puttalam", "Ratnapura", "Trincomalee", "Vavuniya");

        $markup .= "<select name='city' class='form__input'>";
        $val = App::$APP->activeUser()['city'];
        $markup .= "<option  value='$val'>$val</option>";

        foreach ($cityArray as $cities) {
            $markup .= "<option value='$cities'>$cities</option>";
        }

        $markup .= "</select>";

    } else {

        if (isset($updateSetValue[$error])) {
            $markup .= "
          <input type=$inputType name=$inputName class='form__input error__placeholder' placeholder='" . $updateSetValue[$error] . "' >";
        } else if (isset($updateSetValue[$inputName])) {
            $markup .= "
          <input type='text' name=$inputName class='form__input' value='" . trim($updateSetValue[$inputName]) . "'>";

        } else {
            $markup .= "
        <input type='text' name=$inputName class='form__input' value='" . trim($value[$inputName]) . " '>";
        }
    }

    return $markup .= "</div>";
}