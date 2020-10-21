<?php include "php/connection.php";

if (isset($_SESSION['is_adminloggedin']) && $_SESSION['is_adminloggedin'] == 1) { header("Location:adminpage.php");}
else { ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <title>Admin | Forever Manpower</title>
    <script src="scripts/jquery.min.js" charset="utf-8"></script>
    <script src="scripts/popper.min.js" charset="utf-8"></script>
    <script src="scripts/bootstrap.min.js" charset="utf-8"></script>
    <link rel="stylesheet" href="styles/bootstrap/bootstrap.min.css" />
    <link rel="stylesheet" href="styles/main.css">
    <link rel="stylesheet" href="styles/admin.css">
  </head>
  <body>
    <div class="d-flex justify-content-center">
      <div class="admin-login d-flex flex-column">
        <h1 class="login-header">Forever Manpower</h1>
        <p class="signin-header">Sign-in to Forever Manpower Admin</p>

        <form class="login-form" action="php/adminsignin.php" method="post">
          <label for="username-textbox">Username</label><br />
          <input class="textbox" type="text" name="admin-username" placeholder="Enter Username Here">
          <label for="password-textbox">Password</label><br />
          <input class="textbox" type="password" name="admin-password" placeholder="Enter Password Here">

          <div class="container">
            <div class="row">
              <div class="col-sm-6">
                <input type="checkbox" name="" value=""> <span class="remember">Remember Me</span>
              </div>
              <div class="col-sm-6 d-flex justify-content-end">
                <p><a class="forgot" href="#">Forgot Password</a></p>
              </div>
            </div>
          </div>

          <input class="submit-btn" type="submit" name="submit-btn" value="Login Account">

          <p <?php if (isset($_GET['login_failed']) && $_GET['login_failed'] == "failed") { ?> class="d-flex justify-content-center admin-login-error">ERROR! Wrong username or Password</p> <?php } ?>
          
        </form>

        <div class="mt-auto">
          <div class="bottom-text">
            <div class="row">
              <div class="col-sm-8">
                <p>© Copyright 2019</p>
              </div>
              <div class="col-sm-4 ml-auto">
                <p>Created By: ADUInno</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>

<?php } ?>
