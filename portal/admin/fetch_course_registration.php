<?php
include('../conx.php');

$regNo = $_GET['regNo'];
$sql = "SELECT id, level, course_code, course_title, unit, semester, sch_session FROM course_registration WHERE reg_num = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param('s', $regNo);
$stmt->execute();
$result = $stmt->get_result();

$data = [];
while ($row = $result->fetch_assoc()) {
    $row['actions'] = '<button class="text-red-500" onclick="deleteRecord(\'course_registration\', ' . $row['id'] . ')">Delete</button>';
    $data[] = $row;
}
echo json_encode($data);
$stmt->close();
$conn->close();

?>