<?php
session_start();
?>
<html>
<head>
<title>Topics</title>
<link href="../design.css" rel="stylesheet" type="text/css">
</head>
<body topmargin="120px" style="background-size: cover; background-image: url(../demo.png); background-repeat : no-repeat;">
<?php
include("adminmenu.php");
include("../database.php");
{
$sql=mysqli_query($con,"select * from topic");	
	
	echo "<table class='tdlist' border=2 width=600>";
	echo "<tr><th colspan=5 style='background-color:#01125c; color : white;' align=center><a  style='color: white;' href=\"testadd.php\"> ADD Topic</a>&emsp;&emsp;</th></tr>";
	echo "<tr><th class='text-primary'>ID</th><th class='text-primary'>Topic Name</th>
	<th class='text-primary'>Description</th>
	<th class='text-primary'>Update</th>
	<th class='text-primary'>Delete</th></tR>";
	
	while($result=mysqli_fetch_assoc($sql))
	{
$id=$result['topicid'];
	
	echo "<tr>";	
	echo "<td>".$result['topicid']. "</td>";
	echo "<td>".$result['name']."</td>";
	echo "<td>".$result['description']."</td>";
	echo "<td><a href='testupdate.php?topicid=$id'>Update</a></td>";
	echo "<td><a href='testdelete.php?topicid=$id'>Delete</a></td>";
	echo "</tr>";
	}
	echo "</table>";
}
?>
</body>
</html>
