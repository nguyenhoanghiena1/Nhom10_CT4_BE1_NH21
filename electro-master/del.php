<?php 
session_start();

var_dump(isset($_SESSION['cart']));
if (isset($_GET['product_id'])&&isset($_SESSION['cart'])) {
    unset($_SESSION['cart'][$_GET['product_id']]);
    header("location: cart.php");
}else{
    header("location: cart.php");
}

