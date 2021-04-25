<?php
session_start();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Questions</title>
<link href="../design.css" rel="stylesheet" type="text/css">

</head>
<body topmargin="120px" style="background-size: cover; background-image: url(../demo.png); background-repeat : no-repeat;">
<?php
include("adminmenu.php");
include("../database.php");
{
$sql=mysqli_query($con,"select * from question");	
	
	echo "<table class='tdlist' border=2 width=600>";
	echo "<tr><th colspan=5 style='background-color:#01125c; color : white;' align=center><a  style='color: white;'  href=\"questionadd.php\">Add Question </a>&emsp;&emsp;</th></tr>";
	echo "<tr><th class='text-primary'>ID</th><th class='text-primary'>Question</th>
	<th class='text-primary'>Update</th>
	<th class='text-primary'>Delete</th></tR>";
	
	while($result=mysqli_fetch_assoc($sql))
	{
$id=$result['questionid'];
	
	echo "<tr>";	
	echo "<td>".$result['questionid']. "</td>";
	echo "<td>".$result['question']."</td>";
	echo "<td><a href='questionupdate.php?questionid=$id'>Update</a></td>";
	echo "<td><a href='questiondelete.php?questionid=$id'>Delete</a></td>";
	echo "</tr>";
	}
	echo "</table>";
}
?>
</body>
</html>
