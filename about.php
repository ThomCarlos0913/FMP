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
    <script src="scripts/main.js" charset="utf-8"></script>
    <link rel="stylesheet" href="styles/bootstrap/bootstrap.min.css" />
    <link rel="stylesheet" href="styles/main.css">
    <link rel="stylesheet" href="styles/about.css">
    <link rel="stylesheet" href="styles/home.css">
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
          <li class="nav-item"><a class="nav-link nav-selected" href="#">About Us</a></li>
          <li class="nav-item"><a class="nav-link" href="apply.php">Apply Now</a></li>
        </ul>
        <ul class="navbar-list-container navbar-list navbar-nav ml-auto">
          <?php if (empty($_GET['status']) && !(isset($_SESSION['is_loggedin']) && $_SESSION['is_loggedin'])) {?>
            <li class="nav-item"><a class="nav-link" href="account.php">Sign in</a></li>
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
              <a class="dropdown-item" href="lang/chn/about.php">Chinese</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="lang/ar/about.php">Arabic</a>
            </div>
          </li>
        </ul>
      </div>
    </nav>
    <!-- End Of Navigation -->
    <!-- Start of Page Header -->
    <div class="header-image">
      <h1>About Us</h1>
    </div>
    <!-- End of Page Header -->
    <!-- Start of About Us Content -->
    <div class="container">
      <div class="row">
        <div class="about col-sm-12">
          <p><strong>FOREVER MANPOWER SERVICES, INC.</strong> is a company duly organized and  existing under and by virtue of the laws of the
              Republic of the Philippines and is registered with the Securities and Exchange Commission under the S.E.C Reg. No
              A1996-04488 dated August 19 1996 and licensed as Private Employment Agency by the Philippine Overseas Employment
              Administration (POEA), Department of Labor and Employment (DOLE) on November 29 2006 under license number
              POEA-231-LB-121906, to recruit, process and deploy Filipino workers for overseas employment.</p>
          <p>The Company was established primarily to meet the increasing demand for manpower supply in different countries of
              the world with qualified Filipino workers who underwent the highest standard of selection and recruitment processes.
              The Company is also committed to provide client satisfaction in the highest order and is likewise committed to safeguard
              and protect its worker-recruits welfare and interest and to promote the image of Philippines overseas. The Company
              specializes in the location, selection and deployment of Filipino Professionals for medical services, hotel management
              and operation, engineers, craftsmen and technicians for communication facilities and petrochemical plants construction,
              maintenance and operation to all parts of the world. FOREVER MANPOWER employs this unique setup and system to
              ensure the availability of capable and reliable pool of manpower - specially trained and intended for tougher assignments
              abroad.</p>
          <p>The worldwide distribution and deployment of well-trained and highly motivated core group of professionals; high skilled
            and semi-skilled workers are the paramount concert and goal of <strong>FOREVER MANPOWER SERVICES, INC.</strong></p>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-6">
          <h1 class="header-1">Vision</h1>
          <p class="vision-mission">To contribute in the development of lives of our <br />
              Migrant Workers by providing them employment<br />
              opportunities globally and aide in sustaining the<br />
              stability of the country's economy through<br />
              remittance.</p>
        </div>
        <div class="col-sm-6">
          <h1 class="header-1">Mission</h1>
          <p class="vision-mission">To produce globally competent<br />
              Migrant Workers that engage and contribute<br />
              to the wellness of their respective employers.</p>
        </div>
      </div>
    </div>
    <!-- End of About Us Content -->
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
                <li class=""><a href="#">About Us</a></li>
                <li class=""><a href="apply.php">Apply Now</a></li>
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
