<?php
//    $connect = mysqli_connect("localhost","root","","qlydouong","4306");
//    mysqli_query($connect,"SET NAMES 'utf-8'");
$hostname = "14.225.207.98";
$username = "root";
$password = "123123";
$database = "qlydouong";
$port = "3307";

$conn = mysqli_connect($hostname, $username, $password, $database,$port);
mysqli_set_charset($conn,"utf8");
?>