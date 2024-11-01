<?php
session_start();
require '../../conx.php';

// Redirect if not logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: ../index.php');
    exit();
}
$myDate = date("F d, Y");
$ip = $_SERVER['REMOTE_ADDR'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | CMS</title>
    <link rel="shortcut icon" href="../../cai.jpg" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/tailwindcss-jit-cdn@tailwindcss/latest/dist/tailwind.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" />

</head>
<body class="bg-gray-100">
    <div class="min-h-screen flex flex-col">
        <!-- Header -->
        <?php 
            include("header.php");
        ?>


        <!-- Content -->
        <div class="flex">

            <!-- Sidebar -->
            <?php 
                include("navbar.php");
            ?>

            <!-- Main section -->
            <main class="w-4/5 p-6 bg-white shadow-lg">
                <h1 class="text-2xl font-bold mb-6">Overview</h1>
                <div class="bg-white p-6 rounded-lg shadow">
                <h2 class="text-xl font-bold mb-2 text-green-700">Curent Date and Time:</h2>
                <p class="text-x1 font-bold mb-4 text-red-700"><?php echo $myDate; ?></p>
                <h2 class="text-x1 font-bold mb-2 text-green-700">Curent IP Address:</h2>
                <p class="text-x1 font-bold mb-4 text-red-700"><?php echo $ip; ?></p>
            </div>
            </main>
        </div>
    </div>
</body>
</html>
