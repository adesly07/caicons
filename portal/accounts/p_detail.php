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
$item = $_SESSION['payment_items'];
$section = $_SESSION['section'];
$sql3 = "SELECT SUM(t_amount) FROM payment WHERE paid_for = '$item' AND sch_session = '$section' AND p_status = 'PAID'";
    $result2 = $conn->query($sql3);

if ($result2->num_rows > 0) {
    $row2 = $result2->fetch_assoc();
    $t_amt = $row2['SUM(t_amount)'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../../cai.jpg" type="image/x-icon">
    <title>CAICONS PORTAL | <?php echo $department; ?></title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/tailwindcss-jit-cdn@tailwindcss/latest/dist/tailwind.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script defer src="js/script.js"></script> <!-- Add external JS file for controlling the animation -->
</head>
<body class="bg-sky-200">
    <!-- Header Section -->
    <?php
        include('header.php');
    ?>
    <div class="flex flex-grow overflow-hidden">
        <div class="container mx-auto">
            <h1 class="text-xl font-bold text-center mb-3 mt-6"><a href="s_pitem.php">Back</a> | <?php echo $section; ?> Session <?php echo $item; ?> Account</h1>
            <h3 class="text-xl font-bold text-left ml-4 mb-8 mt-6">Total Amount(&#8358;): <?php echo number_format($t_amt,2); ?></h3>
            <div class="overflow-auto">
                <table class="min-w-full bg-white shadow-md rounded-lg">
                    <thead>
                        <tr class="bg-gray-200 text-gray-600">
                            <th class="py-3 px-6 text-left">Registration Number</th>
                            <th class="py-3 px-6 text-left">Invoice Number</th>
                            <th class="py-3 px-6 text-left">Receipt Number</th>
                            <th class="py-3 px-6 text-left">Amount(&#8358;)</th>
                            <th class="py-3 px-6 text-left">Transaction Fee(&#8358;)</th>
                            <th class="py-3 px-6 text-left">Date Paid</th>
                            
                        </tr>
                    </thead>
                    <?php
                        $query = "SELECT reg_num, invoice_number, receipt_number, f_amount, t_fee, date_paid FROM payment WHERE paid_for = '$item' AND sch_session = '$section' AND p_status = 'PAID'";
                        $result = $conn->query($query);
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                    ?>
                    <tbody class="divide-y divide-gray-200">
                        <tr>
                            <td class="py-2 px-4"><a href="p_receipt2.php?reg_num=<?php echo $row['reg_num']; ?>"><?php echo $row['reg_num']; ?></a></td>
                            <td class="py-2 px-4"><a href="p_receipt2.php?reg_num=<?php echo $row['reg_num']; ?>"><?php echo $row['invoice_number']; ?></a></td>
                            <td class="py-2 px-4"><a href="p_receipt2.php?reg_num=<?php echo $row['reg_num']; ?>"><?php echo $row['receipt_number']; ?></a></td>
                            <td class="py-2 px-4"><a href="p_receipt2.php?reg_num=<?php echo $row['reg_num']; ?>"><?php echo number_format($row['f_amount'],2); ?></a></td>
                            <td class="py-2 px-4"><a href="p_receipt2.php?reg_num=<?php echo $row['reg_num']; ?>"><?php echo number_format($row['t_fee'],2); ?></a></td>
                            <td class="py-2 px-4"><a href="p_receipt2.php?reg_num=<?php echo $row['reg_num']; ?>"><?php echo $row['date_paid']; ?></a></td>
                        </tr>
                    </tbody>
                    <?php } }?>
                </table>
            </div>
        </div>

    </div>
</body>
</html>
