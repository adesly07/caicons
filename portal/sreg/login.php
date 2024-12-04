<?php
session_start();
include("../conx.php");
$sql3 = "SELECT * FROM current where s_category = 'Applicant'";
$result3 = $conn->query($sql3);
$row3 = $result3->fetch_assoc();
$section = $row3['s_session'];
$_SESSION['s_session'] = $section;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../../cai.jpg" type="image/x-icon">
    <title>CAICONS PORTAL</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/tailwindcss-jit-cdn@tailwindcss/latest/dist/tailwind.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-sky-400 flex items-center justify-center min-h-screen">
    <div class="bg-white shadow-lg rounded-lg overflow-hidden flex flex-col md:flex-row w-full max-w-3xl">
        <!-- Left Section: Student Picture -->
        <div class="md:w-1/2 flex items-center justify-center bg-sky-500">
            <img src="../../assets/images/applyimg.jpg" alt="Student Picture" class="h-40 w-40 md:h-60 md:w-60 rounded-full border-4 border-white">
        </div>

        <!-- Right Section: Login Form -->
        <div class="p-6 md:w-1/2">
            <h2 class="text-2xl font-semibold text-center text-sky-600 mb-4">Student Login</h2>
            <form id="studentLoginForm" method="POST" action="student_login.php">
                <div class="mb-4">
                    <label for="username" class="block text-gray-700 font-semibold">Registration Number</label>
                    <input type="text" id="username" name="username" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-sky-400" required>
                </div>
                <div class="mb-4">
                    <label for="password" class="block text-gray-700 font-semibold">Password</label>
                    <input type="password" id="password" name="password" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-sky-400" required>
                </div>
                <button type="submit" class="w-full bg-sky-500 text-white font-semibold py-2 rounded-md hover:bg-sky-300 transition duration-200">Login</button>
            </form>
            <p id="errorMessage" class="text-red-500 text-sm mt-4 hidden">Invalid login details. Please try again.</p>
        </div>
    </div>

    <script src="assets/js/student_script.js"></script>
</body>
</html>
