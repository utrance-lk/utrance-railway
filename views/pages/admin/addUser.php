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
<script type="text/javascript" src="../../../utrance-railway/public/js/components/flashMessages.js"></script>





<?php include_once '../views/components/backButton.php';?>
<div class="dashboard">
    <?php include_once '../views/layouts/adminSideNav.php';?>
    <div class="dash-content__container">
        <div class="dash-content">
            <div class="heading-secondary margin-b-m margin-t-m">
              <p class="center-text">New User Account Settings</p>
            </div>
            <form action="/utrance-railway/users/add" class="dash-content__form" method="POST">
            <?php
$dom = new DOMDocument;
libxml_use_internal_errors(true);
$dom->loadHTML('...');
libxml_clear_errors();
?>
              <div class="dash-content__input">
                <label for='firstname' class='dash-content__label'>First Name </label>
                <input type='text' name='first_name' class='form__input' value="<?php echo (!empty($first_name) && empty($firstNameError)) ? $first_name : ''; ?>" placeholder="<?php echo (empty($first_name) && !empty($firstNameError)) ? $firstNameError : ''; ?>" required />
              </div>

              <div class="dash-content__input">
                <label for='lastname' class='dash-content__label'>Last Name </label>
                <input type='text' name='last_name' class='form__input' value="<?php echo (!empty($last_name) && empty($lastNameError)) ? $last_name : ''; ?>" placeholder="<?php echo (empty($last_name) && !empty($lastNameError)) ? $lastNameError : ''; ?>" required />
              </div>

              <div class="dash-content__input">
                <label for='email' class='dash-content__label'>Email</label>
                <input type='text' name='email_id' class='form__input' value="<?php echo (!empty($email_id) && empty($email_id_error)) ? $email_id : ''; ?>" placeholder="<?php echo (empty($email_id) && !empty($email_id_error)) ? $email_id_error : ''; ?>" required />
              </div>

              <div class="dash-content__input">
                <label for='street_line1' class='dash-content__label'>Street Line 1</label>
                <input type='text' name='street_line1' class='form__input' value="<?php echo (!empty($street_line1) && empty($streetLine1Error)) ? $street_line1 : ''; ?>" placeholder="<?php echo (empty($street_line1) && !empty($streetLine1Error)) ? $streetLine1Error : ''; ?>" required />
              </div>

              <div class="dash-content__input">
                <label for='street_line2' class='dash-content__label'>Street Line 2</label>
                <input type='text' name='street_line2' class='form__input' value="<?php echo (!empty($street_line2) && empty($streetLine2Error)) ? $street_line2 : ''; ?>" placeholder="<?php echo (empty($street_line2) && !empty($streetLine2Error)) ? $streetLine2Error : ''; ?>" required />
              </div>

              <div class="dash-content__input">
                <label for='city' class='dash-content__label'>City</label>
                <?php
                    $cityArray = array("Ampara", "Anuradhapura", "Badulla", "Batticaloa", "Colombo", "Galle", "Gampaha", "Hambantota", "Jaffna", "Kalutara", "Kandy", "Kegalle", "Kilinochchi", "Kurunagala", "Mannar", "Matale", "Matara", "Monaragala", "Mullaitivu", "Nuwara Eliye", "Polonnaruwa", "Puttalam", "Ratnapura", "Trincomalee", "Vavuniya");
                ?>
                <select name='city' id='city' class='form__input'>
                
                  <?php foreach ($cityArray as $city1): ?>
                     <option  value='<?php echo $city1; ?>'><?php echo $city1; ?></option>
                  <?php endforeach;?>
                </select>
              </div>

              <div class="dash-content__input">
                <label for='contact_num' class='dash-content__label'>Contact Number</label>
                <input type='text' name='contact_num' class='form__input' value="<?php echo (!empty($contact_num) && empty($contactNumError)) ? $contact_num : ''; ?>" placeholder="<?php echo (empty($contact_num) && !empty($contactNumError)) ? $contactNumError : ''; ?>" required />
              </div>

              <div class="dash-content__input">
                <label for='role' class='dash-content__label'>Role</label>
                <select name='user_role' id='role' class='form__input'>
                  <option value='admin'>Admin</option>
                  <option value='detailsProvider'>Details Provider</option>
                </select>
              </div>

              <div class='seperator'></div>

              <div class="dash-content__input">
                <label for='user_password' class='dash-content__label'>Create Password</label>
                <input type='password' name='user_password' class='form__input' placeholder="<?php echo (empty($user_password) && !empty($passwordError)) ? $passwordError : ''; ?>" required />
              </div>

              <div class="dash-content__input">
                <label for='user_confirm_password' class='dash-content__label'>Confirm Password</label>
                <input type='password' name='user_confirm_password' class='form__input' required />
              </div>

              <button class="btn btn-round-blue margin-b-l margin-t-s" type="submit">Add User</button>

            </form>
        </div>
      </div>
</div>
