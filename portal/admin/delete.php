<?php
include('../conx.php');

$table = $_GET['table'];
$id = $_GET['id'];
if (!in_array($table, ['schools_attended', 'applicant_results', 'applicant_documents', 'relatives', 'health_Info', 'course_registration', 'sch_session'])) {
    die("Invalid table name");
}

$sql = "DELETE FROM $table WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param('i', $id);

if ($stmt->execute()) {
    echo "Record deleted successfully.";
} else {
    echo "Error deleting record: " . $stmt->error;
}

$stmt->close();
$conn->close();

?>