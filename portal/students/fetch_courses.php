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
$sql = "SELECT course_code, course_title FROM courses_reg";
$result = $conn->query($sql);

$courses = [];
while ($row = $result->fetch_assoc()) {
  $courses[] = $row;
}

echo json_encode($courses);

?>