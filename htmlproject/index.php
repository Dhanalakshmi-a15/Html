<?php
// Start session
session_start();

// Connect to the database
$host = "localhost";
$dbUser = "root";     // XAMPP default
$dbPass = "12345";         // XAMPP default
$dbName = "job_portal1";

$conn = new mysqli($host, $dbUser, $dbPass, $dbName);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Collect form data
$username = $_POST['username'];
$password = $_POST['password'];

// Search for the user
$sql = "SELECT * FROM users WHERE username = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $username);
$stmt->execute();

$result = $stmt->get_result();

if ($result->num_rows > 0) {
    // User exists
    $user = $result->fetch_assoc();

    // Check password
    if (password_verify($password, $user['password'])) {
        $_SESSION['username'] = $user['username'];
        echo "Login successful! Welcome " . $_SESSION['username'];
        // Redirect to dashboard or home page
        // header("Location: dashboard.php");
        // exit;
    } else {
        echo "Incorrect password.";
    }
} else {
    echo "User not found.";
}

$conn->close();
?>
