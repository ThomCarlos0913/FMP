<?php
  include "connection.php";

  $newuser_flag = true;
  $newemail_flag = true;

  $newuser = ($_POST['newusername'] != '') ? mysqli_real_escape_string($conn, $_POST['newusername']) : mysqli_real_escape_string($conn, $_SESSION['current_user']);
  $newemail = ($_POST['newemailadd'] != '')  ? mysqli_real_escape_string($conn, $_POST['newemailadd']) : mysqli_real_escape_string($conn, $_SESSION['email']);

  if ($_POST['newusername'] == '') {
    $newuser_flag = false;
  }
  if ($_POST['newemailadd'] == '') {
    $newemail_flag = false;
  }

  // update applications
  $find_sql = "update applicant set applicant_username = ?, applicant_email = ? where applicant_id = ?";
  $stmt = mysqli_stmt_init($conn);

  if (mysqli_stmt_prepare($stmt, $find_sql)) {
    mysqli_stmt_bind_param($stmt, "ssi", $newuser, $newemail ,$_SESSION['id']);
    mysqli_stmt_execute($stmt);

    // Update current user
    $find_sql = "select * from applicant where applicant_id = ?";
    $stmt = mysqli_stmt_init($conn);

    if (mysqli_stmt_prepare($stmt, $find_sql)) {
      mysqli_stmt_bind_param($stmt, "i" ,$_SESSION['id']);
      mysqli_stmt_execute($stmt);


      $result = mysqli_stmt_get_result($stmt);

      if ($row = mysqli_fetch_assoc($result)) {
        $_SESSION['current_user'] = $row['applicant_username'];
        $_SESSION['email'] = $row['applicant_email'];
      }
    }
  }

  if ($newuser_flag && $newemail_flag) {
    header('Location: ../account.php?feedback=emailuser');
  }
  else if ($newemail_flag) {
    header('Location: ../account.php?feedback=email');
  }
  else if ($newuser_flag) {
    header('Location: ../account.php?feedback=user');
  }
  else {
    header('Location: ../account.php?feedback=noinput');
  }
?>
