<body>
    <form action="/utrance-railway/resetPassword?email_id=<?php echo $user['email_id'];?>" method="POST" class="form__container">

        <div class="password__container">
            <label for="user_password">Enter new password</label>
            <input type="password" name="user_password" id="user_password">
        </div>
        <div class="password__container">
            <label for="user_confirm_password">Confirm password</label>
            <input type="password" name="user_confirm_password" id="user_confirm_password">
        </div>
        <input type="submit" value="Update Password" class="btn__submit">

    </form>

</body>