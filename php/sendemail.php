<?php
  ini_set('display_erros', 1);
  error_reporting(E_ALL);

  $subj = "";

  switch ($_POST['PARAMS']) {
    case 'feedback':
      $message_to = "feedbacks@forevermanpower.com";
      $subj = "Feedback / Inquiry";
      break;
    case 'techsupp':
      $message_to = "techsupport@forevermanpower.com";
      $subj = "Tech Support Question";
      break;
    case 'business':
      $message_to = "business@forevermanpower.com";
      $subj = "Business";
      break;
    case 'partner':
      $message_to = "partners@forevermanpower.com";
      $subj = "Partner";
      break;
  }

  $message_from = $_POST['message_from'];
  $message_body = $_POST['message_body'];
  $message_name = $_POST['message_name'];
  $message_contact = $_POST['message_contact'];

  $from = $message_from;
  $to = $message_to;
  $subject = $subj;
  $message = $message_body . "\n\nFull Name: " . $message_name . " \nContact: " . $message_contact;
  $headers = "From:" . $from;
  mail($to, $subject, $message, $headers);

  header("Location: ../index.php");
?>
