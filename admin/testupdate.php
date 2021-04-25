<?php
session_start();
?>
<html>

<head>
  <title>Topic Update</title>
  <link href="../design.css" rel="stylesheet" type="text/css">
</head>

<body topmargin="120px" style="background-size: cover; background-image: url(../demo.png); background-repeat : no-repeat;">
  <?php
  include("adminmenu.php");
  include("../database.php");
  extract($_REQUEST);
  $id = $_GET['topicid'];
  $q = mysqli_query($con, "select * from topic where topicid='$id'");
  $res = mysqli_fetch_assoc($q);

  if (isset($update)) {
    $query = "update topic SET name='$topicname',description='$desc' where topicid='$id'";
    mysqli_query($con, $query);
    echo "records updated";
    header("Location: tests.php");

  }
  ?>
    <form name="form1" method="post" onSubmit="return check();">
      <h2 class='text-center bg-primary'>Update Topic Details</h2>
      <table class="tdlist">
        <tr>
          <td height="26">
            <div align="left"><strong> Topic Name </strong></div>
          </td>
          <td>&nbsp;</td>
          <td><input class="form-control" value="<?php echo $res['name']; ?>" name="topicname" type="text" id="topicname"></td>
        </tr>
        <tr>
          <td height="26">
            <div align="left"><strong>Description</strong></div>
          </td>
          <td>&nbsp;</td>
          <td><input class="form-control" value="<?php echo $res['description']; ?>" name="desc" type="text" id="desc"></td>
        </tr>
        <tr>
          <td height="26"></td>
          <td>&nbsp;</td>
          <td><input class="btn btn-primary" type="submit" name="update" value="update"></td>
        </tr>
      </table>
    </form>
    <p>&nbsp; </p>
</body>

</html>