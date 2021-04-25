 <?php
session_start();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Update Question</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="../design.css" rel="stylesheet" type="text/css">
</head>
<body topmargin="120px" style="background-size: cover; background-image: url(../demo.png); background-repeat : no-repeat;">
<?php
include("adminmenu.php");
include("../database.php");
extract($_REQUEST);
 $id=$_GET['questionid'];
$q=mysqli_query($con,"select * from question where questionid='$id'");
$res=mysqli_fetch_assoc($q);


if(isset($update))
{
$query="update question SET `question`='$addque',`option1`='$ans1',`option2`='$ans2',`option3`='$ans3',`option4`='$ans4',`trueans`='$anstrue' where `questionid`='$id'";	
mysqli_query($con,$query);
echo "records updated";
header('location:questions.php');

	
	}



?>
<form name="form1" method="post" onSubmit="return check();">
  <table class="tdlist">
 <tr>
        <td height="26"><div align="left"><strong> Enter Question </strong></div></td>
        <td>&nbsp;</td>
	    <td><textarea name="addque" cols="60" rows="2" id="addque">
		<?php echo $res['question']; ?>
		</textarea></td>
    </tr>
    <tr>
      <td height="26"><div align="left"><strong>Enter Answer1 </strong></div></td>
      <td>&nbsp;</td>
      <td><input value="<?php echo $res['option1']; ?>" name="ans1" type="text" id="ans1" size="85" maxlength="85"></td>
    </tr>
    <tr>
      <td height="26"><strong>Enter Answer2 </strong></td>
      <td>&nbsp;</td>
      <td><input  value="<?php echo $res['option2']; ?>" name="ans2" type="text" id="ans2" size="85" maxlength="85"></td>
    </tr>
    <tr>
      <td height="26"><strong>Enter Answer3 </strong></td>
      <td>&nbsp;</td>
      <td><input  value="<?php echo $res['option3']; ?>" name="ans3" type="text" id="ans3" size="85" maxlength="85"></td>
    </tr>
    <tr>
      <td height="26"><strong>Enter Answer4</strong></td>
      <td>&nbsp;</td>
      <td><input  name="ans4"value="<?php echo $res['option4']; ?>" type="text" id="ans4" size="85" maxlength="85"></td>
    </tr>
    <tr>
      <td height="26"><strong>Enter True Answer </strong></td>
      <td>&nbsp;</td>
      <td><input value="<?php echo $res['trueans']; ?>" name="anstrue" type="text" id="anstrue" size="50" maxlength="50"></td>
    </tr>
    <tr>
      <td height="26"></td>
      <td>&nbsp;</td>
      <td><input class="btn btn-primary" type="submit" name="update" value="UPDATE" ></td>
    </tr>
	</table>
</form>
<p>&nbsp; </p>