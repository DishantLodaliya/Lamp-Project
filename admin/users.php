<?php
session_start();
?>
<html>
<head>
<title>Users</title>
<link href="../design.css" rel="stylesheet" type="text/css">
</head>
<body topmargin="120px" style="background-size: cover; background-image: url(../demo.png); background-repeat : no-repeat;">
<?php
include("adminmenu.php");
include("../database.php");
{

		$sql=mysqli_query($con,"Select * From user");	
		echo "<table class='tdlist' border=2 width=500>";
		echo "<tr>
		<th class='text-primary'>UserID</th>
				<th class='text-primary'>LoginID</th>
	<th class='text-primary'>Name</th>
	<th class='text-primary'>Delete User</th></tR>";
	
	while($result=mysqli_fetch_assoc($sql))
	{
	$userid=$result['userid'];
	
	echo "<tr>";	
	echo "<td>".$result['userid']. "</td>";
	echo "<td>".$result['loginid']."</td>";
	echo "<td>".$result['name']."</td>";
	
	echo "<td><a href='userdelete.php?username=$userid'>Delete</span></a></td>";
	echo "</tr>";
	echo"</div>";
	}
	echo "</table>";
		
}

?>