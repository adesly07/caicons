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
$reg = $_SESSION['reg_num'];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $walletAmount = $_POST['walletAmount'];
    $result = $conn->query("SELECT * FROM applicants WHERE reg_num = '$reg'");
    $row = $result->fetch_assoc();
   // Update wallet balance and set registration number for the applicant
    $updateQuery = "UPDATE applicants SET w_amt = w_amt + ? WHERE reg_num = ?";
    $stmt = $conn->prepare($updateQuery);
    $stmt->bind_param("ds", $walletAmount, $reg);
    if ($stmt->execute()) {
        echo "<script>
                window.location.href = 'wallet.php';
              </script>";
    } else {
        echo "<script>alert('An error occurred while updating the wallet.'); window.history.back();</script>";
    }
}
?>
