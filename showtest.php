<?php
session_start();
?>
<html>

<head>
	<title>Topic Selection</title>
	<link href="design.css" rel="stylesheet" type="text/css">
</head>

<body topmargin="120px" style="background-size: cover; background-image: url(demo.png); background-repeat : no-repeat;">
	<?php
	include("usermenu.php");
	include("database.php");
	extract($_GET);
	$rs1 = mysqli_query($con, "select * from subject where subjectid=$subid");
	$row1 = mysqli_fetch_array($rs1);
	$_SESSION['subjectname'] = $row1[1];
	$rs = mysqli_query($con, "select * from topic where subjectid=$subid");
	if (mysqli_num_rows($rs) < 1) {
		echo "<br><br><h2 style='margin-left: 500px;' class=head1> No Questions for this Subject </h2>";
		exit;
	}
	echo "<h1 style='margin-left: 550px; color : white;' > Select Topic</h1>";
	echo "<table style='margin-left: 500px;' class='card'>";

	while ($row = mysqli_fetch_row($rs)) {
		echo "<tr><td class='tdlist' align=center ><a href=quiz.php?testid=$row[0]&subid=$subid><font size=4>$row[2]</font></a>";
	}
	echo "</table>";
	?>
</body>
</html>