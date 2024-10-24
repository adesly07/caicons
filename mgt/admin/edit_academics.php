<?php
session_start();
require '../../conx.php';

// Redirect if not logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: ../index.php');
    exit();
}

// Get the page from the URL
$id = $_GET['id'] ?? '1';

// Fetch the content for the selected page
$sql = "SELECT * FROM academics WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param('s', $id);
$stmt->execute();
$result = $stmt->get_result();
$content = $result->fetch_assoc();

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $content = $_POST['content'];

    // Update the content in the database
    $update_sql = "UPDATE academics SET content = ? WHERE id = ?";
    $update_stmt = $conn->prepare($update_sql);
    $update_stmt->bind_param('ss', $content, $id);
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
    <link rel="shortcut icon" href="cai.jpg" type="image/x-icon">
    <title>CAICONS | CMS</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/tailwindcss-jit-cdn@tailwindcss/latest/dist/tailwind.min.js"></script>
    <!-- Include TinyMCE -->
    <script src="https://cdn.tiny.cloud/1/kiyspmzz2b3u5m695w8eiupcnwrvwjlajv0x7my107k46pq0/tinymce/7/tinymce.min.js" referrerpolicy="origin"></script>

    <script>
        tinymce.init({
            selector: '#content',
            plugins: 'link image code',
            toolbar: 'undo redo | bold italic | alignleft aligncenter alignright | code',
            height: 300
        });
    </script>
</head>
<body class="bg-gray-100">
    <div class="min-h-screen flex flex-col">
        <!-- Header -->
        <?php 
            include("header.php");
        ?>

        <div class="flex-grow container mx-auto py-6">
            <form action="" method="POST" class="bg-white rounded-lg shadow-md p-6">
                <label for="content" class="block text-gray-700 font-bold mb-2">Content:</label>
                <textarea id="content" name="content" rows="10" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-1 focus:ring-indigo-600"><?php echo $content['content']; ?></textarea>

                <button type="submit" class="mt-4 bg-sky-400 text-white font-bold py-2 px-4 rounded hover:bg-sky-300">Update</button>
            </form>
        </div>
    </div>
</body>
</html>
