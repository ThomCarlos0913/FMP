<?php
  session_start();

  $_SESSION['is_adminloggedin'] = false;
  $_SESSION['id'] = "";
  $_SESSION['name'] = "";

  header("Location: ../adminpage.php");
?>
