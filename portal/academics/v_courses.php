
<?php
session_start();
include('../conx.php');
// Redirect if not logged in
if (!isset($_SESSION['username'])&&(!isset($_SESSION['department']))) {
    header('Location: ../index.php');
    exit();
}
$username = $_SESSION['username'];
$department = $_SESSION['department'];

// Set number of records per page
$records_per_page = 8;

// Get the current page number from the query string (default to 1)
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$page = $page > 0 ? $page : 1;

// Calculate offset for SQL query
$offset = ($page - 1) * $records_per_page;

// Fetch records from the courses table with LIMIT and OFFSET
$sql = "SELECT * FROM courses_reg ORDER BY year, semester, course_title LIMIT $records_per_page OFFSET $offset";
$result = mysqli_query($conn, $sql);

// Count total records for pagination
$total_records_sql = "SELECT COUNT(*) AS total FROM courses_reg";
$total_records_result = mysqli_query($conn, $total_records_sql);
$total_records_row = mysqli_fetch_assoc($total_records_result);
$total_records = $total_records_row['total'];

// Calculate total pages
$total_pages = ceil($total_records / $records_per_page);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../../cai.jpg" type="image/x-icon">
    <title>CAICON PORTAL</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/tailwindcss-jit-cdn@tailwindcss/latest/dist/tailwind.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script defer src="js/script.js"></script> <!-- Add external JS file for controlling the animation -->

</head>
<body class="bg-white">
        <?php
            include('header.php');
        ?>
    <div class="flex flex-grow overflow-hidden">

        <!-- Sidebar Menu -->
        <?php
            include('navbar.php');
        ?>
        <div class="container mx-auto p-6">
            <h1 class="text-xl font-bold text-center mb-6">Course List</h1>

            <!-- Add Payment Option Form -->
            <div class="container mx-auto py-8">
        <!-- Course Table -->
        <div class="bg-white rounded-lg shadow-lg p-6">
            <table class="w-full table-auto border-collapse border border-gray-300">
                <thead>
                    <tr class="bg-gray-200 text-gray-700">
                        <th class="border border-gray-300 p-2">Course Code</th>
                        <th class="border border-gray-300 p-2">Course Title</th>
                        <th class="border border-gray-300 p-2">Units</th>
                        <th class="border border-gray-300 p-2">Year</th>
                        <th class="border border-gray-300 p-2">Semester</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                        <tr class="text-gray-600">
                            <td class="border border-gray-300 p-2 text-center"><?= htmlspecialchars($row['course_code']); ?></td>
                            <td class="border border-gray-300 p-2"><?= htmlspecialchars($row['course_title']); ?></td>
                            <td class="border border-gray-300 p-2 text-center"><?= htmlspecialchars($row['units']); ?></td>
                            <td class="border border-gray-300 p-2"><?= htmlspecialchars($row['year']); ?></td>
                            <td class="border border-gray-300 p-2"><?= htmlspecialchars($row['semester']); ?></td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="mt-6 flex justify-center items-center space-x-2">
            <!-- Previous Page -->
            <?php if ($page > 1) : ?>
                <a href="?page=<?= $page - 1; ?>" 
                   class="px-4 py-2 bg-gray-200 rounded hover:bg-gray-300">Previous</a>
            <?php endif; ?>

            <!-- Page Numbers -->
            <?php for ($i = 1; $i <= $total_pages; $i++) : ?>
                <a href="?page=<?= $i; ?>" 
                   class="px-4 py-2 rounded <?= $i === $page ? 'bg-blue-500 text-white' : 'bg-gray-200 hover:bg-gray-300'; ?>">
                    <?= $i; ?>
                </a>
            <?php endfor; ?>

            <!-- Next Page -->
            <?php if ($page < $total_pages) : ?>
                <a href="?page=<?= $page + 1; ?>" 
                   class="px-4 py-2 bg-gray-200 rounded hover:bg-gray-300">Next</a>
            <?php endif; ?>
        </div>
    </div>

            <!-- Display Payment Options -->
            
        </div>
    </div>
    <script>
        document.querySelector('form').addEventListener('submit', function (e) {
        const units = document.getElementById('units').value;
        if (units <= 0 || units > 6) {
        alert('Units must be between 1 and 6.');
        e.preventDefault();
        }
        });
    </script>
</body>
</html>
