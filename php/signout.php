<?php
  session_start();

  $_SESSION['is_loggedin'] = false;
  $_SESSION['id'] = "";
  $_SESSION['current_user'] = "";
  $_SESSION['firstname'] = "";
  $_SESSION['lastname'] = "";
  $_SESSION['birthdate'] = "";
  $_SESSION['email'] = "";
  $_SESSION['address'] = "";

  header("Location: ../account.php");
?>
