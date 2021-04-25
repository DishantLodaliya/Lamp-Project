<?php
session_start();
?>
<html>
<head>
	<title>User Login</title>
	<link href="design.css" rel="stylesheet" type="text/css">
</head>

<body topmargin="150px" style="background-size: cover; background-image: url(demo.png); background-repeat : no-repeat;">
<?php

include("database.php");
extract($_POST);

if (isset($submit)) {
	$rs = mysqli_query($con, "select * from user where loginid='$loginid' and password='$pass'");
	if (mysqli_num_rows($rs) < 1) {
		$found = "N";
	} else {
		$_SESSION['login'] = $loginid;
	}
}

if (isset($_SESSION['login'])) {
	header("Location: userpage.php");
}
?>
	<table class='tdlist' border=3 align="center">
		<form method="post" action="">
			<br>
			<tr>
				<th>LOGIN ID</th>
				<th>
					<input type="TEXT"  placeholder="LOGIN ID" id="loginid2" name="loginid" /></tD>
				</th>
			<tr>
				<th>PASSWORD</th>
				<th><input placeholder="Password" type="password" name="pass" id="pass2" /></th>
			</tr>
			<?php
			if (isset($found)) {
				echo "<h3 class='tdlist' align='center'>Invalid Username or Password";
			}
			?>
			</span></td>
			<tr>
			<td colspan=2 align="center">
				<input 	type="submit" name="submit" id="submit" Value="Login" />
			</td>
		</tr>
			<tr>
			<td colspan=2 align="center">
<a href="signup.php">New user ? click here</a>
			</td></tr>

	</table>
	</form>
	</td>
	</tr>
	</table>
</body>
</html>