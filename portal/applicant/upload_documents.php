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
//echo $username;
// Define directory for uploads
$upload_dir = '../a_uploads/';
$applicant_id = $username; 

// Array to store paths
$file_paths = [];

// Upload each file and store its path
function uploadFile($file, $name) {
    global $upload_dir, $file_paths;
    $target_file = $upload_dir . basename($file['name']);
    if (move_uploaded_file($file['tmp_name'], $target_file)) {
        $file_paths[$name] = $target_file;
    }
}

// Process each file
uploadFile($_FILES['o_level_first_sitting'], 'o_level_first_sitting');
uploadFile($_FILES['o_level_second_sitting'], 'o_level_second_sitting');
uploadFile($_FILES['birth_certificate'], 'birth_certificate');
uploadFile($_FILES['marriage_certificate'], 'marriage_certificate');
uploadFile($_FILES['passport'], 'passport');

// Insert data into the database
$sql = "INSERT INTO applicant_documents (reg_num, o_level_first_sitting, o_level_second_sitting, birth_certificate, marriage_certificate, passport)
        VALUES (?, ?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param(
    "ssssss",
    $username,
    $file_paths['o_level_first_sitting'],
    $file_paths['o_level_second_sitting'],
    $file_paths['birth_certificate'],
    $file_paths['marriage_certificate'],
    $file_paths['passport']
);

if ($stmt->execute()) {
    echo "<script>alert('Documents uploaded successfully'); window.location.href='pgui.php';</script>";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>