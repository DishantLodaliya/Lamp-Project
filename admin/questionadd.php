<?php
session_start();
require("../database.php");
include("adminmenu.php");
error_reporting(1);
?>
<link href="../design.css" rel="stylesheet" type="text/css">
<head><title>Add Question</title></head>
<body topmargin="120px" style="background-size: cover; background-image: url(../demo.png); background-repeat : no-repeat;">

<?php
extract($_POST);

echo "<BR>";
if (!isset($_SESSION['alogin']))
{
	echo "<br><h2><div  class=head1>You are not Logged On Please Login to Access this Page</div></h2>";
	echo "<a href=index.php><h3 align=center>Click Here for Login</h3></a>";
	exit();
}
if($_POST['submit']=='Save' || strlen($_POST['topicid'])>0 )
{
extract($_POST);

//echo "insert into question(`topicid`,`question`,`option1`,`option2`,`option3`,`option4`,`true`) values ('$topicid','$addque','$ans1','$ans2','$ans3','$ans4','$anstrue')";
mysqli_query($con,"insert into question(`topicid`,`question`,`option1`,`option2`,`option3`,`option4`,`trueans`) values ('$topicid','$addque','$ans1','$ans2','$ans3','$ans4','$anstrue')");
echo mysqli_error($con);
//echo "<p align=center>Question Added Successfully.</p>";

unset($_POST);
}
?>
<SCRIPT LANGUAGE="JavaScript">
function check() {
mt=document.form1.addque.value;
if (mt.length<1) {
alert("Please Enter Question");
document.form1.addque.focus();
return false;
}
a1=document.form1.ans1.value;
if(a1.length<1) {
alert("Please Enter Answer1");
document.form1.ans1.focus();
return false;
}
a2=document.form1.ans2.value;
if(a1.length<1) {
alert("Please Enter Answer2");
document.form1.ans2.focus();
return false;
}
a3=document.form1.ans3.value;
if(a3.length<1) {
alert("Please Enter Answer3");
document.form1.ans3.focus();
return false;
}
a4=document.form1.ans4.value;
if(a4.length<1) {
alert("Please Enter Answer4");
document.form1.ans4.focus();
return false;
}
at=document.form1.anstrue.value;
if(at.length<1) {
alert("Please Enter True Answer");
document.form1.anstrue.focus();
return false;
}
return true;
}
</script>

<form name="form1" method="post" onSubmit="return check();">
  <table class="tdlist">
    <tr>
      <td><div align="left"><strong>Select Topic Name </strong></div></td>
      <td><select class="form-control" name="topicid" id="topicid">
<?php
$rs=mysqli_query($con,"Select * from topic order by name",$cn);
	  while($row=mysqli_fetch_array($rs))
{
if($row[0]==$topicid)
{
echo "<option value='$row[0]' selected>$row[2]</option>";
}
else
{
echo "<option value='$row[0]'>$row[2]</option>";
}
}
?>
</select>
        
    <tr>
      <td><b>Enter Question</td>
	    <td><textarea class="form-control" name="addque" cols="40" rows="2" id="addque"></textarea></td>
    </tr>
    <tr>
      <td><b>Enter Option 1</td>
      <td><input name="ans1" type="text" id="ans1"></td>
    </tr>
    <tr>
    <td><b>Enter Option 2</td>
      <td><input name="ans2" type="text" id="ans2"></td>
    </tr>
    <tr>
    <td><b>Enter Option 3</td>
      <td><input name="ans3" type="text" id="ans3"></td>
    </tr>
    <tr>
    <td><b>Enter Option 4</td>
      <td><input name="ans4" type="text" id="ans4"></td>
    </tr>
    <tr>
    <td><b>Enter Correct Option 1</td>
      <td><input name="anstrue" type="text" id="anstrue"></td>
    </tr>
    <tr>
      <td colspan=2 align="center"><input type="submit" name="submit" value="Add" ></td>
    </tr>
  </table>
</form>
<p>&nbsp; </p>
</div>