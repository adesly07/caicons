<?php
session_start();
include("../conx.php");
$newInvoiceNumber = $_SESSION["invoice_number"];
//print_r($_SESSION);
// Fetch invoice details by invoice number (or student ID)
//$invoiceNumber = 'INV-00001'; // Replace this with dynamic data, e.g., from a GET request
$sql = "SELECT * FROM applicants WHERE invoice_number = '$newInvoiceNumber'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $data = $result->fetch_assoc();
    $course_id = $data['course_id'];
} 

$sql2 = "SELECT * FROM courses where id = '$course_id'";
$result2 = $conn->query($sql2);

if ($result2->num_rows > 0) {
    $row = $result2->fetch_assoc();
    $course = $row['course'];
} 
// Fetch contact data
$sql = "SELECT * FROM contact LIMIT 1";
$result = $conn->query($sql);
$contact_data = null;

if ($result->num_rows > 0) {
    $contact_data = $result->fetch_assoc();
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../../cai.jpg" type="image/x-icon">
    <title>CAICONS | APPLICATION INVOICE</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/tailwindcss-jit-cdn@tailwindcss/latest/dist/tailwind.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="container mx-auto p-6 bg-white rounded-lg shadow-lg mt-10 max-w-3xl">
        <!-- College Details -->
        <div class="flex flex-row gap-10">
            <div class="flex-item text-center">
                <img src="../../assets/images/about_logo.png" alt="Logo">
            </div>
            <div class="flex-item text-center mb-6">
                <h1 class="text-2xl font-bold">CAI COLLEGE OF NURSING SCIENCES</h1>
                <p class="text-gray-600"><?php echo $contact_data['address']; ?></p>
                <p class="text-gray-600">Phone: <?php echo $contact_data['phone_number']; ?> | Email: <?php echo $contact_data['email_address']; ?></p>
            </div>
        </div>
        <!-- Invoice Title -->
        <div class="mb-4 text-center">
            <h2 class="text-xl font-bold">APPLICATION FORM INVOICE</h2>
           
        </div>
        <!-- Invoice Title -->
        <div class="mb-4 text-right">
            <h2 class="text-lg font-bold"><?= $data['invoice_number'] ?></h2>
            <h5 class="text-lg font-bold"><?= $data['a_date'] ?></h5>
           
        </div>

        <!-- Student Details -->
        <div class="border-b pb-4 mb-4">
            <h3 class="text-xl font-bold">Student Details</h3>
            <p><strong>Name:</strong> <?= $data['surname'] ?> <?= $data['first_name'] ?> <?= $data['middle_name'] ?></p>
            <p><strong>Email:</strong> <?= $data['email'] ?></p>
            <p><strong>Phone:</strong> <?= $data['phone_number'] ?></p>
            <p><strong>Course:</strong> <?php echo $course; ?></p>
        </div>
        
        <!-- Invoice Details -->
        <div class="border-b pb-4 mb-4">
            <h3 class="text-xl font-bold">Invoice Details</h3>
            <p><strong>Application Amount(&#8358;): </strong> <?= number_format($row['f_amount'], 2) ?></p>
            <p><strong>Transaction Fee(&#8358;): </strong> <?= number_format($row['t_fee'], 2) ?></p>
            <p><strong>Total(&#8358;):</strong> <?= number_format($row['f_amount'] + $row['t_fee'], 2) ?></p>
        </div>

        <!-- Payment Instructions -->
        <div class="border-b pb-4 mb-4">
            <h3 class="text-xl font-bold">Payment Instructions</h3>
            <p>Please make all payments to the following bank account:
            <p><strong>Bank Name:</strong> Zenith Bank</p>
            <p><strong>Account Name:</strong> Catholic Archidocese of Ibadan PRJ-A/C</p>
            <p><strong>Account Number:</strong> 1229702614</p>
            <p>&nbsp;</p>
            <p>After making your payment, kindly send the proof of payment (e.g., receipt or transaction slip) to <em class="text-sky-400">accounts@caicons.edu.ng</em> for confirmation and wallet top-up.</p>
        </div>

        <!-- Action Button -->
        <div class="text-center">
            <a href="logapp.php">Logout</a> | 
            <button onclick="window.print()" class="bg-blue-500 text-white px-4 py-2 rounded shadow hover:bg-blue-600">
                Print Invoice
            </button>
        </div>
    </div>
</body>
</html>
