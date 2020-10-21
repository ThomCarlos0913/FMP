<?php
  include "connection.php";

  $bday_year = $_POST['select-year'];
  $bday_month = $_POST['select-month'];
  $bday_date = $_POST['select-date'];
  $birthday = $bday_month ."-". $bday_date ."-". $bday_year;

  $firstname = mysqli_real_escape_string($conn, $_POST['user-firstname']);
  $middlename = mysqli_real_escape_string($conn, ucwords(trim($_POST['user-mi'], '.')));
  $lastname = mysqli_real_escape_string($conn, $_POST['user-lastname']);
  $username = mysqli_real_escape_string($conn, $_POST['user-username']);
  $address = mysqli_real_escape_string($conn, $_POST['user-address']);
  $email = mysqli_real_escape_string($conn, $_POST['user-email']);
  $db_birthday = mysqli_real_escape_string($conn, $birthday);
  $password = mysqli_real_escape_string($conn, $_POST['user-password']);

  if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $insert_sql = "insert into applicant (applicant_firstname, applicant_middlename, applicant_lastname, applicant_username, applicant_address, applicant_email, applicant_birthday, applicant_password)
                    values (?, ?, ?, ?, ?, ?, ?, ?);";

    $find_sql = "select * from applicant where applicant_firstname = ? and applicant_lastname = ? and applicant_birthday = ?";
    $find_stmt = mysqli_stmt_init($conn);

    if (mysqli_stmt_prepare($find_stmt, $find_sql)) {
      mysqli_stmt_bind_param($find_stmt, "sss", $firstname, $lastname, $db_birthday);
      mysqli_stmt_execute($find_stmt);

      $result = mysqli_stmt_get_result($find_stmt);

      if ($row = mysqli_fetch_assoc($result)) {
        header("Location: ../apply.php?createerror=userExist");
      }
      else {
        $find_sql = "select * from applicant where applicant_username = ?";
        $find_stmt = mysqli_stmt_init($conn);

        if (mysqli_stmt_prepare($find_stmt, $find_sql)) {
          mysqli_stmt_bind_param($find_stmt, "s", $username);
          mysqli_stmt_execute($find_stmt);

          $result = mysqli_stmt_get_result($find_stmt);

          if ($row = mysqli_fetch_assoc($result)) {
            header("Location: ../apply.php?createerror=usernameFound");
          }
          else {
            $stmt = mysqli_stmt_init($conn);
            if (mysqli_stmt_prepare($stmt, $insert_sql)) {
              $hashed_password = password_hash($password, PASSWORD_DEFAULT);
              mysqli_stmt_bind_param($stmt, "ssssssss", $firstname, $middlename, $lastname, $username, $address, $email, $db_birthday, $hashed_password);
              mysqli_stmt_execute($stmt);
            }

            header("Location: ../apply.php?status=success");
          }
        }
      }
    }
  }
  else {
    header("Location: ../apply.php?createerror=invalidemail");
  }
?>
