<?php

include "connection.php";

function random_str(
    int $length = 64,
    string $keyspace = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'
  ): string {
    if ($length < 1) {
        throw new \RangeException("Length must be a positive integer");
    }
    $pieces = [];
    $max = mb_strlen($keyspace, '8bit') - 1;
    for ($i = 0; $i < $length; ++$i) {
        $pieces []= $keyspace[random_int(0, $max)];
    }
    return implode('', $pieces);
  }

  // variables
  $email = $_POST['email'];
  $key = random_str(32);

  // Set key
  $find_sql = "update applicant set applicant_key = ? where applicant_email = ?";
  $stmt = mysqli_stmt_init($conn);

  if (mysqli_stmt_prepare($stmt, $find_sql)) {
    mysqli_stmt_bind_param($stmt, "ss", $key, $email);
    mysqli_stmt_execute($stmt);

    echo "UPDATED";
  }

?>
