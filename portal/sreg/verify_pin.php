<?php
include("../conx.php");
session_start();
$pin = $_POST['pin'];
$serial_number = $_POST['serial_number'];

$sql = "SELECT * FROM pins WHERE pin='$pin' AND serial_number='$serial_number' AND status='UNUSED'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $data = $result->fetch_assoc();
    $section = $data['sch_session'];
    $_SESSION['sch_session'] = $section;
    $_SESSION['pin'] = $pin;
    $_SESSION['serial_number'] = $serial_number;
    header('location:new_reg.php');
} else {
    echo "<script>alert('Invalid or already used pin/serial number.'); window.location.href='index.php';</script>";
}

$conn->close();
?>