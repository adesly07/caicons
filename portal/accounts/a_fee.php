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
        <div class="container mx-auto max-w-lg bg-white rounded-lg shadow-lg p-6">
            <h2 class="text-2xl font-bold text-center mb-6">Application Fee Section | <a href = "view_app.php">View Fee</a></h2>
            <form id="applicationAmountForm" method="POST" action="save_amount.php">
                <div class="mb-4">
                    <label for="course" class="block text-gray-700 font-semibold">Course</label>
                    <input type="text" id="course" name="course" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-sky-300" required>
                </div>
                <div class="mb-4">
                    <label for="f_amount" class="block text-gray-700 font-semibold">Form Amount</label>
                    <input type="number" id="f_amount" name="f_amount" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-sky-300" required>
                </div>
                <div class="mb-4">
                    <label for="t_fee" class="block text-gray-700 font-semibold">Form Transaction Fee</label>
                    <input type="number" id="t_fee" name="t_fee" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-sky-300" required>
                </div>
                <div class="mb-4">
                    <label for="acceptance_fee" class="block text-gray-700 font-semibold">Acceptance Fee</label>
                    <input type="number" id="acceptance_fee" name="acceptance_fee" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-sky-300" required>
                </div>
                <div class="mb-4">
                    <label for="accp_tran_fee" class="block text-gray-700 font-semibold">Acceptance Transaction Fee</label>
                    <input type="number" id="accp_tran_fee" name="accp_tran_fee" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-sky-300" required>
                </div>
                <button type="submit" class="w-full bg-sky-400 text-white font-semibold py-2 rounded-md hover:bg-sky-300 transition duration-200">Save Amount</button>
            </form>
        </div>
    </div>
    <script src="js/validation.js"></script>
</body>
</html>
