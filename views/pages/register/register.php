

<body>
<div class="auth-content">
    <form action="register.php" method="post">
        
        <h2 class="form-title">Sign Up</h2>
        
    <div>
        <label class="lbl-user"><i class="fa fa-user" aria-hidden="true" style="padding-right: 1rem;"></i>User Name</label>
        <input type="text" name="userfirstname" class="text-input" placeholder="First name" style="margin-bottom: 10px;float: left;" id="user-first-name">
        <input type="text" name="userlastname" class="text-input" placeholder="Last name">
    </div>

    <div>
        <label  class="lbl-user"><i class="fa fa-envelope" aria-hidden="true" style="padding-right: 1rem;"></i>Email</label>
        <input type="email" name="useremail" class="text-input">
    </div>
    <div>
        <label  class="lbl-user"><i class="fa fa-map-marker" aria-hidden="true" style="padding-right: 1rem;"></i>Address</label>
        <input type="text" name="userStreet_line1" class="text-input" placeholder="Street First line"style="margin-bottom: 10px;">
        <input type="text" name="userStreet_line2" class="text-input" placeholder="Street Second line" style="margin-bottom: 10px;">
    
    </div>
    <div>
        <label  class="lbl-user" style="display: block;"><i class="fas fa-city"></i>
            <i class="fa fa-home" aria-hidden="true" style="padding-right: 1rem;"></i>City</label>
     
        <select  id="city_values"  style="margin-bottom: 10px;">
            <option class="cityvalues">Matara</option>
            <option class="cityvalues">Galle</option>
            <option class="cityvalues">Colombo</option>
        </select>
    </div>
    

    <div>
        <label  class="lbl-user" ><i class="fa fa-phone" aria-hidden="true" style="padding-right: 1rem;"></i>Contact number</label>
        <input type="text" name="userStreet_line1" class="text-input" placeholder="Ex:071-1234567">
        </div>

        <div>
            <label  class="lbl-user"><i class="fa fa-key" aria-hidden="true" style="padding-right: 1rem;"></i>Password</label>
            <input type="password" name="userpassword" class="text-input" >
            </div>


            <div>
                <label  class="lbl-user"><i class="fa fa-check-circle" aria-hidden="true" style="padding-right: 1rem;"></i>Confirm Password</label>
                <input type="password" name="userConfirmpassword" class="text-input" >
                </div>
                <div>
                    <button type="submit" name="register-button" class="btn btn-big">Register</button>
                </div>
                
    
    </form>
</div>
</body>
</html>