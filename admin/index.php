<?php
session_start();
?>

<html>

<head>
  <title>Administrative Login - Online Examination System</title>
  <link href="../design.css" rel="stylesheet" type="text/css">
</head>

<body topmargin="120px" style="background-size: cover; background-image: url(../demo.png); background-repeat : no-repeat;">

  <center>
    <div>
      <h1>Adminstrative Login</h1>
      <form name="form1" method="post" action="login.php">

        <table class="tdlist">
          <td>Login ID </td>
          <td><input name="loginid" type="text" id="loginid"></td>
          </tr>
          <tr>
            <td>Password</td>
            <td><input name="pass" type="password" id="pass"></td>
          </tr>

          <tr>
            <td class="style2">&nbsp;</td>
            <td><input class="btn btn-primary" name="submit" type="submit" id="submit" value="Login"></td>
          </tr>
        </table>
        </td>
        </tr>
        </table>
    </div>
    </form>
</body>

</html>