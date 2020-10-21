<?php
  include "connection.php";

  if ($_POST['newpass'] != '' && $_POST['confpass'] != '' && $_POST['currentpass'] != '' ) {
    if ($_POST['newpass'] == $_POST['confpass']) {

      $find_sql = "select * from applicant where applicant_id = ?";
      $stmt = mysqli_stmt_init($conn);

      if (mysqli_stmt_prepare($stmt, $find_sql)) {
        mysqli_stmt_bind_param($stmt, "i" ,$_SESSION['id']);
        mysqli_stmt_execute($stmt);

        $result = mysqli_stmt_get_result($stmt);

        if ($row = mysqli_fetch_assoc($result)) {
          if (password_verify($_POST['currentpass'], $row['applicant_password'])) {

            $find_sql = "update applicant set applicant_password = ? where applicant_id = ?";
            $stmt = mysqli_stmt_init($conn);

            if (mysqli_stmt_prepare($stmt, $find_sql)) {
              mysqli_stmt_bind_param($stmt, "si", password_hash($_POST['newpass'], PASSWORD_DEFAULT) ,$_SESSION['id']);
              mysqli_stmt_execute($stmt);
            }

            header('Location: ../account.php?feedback=password');
          }
          else {
            header('Location: ../account.php?feedback=wrongpass');
          }
        }
      }
    }
    else {
      header('Location: ../account.php?feedback=passinputmismatch');
    }
  }
  else {
    header('Location: ../account.php?feedback=nopassinput');
  }
?>
