<?php
session_start();
include("../conx.php");
// Redirect if not logged in
if (!isset($_SESSION['username'])&&(!isset($_SESSION['department']))) {
    header('Location: ../index.php');
    exit();
}
$username = $_SESSION['username'];
$department = $_SESSION['department'];
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Sanitize user input
    $section = $conn->real_escape_string($_POST['section']);
    // Insert user into database
    $sql = "INSERT INTO sch_session (s_session) VALUES ('$section')";
    if ($conn->query($sql) === TRUE) {
        echo "New session has been added!";
        header("Location: v_session.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../../cai.jpg" type="image/x-icon">
    <title>CAICON PORTAL</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/tailwindcss-jit-cdn@tailwindcss/latest/dist/tailwind.min.js"></script>
    
</head>
<body class="bg-gray-100">
    <div class="min-h-screen flex flex-col">
        <!-- Header -->
        <?php 
            include("header.php");
        ?>

        <div class="max-w-3xl mx-auto bg-white p-6 rounded-lg shadow-md mt-10">
            <h1 class="text-2xl font-bold mb-6 text-center">Add New Session | <a href = "v_session.php">View Session</a></h1>
            <!-- Add  Form -->
            <form action="a_session.php" method="POST">
                <div class="mb-4">
                    <label for="section" class="block text-gray-700">Session</label>
                    <input type="text" id="section" name="section" required class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-sky-500">
                </div>                
                <div class="text-center">
                    <button type="submit" class="w-full bg-sky-400 text-white py-2 rounded-lg hover:bg-sky-300">Add</button>
                </div>
        </form>
        </div>
    </div>
</body>
</html>
