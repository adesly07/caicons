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

// Prepare SQL statement
$stmt = $conn->prepare("INSERT INTO relatives (reg_num, relative_type, r_name, r_address, r_phone, r_email) VALUES (?, ?, ?, ?, ?, ?)");

foreach ($_POST['relative_type'] as $index => $type) {
  $name = $_POST['name'][$index];
  $address = $_POST['address'][$index];
  $phone = $_POST['phone'][$index];
  $email = !empty($_POST['email'][$index]) ? $_POST['email'][$index] : null;

  // Bind parameters and execute statement
  $stmt->bind_param("ssssss", $username, $type, $name, $address, $phone, $email);
  $stmt->execute();
}

$stmt->close();
$conn->close();

echo "<script>alert('Documents uploaded successfully'); window.location.href='other_info.php';</script>";

?>
