<?php

include "connection.php";

$password = $_POST['pass'];
$key = $_POST['key'];

$find_sql = "update applicant set applicant_password = ?, applicant_key = '' where applicant_key = ?";
$stmt = mysqli_stmt_init($conn);

if (mysqli_stmt_prepare($stmt, $find_sql)) {
  mysqli_stmt_bind_param($stmt, "ss", password_hash($password, PASSWORD_DEFAULT), $key);
  mysqli_stmt_execute($stmt);

  echo "passchanged";
}

?>
