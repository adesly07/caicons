<?php
include('../conx.php');

// Get JSON data from the client
$data = json_decode(file_get_contents("php://input"), true);

if (!isset($data['id']) || !isset($data['table'])) {
    echo json_encode(["status" => "error", "message" => "Invalid request data."]);
    exit();
}

$id = intval($data['id']);
$table = preg_replace('/[^a-z_]/', '', $data['table']); // Sanitize table name

// Check if the table exists
$allowedTables = ['schools_attended', 'applicant_results', 'applicant_documents', 'relatives', 'health_info'];
if (!in_array($table, $allowedTables)) {
    echo json_encode(["status" => "error", "message" => "Invalid table name."]);
    exit();
}

// Delete the record
$query = "DELETE FROM $table WHERE id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $id);
$stmt->execute();

if ($stmt->affected_rows > 0) {
    echo json_encode(["status" => "success"]);
} else {
    echo json_encode(["status" => "error", "message" => "Record not found or could not be deleted."]);
}

// Close the connection
$conn->close();
/*$id = $_POST['id'];
$table = $_POST['table'];

$query = "DELETE FROM $table WHERE id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $id);
$stmt->execute();

if ($stmt->affected_rows > 0) {
    echo json_encode(["status" => "success"]);
} else {
    echo json_encode(["status" => "error"]);
}

$conn->close(); */
?>
