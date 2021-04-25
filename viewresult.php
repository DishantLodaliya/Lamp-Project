<?php
session_start();
?>
<html>
<head>
<title>Results</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="design.css" rel="stylesheet" type="text/css">

</head>

<body topmargin="120px" style="background-size: cover; background-image: url(demo.png); background-repeat : no-repeat;">
<?php
include("usermenu.php");
include("database.php");
extract($_SESSION);
$rs=mysqli_query($con,"select * from result where loginid='$login'");

if(mysqli_num_rows($rs)<1)
{
	echo "<br><br><h1 class=head1> You have not given any quiz</h1>";
	exit;
}
echo "<table class='tdlist' border=1 width=700><tr><th>Subject Name <th>Topic Name <th> Result <th> Date Time";


while($row=mysqli_fetch_row($rs)) 
{

	echo "<tr class=style8><td>$row[2] <td align=center> $row[1] <td align=center> $row[4] % <td align=center> $row[3]";
}
echo "</table>";
?>
</body>
</html>
