<?php
session_start();
include('../conx.php');
// Redirect if not logged in
if (!isset($_SESSION['username'])) {
    header('Location: ../index.php');
    exit();
}
$username = $_SESSION['username'];
$section = $_SESSION['s_session'];
$sql = "SELECT * FROM applicants WHERE reg_num = '$username'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $data = $result->fetch_assoc();
    $course_id = $data['course_id'];
    $w_amt = $data['w_amt'];
    $inv = $data['invoice_number'];
} 
$sql2 = "SELECT * FROM courses where id = '$course_id'";
$result2 = $conn->query($sql2);

if ($result2->num_rows > 0) {
    $row = $result2->fetch_assoc();
    $course = $row['course'];
    $f_amount = $row['f_amount'];
    $t_fee = $row['t_fee'];
    $total = $f_amount + $t_fee;

} 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CAICONS PORTAL | APPLICATION FORM</title>
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
        <main class="flex-grow p-6 overflow-auto">
        <div class="w-full max-w-4xl bg-white rounded-lg shadow-lg p-6">
            <h2 class="text-2xl font-bold text-center mb-6">School Attended</h2>
            <form id="schoolForm" method="POST" action="a_accback.php">
                <div id="formContainer" class="space-y-4">
                    <!-- Template for school attended entry -->
                    <div class="school-entry flex flex-wrap -mx-2 border-b pb-4">
                        
                        <div class="w-full md:w-1/3 px-2 mb-4">
                            <label class="block text-gray-700 font-semibold">Name of Institution</label>
                            <input type="text" name="institution_name[]" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400" required>
                        </div>
                        <div class="w-full md:w-1/3 px-2 mb-4">
                            <label class="block text-gray-700 font-semibold">Place and Country</label>
                            <input type="text" name="place_country[]" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400" required>
                        </div>
                        <div class="w-full md:w-1/4 px-2 mb-4">
                            <label class="block text-gray-700 font-semibold">From Year</label>
                            <input type="number" name="from_year[]" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400" required>
                        </div>
                        <div class="w-full md:w-1/4 px-2 mb-4">
                            <label class="block text-gray-700 font-semibold">To Year</label>
                            <input type="number" name="to_year[]" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400" required>
                        </div>
                        <div class="w-full md:w-1/4 px-2 mb-4">
                            <label class="block text-gray-700 font-semibold">Qualification</label>
                            <input type="text" name="qualification[]" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400" required>
                        </div>
                        <div class="w-full md:w-1/4 px-2 mb-4 flex items-end">
                            <button type="button" class="remove-entry bg-red-500 text-white px-3 py-2 rounded-md hover:bg-red-600 transition duration-200">Remove</button>
                        </div>
                    </div>
                </div>
                <button type="button" id="addEntry" class="px-3 py-2 bg-blue-400 text-white font-semibold py-2 rounded-md hover:bg-blue-300 transition duration-200 mt-4">Add More</button>
                <button type="submit" class="w-full bg-sky-400 text-white font-semibold py-2 rounded-md hover:bg-sky-300 transition duration-200 mt-4">Submit</button>
            </form>
    </div>

    <script src="script.js"></script>
        </main>
    </div>

</body>
</html>
