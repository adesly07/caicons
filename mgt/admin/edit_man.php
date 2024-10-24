<?php
session_start();
require '../../conx.php';

// Redirect if not logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: ../index.php');
    exit();
}

// Get the page from the URL
$id = $_GET['id'] ?? '$id';

// Fetch the content for the selected page
$sql = "SELECT * FROM management WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param('s', $id);
$stmt->execute();
$result = $stmt->get_result();
$page_data = $result->fetch_assoc();

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $man_name = $_POST['name'];
    $position = $_POST['position'];
    $qualification = $_POST['qualification'];

    // Update the content in the database
    $update_sql = "UPDATE management SET man_name = ?, position = ?, qualification = ? WHERE id = ?";
    $update_stmt = $conn->prepare($update_sql);
    $update_stmt->bind_param('ssss', $man_name, $position, $qualification,  $id);
    $update_stmt->execute();

    // Redirect back to dashboard
    header('Location: view_man.php');
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
            <form action="edit_man.php?id=<?php echo $id; ?>" method="POST" class="bg-white rounded-lg shadow-md p-6">
                <label for="name" class="block text-gray-700 font-bold mb-2">Name:</label>
                <input type="text" id="name" name="name" rows="10" value="<?php echo $page_data['man_name']; ?>" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-1 focus:ring-indigo-600"></input>
                <label for="position" class="block text-gray-700 font-bold mb-2">Position:</label>
                <input type="text" id="position" name="position" rows="10" value="<?php echo $page_data['position']; ?>" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-1 focus:ring-indigo-600"></input>
                <label for="qualification" class="block text-gray-700 font-bold mb-2">Qualification:</label>
                <input type="text" id="qualification" name="qualification" rows="10" value="<?php echo $page_data['qualification']; ?>" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-1 focus:ring-indigo-600"></input>
                <button type="submit" class="mt-4 bg-sky-400 text-white font-bold py-2 px-4 rounded hover:bg-sky-300">Save Changes</button>
            </form>
        </div>
    </div>
</body>
</html>
