<?php
  include "connection.php";

  if (session_status() == PHP_SESSION_NONE) {
    session_start();
  }

  $username = mysqli_real_escape_string($conn, $_POST['admin-username']);
  $password = mysqli_real_escape_string($conn, $_POST['admin-password']);

  $find_sql = "select * from admindb where admin_username = ?";
  $stmt = mysqli_stmt_init($conn);

  if (mysqli_stmt_prepare($stmt, $find_sql)) {
    mysqli_stmt_bind_param($stmt, "s", $username);
    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($result)) {
      if (password_verify($password, $row['admin_password'])) {
        $_SESSION['is_adminloggedin'] = true;
        $_SESSION['id'] = $row['admin_id'];
        $_SESSION['name'] = $row['admin_fullname'];

        header("Location: ../adminpage.php");
      }
      else {
          $_SESSION['wrong_admin_credentials'] = true;
          header("Location: ../adminlogin.php?login_failed=failed");
      }
    }
    else {
      $_SESSION['wrong_admin_credentials'] = true;
      header("Location: ../adminlogin.php?login_failed=failed");
    }
  }
?>
