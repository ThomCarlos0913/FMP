<?php include "php/connection.php";

if (isset($_SESSION['is_adminloggedin']) && $_SESSION['is_adminloggedin'] == 1) {?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <title>Admin | Forever Manpower</title>
    <script src="scripts/jquery.min.js" charset="utf-8"></script>
    <script src="scripts/popper.min.js" charset="utf-8"></script>
    <script src="scripts/bootstrap.min.js" charset="utf-8"></script>
    <script src="scripts/admin.js" charset="utf-8"></script>
    <link rel="stylesheet" href="styles/bootstrap/bootstrap.min.css" />
    <link rel="stylesheet" href="styles/main.css">
    <link rel="stylesheet" href="styles/adminpage.css">
  </head>
  <body>
    <div class="overlay">
      <div class="deleteapproval">
        <p class="approvalheader">Delete Confirmation</p>
        <p class="approvalmessage"></p>
        <div class="approvalbtncontainers d-flex justify-content-end align-items-end">
          <button onclick="hideOverlays()" class="approvalbtns btn btn-outline-secondary" type="button" name="button">No</button>
          <button class="approvalbtns deleteapproved btn btn-danger" type="button" name="button">Yes</button>
        </div>
      </div>
      <div class="biodatacontainer">
        <div class="d-flex justify-content-end">
          <button onclick="closeBiodata()" class="closebutton" type="button" name="button">&#10006;</button>
        </div>
        <div class="biodata">
          <span>
            <div class="dataname">
              <p class="namelabel">First Name</p>
              <p class="name" id="firstname"></p>
            </div>
            <div class="dataname">
              <p class="namelabel">Middle Name</p>
              <p class="name" id="middlename"></p>
            </div>
            <div class="dataname">
              <p class="namelabel">Last Name</p>
              <p class="name" id="lastname"></p>
            </div>
          </span>
          <form class="" action="index.html" method="post">
            <div class="row">
              <div class="col-sm-5">
                <p class="dataentry"> <span class="datalabel">Birthday:</span> <input type="text" class="datavalue" id="birthdate"> </p>
                <p class="dataentry"> <span class="datalabel">Age:</span> <input type="text" class="datavalue" id="age"> </p>
                <p class="dataentry"> <span class="datalabel">Blood Type:</span> <input type="text" class="datavalue" id="bloodtype"> </p>
                <p class="dataentry"> <span class="datalabel">Weight (kg):</span> <input type="text" class="datavalue" id="weight"> </p>
                <p class="dataentry"> <span class="datalabel">Height (cm):</span> <input type="text" class="datavalue" id="height"> </p>
                <p class="dataentry"> <span class="datalabel">Language:</span> <input type="text" class="datavalue" id="language"> </p>
                <p class="dataentry"> <span class="datalabel">Religion:</span> <input type="text" class="datavalue" id="religion"> </p>
                <p class="dataentry"> <span class="datalabel">Marital Status:</span> <input type="text" class="datavalue" id="maritalstatus"> </p>
                <p class="dataentry"> <span class="datalabel">Spouse Name:</span> <input type="text" class="datavalue" id="spousename"> </p>
                <p class="dataentry"> <span class="datalabel">Married Date:</span> <input type="text" class="datavalue" id="marrieddate"> </p>
                <p class="dataentry"> <span class="datalabel">Child Ages:</span> <input type="text" class="datavalue" id="childages"> </p>
                <p class="dataentry"> <span class="datalabel">Brother Age:</span> <input type="text" class="datavalue" id="brotherage"> </p>
                <p class="dataentry"> <span class="datalabel">Sister Age:</span> <input type="text" class="datavalue" id="sisterage"> </p>
                <p class="dataentry"> <span class="datalabel">Father Age:</span> <input type="text" class="datavalue" id="fatherage"> </p>
                <p class="dataentry"> <span class="datalabel">Mother Age:</span> <input type="text" class="datavalue" id="motherage"> </p>
              </div>
              <div class="col-sm-5">
                <p class="dataentry"> <span class="datalabel2">Address:</span> <input type="text" class="datavalue" id="address"></ </p>
                <p class="dataentry"> <span class="datalabel2">City:</span> <input type="text" class="datavalue" id="city"></ </p>
                <p class="dataentry"> <span class="datalabel2">Contact 1:</span> <input type="text" class="datavalue" id="contact1"></ </p>
                <p class="dataentry"> <span class="datalabel2">Contact 2:</span> <input type="text" class="datavalue" id="contact2"></ </p>
                <p class="dataentry"> <span class="datalabel2">Emergency Contact:</span> <input type="text" class="datavalue" id="emergencycontact"> </p>
                <p class="dataentry"> <span class="datalabel2">Relation:</span> <input type="text" class="datavalue" id="relation"> </p>
                <p class="dataentry"> <span class="datalabel2">Attainment:</span> <input type="text" class="datavalue" id="attainment"> </p>
                <p class="dataentry"> <span class="datalabel2">Course:</span> <input type="text" class="datavalue" id="course"> </p>
                <p class="dataentry"> <span class="datalabel2">Study Years:</span> <input type="text" class="datavalue" id="studyyears"> </p>
                <p class="dataentry"> <span class="datalabel2">Graduated:</span> <input type="text" class="datavalue" id="graduated"> </p>
                <p class="dataentry"> <span class="datalabel2">Employer:</span> <input type="text" class="datavalue" id="employer"> </p>
                <p class="dataentry"> <span class="datalabel2">Country/Years From To:</span> <input type="text" class="datavalue" id="countryyearsfromto"> </p>
                <p class="dataentry"> <span class="datalabel2">Product/Industry:</span> <input type="text" class="datavalue" id="productindustry"> </p>
                <p class="dataentry"> <span class="datalabel2">Position:</span> <input type="text" class="datavalue" id="position"> </p>
                <p class="dataentry"> <span class="datalabel2">Leave Reason:</span> <input type="text" class="datavalue" id="leavereason"> </p>
              </div>
              <div class="row">
                <img id="image" src="" alt="applicant image" width="192px" height="192px">
              </div>
            </div>
            <div class="row">
              <p class="idlabel">APPLICANT ID NUMBER: <span class="idnumber"></span> </p>
            </div>
          </form>
          <div class="row d-flex justify-content-end">
            <button class="updatebutton" type="button" name="button" onclick="return updateapplicant()">Update Biodata</button>
          </div>
        </div>
      </div>
    </div>
    <!-- Start of navigation bar -->
    <nav class="navbar navbar-expand-md bg-light navbar-light">
      <button class="navbar-toggler" data-toggle="collapse" data-target="#collapse_navbar">
        <span class="navbar-toggler-icon"></span>
      </button>
      <span class="brand-text-small navbar-text navbar-brand">Admin <span class="fmp">Forever Manpower</span></span>
      <div class="collapse navbar-collapse" id="collapse_navbar">
        <span class="brand-text navbar-text navbar-brand"><span class="fmp">Administrator</span> Forever Manpower</span>
        <ul class="navbar-list-container navbar-list navbar-nav ml-auto">
          <a href="php/adminsignout.php">Logout</a>
        </ul>
      </div>
    </nav>
    <!-- End of navigation bar -->
    <!-- Start of Body -->
    <ul class="nav nav-tabs controlpanel">
      <li class="spacer"></li>
      <li class="nav-item">
        <a class="tab nav-link active" href="#" onclick="changeAdminTab(1)">Applicant Applications</a>
      </li>
      <li class="nav-item">
        <a class="tab nav-link" href="#" onclick="changeAdminTab(2)">Admin Creation</a>
      </li>
    </ul>
    <div class="controlbody">
      <div class="pendingapplications">
        <div class="tableoptions">
          <div class="dropdown filterdropdown">
            <span class="filter-stats">Job Filter: </span>
            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <?php
                if (isset($_GET['filter'])) {
                  switch ($_GET['filter']) {
                    case 'malefactoryworker':
                        ?>Male Factory Worker<?php
                      break;
                    case 'malenursingaide':
                        ?>Male Nursing Aide<?php
                      break;
                    case 'femalefactoryworker':
                        ?>Female Factory Worker<?php
                      break;
                    case 'femalenursingaide':
                        ?>Female Nursing Aide<?php
                      break;
                    case 'femalecaretakers':
                        ?>Female Caretakers<?php
                      break;
                    case 'femaledomestichelper':
                        ?>Female Domestic Helpers<?php
                      break;
                  }
                }
                else {
                  ?>All<?php
                }
              ?>
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
              <?php if (isset($_GET['status']) && $_GET['status'] == 'approved'){
                ?>
                <a class="dropdown-item" href="adminpage.php?status=approved">All</a>
                <a class="dropdown-item" href="adminpage.php?status=approved&filter=malefactoryworker">Male Factory Worker</a>
                <a class="dropdown-item" href="adminpage.php?status=approved&filter=malenursingaide">Male Nursing Aide</a>
                <a class="dropdown-item" href="adminpage.php?status=approved&filter=femalefactoryworker">Female Factory Worker</a>
                <a class="dropdown-item" href="adminpage.php?status=approved&filter=femalenursingaide">Female Nursing Aide</a>
                <a class="dropdown-item" href="adminpage.php?status=approved&filter=femalecaretakers">Female Caretakers</a>
                <a class="dropdown-item" href="adminpage.php?status=approved&filter=femaledomestichelper">Female Domestic Helpers</a>
                <?php
              }
              else {
                ?>
                <a class="dropdown-item" href="adminpage.php">All</a>
                <a class="dropdown-item" href="adminpage.php?filter=malefactoryworker">Male Factory Worker</a>
                <a class="dropdown-item" href="adminpage.php?filter=malenursingaide">Male Nursing Aide</a>
                <a class="dropdown-item" href="adminpage.php?filter=femalefactoryworker">Female Factory Worker</a>
                <a class="dropdown-item" href="adminpage.php?filter=femalenursingaide">Female Nursing Aide</a>
                <a class="dropdown-item" href="adminpage.php?filter=femalecaretakers">Female Caretakers</a>
                <a class="dropdown-item" href="adminpage.php?filter=femaledomestichelper">Female Domestic Helpers</a>
                <?php
              }
              ?>
            </div>
          </div>
          <!-- -->
          <div class="dropdown filterdropdown statfilter">
            <span class="filter-stats">Status Filter: </span>
            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <?php
                if (isset($_GET['status'])) {
                  if ($_GET['status'] == 'approved') {
                    ?>Approved<?php
                  }
                }
                else{
                  ?>Pending<?php
                }
              ?>
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
              <a class="dropdown-item" href="adminpage.php">Pending</a>
              <a class="dropdown-item" href="adminpage.php?status=approved">Approved</a>
            </div>
          </div>
        </div>
        <div class="tablecontainer">
          <table class="table table-striped">
            <thead class="thead-dark">
              <tr>
                <th scope="col">#</th>
                <th scope="col">Full Name</th>
                <th scope="col">Job Application</th>
                <th scope="col">Status</th>
                <th scope="col">Biodata</th>
                <th scope="col"></th>
                <th scope="col"></th>
              </tr>
            </thead>
            <tbody class="tablebody">
              <?php
                if (isset($_GET['status']) && $_GET['status'] == 'approved') {
                  if (isset($_GET['filter'])) {
                    switch ($_GET['filter']) {
                      case 'malefactoryworker':
                          $fetch_applications = "select * from applicant_applications where application_status = 'Approved' and application_name = 'Male Factory Worker'";
                        break;
                      case 'malenursingaide':
                          $fetch_applications = "select * from applicant_applications where application_status = 'Approved' and application_name = 'Male Nursing Aide'";
                        break;
                      case 'femalefactoryworker':
                          $fetch_applications = "select * from applicant_applications where application_status = 'Approved' and application_name = 'Female Factory Worker'";
                        break;
                      case 'femalenursingaide':
                          $fetch_applications = "select * from applicant_applications where application_status = 'Approved' and application_name = 'Female Nursing Aide'";
                        break;
                      case 'femalecaretakers':
                          $fetch_applications = "select * from applicant_applications where application_status = 'Approved' and application_name = 'Female Caretakers'";
                        break;
                      case 'femaledomestichelper':
                          $fetch_applications = "select * from applicant_applications where application_status = 'Approved' and application_name = 'Female Domestic Helpers'";
                        break;
                    }
                  }
                  else {
                    $fetch_applications = "select * from applicant_applications where application_status = 'Approved'";
                  }
                }
                else {
                  if (isset($_GET['filter'])) {
                    switch ($_GET['filter']) {
                      case 'malefactoryworker':
                          $fetch_applications = "select * from applicant_applications where application_status = 'Pending' and application_name = 'Male Factory Worker'";
                        break;
                      case 'malenursingaide':
                          $fetch_applications = "select * from applicant_applications where application_status = 'Pending' and application_name = 'Male Nursing Aide'";
                        break;
                      case 'femalefactoryworker':
                          $fetch_applications = "select * from applicant_applications where application_status = 'Pending' and application_name = 'Female Factory Worker'";
                        break;
                      case 'femalenursingaide':
                          $fetch_applications = "select * from applicant_applications where application_status = 'Pending' and application_name = 'Female Nursing Aide'";
                        break;
                      case 'femalecaretakers':
                          $fetch_applications = "select * from applicant_applications where application_status = 'Pending' and application_name = 'Female Caretakers'";
                        break;
                      case 'femaledomestichelper':
                          $fetch_applications = "select * from applicant_applications where application_status = 'Pending' and application_name = 'Female Domestic Helpers'";
                        break;
                    }
                  }
                  else {
                    $fetch_applications = "select * from applicant_applications where application_status = 'Pending'";
                  }
                }

                $fetch_stmt = mysqli_stmt_init($conn);

                if (mysqli_stmt_prepare($fetch_stmt, $fetch_applications)) {
                  mysqli_stmt_execute($fetch_stmt);

                  $result = mysqli_stmt_get_result($fetch_stmt);

                  while ($row = mysqli_fetch_assoc($result)) {
                    $param = $row['application_uid'] . "-". $row['application_name'] .'-'. $row['applicant_id'];
              ?>
                    <tr>
                      <th scope="row"><?php echo $row['application_id'] ?></th>
                      <td><?php echo $row['applicant_name'] ?></td>
                      <td><?php echo $row['application_name'] ?></td>
                      <td><?php echo $row['application_status'] ?></td>
                      <td><button onclick="showBiodata('<?php echo $row['application_uid'] ?>')" class="tablebutton" type="button" name="viewbutton">View Biodata</button></td>
                      <?php if (!isset($_GET['status'])) {
                        ?><td><button onclick="approveApplication('<?php echo $param ?>')" class="tablebutton approvebutton" type="button" name="deletebutton">Approve</button></td><?php
                      } else {
                        ?><td></td><?php
                      }?>
                      <td><button onclick="showDeleteApproval('<?php echo $param ?>', 1)" class="tablebutton deletebutton" type="button" name="deletebutton">Delete</button></td>
                    </tr>
              <?php }
              }?>
            </tbody>
          </table>
        </div>
      </div>
      <div class="admincreator">
        <div class="row">
          <div class="col-sm-4">
            <p class="note">Fields with (*) are required.</p>
            <form class="" action="" method="post">
              <label class="lbl">Full Name <span class="important">*</span> </label><br />
              <input class="textbox" type="text" name="fullname" /><br/>
              <label class="lbl">Username <span class="important">*</span> </label><br />
              <input class="textbox" type="text" name="username" /><br/>
              <label class="lbl">Password <span class="important">*</span> </label><br />
              <input class="textbox" type="password" name="password" /><br/>
              <label class="lbl">Confirm Password <span class="important">*</span> </label><br />
              <input class="textbox" type="password" name="confirmpassword" /><br/>

              <div class="d-flex justify-content-between">
                <div>
                  <input type="submit" class="formbtn" onclick="return createAdmin();" value="Create Admin">
                </div>
                <div>
                  <input type="submit" onclick="clearData(); return false;" class="formbtn" value="Clear">
                </div>
              </div>
            </form>
            <p class="createfeedback">Sample Error Message</p>
          </div>
        </div>
      </div>
      <div class="systemlogs">
      </div>
    </div>
    <!-- End of body -->
  </body>
</html>

<?php } else {header("Location: adminlogin.php");} ?>
