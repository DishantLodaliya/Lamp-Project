<?php
session_start();
?>
<html>

<head>
	<title>Subjects</title>
	<link href="../design.css" rel="stylesheet" type="text/css">

</head>

<body topmargin="120px" style="background-size: cover; background-image: url(../demo.png); background-repeat : no-repeat;">
	<?php
	include("adminmenu.php");
	include("../database.php"); {
		$sql = mysqli_query($con, "select * from subject");

		echo "<table class='tdlist' border=2 width=500>";
		echo "<tr><th colspan=5 style='background-color:#01125c; color : white;' align=center><a  style='color: white;' href='subadd.php'>Click Here to Add Subject</a></th></tr>";
		echo "<tr><th class='text-primary'>ID</th><th class='text-primary'>Subject Name</th>
	<th class='text-primary'>Update</th>
	<th class='text-primary'>Delete</th></tR>";

		while ($result = mysqli_fetch_assoc($sql)) {
			$id = $result['subjectid'];

			echo "<tr>";
			echo "<td>" . $result['subjectid'] . "</td>";
			echo "<td>" . $result['subjectname'] . "</td>";
			echo "<td><a href='subupdate.php?sub_id=$id'>Update</a></td>";
			echo "<td><a href='subdelete.php?sub_id=$id'>Delete</a></td>";
			echo "</tr>";
		}
		echo "</table>";
	}
	?>
</body>

</html>