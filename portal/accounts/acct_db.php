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
$sql3 = "SELECT * FROM current where s_category = 'Applicant'";
$result3 = $conn->query($sql3);
$row3 = $result3->fetch_assoc();
$section = $row3['s_session'];
$_SESSION['s_session'] = $section;

$sql = "SELECT * FROM current where s_category = 'Staylite'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$section1 = $row3['s_session'];
$_SESSION['s_session'] = $section1;
$sql1 = "SELECT SUM(f_amount) FROM payment WHERE p_status = 'PAID'";
    $result1 = $conn->query($sql1);

if ($result1->num_rows > 0) {
    $row = $result1->fetch_assoc();
    $f_amt = $row['SUM(f_amount)'];
}
$sql5 = "SELECT SUM(t_fee) FROM payment WHERE p_status = 'PAID'";
    $result2 = $conn->query($sql5);

if ($result2->num_rows > 0) {
    $row = $result2->fetch_assoc();
    $t_fee = $row['SUM(t_fee)'];
}
$sql3 = "SELECT SUM(t_amount) FROM payment WHERE p_status = 'PAID'";
    $result2 = $conn->query($sql3);

if ($result2->num_rows > 0) {
    $row = $result2->fetch_assoc();
    $t_amt = $row['SUM(t_amount)'];
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
<body class="bg-white h-screen flex flex-col">

    <!-- Header Section -->
    <?php
        include('header.php');
    ?>

    <!-- Main Dashboard Layout -->
    <div class="flex flex-grow overflow-hidden">

        <!-- Sidebar Menu -->
    <?php
        include('navbar.php');
    ?>

        <!-- Main Content Area -->
        <main class="flex-grow p-6 overflow-auto">
            <h2 class="text-2xl font-semibold text-gray-800 mb-4">Welcome to Your Dashboard</h2>
            <p class="text-gray-600 mb-6">Use the menu on the left to navigate through the dashboard options.</p>

            <!-- Sample Content Section -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <div class="bg-white p-4 shadow rounded-lg">
                    <a href="#">
                        <h3 class="font-semibold text-lg text-gray-800">Payment Items Account Summary</h3>
                        <p class="text-gray-600 font-bold">&#8358;<?php echo number_format($f_amt,2); ?></p>
                    </a>
                </div>
                <div class="bg-white p-4 shadow rounded-lg">
                    <a href="#">
                        <h3 class="font-semibold text-lg text-gray-800">Transaction Fees Summary</h3>
                        <p class="text-gray-600 font-bold">&#8358;<?php echo number_format($t_fee,2); ?></p>
                    </a>
                </div>
                <div class="bg-white p-4 shadow rounded-lg">
                    <a href="s_pitem.php">
                        <h3 class="font-semibold text-lg text-gray-800">Account Summary</h3>
                        <p class="text-gray-600 font-bold">&#8358;<?php echo number_format($t_amt,2); ?></p>
                    </a>
                </div>
            </div>
        </main>
    </div>

    <script src="js/script.js"></script>
</body>
</html>
