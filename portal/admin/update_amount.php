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


$id = $_POST['id'];
$course = $_POST['course'];
$f_amount = $_POST['f_amount'];
$t_fee = $_POST['t_fee'];
$acceptance_fee = $_POST['acceptance_fee'];
$accp_tran_fee = $_POST['accp_tran_fee'];

$query = "UPDATE courses SET course = ?, f_amount = ?, t_fee = ?, acceptance_fee = ?, accp_tran_fee = ? WHERE id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("siiii", $course, $f_amount, $t_fee, $acceptance_fee, $accp_tran_fee, $id);
$stmt->execute();

echo json_encode(['message' => 'Record updated successfully']);
?>
