<?php
session_start();
if (isset($_SESSION["user"]) && isset($_SESSION["pass"])) {
	header("loaction: index.php");
}

require "./config/database.php";
require "./models/db.php";
require "./models/user.php";

$user = new User();

if (!isset($_SESSION['login'])) {
	if (isset($_POST['r_submit']) && isset($_POST['r_checkbox'])) {
		$bool = false;
		if ($_POST['r_password'] == $_POST['r_confirm']) {
			$bool = true;
		}
		if ($bool == true && $_POST['r_checkbox'] == 'on') {
			$user->dangKy($_POST['r_username'], $_POST['r_password'], $_POST['r_mail']);
		}
	} else if (isset($_POST['submit'])) {
		$user->dangNhap($_POST['password'], $_POST['username']);
	}
} else {
	$user->kiemTra($_SESSION['password'], $_SESSION['email']);
}
?>

<!DOCTYPE html>
<html>

<!-- Head -->

<head>

	<title>Existing Login Form a Flat Responsive Widget Template :: W3layouts</title>

	<!-- Meta-Tags -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="keywords" content="Existing Login Form Widget Responsive, Login Form Web Template, Flat Pricing Tables, Flat Drop-Downs, Sign-Up Web Templates, Flat Web Templates, Login Sign-up Responsive Web Template, Smartphone Compatible Web Template, Free Web Designs for Nokia, Samsung, LG, Sony Ericsson, Motorola Web Design">
	<script type="application/x-javascript">
		addEventListener("load", function() {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
	<!-- //Meta-Tags -->

	<link href="user/css/popuo-box.css" rel="stylesheet" type="text/css" media="all" />

	<!-- Style -->
	<link rel="stylesheet" href="user/css/style.css" type="text/css" media="all">

	<!-- Fonts -->
	<link href="//fonts.googleapis.com/css?family=Quicksand:300,400,500,700" rel="stylesheet">
	<!-- //Fonts -->

</head>
<!-- //Head -->

<!-- script -->

<script>
	function validateForm() {
		var x = document.forms["dangky"]["r_password"].value;
		var y = document.forms["dangky"]["r_confirm"].value;
		if (x != y) {
			document.getElementsByClassName('alert')[0].innerHTML = "mat khau chua giong nhau";
			return false;
		}
	}
</script>

<!-- end script -->

<!-- Body -->

<body>

	<h1>EXISTING LOGIN FORM</h1>

	<div class="w3layoutscontaineragileits">
		<h2>Login here</h2>
		<form action="" method="post">
			<input type="email" Name="username" placeholder="EMAIL" required="">
			<input type="password" Name="password" placeholder="PASSWORD" required="">
			<ul class="agileinfotickwthree">
				<li>
					<input type="checkbox" name="checkbox" id="brand1" value="">
					<label for="brand1"><span></span>Remember me</label>
					<a href="#">Forgot password?</a>
				</li>
			</ul>
			<div class="aitssendbuttonw3ls">
				<input type="submit" name="submit" value="LOGIN">
				<p> To register new account <span>→</span> <a class="w3_play_icon1" href="#small-dialog1"> Click Here</a></p>
				<div class="clear"></div>
			</div>
		</form>
	</div>

	<!-- for register popup -->
	<div id="small-dialog1" class="mfp-hide">
		<div class="contact-form1">
			<div class="contact-w3-agileits">
				<h3>Register Form</h3>
				<form name="dangky" onsubmit="return validateForm()" action="" method="post">
					<div class="form-sub-w3ls">
						<input placeholder="User Name" name="r_username" type="text" required="">
						<div class="icon-agile">
							<i class="fa fa-user" aria-hidden="true"></i>
						</div>
					</div>
					<div class="form-sub-w3ls">
						<input placeholder="Email" name="r_mail" class="mail" type="email" required="">
						<div class="icon-agile">
							<i class="fa fa-envelope-o" aria-hidden="true"></i>
						</div>
					</div>
					<div class="form-sub-w3ls">
						<input placeholder="Password" name="r_password" type="password" required="">
						<div class="icon-agile">
							<i class="fa fa-unlock-alt" aria-hidden="true"></i>
						</div>
					</div>
					<div class="form-sub-w3ls">
						<div class="alert"></div>
					</div>
					<div class="form-sub-w3ls">
						<input placeholder="Confirm Password" name="r_confirm" type="password" required="">
						<div class="icon-agile">
							<i class="fa fa-unlock-alt" aria-hidden="true"></i>
						</div>
					</div>
					<div class="login-check">
						<label class="checkbox"><input type="checkbox" name="r_checkbox" checked="">I Accept Terms & Conditions</label>
					</div>

					<div class="submit-w3l">
						<input type="submit" name="r_submit" value="Register">
					</div>
				</form>
			</div>
		</div>
	</div>
	<!-- //for register popup -->

	<div class="w3footeragile">
		<p> &copy; 2017 Existing Login Form. All Rights Reserved | Design by <a href="http://w3layouts.com" target="_blank">W3layouts</a></p>
	</div>


	<script type="text/javascript" src="user/js/jquery-2.1.4.min.js"></script>

	<!-- pop-up-box-js-file -->
	<script src="user/js/jquery.magnific-popup.js" type="text/javascript"></script>
	<!--//pop-up-box-js-file -->
	<script>
		$(document).ready(function() {
			$('.w3_play_icon,.w3_play_icon1,.w3_play_icon2').magnificPopup({
				type: 'inline',
				fixedContentPos: false,
				fixedBgPos: true,
				overflowY: 'auto',
				closeBtnInside: true,
				preloader: false,
				midClick: true,
				removalDelay: 300,
				mainClass: 'my-mfp-zoom-in'
			});

		});
	</script>

</body>
<!-- //Body -->

</html>