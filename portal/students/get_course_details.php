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
$course_code = $_GET['course_code'];

$sql = "SELECT course_code, course_title, units, semester FROM courses_reg WHERE course_code = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $course_code);
$stmt->execute();
$result = $stmt->get_result();

echo json_encode($result->fetch_assoc());

?>