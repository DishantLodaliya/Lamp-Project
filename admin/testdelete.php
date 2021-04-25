<?php
session_start();
include("../database.php");
$id=$_GET['topicid'];
$sql=mysqli_query($con,"delete from topic where topicid='$id'");
header('location:tests.php');
?>