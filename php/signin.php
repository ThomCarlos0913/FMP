<?php
  include "connection.php";

  $username = mysqli_real_escape_string($conn, $_POST['user-loginusername']);
  $password = mysqli_real_escape_string($conn, $_POST['user-loginpassword']);

  $find_sql = "select * from applicant where applicant_username = ?";
  $stmt = mysqli_stmt_init($conn);

  if (mysqli_stmt_prepare($stmt, $find_sql)) {
    mysqli_stmt_bind_param($stmt, "s", $username);
    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($result)) {
      if (password_verify($password, $row['applicant_password'])) {
        $_SESSION['is_loggedin'] = true;
        $_SESSION['id'] = $row['applicant_id'];
        $_SESSION['current_user'] = $row['applicant_username'];
        $_SESSION['firstname'] = $row['applicant_firstname'];
        $_SESSION['lastname'] = $row['applicant_lastname'];
        $_SESSION['birthdate'] = $row['applicant_birthday'];
        $_SESSION['email'] = $row['applicant_email'];
        $_SESSION['address'] = $row['applicant_address'];
        $_SESSION['applications'] = $row['applicant_applications'];
      }
      else {
          $_SESSION['wrong_login_credentials'] = true;
      }
    }
    else {
      $_SESSION['wrong_login_credentials'] = true;
    }
  }

  header("Location: ../apply.php");
?>
