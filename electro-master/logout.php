<?php 
session_start();
require "./config/database.php";
require "./models/db.php";
require "./models/user.php";

$user = new User();
$user->dangXuat();