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
$code = $_SESSION['course_code'];
$level = $_SESSION['level'];
$unit = $_SESSION['units'];
$section = $_SESSION['s_session'];
$semester = $_SESSION['s_semester'];
if (isset($_GET['query'])) {
    $query = $conn->real_escape_string($_GET['query']);
    $result = $conn->query("SELECT * FROM applicants WHERE reg_num LIKE '%$query%' OR matric_no LIKE '%$query%' LIMIT 5");

    $data = [];
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
    echo json_encode($data);
}


?>