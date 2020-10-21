<?php include "php/connection.php"; ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <title>About | Forever Manpower</title>
    <script src="scripts/jquery.min.js" charset="utf-8"></script>
    <script src="scripts/popper.min.js" charset="utf-8"></script>
    <script src="scripts/bootstrap.min.js" charset="utf-8"></script>
    <script src="scripts/applyjs.js" charset="utf-8"></script>
    <script src="scripts/main.js" charset="utf-8"></script>
    <link rel="stylesheet" href="styles/bootstrap/bootstrap.min.css" />
    <link rel="stylesheet" href="styles/main.css">
    <link rel="stylesheet" href="styles/apply.css">
    <link rel="stylesheet" href="styles/home.css">
    <link rel="stylesheet" href="styles/account.css">
  </head>
  <body>
    <!-- Email Overlay -->
    <div class="emailoverlay">
      <div class="emailcontainer">
        <div class="d-flex justify-content-end">
          <button onclick="hideEmailOverlay()" class="closebutton" type="button" name="button">&#10006;</button>
        </div>
        <h1 class="emailoverlayheader"></h1>
        <p class="emailoverlaymessage"></p>
        <div class="emailformcontainer">
          <form class="message-form" action="#" method="post">
            <label for="name">Full Name </label> <input name="message_name" type="text" placeholder="Enter Full Name Here"><br />
            <label for="name">Email </label> <input name="message_from" type="text" placeholder="Enter Email Here"><br />
            <label for="name">Contact </label> <input name="message_contact" type="text" placeholder="Enter Contact Number Here"><br />
            <label for="name">Message </label> <textarea name="message_body" rows="3" cols="22" placeholder="Enter Message Here"></textarea> <br />
            <span class="submit-setter"></span>  <button type="button" class="submit-message emailoverlaysubmit" name="button">Send Message</button><br />
            <label for=""></label><span class="messagesent">Message Sent! We'll get back to you soon.</span>
          </form>
        </div>
      </div>
      <div class="forgotpassword">
        <p class="approvalheader">Enter Email Address</p>
        <form class="forgotform" action="index.html" method="post">
          <p>Forgot your password? No worries, we got you. Enter your email address below and we will send you a confirmation email.</p>
          <input type="text" name="" value="" class="forgottextbox" placeholder="Enter Email Address Here">
          <div class="approvalbtncontainers d-flex justify-content-end align-items-end">
            <button onclick="hideOverlays()" class="approvalbtns button-approval btn-outline-secondary" type="button" name="button">Cancel</button>
            <button class="approvalbtns sendpass button-approval btn-primary" type="button" name="button">Recover Password</button>
          </div>
        </form>
      </div>
    </div>
    <!-- Start Of Navigation -->
    <nav class="navbar navbar-expand-md bg-light navbar-light">
      <button class="navbar-toggler" data-toggle="collapse" data-target="#collapse_navbar">
        <span class="navbar-toggler-icon"></span>
      </button>
      <span class="brand-text-small navbar-text navbar-brand">Forever Manpower</span>
      <div class="collapse navbar-collapse" id="collapse_navbar">
        <span class="brand-text navbar-text navbar-brand">Forever Manpower</span>
        <ul class="navbar-list-container navbar-list navbar-nav">
          <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
          <li class="nav-item"><a class="nav-link" href="about.php">About Us</a></li>
          <li class="nav-item"><a class="nav-link" href="apply.php">Apply Now</a></li>
        </ul>
        <ul class="navbar-list-container navbar-list navbar-nav ml-auto">
          <?php if (empty($_GET['status']) && !(isset($_SESSION['is_loggedin']) && $_SESSION['is_loggedin'])) {?>
            <li class="nav-item"><a class="nav-link nav-selected" href="#">Sign in</a></li>
          <?php } else { ?>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" data-toggle="dropdown" data-target="account_options" href="#"><?php echo $_SESSION['current_user']?><span class="caret"></span></a>
              <div class="dropdown-menu" aria-labelledby="account_options">
                <a class="dropdown-item" href="account.php">Account Settings</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="php/signout.php">Logout</a>
              </div>
            </li>
          <?php }?>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle lang-btn" data-toggle="dropdown" data-target="dropdown_languages" href="#">Language <span class="caret"></span></a>
            <div class="dropdown-menu" aria-labelledby="dropdown_languages">
              <a class="dropdown-item" href="#">English</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="lang/chn/account.php">Chinese</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="lang/ar/account.php">Arabic</a>
            </div>
          </li>
        </ul>
      </div>
    </nav>
    <!-- End Of Navigation -->
    <?php if (empty($_GET['status']) && !(isset($_SESSION['is_loggedin']) && $_SESSION['is_loggedin'])) {?>
      <!-- Start of Page Header -->
      <div class="header-image">
        <h1>Sign In</h1>
      </div>
      <!-- End of Page Header -->
    <?php } else { ?>
      <!-- Start of Page Header -->
      <div class="header-image">
        <h1>Account Settings</h1>
      </div>
      <!-- End of Page Header -->
    <?php }?>
    <?php if ((isset($_SESSION['is_loggedin']) && $_SESSION['is_loggedin'])) {?>
      <div class="container">
        <div class="row">
          <div class="col-sm-1"></div>
          <div class="col-sm-4">
            <p class="section-header">Account Information</p>
            <form class="account-setting-form" action="php/updateinformation.php" method="post">
              <label for="">Username</label>
              <input class="textbox" type="text" name="newusername" value="" placeholder="Enter new username here">
              <p class="guide">Current Username: <?php echo $_SESSION['current_user'] ?> </p>
              <div class="spacer"></div>
              <label for="">Email Address</label>
              <input class="textbox" type="text" name="newemailadd" value="" placeholder="Enter new email address here">
              <p class="guide">Current Email: <?php echo $_SESSION['email'] ?> </p>
              <div class="spacer"></div>
              <input class="submitbtn" type="submit" value="Update Account Informations">
              <?php if( isset($_GET['feedback']) && $_GET['feedback'] == 'email') { ?> <p class="updatemessage"><strong>Success!</strong> Email Address is now updated.</p> <?php } ?>
              <?php if( isset($_GET['feedback']) && $_GET['feedback'] == 'user') { ?> <p class="updatemessage"><strong>Success!</strong> Username is now updated.</p> <?php } ?>
              <?php if( isset($_GET['feedback']) && $_GET['feedback'] == 'emailuser') { ?> <p class="updatemessage"><strong>Success!</strong> Username & Email are updated.</p> <?php } ?>
              <?php if( isset($_GET['feedback']) && $_GET['feedback'] == 'noinput') { ?> <p class="updatemessage noupdate">Please enter your desired changes.</p> <?php } ?>
            </form>
          </div>
          <div class="col-sm-1"></div>
          <div class="col-sm-4">
            <p class="section-header">Change Password</p>
            <form class="account-setting-form" action="php/updatepassword.php" method="post">
              <label for="">New Password</label>
              <input class="textbox" type="password" name="newpass" value="" placeholder="Enter new password here">
              <div class="spacer"></div>
              <label for="">Confirm New Password</label>
              <input class="textbox" type="password" name="confpass" value="" placeholder="Confirm new password here">
              <div class="spacer"></div>
              <label for="">Current Password</label>
              <input class="textbox" type="password" name="currentpass" value="" placeholder="Enter current password here">
              <div class="spacer"></div>
              <input class="submitbtn" type="submit" name="" value="Update Password">
              <?php if( isset($_GET['feedback']) && $_GET['feedback'] == 'password') { ?> <p class="updatemessage"><strong>Success!</strong> Password is now updated.</p> <?php } ?>
              <?php if( isset($_GET['feedback']) && $_GET['feedback'] == 'passinputmismatch') { ?> <p class="updatemessage errormess"><strong>Error!</strong> Confirm Password does not match.</p> <?php } ?>
              <?php if( isset($_GET['feedback']) && $_GET['feedback'] == 'wrongpass') { ?> <p class="updatemessage errormess"><strong>Error!</strong> Current Password does is wrong.</p> <?php } ?>
              <?php if( isset($_GET['feedback']) && $_GET['feedback'] == 'nopassinput') { ?> <p class="updatemessage noupdate">Please enter your desired changes.</p> <?php } ?>
            </form>
          </div>
          <div class="col-sm-1"></div>
        </div>
      </div>
    <?php }?>
    <?php if (empty($_GET['status']) && !(isset($_SESSION['is_loggedin']) && $_SESSION['is_loggedin'])) { ?>
      <!-- Start of Login/Signup Form -->
      <div class="container">
        <div class="login-form">
          <div class="d-flex justify-content-center">
            <h1 class="create-account-header">Sign in to your account and join thousands who have found a job at Forever Manpower.</h1>
          </div>
          <div class="row">
            <!-- User Login -->
            <div class="col-sm-1 spacer"></div>
            <div class="col-sm-4">
              <h1 class="form-header">Sign In</h1>
              <form class="applicant-form" action="php/signin.php" method="post">
                <label for="user-loginusername">Username</label><br/>
                <input class="textbox" type="text" name="user-loginusername" placeholder="Enter username here"><br/>
                <label for="user-loginpassword">Password</label><br/>
                <input class="textbox" type="password" name="user-loginpassword" placeholder="Enter password here"><br/>

                <div class="container">
                  <div class="row">
                    <div class="col-sm-6">
                      <!-- <input type="checkbox" name="rememberme" value=""> <span class="remember">Remember Me</span> -->
                    </div>
                    <div class="col-sm-6 d-flex justify-content-end">
                      <label for=""><a class="forgot" href="#" onclick="showForgotPassword()">Forgot Password</a></label>
                    </div>
                  </div>
                </div>
                <?php if (isset($_SESSION['wrong_login_credentials']) && $_SESSION['wrong_login_credentials']) {
                  $_SESSION['wrong_login_credentials'] = false;?>
                  <p class="incorrect-message d-flex justify-content-center">Wrong Username or Password.</p>
                <?php }?>
                <input class="submit-btn signin-responsive-spacer" type="submit" name="submit-btn" value="Login Account">
              </form>
            </div>
            <!-- User Create Account -->
            <div class="col-sm-1 spacer"></div>
            <div class="col-sm-5">
              <h1 class="form-header">Sign Up</h1>

              <form class="applicant-form" action="php/signup.php" method="post" onsubmit="return checkData()">
                <div class="row name-row-input">
                  <div class="col-sm-5">
                    <input id="create_firstname" class="create-nametext" type="text" name="user-firstname" placeholder="First Name">
                  </div>
                  <div class="col-sm-2 middle">
                    <input id="create_middlename" class="create-nametext" type="text" name="user-mi" maxlength="2" placeholder="M.I">
                  </div>
                  <div class="col-sm-5">
                    <input id="create_lastname" class="create-nametext" type="text" name="user-lastname" placeholder="Last Name">
                  </div>
                </div>
                <input id="create_username" class="textbox" type="text" name="user-username" placeholder="Username"><br/>
                <input id="create_homeaddress" class="textbox" type="text" name="user-address" placeholder="Home Address"><br/>
                <input id="create_email" class="textbox" type="text" name="user-email" placeholder="Email Address"><br/>
                <div class="row">
                  <div class="col-sm-6">
                    <input id="create_password" class="textbox" type="password" name="user-password" placeholder="Password"><br/>
                  </div>
                  <div class="col-sm-6">
                    <input id="create_confirmpass" class="textbox" type="password" name="user-confirmpassword" placeholder="Confirm Password" title="Re-enter your typed password"><br/>
                  </div>
                </div>

                <p class="bday-label">Birthday</p>
                <select class="select-year select-box" name="select-year">
                  <option selected="true" value="Year">Year</option>
                </select>
                <select class="select-month select-box" name="select-month">
                  <option selected="true" value="Month">Month</option>
                </select>
                <select class="select-date select-box" name="select-date">
                  <option selected="true" value="Date">Date</option>
                </select>

                <div id="incomplete-form">
                  <p class="incorrect-message d-flex justify-content-center"><strong>Error! </strong> Please fill out all required forms.</p>
                </div>
                <div id="password-mismatch">
                  <p class="incorrect-message d-flex justify-content-center"><strong>Error! </strong> Confirm password does not match.</p>
                </div>
                <div id="numeric-error">
                  <p class="incorrect-message d-flex justify-content-center"><strong>Error! </strong> Name should only contain alpha characters</p>
                </div>

                <?php if(isset($_GET['createerror']) && $_GET['createerror'] == "userExist") {?>
                  <div id="user-exist">
                    <p class="incorrect-message d-flex justify-content-center">A user with the same First name, Last name and Birthday already exist. If this is account is yours, please click Forgot Password.</p>
                  </div>
                <?php } if(isset($_GET['createerror']) && $_GET['createerror'] == "usernameFound") {?>
                  <div id="username-exist">
                    <p class="incorrect-message d-flex justify-content-center">Username already exist, please choose another username.</p>
                  </div>
                <?php } if(isset($_GET['createerror']) && $_GET['createerror'] == "invalidemail") {?>
                  <div id="invalid-email">
                    <p class="incorrect-message d-flex justify-content-center">Please enter a valid email address</p>
                  </div>
                <?php } ?>

                <input class="submit-btn" type="submit" name="submit-btn" value="Create Account">
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- End of Login/Signup Form -->
    <?php } ?>
    <!-- Start Of Footer -->
    <footer class="page-footer">
      <div class="footer-content">
        <div class="container">
          <div class="row">
            <div class="col-sm-6">
              <h1 class="footer-header">Forever Manpower Services, Inc.</h1>
              <p class="footer-text">POEA License No.: POEA-271-LB-121218-R</p>
              <p class="footer-text">Copyright © 2019</p>
            </div>
            <div class="col-sm-3">
              <h1 class="footer-header">Links</h1>
              <ol class="footer-list">
                <li class=""><a href="index.php">Home</a></li>
                <li class=""><a href="about.php">About Us</a></li>
                <li class=""><a href="#">Apply Now</a></li>
              </ol>
            </div>
            <div class="col-sm-3">
              <h1 class="footer-header">Emails</h1>
              <ol class="footer-list">
                <li class=""><a href="#" onclick="return showEmailOverlay('techsupp')">Tech Support</a></li>
                <li class=""><a href="#" onclick="return showEmailOverlay('business')">Business</a></li>
                <li class=""><a href="#" onclick="return showEmailOverlay('partner')">Partner</a></li>
              </ol>
            </div>
          </div>
        </div>
      </div>
      <div class="footer-credits">
        <p>© 2019 Copyright. Created by ADUInno</p>
      </div>
    </footer>
    <!-- End Of Footer -->
  </body>
</html>
