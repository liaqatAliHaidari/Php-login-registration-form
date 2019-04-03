<?php
include 'header.php';
?>

<div class="limiter">
	<div class="container-login100">
		<!-- <div class="login100-more" style="background-image:url(images/2.jpg);"></div> -->
		<div class="login100-more" style="background-image: url('images/2.jpg');"></div>
		<div class="wrap-login100 p-l-50 p-r-50 p-t-72 p-b-50">
			<form class="login100-form validate-form" action="include/login.inc.php" method="POST">
				<span class="login100-form-title p-b-59">
					Sign In
				</span>
				<div class="wrap-input100 validate-input" data-validate="Username is required">
					<span class="label-input100">Username/Email</span>
					<input class="input100" type="text" name="mailuid" placeholder="Username/ Email">
					<span class="focus-input100"></span>
				</div>
				<div class="wrap-input100 validate-input" data-validate="Password is required">
					<span class="label-input100">Password</span>
					<input class="input100" type="password" name="pwd" placeholder="*************">
					<span class="focus-input100"></span>
				</div>
				<div class="flex-m w-full p-b-33">
					<div class="contact100-form-checkbox">
						<input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me" disabled>
						<label class="label-checkbox100" for="ckb1" aria-disabled="">
							<span class="txt1">
								I agree to the
								<a href="#" class="txt2 hov1">
									Terms of User
								</a>
							</span>
						</label>
					</div>
				</div>
				<div class="container-login100-form-btn">
					<div class="wrap-login100-form-btn">
						<div class="login100-form-bgbtn"></div>
						<button class="login100-form-btn" name="login-submit">
							Sign in
						</button>
					</div>
					<a href="signup.php" class="dis-block txt3 hov1 p-r-30 p-t-10 p-b-10 p-l-30">
						Sign Up
						<i class="fa fa-long-arrow-right m-l-5"></i>
					</a>
				</div>
			</form>
		</div>
	</div>
</div>