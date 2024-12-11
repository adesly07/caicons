<?php
session_start();
include('../conx.php');
// Redirect if not logged in
if (!isset($_SESSION['username'])&&(!isset($_SESSION['department']))) {
    header('Location: ../index.php');
    exit();
}
$username = $_SESSION['username'];
$department = $_SESSION['department'];
$myname = $_SESSION['first_name'];
$email = $_SESSION['email'];
$inv = $_SESSION['invoice_number'];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $walletAmount = $_POST['walletAmount'];
    $applicantId = $_SESSION['applicant_id']; // Ensure the applicant's ID is stored in session

    // Fetch the current year and count the number of registrations for that year
    $currentYear = date("y");

    // Fetch the latest registration number for the current year to generate a new serial number
    $result = $conn->query("SELECT MAX(reg_num) AS max_reg_num FROM applicants WHERE p_status = 'CONFIRMED' AND reg_num LIKE 'CAICON/PF/$currentYear/%'");
    $row = $result->fetch_assoc();
    $lastRegNum = $row['max_reg_num'];
    
    if ($lastRegNum) {
        $lastSerial = (int) substr($lastRegNum, -4);
        $newSerial = str_pad($lastSerial + 1, 4, '0', STR_PAD_LEFT);
    } else {
        $newSerial = '0001';
    }

    // Create new registration number
    $registrationNumber = "CAICON/PF/$currentYear/$newSerial";
    $p_status = "CONFIRMED";
    $pwd = substr(str_shuffle(strtoupper(sha1(rand() . time() . "my salt string"))),0, 8);
    $pwd_hash = password_hash($pwd, PASSWORD_BCRYPT);
    // Update wallet balance and set registration number for the applicant
    $updateQuery = "UPDATE applicants SET w_amt = w_amt + ?, reg_num = ?, pwd = ?, p_decr = ?, p_status = ? WHERE invoice_number = ?";
    $stmt = $conn->prepare($updateQuery);
    $stmt->bind_param("dsssss", $walletAmount, $registrationNumber, $pwd_hash, $pwd, $p_status, $inv);
    if ($stmt->execute()) {
        $_SESSION['reg_num'] = $registrationNumber;
        $_SESSION['pwd'] = $pwd;
        header('location:s_email.php');
       /* echo "<script>
                alert('Wallet updated successfully. Your registration number is: $registrationNumber');
                window.location.href = 'wallet.php';
              </script>";*/
    } else {
        echo "<script>alert('An error occurred while updating the wallet.'); window.history.back();</script>";
    }
}
?>
