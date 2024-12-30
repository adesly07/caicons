<?php
include("../conx.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Sanitize user input
    $username = $conn->real_escape_string($_POST['username']);
    $name = $conn->real_escape_string($_POST['name']);
    $password = $_POST['password'];
    $pwd = password_hash($password, PASSWORD_BCRYPT);
    $department = $conn->real_escape_string($_POST['department']);
    // Insert user into database
    $sql = "INSERT INTO users (username, u_name, password, p_decr, department) VALUES ('$username', '$name', '$pwd', '$password', '$department')";
    if ($conn->query($sql) === TRUE) {
        echo "New account created successfully!";
        header("Location: c_user.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
}
?>
