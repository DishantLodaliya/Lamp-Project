<?php
session_start();
error_reporting(1);
include("database.php");
extract($_POST);
extract($_GET);
extract($_SESSION);

if (isset($subid) && isset($testid)) {
	$_SESSION['sid'] = $subid;
	$_SESSION['tid'] = $testid;
	header("location:quiz.php");
}
if (!isset($_SESSION['sid']) || !isset($_SESSION['tid'])) {
	header("location: index.php");
}
?>
<html>

<head>
	<title>Exam</title>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
	<link href="design.css" rel="stylesheet" type="text/css">

</head>
</head>

<body topmargin="120px" style="background-size: cover; background-image: url(demo.png); background-repeat : no-repeat;">
	<?php
	include("usermenu.php");


	$query = "select * from question";
	$RRR = -1;
	$rs = mysqli_query($con, "select * from question where topicid=$tid", $cn) or die(mysqli_error());

	if (!isset($_SESSION['qn'])) {
		$_SESSION['qn'] = 0;
		$_SESSION['trueans'] = 0;
	} else {


		if ($submit == 'Next Question' && isset($ans)) {
			mysqli_data_seek($rs, $_SESSION['qn']);
			$row = mysqli_fetch_row($rs);
			if ($ans == $row[7]) {
				$_SESSION['trueans'] = $_SESSION['trueans'] + 1;
			}
			$_SESSION['qn'] = $_SESSION['qn'] + 1;
		} else if ($submit == 'Get Result' && isset($ans)) {
			$RRR = 10;
			mysqli_data_seek($rs, $_SESSION['qn']);
			$row = mysqli_fetch_row($rs);
			if ($ans == $row[7]) {
				$_SESSION['trueans'] = $_SESSION['trueans'] + 1;
			}
			$_SESSION['qn'] = $_SESSION['qn'] + 1;

	?>
			<table style="margin-left: 400px;" class="tdlist" border="3" width="500px">
				<caption>
					<h2>Result Of Your Test</h2>
				</caption>
				<tr>
					<td>
						<h3>Subject Name
					</td>
					<td>
						<h3><?php 
						echo $_SESSION['subjectname'] ?>
					</td>
				</tr>
				<tr>
					<td>
						<h3>Topic Name
					</td>
					<td>
						<h3><?php
						$xx = $_SESSION['tid'];
						$rs = mysqli_query($con, "select * from topic where topicid=$xx");
						$row1 = mysqli_fetch_array($rs);
						$topicname = $row1[2];
						echo  $topicname?>
					</td>
				</tr>
				<tr>
					<td>
						<h3>Result Time
					</td>
					<td>
						<h3><?php 
						date_default_timezone_set("Asia/Kolkata"); 
						$datetime = date("j F Y h:i:s A");
						echo $datetime ?>
					</td>
				</tr>
				<tr>
					<td>
						<h3>Result
					</td>
					<td>
						<h3>
							<?php
							$rr = $_SESSION['trueans'] / $_SESSION['qn'];
							$rr = $rr  * 100;
							$rr = round($rr, 2);
							echo $rr . " %";
							?>
					</td>
				</tr>
			</table>

			<table style="margin-left: 400px;" class="tdlist" width="500px" border="3">
				<tr>
					<th>
						<h3>Correct
					</th>
					<th>
						<h3>Incorrect
					</th>
					<th>
						<h3>Total
					</th>
				</tr>
				<tr>
					<th>
						<h3><?php echo $_SESSION['trueans'] ?>
					</th>
					<th>
						<h3>
							<?php
							$false = $_SESSION['qn'] - $_SESSION['trueans'];
							echo $false;
							?>
					</th>
					<th>
						<h3><?php echo $_SESSION['qn'] ?>
					</th>
				</tr>
				<tr>
					<td colspan=3 class=tdlist style="background-color: red; color : white;" align="center">You will be Redirected to Home in 5 Seconds</td>
				</tr>

			</table>
	<?php
		$loginid = $_SESSION['login'];
		$subjectname = $_SESSION['subjectname'];
		$rs = mysqli_query($con, "insert into result values('$loginid','$topicname','$subjectname','$datetime','$rr')");
			unset($_SESSION['qn']);
			unset($_SESSION['sid']);
			unset($_SESSION['tid']);
			unset($_SESSION['trueans']);
			header("refresh:5; url=userpage.php");
		}
	}

	if ($RRR < 0) {
		$rs = mysqli_query($con, "select * from question where topicid=$tid", $cn) or die(mysqli_error());
		if ($_SESSION['qn'] > mysqli_num_rows($rs) - 1) {
			unset($_SESSION['qn']);
			echo "<h1 class=head1>Some Error  Occured</h1>";
			session_destroy();
			echo "Please <a href=index.php> Start Again</a>";

			exit;
		}
		mysqli_data_seek($rs, $_SESSION['qn']);
		$row = mysqli_fetch_row($rs);
		echo "<form name=myfm method=post action=quiz.php>";
		echo "<table border=0 width=700px>";
		$n = $_SESSION['qn'] + 1;
		echo "<tr><td colspan=2 class=tdlist>Que " .  $n . ": $row[2]</br>";

		echo "<tr><td class=tdlist><input type=radio name=ans value=1>$row[3]";
		echo "<td class=tdlist> <input type=radio name=ans value=2>$row[4]";
		echo "<tr><td class=tdlist><input type=radio name=ans value=3>$row[5]";
		echo "<td class=tdlist><input type=radio name=ans value=4>$row[6]";

		if ($_SESSION['qn'] < mysqli_num_rows($rs) - 1)
			echo "<tr><td colspan=2 class=tdlist align='center'><input type=submit name=submit value='Next Question'></form>";
		else
			echo "<tr><td colspan=2 class=tdlist align='center'><input type=submit name=submit value='Get Result'></form>";
		echo "</table></table>";
	}
	?>
</body>

</html>