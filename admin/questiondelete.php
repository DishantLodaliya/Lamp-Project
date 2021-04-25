<?php
session_start();
include("../database.php");
$id=$_GET['questionid'];
$sql=mysqli_query($con,"delete from question where questionid='$id'");
header('location:questions.php');
?>