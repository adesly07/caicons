<?php
session_start();
include('../conx.php');
// Redirect if not logged in
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit();
}
$username = $_SESSION['username'];
$section = $_SESSION['s_session'];
$sql = "SELECT * FROM schools_attended WHERE reg_num = '$username'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0 ) {
        echo "<script>alert('You have already filled this form. If you need update, contact the ICT unit. Thank you.'); window.location.href='dashboard.php';</script>";
    } else {
        header('location:a_back.php');
    }
?>