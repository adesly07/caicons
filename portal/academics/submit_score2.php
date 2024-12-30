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
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $reg_num = $conn->real_escape_string($_POST['registration_number']);
    $ca_score = (int)$_POST['ca_score'];
    $exam_score = (int)$_POST['exam_score'];
    
    $sql3 = "SELECT reg_num FROM applicants WHERE reg_num = '$reg_num'";
    $result = $conn->query($sql3);
    if ($result->num_rows > 0) {
        $sql = "SELECT * FROM scores WHERE reg_num = '$reg_num' AND level = '$level' AND course_code = '$code' AND s_session = '$section' AND s_semester = '$semester'";
        $result4 = $conn->query($sql);
        if($result4->num_rows > 0){
    echo "Record already exist.";
}else{
    $total_score = $ca_score + $exam_score;
    if($total_score >= 80){
        $letter_grade = 'A';
        $grade_point = '4';
        $remark = 'Distinction';
    } elseif($total_score >= 70){
        $letter_grade = 'B';
        $grade_point = '3';
        $remark = 'Upper Credit';
    } elseif($total_score >= 60){
        $letter_grade = 'C';
        $grade_point = '2';
        $remark = 'Lower Credit';
    } elseif($total_score >= 50){
        $letter_grade = 'D';
        $grade_point = '1';
        $remark = 'Pass';
    } else{
        $letter_grade = 'E';
        $grade_point = '0';
        $remark = 'Fail';
    }
    $stmt = $conn->prepare("INSERT INTO scores (reg_num, level, s_session, s_semester, course_code, units, ca_score, exam_score, total_score, letter_grade, grade_point, remark, added_by) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssiiiisiss", $reg_num, $level, $section, $semester, $code, $unit, $ca_score, $exam_score, $total_score, $letter_grade, $grade_point, $remark, $username);
    if ($stmt->execute()) {
        echo "Score added successfully!";
    } else {
        echo "Error: " . $conn->error;
    }
}
        } else {
            echo "Registration Number not found";
        }
    
}


?>