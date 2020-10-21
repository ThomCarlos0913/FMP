<?php
  include "connection.php";

  // initialize variables
  // personal details
  $firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
  $middlename = mysqli_real_escape_string($conn, $_POST['middlename']);
  $lastname = mysqli_real_escape_string($conn, $_POST['lastname']);
  $birthdate = mysqli_real_escape_string($conn, $_POST['birthdate']);
  $age = mysqli_real_escape_string($conn, $_POST['age']);
  $bloodtype = mysqli_real_escape_string($conn, $_POST['bloodtype']);
  $height = mysqli_real_escape_string($conn, $_POST['height']);
  $weight = mysqli_real_escape_string($conn, $_POST['weight']);
  $language = isset($_POST['languages']) ? mysqli_real_escape_string($conn, $_POST['languages']) : mysqli_real_escape_string($conn, 'n/a');
  $religion = isset($_POST['religion']) ? mysqli_real_escape_string($conn, $_POST['religion']) : mysqli_real_escape_string($conn, 'n/a');
  $image = mysqli_real_escape_string($conn, $_FILES['image']['name']);

  // marital status
  $maritalstatus = mysqli_real_escape_string($conn, $_POST['maritalstatus']);
  $spousename = mysqli_real_escape_string($conn, $_POST['spousename']);
  $marrieddate = mysqli_real_escape_string($conn, $_POST['marrieddate']);
  $childages = mysqli_real_escape_string($conn, $_POST['childages']);

  // relatives
  $brotherage = mysqli_real_escape_string($conn, $_POST['brotherage']);
  $sisterage = mysqli_real_escape_string($conn, $_POST['sisterage']);
  $fatherage = mysqli_real_escape_string($conn, $_POST['fatherage']);
  $motherage = mysqli_real_escape_string($conn, $_POST['motherage']);
  $fatherdeceased = isset($_POST['fatherdeceased']) ? mysqli_real_escape_string($conn, $_POST['fatherdeceased']) : mysqli_real_escape_string($conn, "no");
  $motherdeceased = isset($_POST['motherdeceased']) ? mysqli_real_escape_string($conn, $_POST['motherdeceased']) :  mysqli_real_escape_string($conn, "no");;

  // contact & address
  $address = mysqli_real_escape_string($conn, $_POST['address']);
  $city = mysqli_real_escape_string($conn, $_POST['city']);
  $emergencycontact = mysqli_real_escape_string($conn, $_POST['emergencycontact']);
  $relation = mysqli_real_escape_string($conn, $_POST['relation']);
  $contact1 = mysqli_real_escape_string($conn, $_POST['contact1']);
  $contact2 = mysqli_real_escape_string($conn, $_POST['contact2']);

  // education
  $attainment = isset($_POST['attainment']) ? mysqli_real_escape_string($conn, $_POST['attainment']) : mysqli_real_escape_string($conn, "n/a");
  $course = mysqli_real_escape_string($conn, $_POST['course']);
  $studyyears = mysqli_real_escape_string($conn, $_POST['studyyears']);
  $graduated = isset($_POST['graduated']) ? mysqli_real_escape_string($conn, $_POST['graduated']) : mysqli_real_escape_string($conn, "n/a");;

  // employment
  $employer = mysqli_real_escape_string($conn, $_POST['employer']);
  $countryyearsfromto = mysqli_real_escape_string($conn, $_POST['countryyeasfromto']);
  $productindustry = mysqli_real_escape_string($conn, $_POST['productindustry']);
  $position = mysqli_real_escape_string($conn, $_POST['position']);
  $leavereason = mysqli_real_escape_string($conn, $_POST['leavereason']);
  $employer2 = mysqli_real_escape_string($conn, $_POST['employer2']);
  $countryyearsfromto2 = mysqli_real_escape_string($conn, $_POST['countryyeasfromto2']);
  $productindustry2 = mysqli_real_escape_string($conn, $_POST['productindustry2']);
  $position2 = mysqli_real_escape_string($conn, $_POST['position2']);
  $leavereason2 = mysqli_real_escape_string($conn, $_POST['leavereason2']);

  // application
  $job1 = isset($_POST['job1']) ? $_POST['job1'] : '';
  $job2 = isset($_POST['job2']) ? $_POST['job2'] : '';
  $job3 = isset($_POST['job3']) ? $_POST['job3'] : '';
  $job4 = isset($_POST['job4']) ? $_POST['job4'] : '';
  $job5 = isset($_POST['job5']) ? $_POST['job5'] : '';
  $job6 = isset($_POST['job6']) ? $_POST['job6'] : '';

  $applications = $job1 . $job2 . $job3 . $job4 . $job5 . $job6;
  $application_array = array($job1, $job2, $job3, $job4, $job5, $job6);

  // upload image to folder applicantimages
  $image = $_FILES['image']['name'];
  $target = "../applicantimages/".basename($image);

  if (move_uploaded_file($_FILES['webcam']['tmp_name'], $target)) {
    echo "Image Uploaded";
  }
  else {
    echo "Image NOT Uploaded";
  }

  foreach ($application_array as $arr) {
    if ($arr != '') {

      // generate unique id for application
      $uid = uniqid((string)date('Y'),true);

      // insert data
      // personal data
      $insert_personal = "insert into personaldetails (applicant_id, application_uid, applicant_firsname, applicant_middlename, applicant_lastname, applicant_birthdate,
                          applicant_age, applicant_bloodtype, applicant_height, applicant_weight, applicant_language, applicant_religion, applicant_image)
                          values (?,?,?,?,?,?,?,?,?,?,?,?,?);";

      $personal_stmt = mysqli_stmt_init($conn);
      if (mysqli_stmt_prepare($personal_stmt, $insert_personal)) {
        mysqli_stmt_bind_param($personal_stmt, "issssssssssss", $_SESSION['id'], $uid, $firstname, $middlename, $lastname, $birthdate, $age, $bloodtype, $height, $weight, $language, $religion, $image);
        mysqli_stmt_execute($personal_stmt);
      }

      // marital status
      $insert_marital = "insert into maritalstatus (applicant_id, application_uid, applicant_maritalstatus, applicant_spousename, applicant_marrieddate, applicant_childages)
                         values (?,?,?,?,?,?)";

      $marital_stmt = mysqli_stmt_init($conn);
      if (mysqli_stmt_prepare($marital_stmt, $insert_marital)) {
        mysqli_stmt_bind_param($marital_stmt, "isssss", $_SESSION['id'], $uid, $maritalstatus, $spousename, $marrieddate, $childages);
        mysqli_stmt_execute($marital_stmt);
      }

      // relatives
      $insert_relatives = "insert into relatives (applicant_id, application_uid, applicant_brotherage, applicant_sisterage, applicant_fatherage,
                           applicant_motherage, applicant_fatherdeceased, applicant_motherdeceased)
                           values (?,?,?,?,?,?,?,?)";

      $relatives_stmt = mysqli_stmt_init($conn);
      if (mysqli_stmt_prepare($relatives_stmt, $insert_relatives)) {
        mysqli_stmt_bind_param($relatives_stmt, "isssssss", $_SESSION['id'], $uid, $brotherage, $sisterage, $fatherage, $motherage, $fatherdeceased, $motherdeceased);
        mysqli_stmt_execute($relatives_stmt);
      }

      // contact & addresss
      $insert_contactaddress = "insert into contactaddress (applicant_id, application_uid, applicant_address, applicant_city, applicant_emergencycontact, applicant_relation,
                         applicant_contact1, applicant_contact2) values (?,?,?,?,?,?,?,?)";

      $contactaddress_stmt = mysqli_stmt_init($conn);
      if (mysqli_stmt_prepare($contactaddress_stmt, $insert_contactaddress)) {
        mysqli_stmt_bind_param($contactaddress_stmt, "isssssss", $_SESSION['id'], $uid, $address, $city, $emergencycontact, $relation, $contact1, $contact2);
        mysqli_stmt_execute($contactaddress_stmt);
      }

      // education
      $insert_education = "insert into education (applicant_id, application_uid, applicant_attainment, applicant_course, applicant_studyyears, applicant_graduated)
                           values (?,?,?,?,?,?)";

      $education_stmt = mysqli_stmt_init($conn);
      if (mysqli_stmt_prepare($education_stmt, $insert_education)) {
        mysqli_stmt_bind_param($education_stmt, "isssss", $_SESSION['id'], $uid, $attainment, $course, $studyyears, $graduated);
        mysqli_stmt_execute($education_stmt);
      }

      // employment
      $insert_employment = "insert into employment (applicant_id, application_uid, applicant_employer, applicant_countryyearsfromto, applicant_productindustry,
                            applicant_position, applicant_leavereason, applicant_employer2, applicant_countryyearsfromto2, applicant_productindustry2,
                            applicant_position2, applicant_leavereason2) values (?,?,?,?,?,?,?,?,?,?,?,?)";

      $employment_stmt = mysqli_stmt_init($conn);
      if (mysqli_stmt_prepare($employment_stmt, $insert_employment)) {
        mysqli_stmt_bind_param($employment_stmt, "isssssssssss", $_SESSION['id'], $uid, $employer, $countryyearsfromto, $productindustry, $position, $leavereason, $employer2, $countryyearsfromto2, $productindustry2, $position2, $leavereason2);
        mysqli_stmt_execute($employment_stmt);
      }

      // insert to applicant application
      $insert_applications = "update applicant set applicant_applications = concat(coalesce(applicant_applications, '-'), ?) where applicant_id = ?";

      $applications_stmt = mysqli_stmt_init($conn);
      if (mysqli_stmt_prepare($applications_stmt, $insert_applications)) {
        mysqli_stmt_bind_param($applications_stmt, "si", $applications, $_SESSION['id']);
        mysqli_stmt_execute($applications_stmt);
      }

      // insert to applicant_applications
      $insert_application = "insert into applicant_applications (applicant_id, application_uid, application_name, application_created, application_status, applicant_name)
                             values (?,?,?,now(),'Pending', ?)";
      $application_stmt = mysqli_stmt_init($conn);

      if (mysqli_stmt_prepare($application_stmt, $insert_application)) {
        $full_name = $_SESSION['firstname'] ." ". $_SESSION['lastname'];;
        mysqli_stmt_bind_param($application_stmt, "isss", $_SESSION['id'], $uid, $arr, $full_name );
        mysqli_stmt_execute($application_stmt);
        echo "APPLICATION INSERTED";

      }

      // update applications
      $find_sql = "select * from applicant where applicant_id = ?";
      $stmt = mysqli_stmt_init($conn);

      if (mysqli_stmt_prepare($stmt, $find_sql)) {
        mysqli_stmt_bind_param($stmt, "i", $_SESSION['id']);
        mysqli_stmt_execute($stmt);

        $result = mysqli_stmt_get_result($stmt);

        if ($row = mysqli_fetch_assoc($result)) {
          $_SESSION['applications'] = $row['applicant_applications'];
        }
      }

    }
  }

  header("Location: ../apply.php");
?>
