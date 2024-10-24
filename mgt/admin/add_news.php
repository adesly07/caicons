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
            <h1 class="text-2xl font-bold mb-6 text-center">Add News | <a href = "view_news.php">View News</a></h1>
        
            <!-- Add News Form -->
            <form action="submit_news.php" method="POST" enctype="multipart/form-data">
                <!-- News Title -->
                <div class="mb-4">
                    <label for="title" class="block text-sm font-medium text-gray-700">Title of the News</label>
                    <input type="text" name="title" id="title" class="mt-1 block w-full border border-gray-300 rounded-md p-2" required>
                </div>
            
                <!-- News Content -->
                <div class="mb-4">
                    <label for="content" class="block text-sm font-medium text-gray-700">Content</label>
                    <textarea name="content" id="content" rows="5" class="mt-1 block w-full border border-gray-300 rounded-md p-2" required></textarea>
                </div>
                <!-- News Picture Upload -->
                <div class="mb-4">
                    <label for="news_picture" class="block text-sm font-medium text-gray-700">Upload News Picture</label>
                    <input type="file" name="news_picture" id="news_picture" class="mt-1 block w-full border border-gray-300 rounded-md p-2" accept="image/*" required>
                </div>
            
                <!-- Posted Date -->
                <div class="mb-4">
                    <label for="posted_date" class="block text-sm font-medium text-gray-700">Posted Date</label>
                    <input type="date" name="posted_date" id="posted_date" class="mt-1 block w-full border border-gray-300 rounded-md p-2" required>
                </div>
            
                <!-- Submit Button -->
                <div class="mt-6">
                    <button type="submit" class="w-full bg-sky-400 text-white px-4 py-2 rounded-md hover:bg-sky-300">Add News</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
