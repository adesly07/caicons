<?php
session_start();
require '../../conx.php';

// Redirect if not logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: ../index.php');
    exit();
}

// Get the page from the URL
$id = $_GET['id'] ?? '$id';

// Delete the content for the selected page
$sql = "DELETE FROM news WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param('s', $id);
$stmt->execute();

// Redirect back to dashboard
header('Location: view_news.php');
exit();
?>
