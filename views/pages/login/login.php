
<div class="login">
		<div class="login__img"></div>
		<div class="login__form">

		<?php
if (isset($_SESSION['operation'])) {
	

    if (App::$APP->session->get('operation') == 'fail') {

        $html = "<div class='alert hide'>";
        $html .= "<span class='fas fa-exclamation-circle'></span>";
        $html .= "<span class='msg'>Incorrect Username Or Password!!</span>";
        $html .= "<span class='close-btn'>";
        $html .= "<span class='fas fa-times'></span></span></div>";

        $dom = new DOMDocument();
        $dom->loadHTML($html);
        print_r($dom->saveHTML());

    } else if (App::$APP->session->get('operation') == 'success') {

        $html = "<div class='alert-Success hide-Success'>";
        $html .= "<span class='fas fa-check-circle'></span>";
        $html .= "<span class='msg-Success'>Sucess:Your Registration is successfull!!</span>";
        $html .= "<span class='close-btn-Success'>";
        $html .= "<span class='fas fa-times'></span></span></div>";

        $dom = new DOMDocument();
        $dom->loadHTML($html);
        print_r($dom->saveHTML());

    }else if(App::$APP->session->get('operation') == 'deactivated'){
		$html = "<div class='alert hide'>";
        $html .= "<span class='fas fa-exclamation-circle'></span>";
        $html .= "<span class='msg'>Your Account Has Been Deactivated!!</span>";
        $html .= "<span class='close-btn'>";
        $html .= "<span class='fas fa-times'></span></span></div>";

        $dom = new DOMDocument();
        $dom->loadHTML($html);
        print_r($dom->saveHTML());
	}
    App::$APP->session->remove('operation');
}

?>
<script type="text/javascript" src="../../../utrance-railway/public/js/components/flashMessages.js"></script>


			<form class="login__form-container" method="POST">
				<div class="login__big-box">
					<div class="login__text">
						Log in
					</div>
					<div>
						<span class="login__new-account--1">Don't have an account?</span>&nbsp;<a href="/register" class="login__new-account--2">Create account</a>
					</div>
				</div>
				<div class="login__credentials margin-b-xs">
					<label for="username">Username</label>
					<input type="email" id="username" name="email_id" placeholder="john@example.com" required>
				</div>
				<div class="login__credentials">
					<label for="password">Password</label>
					<input type="password" id="password" name="user_password" placeholder="*****************" required>
				</div>
				<div class="margin-t-xs">
					<a href="/forgotPassword" class="forgort-password-box">Forgot Password?</a>
				</div>
				<button type="submit" class="btn-login" formaction="#">
					Login
				</button>
			</form>
		</div>
		</div>
</div>
