<?php
session_start();
include("../conx.php");
// Redirect if not logged in
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit();
}
$username = $_SESSION['username'];
$section = $_SESSION['s_session'];
$sql = "SELECT * FROM applicants WHERE reg_num = '$username'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $data = $result->fetch_assoc();
    $course_id = $data['course_id'];
    $w_amt = $data['w_amt'];
    $inv = $data['invoice_number'];
} 

$sql2 = "SELECT * FROM courses where id = '$course_id'";
$result2 = $conn->query($sql2);

if ($result2->num_rows > 0) {
    $row = $result2->fetch_assoc();
    $course = $row['course'];
    $f_amount = $row['f_amount'];
    $t_fee = $row['t_fee'];
    $total = $f_amount + $t_fee;

} 
$_SESSION['invoice_number'] = $inv;
$_SESSION['f_amount'] = $f_amount;
$_SESSION['t_fee'] = $t_fee;
$_SESSION['w_amt'] = $w_amt;
$_SESSION['course_id'] = $course_id;
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
    <title>CAICONS | APPLICATION FORM</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/tailwindcss-jit-cdn@tailwindcss/latest/dist/tailwind.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="container mx-auto p-6 bg-white rounded-lg shadow-lg mt-10 max-w-3xl">
        <!-- College Details -->
        <div class="text-center mb-6">
            <h1 class="text-2xl font-bold">CAI COLLEGE OF NURSING SCIENCES</h1>
            <p class="text-gray-600"><?php echo $contact_data['address']; ?></p>
            <p class="text-gray-600">Phone: <?php echo $contact_data['phone_number']; ?> | Email: <?php echo $contact_data['email_address']; ?></p>
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
            <p class="text-green-600"><strong>Wallet Balance:</strong> &#8358;<?= number_format($data['w_amt'],2) ?></p>
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
            <form method="POST" action="process_payment.php">
            <input type="hidden" id="amt_p" name="amt_p" value="<?php echo $total; ?>">
                <button class="w-full bg-sky-400 text-white font-semibold py-2 rounded-md hover:bg-sky-300 transition duration-200">
                    Pay &#8358;<?= number_format($row['f_amount'] + $row['t_fee'], 2) ?> Now
                </button>
            </form>
        </div>
    </div>
</body>
</html>
