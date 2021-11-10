<?php 
session_start();

if (isset($_POST['ida'])) {
    $bool = true;
    $_SESSION['cart']['tien'] -= $_SESSION['cart']['hang'][$_POST['ida']]['price'];
    $_SESSION['cart']['soluong'] -= 1;
    unset($_SESSION['cart']['hang'][$_POST['ida']]);
    header("location: cart.php");
}else{
    header("location: cart.php");
}

