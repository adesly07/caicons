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
$section = $_SESSION['s_session'];
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
<body class="bg-gray-100 h-screen flex flex-col">

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
        <div class=" flex-grow p-6 overflow-auto bg-white">
            <h2 class="text-xl font-bold text-center mb-6">Wallets</h2>

            <!-- Tabs for Staylites and Applicants -->
            <div class="flex space-x-2 mb-6">
            <button id="staylitesTab" onclick="showTab('staylites')" class="py-2 px-4 text-white bg-gray-400 hover:bg-sky-300 rounded-md">Staylites</button>
            <button id="applicantsTab" onclick="showTab('applicants')" class="py-2 px-4 text-white bg-gray-400 hover:bg-sky-300 rounded-md"><?php echo $section; ?> Applicants</button>
        </div>

        <!-- Staylites Table -->
        <div id="staylites" class="tab-content hidden">
            <input type="text" id="staylitesSearch" onkeyup="searchTable('staylitesTable', 'staylitesSearch')" placeholder="Search here..." class="mb-4 p-2 border rounded w-64">
            <table class="min-w-full bg-white border" id="staylitesTable">
                <thead class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                    <tr>
                        <th class="py-3 px-6 text-left">REGISTRATION NUMBER</th>
                        <th class="py-3 px-6 text-left">Name</th>
                        <th class="py-3 px-6 text-left">Phone Number</th>
                        <th class="py-3 px-6 text-left">Wallet Balance(&#8358;)</th>
                    </tr>
                </thead>
                <tbody class="text-gray-700 text-sm">
                    <!-- Rows populated by PHP (staylites data) -->
                    <?php include ('fetch_staylites.php'); ?>
                </tbody>
            </table>
        </div>

        <!-- Applicants Table -->
        <div id="applicants" class="tab-content hidden">
            <input type="text" id="applicantsSearch" onkeyup="searchTable('applicantsTable', 'applicantsSearch')" placeholder="Search here..." class="mb-4 p-2 border rounded w-64">
            <table class="min-w-full bg-white border" id="applicantsTable">
                <thead class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                    <tr>
                        <th class="py-3 px-6 text-left">Invoice number</th>
                        <th class="py-3 px-6 text-left">Names</th>
                        <th class="py-3 px-6 text-left">Course</th>
                        <th class="py-3 px-6 text-left">Amount(&#8358;)</th>
                        <th class="py-3 px-6 text-left">Status</th>
                        
                    </tr>
                </thead>
                <tbody class="text-gray-700 text-sm">
                    <!-- Rows populated by PHP (applicants data) -->
                    <?php include ('fetch_applicants.php'); ?>
                </tbody>
            </table>
        </div>
    </div>
    

    <script src="js/script2.js"></script>
</body>
</html>
