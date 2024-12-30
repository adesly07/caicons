<?php
session_start();
include('../conx.php');
// Redirect if not logged in
if (!isset($_SESSION['username'])&&(!isset($_SESSION['department']))) {
    header('Location: ../index.php');
    exit();
}
$username = $_SESSION['username'];
$department = $_SESSION['department'];
$section = $_SESSION['s_session'];
// Get data from the request
$reg_num = $_POST['student_id'];
$matric_number = $_POST['matric_number'];

// Update matric number
$sql = "UPDATE applicants SET matric_no = '$matric_number' WHERE reg_num = '$reg_num'";

if ($conn->query($sql) === TRUE) {
    echo "Matric number updated successfully!";
} else {
    echo "Error updating record: " . $conn->error;
}

$conn->close();

?>