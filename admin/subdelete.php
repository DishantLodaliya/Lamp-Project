<?php
session_start();
include("../database.php");
$id=$_GET['sub_id'];
$sql=mysqli_query($con,"delete from subject where subjectid='$id'");
header('location:subjects.php');
?>