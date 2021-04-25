<?php
session_start();
?>
<html>

<head>
	<title>Results</title>
	<link href="../design.css" rel="stylesheet" type="text/css">
</head>

<body topmargin="120px" style="background-size: cover; background-image: url(../demo.png); background-repeat : no-repeat;">
	<?php
	include("adminmenu.php");
	include("../database.php"); {

		$sql = mysqli_query($con, "Select * From result");
		echo "<table class='tdlist' border=2 width=700>";
		echo "<tr>
		
				<th class='text-primary'>LoginID</th>
				<th class='text-primary'>Subject Name</th>
	<th class='text-primary'>Topic Name</th>
	<th class='text-primary'>Result</th>
	<th class='text-primary'>Date Time</th></tR>";

		while ($result = mysqli_fetch_assoc($sql)) {

			echo "<tr>";
			echo "<td>" . $result['loginid'] . "</td>";
			echo "<td>" . $result['subjectname'] . "</td>";
			echo "<td>" . $result['topicname'] . "</td>";
			echo "<td>" . $result['result'] . " %</td>";
			echo "<td>" . $result['date'] . "</td>";
			echo "</tr>";
			echo "</div>";
		}
		echo "</table>";
	}

	?>