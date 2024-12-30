<?php
include('../conx.php');

$regNo = $_GET['regNo'];
$sql = "SELECT id, o_level_first_sitting, o_level_second_sitting, birth_certificate, marriage_certificate, passport FROM applicant_documents WHERE reg_num = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param('s', $regNo);
$stmt->execute();
$result = $stmt->get_result();

$data = [];
while ($row = $result->fetch_assoc()) {
    $row['actions'] = '<button class="text-red-500" onclick="deleteRecord(\'applicant_documents\', ' . $row['id'] . ')">Delete</button>';
    $data[] = $row;
}
echo json_encode($data);
$stmt->close();
$conn->close();

?>