
<?php
session_start();
error_reporting(1);
if (!isset($_SESSION['alogin']))
{
	echo "<br><h2>You are not Logged On Please Login to Access this Page</h2>";
	echo "<a href=index.php><h3 align=center>Click Here for Login</h3></a>";
	exit();
}
?>
<link href="../design.css" rel="stylesheet" type="text/css">
<body topmargin="120px" style="background-size: cover; background-image: url(../demo.png); background-repeat : no-repeat;">

<?php
require("../database.php");

include("adminmenu.php");


if($_POST['submit']=='Save' || strlen($_POST['subid'])>0 )
{
extract($_POST);
mysqli_query($con,"insert into topic(subjectid,name,description) values ('$subid','$testname','$totque')",$cn) or die(mysqli_error());
echo "<p align=center>Test <b>\"$testname\"</b> Added Successfully.</p>";
unset($_POST);
}
?>
<SCRIPT LANGUAGE="JavaScript">
function check() {
mt=document.form1.testname.value;
if (mt.length<1) {
alert("Please Enter Topic Name");
document.form1.testname.focus();
return false;
}
tt=document.form1.totque.value;
if(tt.length<1) {
alert("Please Enter Description");
document.form1.totque.value;
return false;
}
return true;
}
</script>
<form name="form1" method="post" onSubmit="return check();">
  <table class="tdlist" border="2">
    <tr>
      <td><strong>Enter Subject ID </strong></div></td>
      <td><select class="form-control" name="subid">
<?php
$rs=mysqli_query($con,"Select * from subject order by  subjectname",$cn);
	  while($row=mysqli_fetch_array($rs))
{
if($row[0]==$subid)
{
echo "<option value='$row[0]' selected>$row[1]</option>";
}
else
{
echo "<option value='$row[0]'>$row[1]</option>";
}
}
?>
      </select>
        
    <tr>
        <td height="26"><div align="left"><strong> Enter Topic Name </strong></div></td>
	  <td><input class="form-control" name="testname" type="text" id="testname"></td>
    </tr>
    <tr>
      <td height="26"><div align="left"><strong>Description </strong></div></td>
      <td><input class="form-control" name="totque" type="text" id="totque"></td>
    </tr>
    <tr>
      <td colspan=2 align="center"><input class="btn btn-primary" type="submit" name="submit" value="Add" ></td>
    </tr>
  </table>
</form>
<p>&nbsp; </p>
