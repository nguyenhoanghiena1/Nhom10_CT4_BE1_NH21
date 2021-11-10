<?php
session_start();
require "./config/database.php";
require "./models/db.php";
require "./models/products.php";
require "./models/manufactures.php";

$Manu = new Manufactures;
$product = new Products;

$getAllManu = $Manu->getAllManu();

if (isset($_GET['id'])) {
    $bool = true;

    $pro = $product->getProductsByID($_GET['id']);
    foreach ($_SESSION['cart']['hang'] as $key) {
        if ($key["ID"] == $_GET['id']) {
            $bool = false;
            break;
        }
    }
    $_SESSION['cart']['tien'] = $tongTien;
    $_SESSION['cart']['hang'][$_GET['id']] = $pro[0];
    if ($bool == true) {
        $_SESSION['cart']['soluong'] += 1;
    }
    $_SESSION['cart']['hang'][$_GET['id']]['sl'] = 1;

    header("location: cart.php");
}
if (isset($_GET['number']) && isset($_GET["ida"])) {
    $_SESSION['cart']['hang'][$_GET["ida"]]['sl'] = $_GET['number'];
    header("location: cart.php");
}

$tongTien = 0;
foreach ($_SESSION['cart']['hang'] as $key) {
    $tongTien += $key['price'] * $key['sl'];
}
$_SESSION['cart']['tien'] = $tongTien;

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Exe6</title>
    <link rel="stylesheet" href="public/css/style.css">
    <link rel="stylesheet" href="public/css/bootstrap.min.css">
    <script src="public/js/jquery-3.3.1.min.js"></script>
    <script src="public/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
</head>

<body>
    <!--header-->
    <header>
        <!--cart-->
        <div class="container">
            <div class="cart">
                <?php if (isset($_SESSION['login'])) { ?>
                    <a style="float: left;" href="logout.php">Dang Xuat</a>
                <?php } ?>
            </div>
        </div>
        <!--end cart-->
        <!--navbar-->
        <div class="container">
            <nav class="navbar navbar-expand-sm navbar-light bg-pink">
                <div class="logo"><img class="img-fluid" src="public/images/logo.png" alt=""></div>
                <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="collapsibleNavId">
                    <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                        <li class="nav-item active">
                            <a id="home" class="nav-link" href="index.php">HOME<span class="sr-only">(current)</span></a>
                        </li>
                        <?php foreach ($getAllManu as $key) { ?>
                            <li class="nav-item">
                                <a class="nav-link" href="menu.php?timkiem=<?php echo  $key['manu_name'] ?>&page=1"><?php echo $key['manu_name'] ?></a>
                            </li>
                        <?php } ?>
                    </ul>
                </div>
            </nav>
        </div>
        <!--end navbar-->
        <!--banner-->
        <div class="banner">
            <h1>Free Online Shopping</h1>
            <a href="#">SHOP NOW</a>
        </div>
        <!--end banner-->
    </header>
    <!--end header-->
    <!-- style -->
    <style>
        table,
        th,
        td {
            border: 1px solid black;
            text-align: center;
        }
    </style>
    <!-- style end -->
    <!--content-->
    <div class="content">
        <h1>New Collections</h1>
        <div class="container">
            <table style="width:100%">
                <tr>
                    <th>Id</th>
                    <th>Ten</th>
                    <th>Hinh anh</th>
                    <th>Gia tien</th>
                    <th>So luong</th>
                    <th>Hanh dong</th>
                </tr>
                <?php foreach ($_SESSION['cart']['hang'] as $key) { ?>
                    <tr>
                        <td><?php echo $key['ID']; ?></td>
                        <td><?php echo $key['name']; ?></td>
                        <td><img src="public/images/<?php echo $key['image']; ?>" style="width: 100px; height: 100px"></td>
                        <td><?php echo $key['price']; ?></td>
                        <td>
                            <form action="" method="get">
                                <input type="number" name="ida" style="display: none;" value="<?php echo $key['ID']; ?>">
                                <input min="1" max="10" type="number" value="<?php echo $key['sl']; ?>" name="number">
                                <button type="submit">OK</button>
                            </form>
                        </td>
                        <td>
                            <form action="del.php" method="post">
                                <input type="number" name="ida" style="display: none;" value="<?php echo $key['ID']; ?>">
                                <button type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                <?php } ?>
            </table>
        </div>
    </div>

    <!--end content-->
    <footer>
        <div class="container">
            <div class="f1">
                <img class="img-fluid" src="public/images/12.jpg" alt="">
                <form action="timkiem.php">
                    <input type="text" name="page" value="1" style="display: none;">
                    <input id="tim" name="timkiem" type="text" placeholder="Tim Kiem...">
                    <input id="join" type="submit" value="Tim">
                </form>
            </div>
        </div>

        <div class="f2">
            <p>&copy; 2016 FIT TDC</p>
        </div>
    </footer>
</body>

</html>
<?php  ?>