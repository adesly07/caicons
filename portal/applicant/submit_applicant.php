<?php
include("../conx.php");
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $surname = mysqli_real_escape_string($conn, $_POST['surname']);
    $first_name = mysqli_real_escape_string($conn, $_POST['first_name']);
    $middle_name = mysqli_real_escape_string($conn, $_POST['middle_name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $nationality = mysqli_real_escape_string($conn, $_POST['nationality']);
    $course_id = mysqli_real_escape_string($conn, $_POST['course_id']);
    $section = mysqli_real_escape_string($conn, $_POST['section']);
    // Retrieve the last invoice number
$sql = "SELECT invoice_number FROM applicants ORDER BY id DESC LIMIT 1";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // If an invoice number exists, increment the last one
    $row = $result->fetch_assoc();
    $lastInvoiceNumber = $row['invoice_number'];

    // Extract numeric part and increment it
    preg_match('/(\d+)/', $lastInvoiceNumber, $matches);
    $newNumber = (int)$matches[0] + 1;
    $newInvoiceNumber = 'INV-' . str_pad($newNumber, 7, '0', STR_PAD_LEFT); // e.g., INV-0000001
} else {
    // If no invoice number exists, start with 'INV-00001'
    $newInvoiceNumber = 'INV-0000001';
}

    $sql = "INSERT INTO applicants (a_status, surname, first_name, middle_name, email, phone_number, nationality, invoice_number, course_id, sch_session, p_status)
            VALUES ('PENDING', '$surname', '$first_name', '$middle_name', '$email', '$phone', '$nationality', '$newInvoiceNumber', '$course_id', '$section', 'NOT CONFIRMED')";

    if ($conn->query($sql) === TRUE) {
        $_SESSION['invoice_number'] = $newInvoiceNumber;
        header('location:p_invoice.php');
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
}
?>