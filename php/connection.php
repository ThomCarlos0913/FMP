<?php
  session_start();

  $servername = "localhost:3306";
  $dbusername = "root";
  $dbpassword = "admin123";
  $dbname = "forevermanpower";

  $conn = mysqli_connect($servername, $dbusername, $dbpassword, $dbname);
?>
