<?php
session_start();
error_reporting(1);
?>
<html>

<head>
	<title>Adminstrative Area</title>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
	<link href="../design.css" rel="stylesheet" type="text/css">

</head>

<body topmargin="120px" style="background-size: cover; background-image: url(../demo.png); background-repeat : no-repeat;">
	<?php
	include("adminmenu.php");
	include("../database.php");
	extract($_POST);
	if (isset($submit)) {
		$rs = mysqli_query($con, "select * from administrator where loginid='$loginid' and password='$pass'", $cn) or die(mysqli_error());
		if (mysqli_num_rows($rs) < 1) {
			echo "<BR><BR><BR><BR><div class=head1> Invalid User Name or Password<br>
		<a href='index.php'>Click here to login again </a>
		<div>";
			echo "<script>window.location='index.php'</script>";
		} else {
			echo "<script>window.location='login.php'</script>";
			$_SESSION['alogin'] = "true";
		}
	} else if (!isset($_SESSION['alogin'])) {
		echo "<BR><BR><BR><BR><div class=head1> Your are not logged in<br> Please <a href=index.php>Login</a><div>";
		exit;
	}
	echo "<h1 style='margin-left: 400px;' >Welcome to Admistrative Area</h1>";
	?>

</body>

</html>