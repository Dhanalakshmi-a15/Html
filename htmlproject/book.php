<?php
session_start();

// 1. Database connection settings
$host   = "localhost";
$dbUser = "root";      // XAMPP default
$dbPass = "12345";     // XAMPP default (change if you’ve set it differently)
$dbName = "book";      // name of your database

// 2. Create mysqli connection
$conn = new mysqli($host, $dbUser, $dbPass, $dbName);

// 3. Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// 4. Only handle POST submissions
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // 5. Grab & sanitize inputs
    $name    = trim($_POST["name"]    ?? "");
    $phone   = trim($_POST["phone"]   ?? "");
    $date    = trim($_POST["date"]    ?? "");
    $time    = trim($_POST["time"]    ?? "");
    $address = trim($_POST["address"] ?? "");

    // 6. Basic validation
    $errors = [];
    if ($name === "" || $phone === "" || $date === "" || $time === "" || $address === "") {
        $errors[] = "All fields are required.";
    }
    if (!preg_match("/^\d{10}$/", $phone)) {
        $errors[] = "Phone number must be exactly 10 digits.";
    }

    if (!empty($errors)) {
        // You could store these in $_SESSION and redirect back to your form
        foreach ($errors as $error) {
            echo "<p style='color:red;'>$error</p>";
        }
        exit;
    }

    // 7. Prepare & execute INSERT
    $stmt = $conn->prepare("
        INSERT INTO appointments
          (name, phone, appt_date, appt_time, address)
        VALUES
          (?, ?, ?, ?, ?)
    ");
    if (! $stmt) {
        die("Prepare failed: " . $conn->error);
    }

    $stmt->bind_param(
        "sssss",
        $name,
        $phone,
        $date,
        $time,
        $address
    );

    if ($stmt->execute()) {
        // 8. Success message
        echo "<h2>Appointment Booked Successfully!</h2>";
        echo "<p>Thank you, <strong>" . htmlspecialchars($name) . "</strong>. ";
        echo "Your appointment is scheduled for <strong>" 
             . htmlspecialchars($date) 
             . " at " 
             . htmlspecialchars($time) 
             . "</strong>.</p>";
    } else {
        echo "<p style='color:red;'>Database error: " 
             . htmlspecialchars($stmt->error) 
             . "</p>";
    }

    $stmt->close();
    $conn->close();
    exit;
}

// If we get here, it wasn’t a POST
echo "Invalid request.";
