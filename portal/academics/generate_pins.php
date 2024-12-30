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
$section = '2023/2024';
// Function to generate random numbers for pin and serial number
function generateRandomNumber($length = 10) {
    return substr(str_shuffle('0123456789'), 0, $length);
}

// Generate 10 pins and serial numbers
$pins = [];
for ($i = 0; $i < 50; $i++) {
    $pin = generateRandomNumber();
    $serial_number = rand(11111, 99999);
    $pins[] = [
        'pin' => $pin,
        'serial_number' => $serial_number
    ];

    // Insert into database
    $sql = "INSERT INTO pins (pin, serial_number) VALUES ('$pin', '$serial_number')";
    if (!$conn->query($sql)) {
        echo json_encode(["success" => false, "error" => $conn->error]);
        exit;
    }
}

echo json_encode(["success" => true, "pins" => $pins]);

$conn->close();
?>