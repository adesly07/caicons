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

// Fetch the data from the applicant_results table
$sql = "SELECT exam_type_first_sitting, subject_first_sitting, exam_type_second_sitting, subject_second_sitting
        FROM applicant_results
        WHERE reg_num = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        // Decode the JSON data
        $exam_type_first = $row['exam_type_first_sitting'];
        $subjects_first = json_decode($row['subject_first_sitting'], true);

        $exam_type_second = $row['exam_type_second_sitting'];
        $subjects_second = json_decode($row['subject_second_sitting'], true);

        echo "<h3>First Sitting</h3>";
        echo "<p><strong>Examination Type:</strong> " . htmlspecialchars($exam_type_first) . "</p>";
        echo "<table border='1' cellpadding='5' cellspacing='0'>";
        echo "<tr><th>Subject</th><th>Grade</th></tr>";
        foreach ($subjects_first as $subject => $grade) {
            echo "<tr><td>" . htmlspecialchars($subject) . "</td><td>" . htmlspecialchars($grade) . "</td></tr>";
        }
        echo "</table>";

        if ($exam_type_second) {
            echo "<h3>Second Sitting</h3>";
            echo "<p><strong>Examination Type:</strong> " . htmlspecialchars($exam_type_second) . "</p>";
            echo "<table border='1' cellpadding='5' cellspacing='0'>";
            echo "<tr><th>Subject</th><th>Grade</th></tr>";
            foreach ($subjects_second as $subject => $grade) {
                echo "<tr><td>" . htmlspecialchars($subject) . "</td><td>" . htmlspecialchars($grade) . "</td></tr>";
            }
            echo "</table>";
        }
    }
} else {
    echo "No results found for this applicant.";
}

$stmt->close();
$conn->close();

?>