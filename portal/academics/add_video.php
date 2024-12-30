
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
        $stmt = $conn->prepare("INSERT INTO lecture_videos (title, description, video_url, added_by) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $title, $description, $targetFilePath, $username);
        $stmt->execute();
        $success = "Video uploaded successfully!";
        header('location:view_videos.php');
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
        <div class="max-w-4xl mx-auto p-8 bg-white shadow-md rounded-lg">
            <h2 class="text-2xl font-bold mb-4">Add Lecture Video | <a href="view_videos.php">View Videos</a></h2>
            <?php if (isset($success)) echo "<p class='text-green-500'>$success</p>"; ?>
            <?php if (isset($error)) echo "<p class='text-red-500'>$error</p>"; ?>
            <form action="" method="POST" enctype="multipart/form-data" class="space-y-4">
                <div>
                    <label for="title" class="block font-medium">Course Title</label>
                    <input type="text" name="title" id="title" class="w-full border border-sky-300 rounded-md p-2 focus:outline-none focus:ring focus:ring-sky-300" required>
                </div>
                <div>
                    <label for="description" class="block font-medium">Short Description</label>
                    <textarea name="description" id="description" class="w-full border border-sky-300 rounded-md p-2 focus:outline-none focus:ring focus:ring-sky-300" rows="4"></textarea>
                </div>
                <div>
                    <label for="video" class="block font-medium">Upload Video</label>
                    <input type="file" name="video" id="video" accept="video/*" class="w-full border border-sky-300 rounded-md p-2 focus:outline-none focus:ring focus:ring-sky-300" required>
                </div>
                <button type="submit" class="bg-sky-400 text-white px-4 py-2 rounded-md">Upload</button>
            </form>
        </div>

        
    </div>
   
</body>
</html>
