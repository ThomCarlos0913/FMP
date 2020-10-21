<?php include "php/connection.php"; ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <title>Home | Forever Manpower</title>
    <script src="scripts/jquery.min.js" charset="utf-8"></script>
    <script src="scripts/popper.min.js" charset="utf-8"></script>
    <script src="scripts/bootstrap.min.js" charset="utf-8"></script>
    <script src="scripts/reset.js" charset="utf-8"></script>
    <link rel="stylesheet" href="styles/bootstrap/bootstrap.min.css" />
    <link rel="stylesheet" href="styles/main.css">
    <link rel="stylesheet" href="styles/reset.css">
  </head>
  <body>
    <!-- Start Of Navigation -->
    <nav class="navbar navbar-expand-md bg-light navbar-light">
      <span class="brand-text-small navbar-text navbar-brand">Forever Manpower</span>
      <div class="collapse navbar-collapse" id="collapse_navbar">
        <span class="brand-text navbar-text navbar-brand">Forever Manpower</span>
      </div>
    </nav>
    <!-- End Of Navigation -->
    <!-- Start of Main Body -->
    <div class="container resetform">
      <?php if (isset($_GET['unqidtifction'])) {
        ?>
        <?php
        $find_sql = "select * from applicant where applicant_key = ?";
        $stmt = mysqli_stmt_init($conn);

        if (mysqli_stmt_prepare($stmt, $find_sql)) {
          mysqli_stmt_bind_param($stmt, "s", $_GET['unqidtifction']);
          mysqli_stmt_execute($stmt);

          $result = mysqli_stmt_get_result($stmt);

          if ($row = mysqli_fetch_assoc($result)) {
            ?> <h1 class="welcomemess">Hi There, <?php echo $row['applicant_username'] ?></h1>

            <p class="resetmessage">You're almost there! The final step is to enter your new password <br />Please enter your new password below.</p>
            <form class="" action="index.html" method="post">
              <input type="password" class="resettextbox" name="password" value="" placeholder="Enter New Password"><br />
              <input type="password" class="resettextbox" name="confirmpassword" value="" placeholder="Enter Confirm Password"><br />
              <input type="submit" name="" class="resetbtn" onclick="return resetpass('<?php echo $_GET['unqidtifction'] ?>');" value="Reset Password">
            </form>
            <p class="resetfeedback">Password successfully changed! <a href="account.php">Click here</a> to go to login page. </p>
            <p class="reseterror">Error! Password does not match</p>
            <?php
          }
          else{
            ?><h1 class="welcomemess">ERROR! Key is invalid or has already expired.</h1><?php
          }
        }
      }
      else {
        ?> <h1 class="welcomemess">ERROR! Key is missing.</h1> <?php
      } ?>

    </div>
    <!-- End Of Main Body -->
    <div class="d-flex justify-content-center">
      <p class="copyright">Copyright © 2019. System Created By: ADUInno</p>
    </div>
  </body>
</html>
