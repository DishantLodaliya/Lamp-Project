<?php
session_start();
require("../database.php");
include("adminmenu.php");
error_reporting(1);
?>
<link href="../design.css" rel="stylesheet" type="text/css">
<body topmargin="120px" style="background-size: cover; background-image: url(../demo.png); background-repeat : no-repeat;">
<?php
extract($_POST);

if (!isset($_SESSION['alogin']))
{
	echo "<br><h2><div  class=head1>You are not Logged On Please Login to Access this Page</div></h2>";
	echo "<a href=index.php><h3 align=center>Click Here for Login</h3></a>";
	exit();
}

echo "<table class='tdlist'>";
echo "<tr><td align=center></table>";
if($submit=='submit' || strlen($subname)>0 )
{
$rs=mysqli_query($con,"select * from subject where subjectname='$subname'");
if (mysqli_num_rows($rs)>0)
{
	echo "<h2 style='color : white;'>Subject is Already Exists <a href='subadd.php'>Add Subject Again</a></div>";
	exit;
}
mysqli_query($con,"insert into subject(subjectname) values ('$subname')",$cn) or die(mysqli_error());
echo "<h2 >Subject  <b> \"$subname \"</b> Added Successfully.</p>";
$submit="";
}
?>
<SCRIPT LANGUAGE="JavaScript">
function check() {
mt=document.form1.subname.value;
if (mt.length<1) {
alert("Please Enter Subject Name");
document.form1.subname.focus();
return false;
}
return true;
}
</script>

<form name="form1" method="post" onSubmit="return check();">
  <table class="tdlist">
    <tr>
      <td width="45%" height="32"><div align="center"><strong>Enter Subject Name </strong></div></td>
      <td width="2%" height="5">  
      <td width="53%" height="32">
        <input class="form-control" name="subname" placeholder="enter language name" type="text" id="subname">
    <tr>
        <td height="26"> </td>
        <td>&nbsp;</td>
	  <td>&nbsp;</td>
    </tr>
    <tr>
      <td height="26"></td>
      <td>&nbsp;</td>
      <td><input class="btn btn-primary" type="submit" name="submit" value="Add" ></td>
    </tr>
  </table>
</form>
<p>&nbsp; </p>
</div>
</body>
