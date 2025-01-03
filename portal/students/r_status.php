<?php
session_start();
include('../conx.php');
// Redirect if not logged in
if (!isset($_SESSION['username'])) {
    header('Location: index.php');
    exit();
}
$username = $_SESSION['username'];
$section = $_SESSION['s_session'];
$r_status = $_SESSION['r_status'];
if($r_status == "Pending"){
    echo "<script>alert('Sorry, The result has not been released, try again later.'); window.location.href='dashboard.php';</script>";
} else {
        header('location:check_result.php');
    }
?>