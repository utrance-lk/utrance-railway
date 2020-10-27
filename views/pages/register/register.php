

<body>
<div class="auth-content">
    <form  method="post" name="register" >
        
        <h2 class="form-title" style="font-size:2.2rem">Sign Up</h2>
        
    <div class="div-sub">
        <label class="lbl-user"><i class="fa fa-user" aria-hidden="true" style="padding-right: 1.5rem;"></i>User Name</label>
        <input type="text" id="user-first-name" class="text-input" placeholder="First name" style="margin-bottom: 10px;" >
        <input type="text"  id="user-last-name"  class="text-input" placeholder="Last name">
    </div>

    <div class="div-sub">
        <label  class="lbl-user"><i class="fa fa-envelope" aria-hidden="true" style="padding-right: 1rem;"></i>Email</label>
        <input type="email" class="text-input" id="user-email">
    </div>
    <div  class="div-sub">
        <label  class="lbl-user"><i class="fa fa-map-marker" aria-hidden="true" style="padding-right: 1rem;"></i>Address</label>
        <input type="text"  id="user-street-line1" class="text-input" placeholder="Street First line"style="margin-bottom: 10px;">
        <input type="text"  id="user-street-line2" class="text-input" placeholder="Street Second line" style="margin-bottom: 10px;">
    
    </div>
    <div  class="div-sub">
        <label  class="lbl-user" style="display: block;"><i class="fas fa-city"></i>
            <i class="fa fa-home" aria-hidden="true" style="padding-right: 1rem;"></i>City</label>
     
        <select  id="city_values"  >
            <option class="cityvalues">Matara</option>
            <option class="cityvalues">Galle</option>
            <option class="cityvalues">Colombo</option>
        </select>
    </div>
    

    <div class="div-sub">
        <label  class="lbl-user" ><i class="fa fa-phone" aria-hidden="true" style="padding-right: 1rem;"></i>Contact number</label>
        <input type="text" id="user-contact-number" class="text-input" placeholder="Ex:071-1234567">
        </div>
        <div class="div-sub">
            <label  class="lbl-user" ><i class="fa fa-picture-o" aria-hidden="true" style="padding-right: 1rem;"></i>Choose profile photo</label>
            <input type="file"  id="user-profile-image">
            </div>

        <div class="div-sub">
            <label  class="lbl-user"><i class="fa fa-key" aria-hidden="true" style="padding-right: 1rem;"></i>Password</label>
            <input type="password"  id="user-password" class="text-input" >
            </div>


            <div class="div-sub">
                <label  class="lbl-user"><i class="fa fa-check-circle" aria-hidden="true" style="padding-right: 1rem;"></i>Confirm Password</label>
                <input type="password"  id="user-confirm-password" class="text-input" >
                </div>
                <div id="btn-register">
                    <button type="submit" id="register-button" class="btn btn-big">Register</button>
                </div>
                <div class="div-sub1" style="display: inline;">
                <input type="checkbox" id="check1" >
                <text id="sign-in">I agree with the Terms and Conditions and the privacy policy</p>
                </div>
    
    </form>
</div>

<script type="module" src="../../../utrance-railway/public/js/pages/register/main.js"></script>
</body>
</html>