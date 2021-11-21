<?php
session_start();
require "./config/database.php";
require "./models/db.php";
require "./models/products.php";
require "./models/manufactures.php";
require "./models/protypes.php";
require "./models/user.php";

?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">
	<title>Cart | E-Shopper</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/font-awesome.min.css" rel="stylesheet">
	<link href="css/prettyPhoto.css" rel="stylesheet">
	<link href="css/price-range.css" rel="stylesheet">
	<link href="css/animate.css" rel="stylesheet">
	<link href="css/maincart.css" rel="stylesheet">
	<link href="css/responsive.css" rel="stylesheet">
	<!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
	<link rel="shortcut icon" href="images/ico/favicon.ico">
	<link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
	<link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
	<link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
	<link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
</head>
<!--/head-->

<body>


	<section id="cart_items">

		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
					<li><a href="index.php">Home</a></li>
					<li class="active">Shopping Cart</li>
				</ol>
			</div>
			<div class="table-responsive cart_info">
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">Item</td>
							<td class="description"></td>
							<td class="price">Price</td>
							<td class="quantity">Quantity</td>
							<td class="total">Total</td>
							<td></td>
						</tr>
					</thead>
					<tbody>
						<?php
						$cart = array();
						if (isset($_GET['product_id'])) {
							$product_id = $_GET['product_id'];

							if (isset($_SESSION['cart'][$product_id])) {
								$_SESSION['cart'][$product_id]++;
							} else {
								$_SESSION['cart'][$product_id] = 1;
							}
						}
						$cart = $_SESSION['cart'];

						$products = new Products();

						foreach ($cart as $key => $qty) {
							$getProductsByID = $products->getProductsByID($key);
							foreach ($getProductsByID as $value) {
								if ($value['ID'] == $key) {
									$total = $value['price'] * $qty;	
						?>
									<tr>
										<td class="cart_product">
											<a href=""><img src="./img/<?php echo $value['image'] ?>" style="width: 100px; height: 100px" alt=""></a>
										</td>
										<td class="cart_description">
											<h4><a href=""><?php echo $value['name'] ?></a></h4>
											<p>Web ID:<?php echo $key ?></p>
										</td>
										<td class="cart_price">
											<p><?php echo number_format($value['price'], 0, ',', '.') ?> vnd</p>
										</td>
										<td class="cart_quantity">
											<div class="cart_quantity_button">
												<a class="cart_quantity_up" href="#"> + </a>
												<input class="cart_quantity_input" type="text" name="quantity" value="<?php echo $qty ?>" autocomplete="off" size="2">
												<a class="cart_quantity_down" href="#"> - </a>
											</div>
										</td>
										<td class="cart_total">
											<p class="cart_total_price"><?php echo number_format($total, 0, ',', '.') ?> vnd</p>
										</td>
										<td class="cart_delete">
											<a class="cart_quantity_delete" href="del.php?product_id=<?php echo $key ?>"><i class="fa fa-times"></i></a>
										</td>
									</tr>
						<?php }
							}
						}


						?>
					</tbody>
				</table>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-6">
			</div>
			<div class="col-sm-6">
				<div class="total_area">

					<a class="btn btn-default update" href="deletecart">Deletecart</a>
					<a class="btn btn-default check_out" href="checkout.php">Check Out</a>
				</div>
			</div>

		</div>



		<script src="js/jquery.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/jquery.scrollUp.min.js"></script>
		<script src="js/jquery.prettyPhoto.js"></script>
		<script src="js/maincart.js"></script>

</body>

</html>