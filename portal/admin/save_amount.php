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
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
$course = $_POST['course'];
$f_amount = $_POST['f_amount'];
$t_fee = $_POST['t_fee'];
$acceptance_fee = $_POST['acceptance_fee'];
$accp_tran_fee = $_POST['accp_tran_fee'];

$query = "INSERT INTO courses (course, f_amount, t_fee, acceptance_fee, accp_tran_fee) VALUES (?, ?, ?, ?, ?)";
$stmt = $conn->prepare($query);
$stmt->bind_param("sdddd", $course, $f_amount, $t_fee, $acceptance_fee, $accp_tran_fee);
if ($stmt->execute()) {
    echo "<script>alert('Application fee saved successfully'); window.location.href='a_fee.php';</script>";
} else {
    echo "<script>alert('Error saving details.'); window.history.back();</script>";
}
}
?>

