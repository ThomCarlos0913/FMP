<?php
  include "connection.php";
  $param = explode('-', $_POST['PARAM']);
  $id = $param[0];
  $name = $param[1];
  $applicant_id = $param[2];


  // delete applicant_applications
  $delete_applications = "delete from applicant_applications where application_uid = ?";

  $delete_applications_stmt = mysqli_stmt_init($conn);
  if (mysqli_stmt_prepare($delete_applications_stmt, $delete_applications)) {
    mysqli_stmt_bind_param($delete_applications_stmt, "s", $id);
    mysqli_stmt_execute($delete_applications_stmt);
  }

  $delete_applications = "delete from personaldetails where application_uid = ?";

  $delete_applications_stmt = mysqli_stmt_init($conn);
  if (mysqli_stmt_prepare($delete_applications_stmt, $delete_applications)) {
    mysqli_stmt_bind_param($delete_applications_stmt, "s", $id);
    mysqli_stmt_execute($delete_applications_stmt);
  }

  $delete_applications = "delete from maritalstatus where application_uid = ?";

  $delete_applications_stmt = mysqli_stmt_init($conn);
  if (mysqli_stmt_prepare($delete_applications_stmt, $delete_applications)) {
    mysqli_stmt_bind_param($delete_applications_stmt, "s", $id);
    mysqli_stmt_execute($delete_applications_stmt);
  }

  $delete_applications = "delete from relatives where application_uid = ?";

  $delete_applications_stmt = mysqli_stmt_init($conn);
  if (mysqli_stmt_prepare($delete_applications_stmt, $delete_applications)) {
    mysqli_stmt_bind_param($delete_applications_stmt, "s", $id);
    mysqli_stmt_execute($delete_applications_stmt);
  }

  $delete_applications = "delete from contactaddress where application_uid = ?";

  $delete_applications_stmt = mysqli_stmt_init($conn);
  if (mysqli_stmt_prepare($delete_applications_stmt, $delete_applications)) {
    mysqli_stmt_bind_param($delete_applications_stmt, "s", $id);
    mysqli_stmt_execute($delete_applications_stmt);
  }

  $delete_applications = "delete from education where application_uid = ?";

  $delete_applications_stmt = mysqli_stmt_init($conn);
  if (mysqli_stmt_prepare($delete_applications_stmt, $delete_applications)) {
    mysqli_stmt_bind_param($delete_applications_stmt, "s", $id);
    mysqli_stmt_execute($delete_applications_stmt);
  }

  $delete_applications = "delete from employment where application_uid = ?";

  $delete_applications_stmt = mysqli_stmt_init($conn);
  if (mysqli_stmt_prepare($delete_applications_stmt, $delete_applications)) {
    mysqli_stmt_bind_param($delete_applications_stmt, "s", $id);
    mysqli_stmt_execute($delete_applications_stmt);
  }

  // update applicant applications
  $update_applicant = "update applicant set applicant_applications = replace(applicant_applications, ?, '') where applicant_id = ?";

  $update_applicant_stmt = mysqli_stmt_init($conn);
  if (mysqli_stmt_prepare($update_applicant_stmt, $update_applicant)) {
    mysqli_stmt_bind_param($update_applicant_stmt, "ss", $name, $applicant_id);
    mysqli_stmt_execute($update_applicant_stmt);
  }

  /* Update Application Session*/
  $find_sql = "select * from applicant where applicant_id = ?";
  $stmt = mysqli_stmt_init($conn);

  if (mysqli_stmt_prepare($stmt, $find_sql)) {
    mysqli_stmt_bind_param($stmt, "i", $applicant_id);
    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($result)) {
      $_SESSION['applications'] = $row['applicant_applications'];
    }
  }

?>
