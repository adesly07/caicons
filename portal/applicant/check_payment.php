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
$sql = "SELECT * FROM payment WHERE reg_num = '$username' AND sch_session = '$section'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0 ) {
        header('location:dashboard.php');
    } else {
        header('location:payapp.php');
    }
?>