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
$data = json_decode(file_get_contents("php://input"), true);

foreach ($data['courses'] as $course) {
  $sql = "INSERT INTO course_registration (reg_num, level, course_code, course_title, unit, semester, sch_session) VALUES (?, ?, ?, ?, ?, ?, ?)";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("ssssiss", $username, $level, $course['course_code'], $course['course_title'], $course['units'], $course['semester'], $section);
  $stmt->execute();
}

echo "Courses successfully saved!";

?>