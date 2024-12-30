<?php
session_start();
require '../conx.php';

// Redirect if not logged in
if (!isset($_SESSION['username'])&&(!isset($_SESSION['department']))) {
    header('Location: ../index.php');
    exit();
}
$username = $_SESSION['username'];
$department = $_SESSION['department'];
// Get the page from the URL
$id = $_GET['id'] ?? '$id';

// Delete the content for the selected page
$sql = "DELETE FROM sch_session WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param('s', $id);
$stmt->execute();

// Redirect back to dashboard
header('Location: v_session.php');
exit();
?>
