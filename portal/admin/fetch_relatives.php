<?php
include('../conx.php');

$regNo = $_GET['regNo'];
$sql = "SELECT id, relative_type, r_name, r_address, r_phone, r_email FROM relatives WHERE reg_num = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param('s', $regNo);
$stmt->execute();
$result = $stmt->get_result();

$data = [];
while ($row = $result->fetch_assoc()) {
    $row['actions'] = '<button class="text-red-500" onclick="deleteRecord(\'relatives\', ' . $row['id'] . ')">Delete</button>';
    $data[] = $row;
}
echo json_encode($data);
$stmt->close();
$conn->close();

?>