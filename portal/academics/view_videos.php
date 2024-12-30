
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

$search = "";
if (isset($_GET['search'])) {
    $search = $_GET['search'];
    $stmt = $conn->prepare("SELECT * FROM lecture_videos WHERE added_by = ? AND title LIKE ? ORDER BY upload_date DESC");
    $searchTerm = "%$search%";
    $stmt->bind_param("ss", $username, $searchTerm);
} else {
    $stmt = $conn->prepare("SELECT * FROM lecture_videos WHERE added_by = '$username' ORDER BY upload_date DESC");
}
$stmt->execute();
$result = $stmt->get_result();


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
        <div class="max-w-4xl mx-auto bg-white p-8 shadow-md rounded-lg">
            <h2 class="text-2xl font-bold mb-4">Lecture Videos</h2>
            <form method="GET" action="" class="mb-4 flex space-x-2">
                <input type="text" name="search" value="<?php echo htmlspecialchars($search); ?>" placeholder="Search by title" class="flex-1 border border-sky-300 rounded-md p-2 focus:outline-none focus:ring focus:ring-sky-300">
                <button type="submit" class="bg-sky-400 text-white px-4 py-2 rounded-md">Search</button>
            </form>
            <?php while ($row = $result->fetch_assoc()) { ?>
                <div class="mb-6">
                    <h3 class="font-bold text-lg"><?php echo htmlspecialchars($row['title']); ?></h3> <em>Added by <?php echo $row['added_by']; ?></em>
                    <p class="text-sm text-gray-600"><?php echo htmlspecialchars($row['description']); ?></p>
                    <video class="mt-2 w-full max-w-md" controls>
                        <source src="<?php echo htmlspecialchars($row['video_url']); ?>" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                </div>
            <?php } ?>
        </div>
    </div>
   
</body>
</html>
