<?php
session_start();
include("../conx.php");
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit();
}
$username = $_SESSION['username'];
$section = $_SESSION['s_session'];
$level = $_SESSION['level'];
// Get the page from the URL
$id = $_GET['id'] ?? '$id';

// Delete the content for the selected page
$sql = "DELETE FROM course_registration WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param('s', $id);
$stmt->execute();

// Redirect back to dashboard
header('Location: v_form.php');
exit();
?>
