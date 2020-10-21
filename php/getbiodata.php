<?php
  include "connection.php";
  $uid = $_POST['id'];

  // fetch personal details
  $fetch_applications = "select * from personaldetails where application_uid = ?";
  $fetch_stmt = mysqli_stmt_init($conn);

  if (mysqli_stmt_prepare($fetch_stmt, $fetch_applications)) {
    mysqli_stmt_bind_param($fetch_stmt, "s", $uid);
    mysqli_stmt_execute($fetch_stmt);

    $result = mysqli_stmt_get_result($fetch_stmt);

    while ($row = mysqli_fetch_assoc($result)) {
      $personal_details = array(
        'firstname' => $row['applicant_firsname'],
        'middlename' => $row['applicant_middlename'],
        'lastname' => $row['applicant_lastname'],
        'birthdate' => $row['applicant_birthdate'],
        'age' => $row['applicant_age'],
        'bloodtype' => $row['applicant_bloodtype'],
        'height' => $row['applicant_height'],
        'weight' => $row['applicant_weight'],
        'language' => $row['applicant_language'],
        'religion' => $row['applicant_religion'],
        'image' => $row['applicant_image'],
        'id' => $row['applicant_id']
      );
    }
  }

  // fetch maritalstatus details
  $fetch_applications = "select * from maritalstatus where application_uid = ?";
  $fetch_stmt = mysqli_stmt_init($conn);

  if (mysqli_stmt_prepare($fetch_stmt, $fetch_applications)) {
    mysqli_stmt_bind_param($fetch_stmt, "s", $uid);
    mysqli_stmt_execute($fetch_stmt);

    $result = mysqli_stmt_get_result($fetch_stmt);

    while ($row = mysqli_fetch_assoc($result)) {
      $marital_status = array(
        'maritalstatus' => $row['applicant_maritalstatus'],
        'spousename' => $row['applicant_spousename'],
        'marrieddate' => $row['applicant_marrieddate'],
        'childages' => $row['applicant_childages'],
      );
    }
  }

  // fetch relatives details
  $fetch_applications = "select * from relatives where application_uid = ?";
  $fetch_stmt = mysqli_stmt_init($conn);

  if (mysqli_stmt_prepare($fetch_stmt, $fetch_applications)) {
    mysqli_stmt_bind_param($fetch_stmt, "s", $uid);
    mysqli_stmt_execute($fetch_stmt);

    $result = mysqli_stmt_get_result($fetch_stmt);

    while ($row = mysqli_fetch_assoc($result)) {
      $relatives = array(
        'brotherage' => $row['applicant_brotherage'],
        'sisterage' => $row['applicant_sisterage'],
        'fatherage' => $row['applicant_fatherdeceased'] != "no" ? "Deceased" : $row['applicant_fatherage'],
        'motherage' => $row['applicant_motherdeceased'] != "no" ? "Deceased" : $row['applicant_motherage'],
      );
    }
  }

  // fetch contactaddress details
  $fetch_applications = "select * from contactaddress where application_uid = ?";
  $fetch_stmt = mysqli_stmt_init($conn);

  if (mysqli_stmt_prepare($fetch_stmt, $fetch_applications)) {
    mysqli_stmt_bind_param($fetch_stmt, "s", $uid);
    mysqli_stmt_execute($fetch_stmt);

    $result = mysqli_stmt_get_result($fetch_stmt);

    while ($row = mysqli_fetch_assoc($result)) {
      $contactaddress = array(
        'address' => $row['applicant_address'],
        'city' => $row['applicant_city'],
        'emergencycontact' => $row['applicant_emergencycontact'],
        'relation' => $row['applicant_relation'],
        'contact1' => $row['applicant_contact1'],
        'contact2' => $row['applicant_contact2'],
      );
    }
  }

  // fetch education details
  $fetch_applications = "select * from education where application_uid = ?";
  $fetch_stmt = mysqli_stmt_init($conn);

  if (mysqli_stmt_prepare($fetch_stmt, $fetch_applications)) {
    mysqli_stmt_bind_param($fetch_stmt, "s", $uid);
    mysqli_stmt_execute($fetch_stmt);

    $result = mysqli_stmt_get_result($fetch_stmt);

    while ($row = mysqli_fetch_assoc($result)) {
      $education = array(
        'attainment' => $row['applicant_attainment'],
        'course' => $row['applicant_course'],
        'studyyears' => $row['applicant_studyyears'],
        'graduated' => $row['applicant_graduated'],
      );
    }
  }

  // fetch education details
  $fetch_applications = "select * from employment where application_uid = ?";
  $fetch_stmt = mysqli_stmt_init($conn);

  if (mysqli_stmt_prepare($fetch_stmt, $fetch_applications)) {
    mysqli_stmt_bind_param($fetch_stmt, "s", $uid);
    mysqli_stmt_execute($fetch_stmt);

    $result = mysqli_stmt_get_result($fetch_stmt);

    while ($row = mysqli_fetch_assoc($result)) {
      $employement = array(
        'employer' => $row['applicant_employer'],
        'countryyearsfromto' => $row['applicant_countryyearsfromto'],
        'productindustry' => $row['applicant_productindustry'],
        'position' => $row['applicant_position'],
        'leavereason' => $row['applicant_leavereason'],
      );
    }
  }


  echo json_encode(array($personal_details, $marital_status, $relatives, $contactaddress, $education, $employement));
?>
