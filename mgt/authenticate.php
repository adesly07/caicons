<?php
session_start();
require 'includes/db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve username and password
    $username = trim($_POST['username']);
    $password = $_POST['password'];

    // Validate inputs
    if (empty($username) || empty($password)) {
        header("Location: index.php?error=Please fill in all fields.");
        exit();
    }

    try {
        // Prepare and execute query
        $stmt = $conn->prepare("SELECT * FROM users WHERE username = :username LIMIT 1");
        $stmt->execute(['username' => $username]);
        $user = $stmt->fetch();

        // Verify user exists and password is correct
        if ($user && password_verify($password, $user['password'])) {
            // Authentication successful
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            // Redirect to dashboard
            header("Location: admin/dashboard.php");
            exit();
        } else {
            // Authentication failed
            header("Location: index.php?error=Invalid username or password.");
            exit();
        }
    } catch (PDOException $e) {
        // Handle errors
        header("Location: index.php?error=An error occurred. Please try again.");
        exit();
    }
} else {
    // Invalid request method
    header("Location: index.php");
    exit();
}
