<?php
session_start();
?>
<html>

<head>
  <title>Subject Update</title>
  <link href="../design.css" rel="stylesheet" type="text/css">
</head>

<body topmargin="120px" style="background-size: cover; background-image: url(../demo.png); background-repeat : no-repeat;">
  <?php
  include("adminmenu.php");
  include("../database.php");
  extract($_REQUEST);
  $id = $_GET['sub_id'];
  $q = mysqli_query($con, "select * from subject where subjectid='$id'");
  $res = mysqli_fetch_assoc($q);


  if (isset($update)) {
    $query = "update subject SET subjectname='$subname' where subjectid='$id'";
    mysqli_query($con, $query);
    echo "records updated";
    header("Location: subjects.php");
  }
  ?>
  <form name="form1" method="post" onSubmit="return check();">
    <table class="tdlist">
      <tr>
        <td><strong>Enter Subject Name </strong></td>
        <td>
          <input value="<?php echo $res['subjectname']; ?>" name="subname" type="text" id="subname">
        </td>
      <tr>
      </tr>
      <tr>
        <td><input type="submit" name="update" value="Update"></td>
      </tr>
    </table>
  </form>
</body>
</html>