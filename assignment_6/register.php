<?php
session_start();

// Function to validate email
function is_valid_email($email) {
  return filter_var($email, FILTER_VALIDATE_EMAIL);
}

if(isset($_POST['submit'])) {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $picture = $_FILES['picture']['name'];
  $picture_temp = $_FILES['picture']['tmp_name'];
  
  // Check if all fields are filled out
  if(empty($name) || empty($email) || empty($password) || empty($picture)) {
    echo "All fields are required.";
    exit();
  }
  
  // Check if email is in a valid format
  if(!is_valid_email($email)) {
    echo "Invalid email format.";
    exit();
  }
  
  // Create uploads directory if it doesn't exist
  if(!is_dir("uploads")) {
    mkdir("uploads");
  }
  
  // Generate unique filename for the profile picture
  $timestamp = date("YmdHis");
  $picture_name = $timestamp . "_" . $picture;
  
  // Save the profile picture to the server
  move_uploaded_file($picture_temp, "uploads/$picture_name");
  
  // Save user's data to the CSV file
  $user_data = array($name, $email, $picture_name);
  $fp = fopen('users.csv', 'a');
  fputcsv($fp, $user_data);
  fclose($fp);
  
  // Set session and cookie variables
  $_SESSION['name'] = $name;
  setcookie("user", $name, time() + (86400 * 30), "/"); // Cookie lasts for 30 days
  
  header("Location: view_users.php");
  exit();
}
