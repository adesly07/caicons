<?php
session_start();
require '../../conx.php';
// Redirect if not logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: ../index.php');
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../../cai.jpg" type="image/x-icon">
    <title>CAICONS | CMS</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/tailwindcss-jit-cdn@tailwindcss/latest/dist/tailwind.min.js"></script>

</head>
<body class="bg-gray-100">
    <div class="min-h-screen flex flex-col">
        <!-- Header -->
        <?php 
            include("header.php");
        ?>

        <div class="max-w-3xl mx-auto bg-white p-6 rounded-lg shadow-md">
            <h1 class="text-2xl font-bold mb-6 text-center">Add Management | <a href = "view_man.php">View Management</a></h1>
        
            <!-- Add News Form -->
            <form action="a_man.php" method="POST" enctype="multipart/form-data">
                <!-- Name  -->
                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                    <input type="text" name="name" id="name" class="mt-1 block w-full border border-gray-300 rounded-md p-2" required>
                </div>
            
               <!-- Position -->
                <div class="mb-4">
                    <label for="position" class="block text-sm font-medium text-gray-700">Position</label>
                    <input type="text" name="position" id="position" class="mt-1 block w-full border border-gray-300 rounded-md p-2" required>
                </div> 
                <!-- Qualification -->
                <div class="mb-4">
                    <label for="qualification" class="block text-sm font-medium text-gray-700">Content</label>
                    <textarea name="qualification" id="qualification" rows="5" class="mt-1 block w-full border border-gray-300 rounded-md p-2" required></textarea>
                </div>
                <!-- News Picture Upload -->
                <div class="mb-4">
                    <label for="man_picture" class="block text-sm font-medium text-gray-700">Upload Picture</label>
                    <input type="file" name="man_picture" id="man_picture" class="mt-1 block w-full border border-gray-300 rounded-md p-2" accept="image/*" required>
                </div>
            
                
            
                <!-- Submit Button -->
                <div class="mt-6">
                    <button type="submit" class="w-full bg-sky-400 text-white px-4 py-2 rounded-md hover:bg-sky-300">Add</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
