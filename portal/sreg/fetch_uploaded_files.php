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


$sql = "SELECT o_level_first_sitting, o_level_second_sitting, birth_certificate, marriage_certificate, passport FROM applicant_documents WHERE reg_num = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();

$files = [];
if ($row = $result->fetch_assoc()) {
    foreach ($row as $key => $path) {
        if ($path) {
            $files[] = [
                "label" => ucfirst(str_replace('_', ' ', $key)),
                "path" => $path
            ];
        }
    }
}

echo json_encode($files);

$stmt->close();
$conn->close();
?>