<body>
	<div class="login__container">
		<div class="login__img-box login__container-item"></div>
		<div class="login__form-box login__container-item">
			<form class="form__container" method="POST">
				<div class="new-account-box-container form__container-item">
					<div class="login-text">
						Log in
					</div>
					<div class="new-account-box">
						<span class="new-account-box--1">Don't have an account?</span>&nbsp;<a href="/utrance-railway/register" class="new-account-box--2">Create account</a>
					</div>
				</div>
				<div class="username-box form__container-item">
					<label for="username">Username</label>
					<input type="email" id="username" name="email_id" placeholder="john@example.com" required>
				</div>
				<div class="password-box form__container-item">
					<label for="password">Password</label>
					<input type="password" id="password" name="user_password" placeholder="*****************" required>
				</div>
				<div class="forgot-password-box form__container-item">
					<a href="/utrance-railway/forgotPassword" class="forgort-password-box">Forgot Password?</a>
				</div>
				<button type="submit" class="login-btn form__container-item" formaction="#">
						Login
				</button>
			</form>
		</div>
		</div>
	</div>
</body>
