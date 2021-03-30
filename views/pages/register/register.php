<div class="register__container">
		<div class="register__img-box register__container-item">  
        </div>
		<div class="register__form-box register__container-item">
			<form class="form__container" method="POST" action="/utrance-railway/register">
				<div class="new-account-box-container form__container-item">
					<div class="register-text">
						Sign up
					</div>
					<div class="new-account-box">
						<span class="new-account-box--1">Already have an account?</span>&nbsp;<a href="/utrance-railway/login" class="new-account-box--2">Login here</a>
					</div>
				</div>
				<div class="firstname-box form__container-item register__form--inputs">
					<label for="first_name">First name</label>
                    <input type="text" id="first_name" name="first_name" placeholder="<?php echo isset($firstNameError) ? $firstNameError : 'Nuwan'; ?>" value="<?php echo isset($first_name) ? $first_name : ''; ?>" class="<?php echo isset($firstNameError) ? 'error__placeholder' : ''; ?>" required>

				</div>

				<div class="lastname-box form__container-item register__form--inputs">
					<label for="last_name">Last name</label>
					<input type="text" id="last_name" name="last_name" placeholder="<?php echo isset($lastNameError) ? $lastNameError : 'Kumara'; ?>" value="<?php echo isset($last_name) ? $last_name : ''; ?>" class="<?php echo isset($firstNameError) ? 'error__placeholder' : ''; ?>" required>
				</div>
				<div class="email-box form__container-item register__form--inputs">
					<label for="email_id">Email</label>
					<input type="email" id="email_id" name="email_id" placeholder="<?php echo isset($email_id_error) ? $email_id_error : 'nuwan@example.com'; ?>"   value="<?php echo isset($email_id) ? $email_id : ''; ?>" class="<?php echo isset($firstNameError) ? 'error__placeholder' : ''; ?>" required>

				</div>
				<div class="streetline1-box form__container-item register__form--inputs">
					<label for="streetline1">Street line 1</label>
					<input type="text" id="streetline1" name="street_line1" placeholder="<?php echo isset($streetLine1Error) ? $streetLine1Error : '22/50, Agathuduwa Watta'; ?>" value="<?php echo isset($street_line1) ? $street_line1 : ''; ?>" class="<?php echo isset($firstNameError) ? 'error__placeholder' : ''; ?>" required>

				</div>
				<div class="streetline2-box form__container-item register__form--inputs">
					<label for="streetline2">Street line 2</label>
					<input type="text" id="streetline2" name="street_line2" placeholder="<?php echo isset($streetLine2Error) ? $streetLine2Error : 'Godagama West'; ?>"  value="<?php echo isset($street_line2) ? $street_line2 : ''; ?>" class="<?php echo isset($firstNameError) ? 'error__placeholder' : ''; ?>" required>

				</div>
				<div class="city-box form__container-item register__form--inputs">
                    <label for="city">City</label>
                    <select name="city" id="city">
                        <option value="Ampara">Ampara</option>
                        <option value="Anuradhapura">Anuradhapura</option>
                        <option value="Badulla">Badulla</option>
						<option value="Batticaloa">Batticaloa</option>
						<option value="Colombo">Colombo</option>
						<option value="Galle">Galle</option>
						<option value="Gampaha">Gampaha</option>
						<option value="Hambantota">Hambantota</option>
						<option value="Jaffna">Jaffna</option>
						<option value="Kalutara">Kalutara</option>
						<option value="Kandy">Kandy</option>
						<option value="Kilinochchi">Kilinochchi</option>
						<option value="Kurunegala">Kurunegala</option>
						<option value="Mannar">Mannar</option>
						<option value="Matale">Matale</option>
						<option value="Matara">Matara</option>
						<option value="Monaragala">Monaragala</option>
						<option value="Mullaitivu">Mullaitivu</option>
						<option value="Nuwara Eliya">Nuwara Eliya</option>
						<option value="Polonnaruwa">Polonnaruwa</option>
						<option value="Puttalam">Puttalam</option>
						<option value="Ratnapura">Ratnapura</option>
						<option value="Trincomalee">Trincomalee</option>
						<option value="Vavuniya">Vavuniya</option>

                    </select>
				</div>
                <div class="contactno-box form__container-item register__form--inputs">
                    <label for="contactno">Contact No</label>
                    <input type="text" id="contactno" name="contact_num" placeholder="<?php echo isset($contactNumError) ? $contactNumError : '07*1234567'; ?>" value="<?php echo isset($contact_num) ? $contact_num : ''; ?>" class="<?php echo isset($firstNameError) ? 'error__placeholder' : ''; ?>" required>

                </div>
                <div class="password-box form__container-item register__form--inputs">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="user_password" placeholder="<?php echo isset($passwordError) ? $passwordError : '***************'; ?>" class="<?php echo isset($passwordError) ? 'error__placeholder' : ''; ?>" required>

                </div>
                <div class="password-confirm-box form__container-item register__form--inputs">
                    <label for="password-confirm">Password Confirm</label>
                    <input type="password" id="password-confirm" name="user_confirm_password" placeholder="<?php echo isset($passwordError) ? $passwordError : '***************'; ?>" class="<?php echo isset($passwordError) ? 'error__placeholder' : ''; ?>" required>
                </div>
				<button type="submit" class="register-btn form__container-item">
						Register
				</button>
			</form>
		</div>
		</div>
	</div>
