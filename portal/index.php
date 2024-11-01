<?php
include("conx.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../cai.jpg" type="image/x-icon">
    <title>CAICONS PORTAL</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/tailwindcss-jit-cdn@tailwindcss/latest/dist/tailwind.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script defer src="js/script.js"></script> <!-- Add external JS file for controlling the animation -->
</head>
<body class="bg-sky-300">
    <div class="flex items-center justify-center min-h-screen" >
        <div class="w-full max-w-md bg-white rounded-lg shadow-lg p-6">
            <h2 class="text-2xl font-bold text-center mb-6">PORTAL LOGIN</h2>
            <form id="loginForm" method="POST" action="login.php">
                <div class="mb-4">
                    <label for="username" class="block text-gray-700 font-semibold">Username</label>
                    <input type="text" id="username" name="username" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-sky-400" required>
                </div>
                <div class="mb-4">
                    <label for="password" class="block text-gray-700 font-semibold">Password</label>
                    <input type="password" id="password" name="password" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-sky-400" required>
                </div>
                <div class="mb-4">
                    <label for="department" class="block text-gray-700 font-semibold">Department</label>
                    <select id="department" name="department" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-sky-400" required>
                        <option value="Accounts">Accounts</option>
                        <option value="Academics">Academics</option>
                        <option value="Admission">Admission</option>
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
    <div class="bg-sky-400">
        <!-- Third Row (Footer) -->
        <footer class="p-4 bg-sky-400 text-white text-center">
        <p class="mt-2 text-white">&copy; CAICONS, 2023-<?php echo date("Y"); ?>. All rights reserved.</p>
        <p><a href ="#">Powered by CAICONS ICT Unit</a></p>
        </footer>
    </div>
    
    <script src="js/script.js"></script>
</body>
</html>
