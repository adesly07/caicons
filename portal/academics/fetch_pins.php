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
// Fetch pins
$sql = "SELECT pin, serial_number, sch_session, status FROM pins WHERE status='UNUSED' ORDER BY id DESC";
$result = $conn->query($sql);

$pins = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $pins[] = $row;
    }
}

echo json_encode($pins);

$conn->close();
?>