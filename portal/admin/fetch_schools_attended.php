<?php
include('../conx.php');

$regNo = $_GET['regNo'];
$sql = "SELECT id, institution_name, from_year, to_year FROM schools_attended WHERE reg_num = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param('s', $regNo);
$stmt->execute();
$result = $stmt->get_result();

$data = [];
while ($row = $result->fetch_assoc()) {
    $row['actions'] = '<button class="text-red-500" onclick="deleteRecord(\'schools_attended\', ' . $row['id'] . ')">Delete</button>';
    $data[] = $row;
}
echo json_encode($data);
$stmt->close();
$conn->close();

?>