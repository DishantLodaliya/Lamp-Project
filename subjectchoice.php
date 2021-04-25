<?php
session_start();
?>
<html>
<head>
  <title>Subject Selection</title>
  <link href="design.css" rel="stylesheet" type="text/css">
</head>
<body topmargin="120px" style="background-size: cover; background-image: url(demo.png); background-repeat : no-repeat;">
  <?php
  include("usermenu.php");
  include("database.php");
  ?>
  <table>
    <?php
    echo "<h1 style='margin-left: 450px;'>Select Subject to Give Quiz</h1>";
    $rs = mysqli_query($con, "select * from subject");
    echo "<table style='margin-left: 500px;' class='card'>";
    while ($row = mysqli_fetch_row($rs)) {
      echo "<tr><td class='tdlist' align=center ><a href=showtest.php?subid=$row[0]><font size=4>$row[1]</font></a>";
    }
    echo "</table>";
    ?>
</body>
</html>