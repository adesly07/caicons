<?php
session_start();
require '../conx.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Fetch user from database
    $sql = "SELECT * FROM users WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s', $username);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        
        // Verify password
        if (password_verify($password, $user['password'])) {
            // Set session
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['name'] = $user['u_name'];
            $_SESSION['username'] = $user['username'];
            
            // Redirect to dashboard
            header('Location: admin/dashboard.php');
            exit();
        } else {
            echo "<p>Invalid username or password.</p>";
        }
    } else {
        echo "<p>User not found.</p>";
    }
}
?>
