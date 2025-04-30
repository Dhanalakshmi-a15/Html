
<?php
$servername = "localhost";
$username = "root"; // default MySQL user
$password = "12345";     // enter the password you set during MySQL installation
$dbname = "car";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data
$name = $_POST['name'];
$email = $_POST['email'];

// Insert into DB
$sql = "INSERT INTO users (name, email) VALUES ('$name', '$email')";

if ($conn->query($sql) === TRUE) {
    echo "New user saved successfully!";
} else {
    echo "Error: " . $conn->error;
}

$conn->close();
?>