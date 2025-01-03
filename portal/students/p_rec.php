<?php
session_start();
include('../conx.php');
// Redirect if not logged in
if (!isset($_SESSION['username'])) {
    header('Location: index.php');
    exit();
}
$username = $_SESSION['username'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CAICONS PORTAL | RECEIPTS</title>
    <link rel="shortcut icon" href="../../cai.jpg" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/tailwindcss-jit-cdn@tailwindcss/latest/dist/tailwind.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" />
</head>
<body class="bg-white h-screen flex flex-col">

        <!-- Header Section -->
        <?php
            include('header.php');
        ?>

        <!-- Main Dashboard Layout -->
    <div class="flex flex-grow overflow-hidden">
        <div class="container mx-auto">
            <h1 class="text-xl font-bold text-center mb-8">RECEIPTS</h1>
            <div class="overflow-auto">
                <table class="min-w-full bg-white shadow-md rounded-lg">
                    <thead>
                        <tr class="bg-gray-200 text-gray-600">
                            <th class="py-3 px-6 text-left">Items</th>
                            <th class="py-3 px-6 text-left">Invoice Number</th>
                            <th class="py-3 px-6 text-left">Receipt Number</th>
                            <th class="py-3 px-6 text-left">Amount(&#8358;)</th>
                            <th class="py-3 px-6 text-left">Transaction Fee(&#8358;)</th>
                            <th class="py-3 px-6 text-left">Session</th>
                            <th class="py-3 px-6 text-left">Date Paid</th>
                            
                        </tr>
                    </thead>
                    <?php
                        $query = "SELECT paid_for, invoice_number, receipt_number, f_amount, t_fee, sch_session, date_paid FROM payment WHERE reg_num = '$username' and p_status = 'PAID'";
                        $result = $conn->query($query);
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                
                            
                        
                        
                    ?>
                    <tbody class="divide-y divide-gray-200">
                    <!-- Data from the database will be populated here -->
                        <tr>
                            <td class="py-2 px-4"><a href="p_receipt2.php?rec=<?php echo $row['receipt_number']; ?>&&paid_for=<?php echo $row['paid_for']; ?>"><?php echo $row['paid_for']; ?></a></td>
                            <td class="py-2 px-4"><a href="p_receipt2.php?rec=<?php echo $row['receipt_number']; ?>&&paid_for=<?php echo $row['paid_for']; ?>"><?php echo $row['invoice_number']; ?></a></td>
                            <td class="py-2 px-4"><a href="p_receipt2.php?rec=<?php echo $row['receipt_number']; ?>&&paid_for=<?php echo $row['paid_for']; ?>"><?php echo $row['receipt_number']; ?></a></td>
                            <td class="py-2 px-4"><a href="p_receipt2.php?rec=<?php echo $row['receipt_number']; ?>&&paid_for=<?php echo $row['paid_for']; ?>"><?php echo number_format($row['f_amount'],2); ?></a></td>
                            <td class="py-2 px-4"><a href="p_receipt2.php?rec=<?php echo $row['receipt_number']; ?>&&paid_for=<?php echo $row['paid_for']; ?>"><?php echo number_format($row['t_fee'],2); ?></a></td>
                            <td class="py-2 px-4"><a href="p_receipt2.php?rec=<?php echo $row['receipt_number']; ?>&&paid_for=<?php echo $row['paid_for']; ?>"><?php echo $row['sch_session']; ?></a></td>
                            <td class="py-2 px-4"><a href="p_receipt2.php?rec=<?php echo $row['receipt_number']; ?>&&paid_for=<?php echo $row['paid_for']; ?>"><?php echo $row['date_paid']; ?></a></td>
                        </tr>
                    </tbody>
                    <?php } }?>
                </table>
            </div>
        </div>

    </div>
    
</body>
</html>
