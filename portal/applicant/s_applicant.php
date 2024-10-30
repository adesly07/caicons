<?php
include("../conx.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve and sanitize form inputs
    $surname = mysqli_real_escape_string($conn, $_POST['surname']);
    $first_name = mysqli_real_escape_string($conn, $_POST['first_name']);
    $middle_name = mysqli_real_escape_string($conn, $_POST['middle_name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phone_number = mysqli_real_escape_string($conn, $_POST['phone_number']);
    $nationality = mysqli_real_escape_string($conn, $_POST['nationality']);

    
    // Generate a random number for verification
    $invoice_num = rand(1000, 9999);

    // Store the data in the database
    $query = "INSERT INTO applicants (surname, first_name, middle_name, email, phone_number, nationality) 
              VALUES ('$surname', '$first_name', '$middle_name', '$email', '$phone_number', '$nationality')";

    if (mysqli_query($conn, $query)) {
        echo "<script>alert('Application submitted successfully!'); window.location.href='login.php';</script>";
    } else {
        echo "<script>alert('Error: Could not submit application.'); window.history.back();</script>";
    }
}
?>
