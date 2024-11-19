<?php
session_start();
include('../conx.php');
// Redirect if not logged in
if (!isset($_SESSION['username'])) {
    header('Location: index.php');
    exit();
}
$username = $_SESSION['username'];
$sql = "SELECT * FROM applicants WHERE reg_num = '$username'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $data = $result->fetch_assoc();
    $course_id = $data['course_id'];
    $w_amt = $data['w_amt'];
    $inv = $data['invoice_number'];
    $a_status = $data['a_status'];
} 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../cai.jpg" type="image/x-icon">
    <title>CAICONS PORTAL | INVOICE</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/tailwindcss-jit-cdn@tailwindcss/latest/dist/tailwind.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script defer src="js/script.js"></script> <!-- Add external JS file for controlling the animation -->
</head>
<body class="bg-sky-300">
    <div class="flex items-center justify-center min-h-screen" >
        <div class="w-full max-w-md bg-white rounded-lg shadow-lg p-6">
            <h2 class="text-2xl font-bold text-center mb-6">SELECT DETAIL</h2>
            <form id="loginForm" method="POST" action="g_invoice.php">
                
                <div class="mb-4">
                    <label for="invoice" class="block text-gray-700 font-semibold">Department</label>
                    <select id="invoice" name="invoice" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-sky-400" required>
                        <option value="Acceptance">Acceptance</option>
                        <option value="Academics">Academics</option>
                        <option value="Exams and Records">Exams and Records</option>
                        <option value="admin">Administration</option>
                    </select>
                </div>
                <button id="loginButton" type="submit" class="w-full bg-sky-400 text-white font-bold py-2 px-4 rounded hover:bg-sky-300 flex justify-center items-center">
                    <span class="button-text">Login</span>
                    <svg id="loadingSpinner" class="hidden w-5 h-5 ml-3 animate-spin text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"></path>
                    </svg>
                </button>
            </form>
            <p id="errorMessage" class="text-red-500 text-sm mt-4 hidden">Invalid login details. Please try again.</p>
        </div>
    </div>
    
    <script src="js/script.js"></script>
</body>
</html>
