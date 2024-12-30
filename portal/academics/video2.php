
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

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $targetDir = "uploads/";
    $fileName = basename($_FILES["video"]["name"]);
    $targetFilePath = $targetDir . $fileName;
    
    if (move_uploaded_file($_FILES["video"]["tmp_name"], $targetFilePath)) {
        $stmt = $conn->prepare("INSERT INTO lecture_videos (title, description, video_url) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $title, $description, $targetFilePath);
        $stmt->execute();
        $success = "Video uploaded successfully!";
    } else {
        $error = "Error uploading the video.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Add Lecture Videos</title>
</head>
<body class="bg-gray-100 p-6">
    <div class="max-w-4xl mx-auto bg-gray-200 p-8 shadow-md rounded-lg">
        <h2 class="text-2xl font-bold mb-4">Add Lecture Video</h2>
        <?php if (isset($success)) echo "<p class='text-green-500'>$success</p>"; ?>
        <?php if (isset($error)) echo "<p class='text-red-500'>$error</p>"; ?>
        <form action="" method="POST" enctype="multipart/form-data" class="space-y-4">
            <div>
                <label for="title" class="block font-medium">Video Title</label>
                <input type="text" name="title" id="title" class="w-full border-gray-300 rounded-md p-2" required>
            </div>
            <div>
                <label for="description" class="block font-medium">Description</label>
                <textarea name="description" id="description" class="w-full border-gray-300 rounded-md p-2" rows="4"></textarea>
            </div>
            <div>
                <label for="video" class="block font-medium">Upload Video</label>
                <input type="file" name="video" id="video" accept="video/*" class="w-full p-2 border-gray-300 rounded-md" required>
            </div>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md">Upload</button>
        </form>
    </div>

    <div class="max-w-4xl mx-auto bg-white mt-6 p-8 shadow-md rounded-lg">
        <h2 class="text-2xl font-bold mb-4">Lecture Videos</h2>
        <?php
        $result = $conn->query("SELECT * FROM lecture_videos ORDER BY upload_date DESC");
        while ($row = $result->fetch_assoc()) {
            echo "<div class='mb-4'>
                    <h3 class='font-bold'>{$row['title']}</h3>
                    <p class='text-sm text-gray-600'>{$row['description']}</p>
                    <video class='mt-2 w-full max-h-64' controls>
                        <source src='{$row['video_url']}' type='video/mp4'>
                        Your browser does not support the video tag.
                    </video>
                </div>";
        }
        ?>
    </div>
</body>
</html>