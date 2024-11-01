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
$applicant_id = $_SESSION['applicant_id'];
$inv = $_GET['invoice_number'];
$_SESSION['invoice_number'] = $inv;
$sql = "SELECT * FROM applicants WHERE invoice_number = '$inv'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $data = $result->fetch_assoc();
    $course_id = $data['course_id'];
} 
$sql2 = "SELECT * FROM courses where id = '$course_id'";
$result2 = $conn->query($sql2);

if ($result2->num_rows > 0) {
    $row = $result2->fetch_assoc();
    $f_amount = $row['f_amount'];
    $t_fee = $row['t_fee'];
    $total = $f_amount + $t_fee;

} 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CAICONS PORTAL | <?php echo $department; ?></title>
    <link rel="shortcut icon" href="../../cai.jpg" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/tailwindcss-jit-cdn@tailwindcss/latest/dist/tailwind.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" />
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="w-full max-w-lg bg-white rounded-lg shadow-lg p-6">
        <h2 class="text-2xl font-bold text-center mb-6">Add Wallet Fund</h2>
        
        <!-- Display Invoice Information -->
        <div id="invoiceInfo" class="mb-4 p-4 bg-gray-50 rounded-md">
            <h3 class="text-xl font-semibold text-gray-800">Name: <?= $data['surname'] ?> <?= $data['first_name'] ?> <?= $data['middle_name'] ?></h3>
            <h3 class="text-gray-800">Invoice Number: <?php echo $inv; ?></h3>
            <p id="invoiceAmount" class="text-gray-600">Amount: <?php echo number_format($total,2); ?></p>
            <p id="invoiceDate" class="text-gray-600">Date: <?= $data['a_date'] ?></p>
        </div>

        <!-- Add Wallet Form -->
        <form id="walletForm" method="POST" action="add_wallet.php">
            <div class="mb-4">
                <label for="walletAmount" class="block text-gray-700 font-semibold">Add Amount</label>
                <input type="number" id="walletAmount" name="walletAmount" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400" min="1" required>
            </div>
            <button type="submit" class="w-full bg-sky-500 text-white font-semibold py-2 rounded-md hover:bg-sky-300 transition duration-200">Add to Wallet</button>
        </form>

        <p id="successMessage" class="text-green-500 text-sm mt-4 hidden">Wallet updated successfully. Your registration number is: <span id="registrationNumber"></span></p>
    </div>

    <script src="script.js"></script>
</body>
</html>
