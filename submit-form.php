<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Retrieve form data
  $name = $_POST['name'];
  $email = $_POST['email'];
  $message = $_POST['message'];
  $role = $_POST['role'];

  // Prepare email content
  $to = 'mathensaajida@gmail.com'; // Replace with your email address
  $subject = 'New Form Submission';
  $email_content = "Name: $name\n";
  $email_content .= "Email: $email\n";
  $email_content .= "Message: $message\n";
  $email_content .= "Role: $role\n";

  // Set additional email headers
  $headers = "From: $name <$email>";

  // Send the email
  $success = mail($to, $subject, $email_content, $headers);

  if ($success) {
    // Return a success response
    $response = array('success' => true);
    echo json_encode($response);
  } else {
    // Return an error response
    $response = array('success' => false, 'error' => 'Failed to send email.');
    echo json_encode($response);
  }
} else {
  // Return an error response
  $response = array('success' => false, 'error' => 'Invalid request method.');
  echo json_encode($response);
}
?>
