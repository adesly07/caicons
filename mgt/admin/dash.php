<?php
session_start();
require '../includes/db.php';

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
    <title>Dashboard | CMS</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/tailwindcss-jit-cdn@tailwindcss/latest/dist/tailwind.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" />

</head>
<body class="bg-gray-100">
    <div class="min-h-screen flex flex-col">
        <!-- Navbar -->
        <nav class="bg-white shadow mb-8">
        <div class="container mx-auto px-6 py-3 flex justify-between items-center">
            <div class = "flex">
                <div class ="flex-item">
                    <a href="#" class="text-gray-800 text-xl font-bold">
                        <img src="../../assets/images/about_logo.png" alt="Logo" class="h-12">
                    </a>
                </div>
                <div class ="flex-item">
                    <a href="#" class="text-gray-800 text-2xl font-bold">
                        CAICONS CMS<p> DASHBOARD</p>
                    </a>
                </div>
            </div>
            <div>
                <span class="text-gray-800 mr-4">Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?></span>
                <a href="logout.php" class="text-blue-500">Logout</a>
            </div>
        </div>
    </nav>

        <!-- Content -->
        <div class="flex-grow container mx-auto py-6">
            <h2 class="text-2xl font-semibold mb-6">Manage Pages</h2>

            <div class="bg-white rounded-lg shadow-md p-6">
                <table class="min-w-full table-auto">
                    <thead>
                        <tr class="bg-gray-200">
                            <th class="px-4 py-2">Page</th>
                            <th colspan="2" class="px-4 py-2">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Example Page Rows -->
                        <tr>
                            <td class="border px-4 py-2">About Us</td>
                            <td class="border px-4 py-2">
                                <a href="edit.php?page=about" class="text-indigo-600 hover:text-indigo-800">
                                    <img src="../../assets/images/edit.png" alt="Logo" width="20" height="20">
                                </a>                           
                            </td>
                            <td class="border px-4 py-2">
                                <a href="delete.php?page=about" class="text-red-600 hover:text-red-800">
                                    <img src="../../assets/images/delete.png" alt="Logo" width="20" height="20">
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td class="border px-4 py-2">Contact</td>
                            <td class="border px-4 py-2">
                                <a href="edit.php?page=contact" class="text-indigo-600 hover:text-indigo-800">
                                    <img src="../../assets/images/edit.png" alt="Logo" width="20" height="20">
                                </a>                           
                            </td>
                            <td class="border px-4 py-2">
                                <a href="delete.php?page=contact" class="text-red-600 hover:text-red-800">
                                    <img src="../../assets/images/delete.png" alt="Logo" width="20" height="20">
                                </a>
                            </td>

                        </tr>
                        <!-- Add rows for other pages (Admission, Gallery, News, etc.) -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
