<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: ../index.php");
    exit();
}
$myDate = date("F d, Y");
$ip = $_SERVER['REMOTE_ADDR'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
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
    <div class="container mx-auto px-6">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <!-- Cards for each page management -->
            <div class="bg-white p-6 rounded-lg shadow">
                <h2 class="text-xl font-bold mb-2">Curent Date and Time:</h2>
                <p class="text-gray-700 mb-4"><?php echo $myDate; ?></p>
                <h2 class="text-xl font-bold mb-2">Curent IP Address:</h2>
                <p class="text-gray-700 mb-4"><?php echo $ip; ?></p>
            </div>
            <!-- Repeat similar blocks for other pages -->
            <!-- Cards for each page management -->
            <div class="bg-white p-6 rounded-lg shadow">
                <h2 class="text-xl font-bold mb-2">Curent Date:</h2>
                <p class="text-gray-700 mb-4">Edit the About page content.</p>
                <a href="manage_about.php" class="text-blue-500">Manage About</a>
            </div>
        </div>
    </div>
</body>
</html>
