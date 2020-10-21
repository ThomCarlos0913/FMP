<?php
  include "connection.php";
  $param = explode('-', $_POST['PARAM']);
  $id = $param[0];
  $name = $param[1];
  $applicant_id = $param[2];

  $approve_application = "update applicant_applications set application_status = 'Approved' where application_uid = ? and application_name = ?;";

  $approve_stmt = mysqli_stmt_init($conn);
  if (mysqli_stmt_prepare($approve_stmt, $approve_application)) {
    mysqli_stmt_bind_param($approve_stmt, "ss", $id, $name);
    mysqli_stmt_execute($approve_stmt);
  }
?>
