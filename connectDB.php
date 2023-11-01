<?php
//    $connect = mysqli_connect("localhost","root","","qlydouong","4306");
//    mysqli_query($connect,"SET NAMES 'utf-8'");
$hostname = "localhost";
$username = "root";
$password = "";
$database = "qlydouong";
$port = "4306";

$conn = mysqli_connect($hostname, $username, $password, $database,$port);
mysqli_set_charset($conn,"utf8");
?>