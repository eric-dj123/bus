<?php

$con=mysqli_connect('localhost','root','','royal_db')or die("connection failed".mysqli_connect_error());
//Roger Cfg
$con=mysqli_connect('localhost','root','','royal_db')or die("connection failed".mysqli_connect_error());

$localhost = "localhost";
$username = "root";
$password = "";
$dbname = "royal_db";
$store_url = "http://localhost:8080/saas/";

//Roger Cfg

//$localhost = "localhost:3310";
//$username = "root";
//$password = "rogerqwe123";
//$dbname = "immsoginal";
//$store_url = "http://localhost/imms/";
// db connection
$connect = new mysqli($localhost, $username, $password, $dbname);
// check connection
if($connect->connect_error) {
  die("Connection Failed : " . $connect->connect_error);
} else {
//echo "Successfully connected";
}





?>
