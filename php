<?php

// Function to validate an email address
function is_valid_email($email) {
  return filter_var($email, FILTER_VALIDATE_EMAIL);
}

// Function to extract email addresses from a text file
function extract_email_from_file($file_path) {
  // Read the file into a string
  $file_contents = file_get_contents($file_path);

  // Use regular expression to extract email addresses
  preg_match_all("/[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}/", $file_contents, $matches);

  // Validate the extracted email addresses
  $valid_email_addresses = array();
  foreach ($matches[0] as $email) {
    if (is_valid_email($email)) {
      $valid_email_addresses[] = $email;
    }
  }

  // Return the valid email addresses
  return $valid_email_addresses;
}

// Example usage
$file_path = "emails.txt";
$email_addresses = extract_email_from_file($file_path);
print_r($email_addresses);

?>
