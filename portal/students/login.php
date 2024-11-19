<?php
session_start();
include ('../conx.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $a_status = "ADMITTED";
    // Validate login details
    $sql = "SELECT * FROM applicants WHERE reg_num = ? AND a_status = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $username, $a_status);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows === 1) {
        // Successful login
        $student = $result->fetch_assoc();
        if (password_verify($password, $student['pwd'])) {
            $_SESSION['username'] = $username;
            header('Location: dashboard.php');
            exit();
        // Redirect to the student dashboard or home page
        } else {
            echo "<script>alert('Incorrect Password'); window.history.back();</script>";
        }
    } else {
        echo "<script>alert('Invalid Credentials'); window.history.back();</script>";
    }
    
}

?>