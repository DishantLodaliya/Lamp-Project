<html>
<head>
<title>User Signup</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="design.css" rel="stylesheet" type="text/css">
</head>

<body topmargin="120px" style="background-size: cover; background-image: url(demo.png); background-repeat : no-repeat;">
<?php
extract($_POST);
include("database.php");
$rs=mysqli_query($con,"select * from user where loginid='$lid'");
echo "<div class='tdlist'>";
if (mysqli_num_rows($rs)>0)
{
	echo "<div class=head1 align='center'>Login Id Already Exists</div>";
	exit;
}
$query="insert into user(`loginid`,`password`,`name`) values('$lid','$pass','$name')";
$rs=mysqli_query($con,$query)or die("Could Not Perform the Query");
echo "<div class=tdlist align=center>Your Login ID  $lid Created Sucessfully</div>";
echo "<br><div class=tdlist align=center>Please Login using your Login ID to take Quiz</div>";
echo "<br><div class=tdlist align=center><a href=index.php>Click Here to Login</a></div>";


?>
</body>
</html>

