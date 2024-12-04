<?php
include("../conx.php");

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
    <script defer src="js/script.js"></script> <!-- Add external JS file for controlling the animation -->
</head>
<body class="bg-sky-400 flex flex-col min-h-screen">
    <!-- Login Section -->
    <div class="flex items-center justify-center flex-grow">
        <div class="bg-white p-8 rounded-lg shadow-md w-full max-w-md">
            <h2 class="text-2xl font-semibold text-center text-sky-400 mb-6">Student Registration</h2>
            <form action="verify_pin.php" method="POST" class="space-y-4">
                <!-- Registration Number Field -->
                <div class="mb-4">
                    <label for="pin" class="block text-sm font-medium text-gray-700">Pin</label>
                    <input type="text" id="pin" name="pin" class="pl-10 p-3 border border-gray-300 rounded-md w-full focus:ring focus:ring-blue-200" required>
                </div>
                <div class="mb-4">
                    <label for="serial_number" class="block text-sm font-medium text-gray-700">Serial Number</label>
                    <input type="text" id="serial_number" name="serial_number" class="pl-10 p-3 border border-gray-300 rounded-md w-full focus:ring focus:ring-blue-200" required>
                </div>
                <button type="submit" class="bg-sky-400 text-white px-4 py-2 rounded hover:bg-sky-300">
                    Verify
                </button>
            </form>
        </div>
    </div>
    
</body>
</html>
