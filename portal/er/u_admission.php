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
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $admittedIds = $_POST['admit'];

    if (!empty($admittedIds)) {
        $ids = implode(',', $admittedIds);
        $query = "UPDATE applicants SET a_status = 'ADMITTED' WHERE applicant_id IN ($ids)";
        if (mysqli_query($conn, $query)) {
            echo "<script>alert('Admission records updated successfully!'); window.location.href='admission.php';</script>";
        } else {
            echo "<script>alert('Error updating records.'); window.location.href='admission.php';</script>";
        }
    } else {
        echo "<script>alert('No applicants selected.'); window.location.href='admission.php';</script>";
    }
}
?> 