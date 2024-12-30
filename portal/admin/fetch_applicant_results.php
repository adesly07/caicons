<?php
include('../conx.php');

$regNo = $_GET['regNo'];
$sql = "SELECT id, exam_type_first_sitting, subject_first_sitting, exam_type_second_sitting, subject_second_sitting FROM applicant_results WHERE reg_num = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param('s', $regNo);
$stmt->execute();
$result = $stmt->get_result();

$data = [];
while ($row = $result->fetch_assoc()) {
    $row['actions'] = '<button class="text-red-500" onclick="deleteRecord(\'applicant_results\', ' . $row['id'] . ')">Delete</button>';
    $data[] = $row;
}
echo json_encode($data);
$stmt->close();
$conn->close();

?>