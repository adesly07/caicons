<?php
session_start();
require '../../conx.php';

// Redirect if not logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: ../index.php');
    exit();
}

// Get the page from the URL
$page = $_GET['page'] ?? 'about';

// Fetch the content for the selected page
$sql = "SELECT * FROM pages WHERE title = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param('s', $page);
$stmt->execute();
$result = $stmt->get_result();
$page_data = $result->fetch_assoc();

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $content = $_POST['content'];

    // Update the content in the database
    $update_sql = "UPDATE pages SET content = ? WHERE title = ?";
    $update_stmt = $conn->prepare($update_sql);
    $update_stmt->bind_param('ss', $content, $page);
    $update_stmt->execute();

    // Redirect back to dashboard
    header('Location: dashboard.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit <?php echo ucfirst($page); ?> | CMS</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="min-h-screen flex flex-col">
        <header class="bg-indigo-600 p-4 text-white text-lg flex justify-between items-center">
            <h1 class="font-bold">Edit <?php echo ucfirst($page); ?></h1>
            <a href="dashboard.php" class="bg-indigo-500 hover:bg-indigo-600 text-white py-2 px-4 rounded">Back to Dashboard</a>
        </header>

        <div class="flex-grow container mx-auto py-6">
            <form action="" method="POST" class="bg-white rounded-lg shadow-md p-6">
                <label for="content" class="block text-gray-700 font-bold mb-2">Content:</label>
                <textarea id="content" name="content" rows="10" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-1 focus:ring-indigo-600"><?php echo $page_data['content']; ?></textarea>

                <button type="submit" class="mt-4 bg-indigo-600 text-white font-bold py-2 px-4 rounded hover:bg-indigo-700">Save Changes</button>
            </form>
        </div>
    </div>
</body>
</html>
