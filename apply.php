<?php include "php/connection.php";?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <title>Apply | Forever Manpower</title>
    <script src="scripts/jquery.min.js" charset="utf-8"></script>
    <script src="scripts/popper.min.js" charset="utf-8"></script>
    <script src="scripts/bootstrap.min.js" charset="utf-8"></script>
    <script src="scripts/applyjs.js" charset="utf-8"></script>
    <script src="scripts/main.js" charset="utf-8"></script>
    <link rel="stylesheet" href="styles/bootstrap/bootstrap.min.css" />
    <link rel="stylesheet" href="styles/main.css">
    <link rel="stylesheet" href="styles/apply.css">
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
      <div class="deleteapproval">
        <p class="approvalheader">Delete Confirmation</p>
        <p class="approvalmessage">Are you sure you want to delete the following<br /> application entry?</p>
        <div class="approvalbtncontainers d-flex justify-content-end align-items-end">
          <button onclick="hideOverlays()" class="approvalbtns button-approval btn-outline-secondary" type="button" name="button">No</button>
          <button class="approvalbtns deleteapproved button-approval btn-danger" type="button" name="button">Yes</button>
        </div>
      </div>
      <div class="forgotpassword">
        <p class="approvalheader">Reset Password</p>
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
          <li class="nav-item"><a class="nav-link nav-selected" href="#">Apply Now</a></li>
        </ul>
        <ul class="navbar-list-container navbar-list navbar-nav ml-auto">
          <?php if (!(isset($_SESSION['is_loggedin']) && $_SESSION['is_loggedin'])) {?>
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
              <a class="dropdown-item" href="lang/chn/apply.php">Chinese</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="lang/ar/apply.php">Arabic</a>
            </div>
          </li>
        </ul>
      </div>
    </nav>
    <!-- End Of Navigation -->
    <?php if (empty($_GET['status']) && !(isset($_SESSION['is_loggedin']) && $_SESSION['is_loggedin'])) {?>
      <!-- Start of Page Header -->
      <div class="header-image">
        <h1>Apply Now</h1>
      </div>
      <!-- End of Page Header -->
    <?php }?>
    <?php if ((isset($_SESSION['is_loggedin']) && $_SESSION['is_loggedin'])) {?>
      <!-- Start of User Page -->
      <div class="user-page">
        <!-- Start of Navigation Tabs -->
        <div class="container">
          <div class="btn-group" role="group" aria-label="Basic example">
            <button type="button" class="btn btn-secondary active" onclick="changeTab(0);">Application Status</button>
            <button type="button" class="btn btn-secondary" onclick="changeTab(1); initializeFirstApplicationTab();">Send Application</button>
          </div>
        </div>
        <!-- End of Navigation Tabs -->
      </div>
      <div class="account-navigation-container">
        <!-- Start of Send Application -->
        <div class="container send-application">
          <form class="send-application-form" action="php/sendapplication.php" method="post" enctype="multipart/form-data">
            <div class="row">
              <div class="col-sm-3">
                <ul class="list-group">
                  <li class="list-group-item header">Application Progress</li>
                  <li class="list-group-item d-flex">Personal Details <img class="pointer ml-auto" src="styles/resources/images/arrow-left.svg" width="15px" alt=""> </li>
                  <li class="list-group-item d-flex">Marital Status <img class="pointer ml-auto" src="styles/resources/images/arrow-left.svg" width="15px" alt=""></li>
                  <li class="list-group-item d-flex">Relatives <img class="pointer ml-auto" src="styles/resources/images/arrow-left.svg" width="15px" alt=""></li>
                  <li class="list-group-item d-flex">Contacts & Address <img class="pointer ml-auto" src="styles/resources/images/arrow-left.svg" width="15px" alt=""></li>
                  <li class="list-group-item d-flex">Education <img class="pointer ml-auto" src="styles/resources/images/arrow-left.svg" width="15px" alt=""></li>
                  <li class="list-group-item d-flex">Employment <img class="pointer ml-auto" src="styles/resources/images/arrow-left.svg" width="15px" alt=""></li>
                  <li class="list-group-item d-flex">Image & Job Application <img class="pointer ml-auto" src="styles/resources/images/arrow-left.svg" width="15px" alt=""></li>
                </ul>
              </div>
              <div class="col-sm-9">
                <!-- Start of Personal Details -->
                <div class="application-tab">
                  <div class="d-flex justify-content-between">
                    <div>
                      <p>Personal Details</p>
                    </div>
                    <div>
                      <p class="message-asterisks">Note: Fields with asterisks(*) are required. If you have no middle name kindly enter 'n/a'</p>
                    </div>
                  </div>
                  <!-- Firstname, Middlename, Surname -->
                  <div class="row">
                    <div class="col-sm-4">
                      <label for="">First Name <span class="important">*</span></label>
                      <input class="textbox" type="text" name="firstname" value="<?php echo $_SESSION['firstname']?>">
                    </div>
                    <div class="col-sm-4">
                      <label for="">Middle Name <span class="important">*</span></label>
                      <input class="textbox" type="text" name="middlename" value="">
                    </div>
                    <div class="col-sm-4">
                      <label for="">Surname <span class="important">*</span></label>
                      <input class="textbox" type="text" name="lastname" value="<?php echo $_SESSION['lastname']?>">
                    </div>
                  </div>
                  <!-- Birthday, Age, Blood Type -->
                  <div class="row">
                    <div class="col-sm-3">
                      <label for="">Birthday </label>
                      <input class="textbox" type="text" name="birthdate" value="<?php echo $_SESSION['birthdate']?>">
                    </div>
                    <div class="col-sm-2">
                      <label for="">Age </label>
                          <input class="textbox numerictextbox" type="text" name="age" placeholder="Ex. 42">
                    </div>
                    <div class="col-sm-3">
                      <label for="">Blood Type </label>
                      <input class="textbox numerictextbox" type="text" name="bloodtype" placeholder="Ex. O">
                    </div>
                  </div>
                  <!-- Height, Weight -->
                  <div class="row">
                    <div class="col-sm-3">
                      <label for="">Height(cm) </label>
                      <input class="textbox numerictextbox" type="text" name="height" placeholder="Ex. 400">
                    </div>
                    <div class="col-sm-3">
                      <label for="">Weight(kg) </label>
                      <input class="textbox numerictextbox" type="text" name="weight" placeholder="Ex. 40">
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-5">
                      <label>Language</label><br />
                      <input type="checkbox" name="languages" class="langcheck" value="English"><label class="radio-checkbox-label">English</label>
                      <input type="checkbox" name="languages" class="langcheck" value="Tagalog"><label class="radio-checkbox-label">Tagalog</label>
                      <input type="checkbox" name="languages" class="langcheck" value="Other"><label class="radio-checkbox-label">Other</label>
                      <input class="textbox langcheck"type="text" name="languages-text" placeholder="Fill if others is checked. Ex. Nihongo">
                      <p class="otherlangmess">Please fill up other languages textbox above</p>
                    </div>
                    <div class="col-sm-6">
                      <label>Religion</label><br />
                      <input type="radio" name="religion" value="Catholic"><label class="radio-checkbox-label">Catholic</label>
                      <input type="radio" name="religion" value="Christian"><label class="radio-checkbox-label">Christian</label>
                      <input type="radio" name="religion" value="Muslim"><label class="radio-checkbox-label">Muslim</label>
                    </div>
                  </div>
                </div>
                <!-- Marital Status -->
                <div class="application-tab">
                  <div class="d-flex justify-content-between">
                    <div>
                      <p>Marital Status</p>
                    </div>
                    <div>
                      <p class="message-asterisks">Note: Fields with asterisks(*) are required</p>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-3">
                      <label>Marital Status <span class="important">*</span></label>
                      <select class="select-box" name="maritalstatus">
                        <option value="Single">Single</option>
                        <option value="Married">Married</option>
                        <option value="Separated">Separate</option>
                        <option value="Single Parent">Single Parent</option>
                        <option value="Live-in">Live In</option>
                        <option value="Widow">Widow</option>
                      </select>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-4">
                      <label>Spouse Name</label>
                      <input class="textbox" type="text" name="spousename" placeholder="Ex. Mary Jane Dela Cruz">
                    </div>
                    <div class="col-sm-4">
                      <label>Married Date</label>
                      <input class="textbox" type="text" name="marrieddate" placeholder="Ex. MM-DD-YYYY">
                    </div>
                    <div class="col-sm-4">
                      <label>Child Ages</label>
                      <input class="textbox" type="text" name="childages" placeholder="Ex. 13, 6, 3">
                    </div>
                  </div>
                </div>
                <!-- Families' Ages -->
                <div class="application-tab">
                  <div class="d-flex justify-content-between">
                    <div>
                      <p>Relatives</p>
                    </div>
                    <div>
                      <p class="message-asterisks">Note: Fields with asterisks(*) are required</p>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-3">
                      <label>Brother Age</label>
                      <input class="textbox numerictextbox" type="text" name="brotherage" placeholder="Ex. 32">
                    </div>
                    <div class="col-sm-3">
                      <label>Sister Age</label>
                      <input class="textbox numerictextbox" type="text" name="sisterage" placeholder="Ex. 30">
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-3">
                      <label>Father Age</label>
                      <input class="textbox numerictextbox" type="text" name="fatherage" placeholder="Ex. 55">
                      <input type="checkbox" name="fatherdeceased" value="yes"><label class="radio-checkbox-label">Deceased</label>
                    </div>
                    <div class="col-sm-3">
                      <label>Mother Age</label>
                      <input class="textbox numerictextbox" type="text" name="motherage" placeholder="Ex. 54">
                      <input type="checkbox" name="motherdeceased" value="yes"><label class="radio-checkbox-label">Deceased</label>
                    </div>
                  </div>
                </div>
                <!-- Families' Ages -->
                <div class="application-tab">
                  <div class="d-flex justify-content-between">
                    <div>
                      <p>Contact & Address</p>
                    </div>
                    <div>
                      <p class="message-asterisks">Note: Fields with asterisks(*) are required</p>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-5">
                      <label>Address</label>
                      <input class="textbox" type="text" name="address" placeholder="" value="<?php echo $_SESSION['address']?>">
                    </div>
                    <div class="col-sm-4">
                      <label>City</label>
                      <input class="textbox" type="text" name="city" placeholder="City">
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-3">
                      <label>Contact 1 <span class="important">*</span></label>
                      <input class="textbox numerictextbox" type="text" name="contact1" placeholder="Ex. 09154232232">
                    </div>
                    <div class="col-sm-3">
                      <label>Contact 2 <span class="important">*</span></label>
                      <input class="textbox numerictextbox" type="text" name="contact2" placeholder="Ex. 09154232232">
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-3">
                      <label>Emergency Contact <span class="important">*</span> </label>
                      <input class="textbox numerictextbox" type="text" name="emergencycontact" placeholder="Ex. 09157889024">
                    </div>
                    <div class="col-sm-3">
                      <label>Relation <span class="important">*</span> </label>
                      <input class="textbox" type="text" name="relation" placeholder="Ex. Mother">
                    </div>
                  </div>
                </div>
                <div class="application-tab">
                  <div class="d-flex justify-content-between">
                    <div>
                      <p>Education</p>
                    </div>
                    <div>
                      <p class="message-asterisks">Note: Fields with asterisks(*) are required</p>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-9">
                      <label>Attainment <span class="important">*</span></label><br />
                      <input type="radio" name="attainment" value="High School"><label class="radio-checkbox-label">High School</label>
                      <input type="radio" name="attainment" value="Vocational / Technical / TESDA"><label class="radio-checkbox-label">Vocational / Technical / TESDA</label>
                      <input type="radio" name="attainment" value="University"><label class="radio-checkbox-label">College / University</label>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-4">
                      <label>Course <span class="important">*</span></label>
                      <input class="textbox" type="text" name="course" placeholder="Ex. BS Computer Engineering">
                    </div>
                    <div class="col-sm-2">
                      <label>Study Years <span class="important">*</span></label>
                      <input class="textbox" type="text" name="studyyears" placeholder="Ex. 5">
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-3">
                      <label>Graduated <span class="important">*</span></label><br />
                      <input type="radio" name="graduated" value="yes"><label class="radio-checkbox-label">Yes</label>
                      <input type="radio" name="graduated" value="no"><label class="radio-checkbox-label">No</label>
                    </div>
                  </div>
                </div>
                <div class="application-tab">
                  <div class="d-flex justify-content-between">
                    <div>
                      <p>Employment</p>
                    </div>
                    <div>
                      <p class="message-asterisks">Note: Fields with asterisks(*) are required</p>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-4">
                      <label>Employer <span class="important">*</span></label>
                      <input class="textbox" type="text" name="employer" placeholder="">
                    </div>
                    <div class="col-sm-4">
                      <label>Country/Years From To <span class="important">*</span></label>
                      <input class="textbox" type="text" name="countryyeasfromto" placeholder="">
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-4">
                      <label>Product/Industry <span class="important">*</span></label>
                      <input class="textbox" type="text" name="productindustry" placeholder="">
                    </div>
                    <div class="col-sm-4">
                      <label>Position <span class="important">*</span></label>
                      <input class="textbox" type="text" name="position" placeholder="">
                    </div>
                    <div class="col-sm-4">
                      <label>Leave Reason <span class="important">*</span></label>
                      <input class="textbox" type="text" name="leavereason" placeholder="">
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-4">
                      <label>Employer (2)</label>
                      <input class="textbox" type="text" name="employer2" placeholder="">
                    </div>
                    <div class="col-sm-4">
                      <label>Country/Years From To (2)</label>
                      <input class="textbox" type="text" name="countryyeasfromto2" placeholder="">
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-4">
                      <label>Product/Industry (2)</label>
                      <input class="textbox" type="text" name="productindustry2" placeholder="">
                    </div>
                    <div class="col-sm-4">
                      <label>Position (2)</label>
                      <input class="textbox" type="text" name="position2" placeholder="">
                    </div>
                    <div class="col-sm-4">
                      <label>Leave Reason (2)</label>
                      <input class="textbox" type="text" name="leavereason2" placeholder="">
                    </div>
                  </div>
                </div>
                <div class="application-tab">
                  <div class="d-flex justify-content-between">
                    <div>
                      <p>Image & Job Application</p>
                    </div>
                    <div>
                      <p class="message-asterisks">Note: Fields with asterisks(*) are required</p>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-5">
                      <label>Upload 2x2 or Passport Size Image <span class="important">*</span></label>
                      <div class="image d-flex justify-content-center align-items-center">
                        <img id="targetImg" class="user-image" src="styles/resources/images/user.svg" width="192px" height="192px" alt="">
                      </div>
                      <label class="file-upload"> Choose Image
                        <input id="picturesrc" type="file" size="100" name='image' onchange="loadFile(event)" >
                      </label>
                    </div>
                    <div class="col-sm-6">
                      <label>Please check desired job application <span class="important">*</span></label>
                      <div class="row">
                        <div class="col-sm-6">
                          <label>Taiwan</label><br />
                          <input type="checkbox" name="job1" <?php if (strpos($_SESSION['applications'], "Male Factory Worker") > 0) { ?> disabled="disabled" <?php } ?> value="Male Factory Worker"><label class="radio-checkbox-label">Male Factory Worker</label><br/>
                          <input type="checkbox" name="job2" <?php if (strpos($_SESSION['applications'], "Female Factory Worker") > 0) { ?> disabled="disabled" <?php } ?> value="Female Factory Worker"><label class="radio-checkbox-label">Female Factory Worker</label><br/>
                          <input type="checkbox" name="job3" <?php if (strpos($_SESSION['applications'], "Male Nursing Aide") > 0) { ?> disabled="disabled" <?php } ?> value="Male Nursing Aide"><label class="radio-checkbox-label">Male Nursing Aide</label><br/>
                          <input type="checkbox" name="job4" <?php if (strpos($_SESSION['applications'], "Female Nursing Aide") > 0) { ?> disabled="disabled" <?php } ?> value="Female Nursing Aide"><label class="radio-checkbox-label">Female Nursing Aide</label><br/>
                          <input type="checkbox" name="job5" <?php if (strpos($_SESSION['applications'], "Female Caretakers") > 0) { ?> disabled="disabled" <?php } ?> value="Female Caretakers"><label class="radio-checkbox-label">Female Caretakers</label><br/>
                        </div>
                        <div class="col-sm-6">
                          <label>Oman / Saudi / Qatar</label><br />
                          <input type="checkbox" name="job6" <?php if (strpos($_SESSION['applications'], "Female Domestic Helpers")> 0) { ?> disabled="disabled" <?php } ?> value="Female Domestic Helpers"><label class="radio-checkbox-label">Female Domestic Helpers</label><br/>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- Submit tab -->
                <div class="d-flex justify-content-end">
                  <button id="incomplete-details" class="changebtn" type="button" name="button" onclick=""> <img src="styles/resources/images/exclamation-circle.svg" width="15px" alt="exclamation image"> Please fill out all necessary details.</button>
                  <button id="prev-btn" class="changebtn" type="button" name="button" onclick="showApplicationTab('sub')">Previous</button>
                  <button id="next-btn" class="changebtn" type="button" name="button" onclick="showApplicationTab('add')">Next</button>
                  <button id="submit-btn" type="button" name="button" onclick="checkSubmit()">Submit Application</button>
                </div>
              </div>
            </div>
          </form>
        </div>
        <!-- Start of Application Status -->
        <div class="container application-status">
          <p class="application-list">Application Status List</p>
          <?php if (isset($_SESSION['applications']) && !preg_match("/[a-zA-Z]/", $_SESSION['applications'])) { ?>
            <div class="empty-application">
              <img src="styles/resources/images/folder-open.svg" width="150px" alt="empty icon">
              <p>Oops! You have not submitted any applications yet.</p>
              <p>To fill up an application, click the 'Send Application' button above.</p>
            </div>
          <?php }
          else if (isset($_SESSION['applications'])) {
            $fetch_applications = "select * from applicant_applications where applicant_id = ?";
            $fetch_stmt = mysqli_stmt_init($conn);

            if (mysqli_stmt_prepare($fetch_stmt, $fetch_applications)) {
              mysqli_stmt_bind_param($fetch_stmt, "i", $_SESSION['id']);
              mysqli_stmt_execute($fetch_stmt);

              $result = mysqli_stmt_get_result($fetch_stmt);

              ?>
              <div class="">
                <?php
                  while ($row = mysqli_fetch_assoc($result)) {
                    $param = $row['application_uid'] . "-". $row['application_name'] .'-'. $row['applicant_id'];
                    ?>
                      <div class="card">
                        <div class="card-body">
                          <div class="d-flex justify-content-between">
                            <div>
                              <h5 class="card-title"><?php echo $row['application_name'] ?></h5>
                            </div>
                            <div>
                              <button class="trashicon" onclick="showApplyDeleteApproval('<?php echo $param ?>') "type="button" name="button"><img src="styles/resources/images/trash-alt.svg" width="20px" alt="trash icon"></button>
                            </div>
                          </div>
                          <p class="card-text"><small class="text-muted">Application Status: <?php echo $row['application_status'] ?> </small></p>
                          <p class="card-text"><small class="text-muted">Application Created: <?php echo $row['application_created'] ?> </small></p>
                        </div>
                      </div>
                    <?php
                  }
                 ?>
              </div>
              <?php
            }
          }?>
        </div>
        <!-- End of Application Status -->
      </div>
      <!-- End of User Page -->
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
                <?php }?>

                <input class="submit-btn" type="submit" name="submit-btn" value="Create Account">
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- End of Login/Signup Form -->
    <?php } ?>
    <?php if(!empty($_GET['status'])) {?>
      <!-- Start Of Success Page -->
      <div class="container d-flex flex-column success-message">
        <div class="d-flex justify-content-center">
          <img class="success-icon" src="styles/resources/images/check_icon.svg" alt="success image">
        </div>
        <div class="d-flex justify-content-center">
          <h1 class="signup-success">You have signed up successfully</h1>
        </div>
        <div class="d-flex justify-content-center">
          <p>Thank you for signing up!</p>
        </div>
        <div class="d-flex justify-content-center">
          <p><a href="apply.php">Click here</a> to return to the login page and login to your account.</p>
        </div>
      </div>
      <!-- End Of Success Page -->
    <?php }?>
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
