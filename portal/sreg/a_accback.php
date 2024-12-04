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

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $registration_numbers = $username;
    $institution_names = $_POST['institution_name'];
    $places_countries = $_POST['place_country'];
    $from_years = $_POST['from_year'];
    $to_years = $_POST['to_year'];
    $qualifications = $_POST['qualification'];

    $query = "INSERT INTO schools_attended (reg_num, institution_name, place_country, from_year, to_year, qualification) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($query);

    // Begin transaction
    $conn->begin_transaction();

    try {
        for ($i = 0; $i < count($institution_names); $i++) {
            $stmt->bind_param(
                "sssiss",
                $registration_numbers,
                $institution_names[$i],
                $places_countries[$i],
                $from_years[$i],
                $to_years[$i],
                $qualifications[$i]
            );
            $stmt->execute();
        }
        // Commit transaction
        $conn->commit();
        echo "<script>alert('Record saved successfully'); window.location.href='result.php';</script>";
    } catch (Exception $e) {
        $conn->rollback(); // Rollback changes if any error occurs
        echo "Failed to save records: " . $e->getMessage();
    }
}
?>
