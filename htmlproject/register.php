<?php
// DB connection settings
$servername = "localhost";
$username = "root"; // default for XAMPP
$password = "12345";     // default for XAMPP
$dbname = "job_portal";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Get form data
$name = $_POST['name'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$address = $_POST['address'];

// Insert into database
$sql = "INSERT INTO users (name, phone, email, address) VALUES (?, ?, ?, ?)";

if ($stmt->execute()) {
  echo "Registration successful!";
} else {
  echo "Error: " . $stmt->error;
}

$conn->close();
?>
