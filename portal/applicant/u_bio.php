<?php
session_start();
include('../conx.php');
// Redirect if not logged in
if (!isset($_SESSION['username'])) {
    header('Location: ../index.php');
    exit();
}
$username = $_SESSION['username'];
$section = $_SESSION['s_session'];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $dob = $_POST['dob'];
    $sex = $_POST['sex'];
    $marital_status = $_POST['marital_status'];
    $hometown = $_POST['hometown'];
    $address = $_POST['address'];
    $state_of_origin = $_POST['state_of_origin'];
    $contact_address = $_POST['contact_address'];

    $query = "UPDATE applicants set dob = ?, sex = ?, marital_status = ?, hometown = ?, a_address = ?, state_of_origin = ?, contact_address = ? WHERE reg_num = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ssssssss", $dob, $sex, $marital_status, $hometown, $address, $state_of_origin, $contact_address, $username);

    if ($stmt->execute()) {
        echo "<script>alert('Application updated successfully'); window.location.href='a_back.php';</script>";
    } else {
        echo "<script>alert('Error updating application'); window.history.back();</script>";
    }
}
?>