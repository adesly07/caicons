<?php
session_start();
include('../conx.php');
// Redirect if not logged in
if (!isset($_SESSION['username'])) {
    header('Location: index.php');
    exit();
}
$username = $_SESSION['username'];
$search = "";
if (isset($_GET['search'])) {
    $search = $_GET['search'];
    $stmt = $conn->prepare("SELECT * FROM lecture_videos WHERE title LIKE ? OR description LIKE ? ORDER BY upload_date DESC");
    $searchTerm = "%$search%";
    $stmt->bind_param("ss", $searchTerm, $searchTerm);
} else {
    $stmt = $conn->prepare("SELECT * FROM lecture_videos ORDER BY upload_date DESC");
}
$stmt->execute();
$result = $stmt->get_result();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CAICONS PORTAL</title>
    <link rel="shortcut icon" href="../../cai.jpg" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/tailwindcss-jit-cdn@tailwindcss/latest/dist/tailwind.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" />
</head>
<body class="bg-white h-screen flex flex-col">
        <!-- Header Section -->
        <?php
            include('header.php');
        ?>
        <!-- Main Dashboard Layout -->
    <div class="flex flex-grow overflow-hidden">
        <div class="container mx-auto">
        <div class="max-w-6xl mx-auto bg-white p-8 shadow-md rounded-lg">
        <h1 class="text-3xl font-bold mb-6">Online Lecture Videos</h1>
        
        <!-- Search Bar -->
        <form method="GET" action="" class="mb-6 flex space-x-2">
            <input 
                type="text" 
                name="search" 
                value="<?php echo htmlspecialchars($search); ?>" 
                placeholder="Search by title or topic" 
                class="flex-1 border border-sky-300 rounded-md p-2 focus:outline-none focus:ring focus:ring-sky-300"
            >
            <button type="submit" class="bg-sky-400 text-white px-4 py-2 rounded-md">Search</button>
        </form>

        <!-- Display Videos -->
        <?php if ($result->num_rows > 0) { ?>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <?php while ($row = $result->fetch_assoc()) { ?>
                    <div class="bg-gray-50 p-4 rounded-md shadow-md">
                        <h3 class="font-bold text-lg"><?php echo htmlspecialchars($row['title']); ?></h3> <em>Added by <?php echo $row['added_by']; ?></em>
                        <p class="text-sm text-gray-600 mb-2"><?php echo htmlspecialchars($row['description']); ?></p>
                        <video class="w-full rounded-md" controls>
                            <source src="../academics/<?php echo htmlspecialchars($row['video_url']); ?>" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>
                    </div>
                <?php } ?>
            </div>
        <?php } else { ?>
            <p class="text-gray-500">No videos found for "<?php echo htmlspecialchars($search); ?>"</p>
        <?php } ?>
    </div>
        </div>

    </div>
    <script src="dash.js"></script>
</body>
</html>
