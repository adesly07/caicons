<?php
session_start();
include("../conx.php");
if (!isset($_SESSION['username'])) {
    header('Location: index.php');
    exit();
}
$username = $_SESSION['username'];
$section = $_SESSION['s_session'];
$inv = $_GET['inv'];
$item = $_GET['paid_for'];
$sql = "SELECT * FROM s_invoice WHERE invoice_number = '$inv' and paid_for = '$item'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $data = $result->fetch_assoc();
    $t_amount = $data['t_amount'];
    $t_fee = $data['t_fee'];
    $total = $t_amount + $t_fee;
} 

$sql = "SELECT * FROM applicants WHERE reg_num = '$username'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $rows = $result->fetch_assoc();
    $course_id = $rows['course_id'];
    $w_amt = $rows['w_amt'];
} 
$_SESSION['t_amount'] = $t_amount;
$_SESSION['t_fee'] = $t_fee;
$_SESSION['w_amt'] = $w_amt;
$_SESSION['course_id'] = $course_id;
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
    <title>CAICONS | INVOICE</title>
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
            <h2 class="text-xl font-bold"><?php echo strtoupper($item); ?> INVOICE</h2>
           
        </div>
        <!-- Invoice Title -->
        <div class="mb-4 text-right">
            <h2 class="text-lg font-bold"><?= $data['invoice_number'] ?></h2>
            <h5 class="text-lg font-bold"><?= $data['g_date'] ?></h5>
           
        </div>
        <div class="border-b pb-4 mb-4 text-right">
            <form method="POST" action="process_payment.php">
            <input type="hidden" id="amt_p" name="amt_p" value="<?php echo $total; ?>">
                <button class="w-40 bg-sky-400 text-white font-semibold py-2 rounded-md hover:bg-sky-300 transition duration-200">
                    Pay Now
                </button>
            </form>
        </div>

        <!-- Student Details -->
        <div class="border-b pb-4 mb-4">
            <h3 class="text-xl font-bold">Student Details</h3>
            <p><strong>Name:</strong> <?= $rows['surname'] ?> <?= $rows['first_name'] ?> <?= $rows['middle_name'] ?></p>
            <p><strong>Email:</strong> <?= $rows['email'] ?></p>
            <p><strong>Phone:</strong> <?= $rows['phone_number'] ?></p>
            <p><strong>Course:</strong> <?php echo $course; ?></p>
            <p><strong>Wallet Balance(&#8358;):</strong> <?= number_format($rows['w_amt'],2) ?></p>
        </div>
        
        <!-- Invoice Details -->
        <div class="border-b pb-4 mb-4">
            <h3 class="text-xl font-bold">Invoice Details</h3>
            <p><strong><?php echo $item; ?> Amount(&#8358;): </strong> <?= number_format($data['t_amount'], 2) ?></p>
            <p><strong>Transaction Fee(&#8358;): </strong> <?= number_format($data['t_fee'], 2) ?></p>
            <p><strong>Total(&#8358;):</strong> <?= number_format($data['t_amount'] + $data['t_fee'], 2) ?></p>
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
            <a href="v_invoice.php">Back</a> | 
            <button onclick="window.print()" class="bg-blue-500 text-white px-4 py-2 rounded shadow hover:bg-blue-600">
                Print Invoice
            </button>
        </div>
    </div>
</body>
</html>
