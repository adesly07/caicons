<?php
session_start();
include('../conx.php');
// Redirect if not logged in
if (!isset($_SESSION['username'])) {
    header('Location: ../index.php');
    exit();
}
$username = $_SESSION['username'];
$section = $_SESSION['s_session'];

// Get data from form submission
$applicant_id = $username; // Replace with the actual applicant ID
$exam_type_first = $_POST['exam_type_first'];
$subject_first = json_encode(array_combine($_POST['subject_first'], $_POST['grade_first']));
$exam_type_second = $_POST['exam_type_second'] ?? null;
$subject_second = json_encode(array_combine($_POST['subject_second'], $_POST['grade_second'] ?? []));

// Insert into the database
$sql = "INSERT INTO applicant_results (reg_num, exam_type_first_sitting, subject_first_sitting, exam_type_second_sitting, subject_second_sitting)
        VALUES (?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sssss", $username, $exam_type_first, $subject_first, $exam_type_second, $subject_second);

if ($stmt->execute()) {
    echo "<script>alert('Result submitted successfully'); window.location.href='doc_upload.php';</script>";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
