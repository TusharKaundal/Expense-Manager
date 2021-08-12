<?php
$servername="localhost";
$username="root";
$database="budget";
$pass="";
$port=3306;
$con = mysqli_connect($servername,$username, $pass, $database,$port) or die($mysqli_error($con));
session_start();
?>
