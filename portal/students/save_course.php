<?php
session_start();
include('../conx.php');
// Redirect if not logged in
if (!isset($_SESSION['username'])) {
    header('Location: index.php');
    exit();
}
$username = $_SESSION['username'];
$section = $_SESSION['s_session'];
$level = $_SESSION['level'];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $courses = $_POST['course_title'];
    $units = $_POST['unit'];
    $semesters = $_POST['semester'];
    $sessions = $_POST['session'];

    for ($i = 0; $i < count($courses); $i++) {
        $courseTitle = $connection->real_escape_string($courses[$i]);
        $unit = $connection->real_escape_string($units[$i]);
        $semester = $connection->real_escape_string($semesters[$i]);
        $session = $connection->real_escape_string($sessions[$i]);

        $query = "INSERT INTO course_registration (course_title, unit, semester, session)
                  VALUES ('$courseTitle', '$unit', '$semester', '$session')";

        $connection->query($query);
    }

    $connection->close();
    echo "Courses saved successfully!";
}
?>