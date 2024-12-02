<?php
session_start();
include("../conx.php");
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit();
}
$username = $_SESSION['username'];
$section = $_SESSION['s_session'];
$level = $_SESSION['level'];

$sql = "SELECT * FROM applicants WHERE reg_num = '$username'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $data = $result->fetch_assoc();
    $course_id = $data['course_id'];
    $a_date = $data['a_date'];
} 

$sql2 = "SELECT * FROM courses where id = '$course_id'";
$result2 = $conn->query($sql2);

if ($result2->num_rows > 0) {
    $row = $result2->fetch_assoc();
    $course = $row['course'];
} 
$sql2 = "SELECT * FROM courses_reg where year = '$level'";
$result2 = $conn->query($sql2);

if ($result2->num_rows > 0) {
    $row = $result2->fetch_assoc();
    //$course = $row['course'];
} 
$sql3 = "SELECT * FROM applicant_documents WHERE reg_num = '$username'";
$result = $conn->query($sql3);

if ($result->num_rows > 0) {
    $pic = $result->fetch_assoc();
    $passport = $pic['passport'];
    
} 
// Fetch contact data
$sql = "SELECT * FROM contact LIMIT 1";
$result = $conn->query($sql);
$contact_data = null;

if ($result->num_rows > 0) {
    $contact_data = $result->fetch_assoc();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../../cai.jpg" type="image/x-icon">
    <title>CAICONS | COURSE</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/tailwindcss-jit-cdn@tailwindcss/latest/dist/tailwind.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-white">
    <?php
        include('header.php');
    ?>

  <!-- Second Row: Bullet Points -->
    <section class="p-6 bg-white shadow-md">
        <h2 class="text-lg font-bold mb-4">Instructions:</h2>
        <ul class="list-disc list-inside text-gray-700">
        <li>Review available courses below before registration.</li>
        <li>Use the form to add or remove courses as needed.</li>
        <li>Ensure all selected courses are correct before submission.</li>
        </ul>
    </section>

  <!-- Third Row: Course Registration Form -->
    <section class="p-6 bg-white shadow-md mt-4">
            <h2 class="text-lg font-bold mb-4">Course Registration Form</h2>
            <form id="course-form" class="space-y-4" action="save_course.php">
                <!-- Input fields -->
                <div class="flex space-x-4">
                    <input
                        type="text"
                        id="course-code"
                        placeholder="Course Code"
                        class="border rounded p-2 flex-1"
                        />
                    <button
                        type="button"
                        id="add-course"
                        class="bg-green-600 text-white px-4 py-2 rounded"
                        >
                        Add
                    </button>
                </div>

                <!-- Course Table -->
                <table class="table-auto w-full border-collapse border border-gray-300 mt-4">
                    <thead>
                    <tr class="bg-gray-200">
                        <th class="border border-gray-300 px-4 py-2">Course Code</th>
                        
                        <th class="border border-gray-300 px-4 py-2">Action</th>
                    </tr>
                    </thead>
                    <tbody id="course-list">
                    <!-- Dynamic Rows -->
                    </tbody>
                </table>

                <!-- Save Button -->
                <button
                    type="submit"
                    class="bg-blue-600 text-white px-4 py-2 rounded w-full"
                >
                    Save Courses
                </button>
            </form>
    </section>

  <script src="cform.js"></script>
  <script src="dash.js"></script>
</body>
</html>
