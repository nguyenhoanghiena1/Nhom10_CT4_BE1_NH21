<?php
session_start();
require "./config/database.php";
require "./models/db.php";
require "./models/products.php";
require "./models/manufactures.php";
require "./models/protypes.php";
require "./models/user.php";

?>
<!--Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html lang="en">

<head>
	<title>Clean Login Form a Flat Responsive Widget Template :: w3layouts</title>
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="Clean Login Form Responsive, Login Form Web Template, Flat Pricing Tables, Flat Drop-Downs, Sign-Up Web Templates, Flat Web Templates, Login Sign-up Responsive Web Template, Smartphone Compatible Web Template, Free Web Designs for Nokia, Samsung, LG, Sony Ericsson, Motorola Web Design" />

	<!-- css files -->
	<link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" media="all">
	<link href="css/stylelogin.css" rel="stylesheet" type="text/css" media="all" />
	<!-- /css files -->

	<!-- online fonts -->
	<link href="//fonts.googleapis.com/css?family=Sirin+Stencil" rel="stylesheet">
	<!-- online fonts -->

<body>
	<div class="container demo-1">
		<div class="content">
			<div id="large-header" class="large-header">
				<h1>Clean Login Form</h1>
				<div class="main-agileits">
					<!--form-stars-here-->
					<div class="form-w3-agile">
						<h2>login Now</h2>
						<form action="#" method="post">
							<div class="form-sub-w3">
								<input type="text" name="email" placeholder="Email" required="" />
								<div class="icon-w3">
									<i class="fa fa-user" aria-hidden="true"></i>
								</div>
							</div>
							<div class="form-sub-w3">
								<input type="password" name="password" placeholder="Password" required="" />
								<div class="icon-w3">
									<i class="fa fa-unlock-alt" aria-hidden="true"></i>
								</div>
							</div>
							<p class="p-bottom-w3ls">Forgot Password?<a class href="#"> Click here</a></p>
							<p class="p-bottom-w3ls1">New User?<a class href="register.php"> Register here</a></p>
							<div class="clear"></div>
							<div class="submit-w3l">
								<input type="submit" value="Login">
							</div>
						</form>
						<?php
						if (isset($_POST['email']))
						 {
							$user = new User();
							$user->dangNhap($_POST['password'],$_POST['email']);
						}
						?>
						<div class="social w3layouts">
							<div class="heading">
								<h5>Or Login with</h5>
								<div class="clear"></div>
							</div>
							<div class="icons">
								<a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
								<a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
								<a href="#"><i class="fa fa-pinterest-p" aria-hidden="true"></i></a>
								<a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
								<div class="clear"></div>
							</div>
							<div class="clear"></div>
						</div>
					</div>
					<!--//form-ends-here-->
				</div><!-- copyright -->
				<div class="copyright w3-agile">
					<p> © 2017 Clean Login Form . All rights reserved | Design by <a href="http://w3layouts.com/" target="_blank">W3layouts</a></p>
				</div>
				<!-- //copyright -->
			</div>
		</div>
	</div>

</body>

</html>