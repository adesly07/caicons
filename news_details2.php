<?php
include('conx.php');
// Define how many results you want per page
$limit = 3;

// Get the current page number or default to 1
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$offset = ($page - 1) * $limit;

// Fetch the total number of news items
$total_query = "SELECT COUNT(*) AS total FROM news";
$total_result = $conn->query($total_query);
$total_row = $total_result->fetch_assoc();
$total_news = $total_row['total'];

// Fetch the news items for the current page
$sql = "SELECT * FROM news ORDER BY posted_date DESC LIMIT $limit OFFSET $offset";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo '<li class="py-4">';
        echo '<a href="news_details2.php?id=' . $row['id'] . '" class="text-xl font-semibold text-blue-600 hover:underline">' . $row['title'] . '</a>';
        echo '</li>';
    }
} else {
    echo '<p>No news found.</p>';
}

// Pagination logic
$total_pages = ceil($total_news / $limit);

echo '<div class="inline-flex mt-4">';
if ($page > 1) {
    echo '<a href="news_details2.php?page=' . ($page - 1) . '" class="px-3 py-2 bg-blue-500 text-white rounded-l-md">Previous</a>';
}
if ($page < $total_pages) {
    echo '<a href="news_details2.php?page=' . ($page + 1) . '" class="px-3 py-2 bg-blue-500 text-white rounded-r-md">Next</a>';
}
echo '</div>';

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>News List with Pagination</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <div class="container mx-auto p-6">
        <!-- News List -->
        <div id="news-list" class="bg-white shadow-md rounded-md p-6 mb-6">
            <h1 class="text-3xl font-bold text-gray-800 mb-6"><?php echo $row['content']; ?></h1>

            <!-- News items will be displayed here -->
            <ul id="news-items" class="divide-y divide-gray-200">
                <!-- News list will be injected dynamically from PHP -->
            </ul>

            <!-- Pagination links -->
            <div id="pagination" class="mt-6 text-center">
                <!-- Pagination will be injected dynamically from PHP -->
            </div>
        </div>
    </div>

    <script>
        // Optionally, handle AJAX for loading pages dynamically
    </script>
</body>
</html>
