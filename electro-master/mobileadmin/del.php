<?php
session_start();
require "../config/database.php";
require "../models/db.php";
require "../models/products.php";
require "../models/manufactures.php";
require "../models/protypes.php";
require "../models/user.php";

$user = new User;

$user->kiemTra($_SESSION['email']);
if(isset($_GET["k"]))
{
    if($_GET["k"]=="t"){
        if(isset($_GET["ID"]))
        {
            $ID = $_GET["ID"];
            $product = new Products;
    
            $product->deleteProduct($ID);
    
            header("location: index.php?page=1");
        }else{
            header("location: index.php?page=1");
        }
    }elseif($_GET["k"]=="m"){
        if(isset($_GET["ID"]))
        {
            $ID = $_GET["ID"];
            $Manu = new Manufactures;
    
            $Manu->deleteManu($ID);
    
            header("location: manufactures.php");
        }else{
            header("location: manufactures.php");
        }
    }elseif($_GET["k"]=='p'){
        if(isset($_GET["ID"]))
        {
            $ID = $_GET["ID"];
            $Protype = new Protypes;
    
            $Protype->deleteProtype($ID);
    
            header("location: protypes.php");
        }else{
            header("location: protypes.php");
        }
    }
}