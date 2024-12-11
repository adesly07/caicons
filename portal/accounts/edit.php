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
$id = $_GET['id'] ?? '$id';
$query = "SELECT * FROM courses WHERE id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$record = $result->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $course = $_POST['course'];
    $f_amount = $_POST['f_amount'];
    $t_fee = $_POST['t_fee'];
    
    $updateQuery = "UPDATE courses SET course = ?, f_amount = ?, t_fee = ? WHERE id = ?";
    $stmt = $conn->prepare($updateQuery);
    $stmt->bind_param("siii", $course, $f_amount, $t_fee, $id);
    $stmt->execute();
    
    header("Location: view_app.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CAICONS PORTAL | <?php echo $department; ?></title>
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
        <!-- Sidebar Menu -->
        <?php
            include('navbar.php');
        ?>
        <!-- Main Content Area -->
        <div class="container mx-auto max-w-lg bg-white rounded-lg shadow-lg p-6">
            <h2 class="text-2xl font-bold text-center mb-6">Edit Application Fee</h2>
            <form method="POST" action="edit.php?id=<?php echo $id; ?>">
                <div class="mb-4">
                    <label for="course" class="block text-gray-700 font-semibold">Course</label>
                    <input type="text" id="course" name="course" value="<?php echo $record['course']; ?>" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-sky-300" required>
                </div>
                <div class="mb-4">
                    <label for="f_amount" class="block text-gray-700 font-semibold">Form Amount</label>
                    <input type="number" id="f_amount" name="f_amount" value="<?php echo $record['f_amount']; ?>" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-sky-300" required>
                </div>
                <div class="mb-4">
                    <label for="t_fee" class="block text-gray-700 font-semibold">Form Transaction Fee</label>
                    <input type="number" id="t_fee" name="t_fee" value="<?php echo $record['t_fee']; ?>" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-sky-300" required>
                </div>
                <button type="submit" class="w-full bg-sky-400 text-white font-semibold py-2 rounded-md hover:bg-sky-300 transition duration-200">Update Fee</button>
            </form>
        </div>
    </div>
</body>
</html>
