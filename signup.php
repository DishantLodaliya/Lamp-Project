<html>
<head>
<title>New user signup </title>
<script language="javascript">
function check()
{
 if(document.form1.lid.value=="")
  {
    alert("Plese Enter Login Id");
	document.form1.lid.focus();
	return false;
  }
 
 if(document.form1.pass.value=="")
  {
    alert("Plese Enter Your Password");
	document.form1.pass.focus();
	return false;
  } 
  if(document.form1.cpass.value=="")
  {
    alert("Plese Enter Confirm Password");
	document.form1.cpass.focus();
	return false;
  }
  if(document.form1.pass.value!=document.form1.cpass.value)
  {
    alert("Confirm Password does not matched");
	document.form1.cpass.focus();
	return false;
  }
  if(document.form1.name.value=="")
  {
    alert("Plese Enter Your Name");
	document.form1.name.focus();
	return false;
  }
}
</script>
<link href="design.css" rel="stylesheet" type="text/css">
</head>
<body topmargin="120px" style="background-size: cover; background-image: url(demo.png); background-repeat : no-repeat;">
  <center>
<?php
?>
     <td><form name="form1" method="post" action="signupuser.php" onSubmit="return check();"><br>
			<table class="tdlist">
		
         <tr>
           <td>LOGIN ID</div></td>
           <td><input type="text" name="lid"></td>
         </tr>
         <tr>
           <td>Password</td>
           <td><input type="password" name="pass"></td>
         </tr>
         <tr>
           <td>Confirm Password </td>
           <td><input  name="cpass" type="password" id="cpass"></td>
         </tr>
         <tr>
           <td>Name</td>
           <td><input  name="name" type="text" id="name"></td>
         </tr>
         <tr>
           <td>&nbsp;</td>
           <td><input  type="submit" name="Submit" value="Signup">
           </td>
         </tr>
       </table>
     </form></td>
</body>
</html>
