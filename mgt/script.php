<?php
// insert_user.php

// Database connection
$servername = "localhost";
$dbname = "cai_db";
$db_username = "root"; // Replace with your database username
$db_password = "";     // Replace with your database password

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8mb4", $db_username, $db_password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Hash the password
    $hashed_password = password_hash('admin123', PASSWORD_DEFAULT);

    // Prepare SQL and bind parameters
    $stmt = $conn->prepare("INSERT INTO users (username, password) VALUES (:username, :password)");
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':password', $password);

    // Insert a row
    $username = "admin";
    $password = $hashed_password;
    $stmt->execute();

    echo "New admin user created successfully";
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}

$conn = null;
?>
