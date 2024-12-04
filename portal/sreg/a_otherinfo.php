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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $hasCondition = $_POST['hasCondition'];
    $conditionDetails = isset($_POST['conditionDetails']) ? $_POST['conditionDetails'] : NULL;
    $otherInfo = $_POST['otherInfo'];

    $sql = "INSERT INTO health_info (reg_num, hasCondition, conditionDetails, otherInfo) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $username, $hasCondition, $conditionDetails, $otherInfo);

    if ($stmt->execute()) {
        echo "<script>alert('Record submitted successfully!'); window.location.href = 'photocard.php';</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $stmt->close();
    $conn->close();
}
?>
