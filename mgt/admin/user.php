<?php
require '../../conx.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Sanitize user input
    $username = $conn->real_escape_string($_POST['username']);
    $name = $conn->real_escape_string($_POST['name']);
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

    // Insert user into database
    $sql = "INSERT INTO users (username, u_name, password) VALUES ('$username', '$name', '$password')";
    
    if ($conn->query($sql) === TRUE) {
        echo "New account created successfully!";
        header("Location: c_user.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
