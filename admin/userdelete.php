<?php
session_start();
include("../database.php");
$id=$_GET['username'];
$sql=mysqli_query($con,"delete from user where userid='$id'");
header('location:users.php');
?>