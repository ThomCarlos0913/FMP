<?php
  include "connection.php";
  $payload = $_POST['payload'];

  // initialize variables
  // personal details
  $birthdate = mysqli_real_escape_string($conn, $payload['birthdate']);
  $age = mysqli_real_escape_string($conn, $payload['age']);
  $bloodtype = mysqli_real_escape_string($conn, $payload['bloodtype']);
  $height = mysqli_real_escape_string($conn, $payload['height']);
  $weight = mysqli_real_escape_string($conn, $payload['weight']);
  $language = isset($payload['language']) ? mysqli_real_escape_string($conn, $payload['language']) : mysqli_real_escape_string($conn, 'n/a');
  $religion = isset($payload['religion']) ? mysqli_real_escape_string($conn, $payload['religion']) : mysqli_real_escape_string($conn, 'n/a');
  $id = mysqli_real_escape_string($conn, $payload['id']);

  // marital status
  $maritalstatus = mysqli_real_escape_string($conn, $payload['maritalstatus']);
  $spousename = mysqli_real_escape_string($conn, $payload['spousename']);
  $marrieddate = mysqli_real_escape_string($conn, $payload['marrieddate']);
  $childages = mysqli_real_escape_string($conn, $payload['childages']);

  // relatives
  $brotherage = mysqli_real_escape_string($conn, $payload['brotherage']);
  $sisterage = mysqli_real_escape_string($conn, $payload['sisterage']);
  $fatherage = mysqli_real_escape_string($conn, $payload['fatherage']);
  $motherage = mysqli_real_escape_string($conn, $payload['motherage']);

  // contact & address
  $address = mysqli_real_escape_string($conn, $payload['address']);
  $city = mysqli_real_escape_string($conn, $payload['city']);
  $emergencycontact = mysqli_real_escape_string($conn, $payload['emergencycontact']);
  $relation = mysqli_real_escape_string($conn, $payload['relation']);
  $contact1 = mysqli_real_escape_string($conn, $payload['contact1']);
  $contact2 = mysqli_real_escape_string($conn, $payload['contact2']);

  // education
  $attainment = isset($payload['attainment']) ? mysqli_real_escape_string($conn, $payload['attainment']) : mysqli_real_escape_string($conn, "n/a");
  $course = mysqli_real_escape_string($conn, $payload['course']);
  $studyyears = mysqli_real_escape_string($conn, $payload['studyyears']);
  $graduated = isset($payload['graduated']) ? mysqli_real_escape_string($conn, $payload['graduated']) : mysqli_real_escape_string($conn, "n/a");;

  // employment
  $employer = mysqli_real_escape_string($conn, $payload['employer']);
  $countryyearsfromto = mysqli_real_escape_string($conn, $payload['countryyearsfromto']);
  $productindustry = mysqli_real_escape_string($conn, $payload['productindustry']);
  $position = mysqli_real_escape_string($conn, $payload['position']);
  $leavereason = mysqli_real_escape_string($conn, $payload['leavereason']);

  $update_personal = "update personaldetails set applicant_birthdate = ?, applicant_age = ?, applicant_bloodtype = ?, applicant_height = ?, applicant_weight = ?, applicant_language = ?, applicant_religion = ? where applicant_id = ?";

  $personal_stmt = mysqli_stmt_init($conn);
  if (mysqli_stmt_prepare($personal_stmt, $update_personal)) {
    mysqli_stmt_bind_param($personal_stmt, "sssssssi", $birthdate, $age, $bloodtype, $height, $weight, $language, $religion, $id);
    mysqli_stmt_execute($personal_stmt);
  }

  $update_marital = "update maritalstatus set applicant_maritalstatus = ?, applicant_spousename = ?, applicant_marrieddate = ?, applicant_childages = ? where applicant_id = ?";

  $personal_stmt = mysqli_stmt_init($conn);
  if (mysqli_stmt_prepare($personal_stmt, $update_marital)) {
    mysqli_stmt_bind_param($personal_stmt, "ssssi", $maritalstatus, $spousename, $marrieddate, $childages, $id);
    mysqli_stmt_execute($personal_stmt);
  }

  $update_relatives = "update relatives set applicant_brotherage = ?, applicant_sisterage = ?, applicant_fatherage = ?, applicant_motherage = ? where applicant_id = ?";

  $personal_stmt = mysqli_stmt_init($conn);
  if (mysqli_stmt_prepare($personal_stmt, $update_relatives)) {
    mysqli_stmt_bind_param($personal_stmt, "ssssi", $brotherage, $sisterage, $fatherage, $motherage, $id);
    mysqli_stmt_execute($personal_stmt);
  }

  $update_contact = "update contactaddress set applicant_address = ?, applicant_city = ?, applicant_emergencycontact = ?, applicant_relation = ?, applicant_contact1 = ?, applicant_contact2 = ? where applicant_id = ?";

  $personal_stmt = mysqli_stmt_init($conn);
  if (mysqli_stmt_prepare($personal_stmt, $update_contact)) {
    mysqli_stmt_bind_param($personal_stmt, "ssssssi", $address, $city, $emergencycontact, $relation, $contact1, $contact2, $id);
    mysqli_stmt_execute($personal_stmt);
  }

  $update_education = "update education set applicant_attainment = ?, applicant_course = ?, applicant_studyyears = ?, applicant_graduated = ? where applicant_id = ?";

  $personal_stmt = mysqli_stmt_init($conn);
  if (mysqli_stmt_prepare($personal_stmt, $update_education)) {
    mysqli_stmt_bind_param($personal_stmt, "ssssi", $attainment, $course, $studyyears, $graduated, $id);
    mysqli_stmt_execute($personal_stmt);
  }

  $update_education = "update employment set applicant_employer = ?, applicant_countryyearsfromto = ?, applicant_productindustry = ?, applicant_position = ?, applicant_leavereason = ? where applicant_id = ?";

  $personal_stmt = mysqli_stmt_init($conn);
  if (mysqli_stmt_prepare($personal_stmt, $update_education)) {
    mysqli_stmt_bind_param($personal_stmt, "sssssi", $employer, $countryyearsfromto, $productindustry, $position, $leavereason, $id);
    mysqli_stmt_execute($personal_stmt);
  }

  echo "Applicant Biodata Successfully Updated!"
?>
