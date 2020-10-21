<?php
  include "connection.php";

  $fullname = mysqli_real_escape_string($conn, $_POST['fullname']);
  $username = mysqli_real_escape_string($conn, $_POST['username']);
  $password = mysqli_real_escape_string($conn, $_POST['password']);

  $insert_sql = "insert into admindb (admin_fullname, admin_username, admin_password, admin_level)
                  values (?,?,?, 1);";

  $find_sql = "select * from admindb where admin_fullname = ?";
  $find_stmt = mysqli_stmt_init($conn);

  if (mysqli_stmt_prepare($find_stmt, $find_sql)) {
    mysqli_stmt_bind_param($find_stmt, "s", $username);
    mysqli_stmt_execute($find_stmt);

    $result = mysqli_stmt_get_result($find_stmt);

    if ($row = mysqli_fetch_assoc($result)) {
      echo "er1"; // Username found
    }
    else {
      $stmt = mysqli_stmt_init($conn);
      if (mysqli_stmt_prepare($stmt, $insert_sql)) {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        mysqli_stmt_bind_param($stmt, "sss", $fullname, $username, $hashed_password);
        mysqli_stmt_execute($stmt);
        echo "success";
      }
    }
  }
  else {
    echo "er2";
  }
?>
