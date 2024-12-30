<?php
include('../conx.php');

$registration_number = $_GET['registration_number'];
$table = $_GET['table'];

$query = "SELECT * FROM $table WHERE reg_num = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("s", $registration_number);
$stmt->execute();

$result = $stmt->get_result();
$data = $result->fetch_all(MYSQLI_ASSOC);

echo json_encode($data);

$conn->close();
?>
