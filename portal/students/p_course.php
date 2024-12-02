<?php
session_start();
include('../conx.php');
// Redirect if not logged in
if (!isset($_SESSION['username'])) {
    header('Location: index.php');
    exit();
}
$username = $_SESSION['username'];
$section = $_SESSION['s_session'];
$sql = "SELECT * FROM applicants WHERE reg_num = '$username'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $data = $result->fetch_assoc();
 
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $level = $_POST['level'];
    $sql2 = "SELECT * FROM payment where reg_num = '$username' AND sch_session = '$section' AND paid_for = 'School Fees'";
    $result2 = $conn->query($sql2);
if ($result2->num_rows > 0) {
    $row = $result2->fetch_assoc();
    $_SESSION['level'] = $level;
    header('location:course_form.php');
} else {
    echo "<script>alert('Sorry, you cannot print your course form because your school fees payment has not confirmed!'); window.location.href = 'p_course.php';</script>";
}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../../cai.jpg" type="image/x-icon">
    <title>CAICONS PORTAL | COURSE</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/tailwindcss-jit-cdn@tailwindcss/latest/dist/tailwind.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script defer src="js/script.js"></script> <!-- Add external JS file for controlling the animation -->
</head>
<body class="bg-sky-200">
    <!-- Header Section -->
    <?php
        include('header.php');
    ?>
    <div class="flex items-center justify-center min-h-screen" >
        <div class="w-full max-w-md bg-white rounded-lg shadow-lg p-6">
            <h2 class="text-2xl font-bold text-center mb-6">VIEW REGISTERED COURSE</h2>
            <form method="POST" action="p_course.php">
                
                <div class="mb-4">
                    <label for="level" class="block text-gray-700 font-semibold mb-2">Level</label>
                        <select id="level" name ="level" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-sky-400">
                            <option value="Year 1">Year 1</option>
                            <option value="Year 2">Year 2</option>
                            <option value="Year 3">Year 3</option>
                            <option value="Year 4">Year 4</option>
                        </select>
                </div>
                <button type="submit" class="w-full bg-sky-400 text-white font-bold py-2 px-4 rounded hover:bg-sky-300 flex justify-center items-center">
                    <span class="button-text">View Course Form</span>
                    
                </button>
            </form>
            
        </div>
    </div>
    <script src="dash.js"></script>
</body>
</html>
