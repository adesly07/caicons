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
            <h1 class="text-2xl font-bold mb-6 text-center">Add Gallery | <a href = "view_gallery.php">View Gallery</a></h1>
        
            <!-- Add Slider Form -->
            <form action="a_gallery.php" method="POST" enctype="multipart/form-data">
                <!-- Gallery Picture Upload -->
                <div class="mb-4">
                    <label for="s_picture" class="block text-sm font-medium text-gray-700">Upload Picture</label>
                    <input type="file" name="s_picture" id="s_picture" class="mt-1 block w-full border border-gray-300 rounded-md p-2" accept="image/*" required>
                </div>         
                <div class="mb-4">
                    <label for="desc" class="block text-sm font-medium text-gray-700">Short Description</label>
                    <textarea name="desc" id="desc" rows="5" class="mt-1 block w-full border border-gray-300 rounded-md p-2" required></textarea>
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
