<?php
$servername = "localhost";
$username = "root";
$password = "12345";
$dbname = "login";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Make sure form values are set and not empty
if (!empty($_POST['username']) && !empty($_POST['password'])) {
    $username = trim($_POST['username']);
    $password = password_hash(trim($_POST['password']), PASSWORD_DEFAULT); // hashed password

    // Prepare SQL insert
    $stmt = $conn->prepare("INSERT INTO newuser (username, password) VALUES (?, ?)");

    if ($stmt) {
        $stmt->bind_param("ss", $username, $password);
        if ($stmt->execute()) {
            echo "✅ New user registered successfully!";
        } else {
            echo "❌ Error: " . $stmt->error;
        }
        $stmt->close();
    } else {
        echo "❌ Prepare failed: " . $conn->error;
    }
} else {
    echo "❗ Username or password not provided.";
}

$conn->close();
?>