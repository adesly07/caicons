
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
    $course_code = $_POST['course_code'];
    $course_title = $_POST['course_title'];
    $units = $_POST['units'];
    $year = $_POST['year'];
    $semester = $_POST['semester'];

    // Insert data into the database
    $sql = "INSERT INTO courses_reg (course_code, course_title, units, year, semester) 
            VALUES ('$course_code', '$course_title', '$units', '$year', '$semester')";
    
    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Course added successfully!'); window.location.href = 'a_courses.php';</script>";
    } else {
        echo "<script>alert('Error adding course: " . mysqli_error($conn) . "');</script>";
    }
}

// Fetch 
$options_query = "SELECT * FROM courses_reg ORDER BY id DESC";
$options_result = $conn->query($options_query);
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
        <div class="container mx-auto p-6">
            <h1 class="text-xl font-bold text-center mb-6">Add Course | <a href="v_courses.php"> View Courses</a></h1>
            <div class="bg-white shadow-md rounded-lg p-6 mb-6">

                <form action="a_courses.php" method="POST" class="space-y-4">
                    <!-- Course Code -->
                    <div>
                        <label for="course_code" class="block text-gray-600 font-medium">Course Code</label>
                        <input type="text" id="course_code" name="course_code" required
                            class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring focus:ring-sky-300">
                    </div>

                    <!-- Course Title -->
                    <div>
                        <label for="course_title" class="block text-gray-600 font-medium">Course Title</label>
                        <input type="text" id="course_title" name="course_title" required
                            class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring focus:ring-sky-300">
                    </div>

                    <!-- Units -->
                    <div>
                        <label for="units" class="block text-gray-600 font-medium">Units</label>
                        <select id="units" name="units" required
                            class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring focus:ring-sky-300">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                        </select>
                    </div>

                    <!-- Year -->
                    <div>
                        <label for="year" class="block text-gray-600 font-medium">Year</label>
                        <select id="year" name="year" required
                            class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring focus:ring-sky-300">
                            <option value="Year 1">Year 1</option>
                            <option value="Year 2">Year 2</option>
                            <option value="Year 3">Year 3</option>
                            <option value="Year 4">Year 4</option>
                        </select>
                    </div>

                    <!-- Semester -->
                    <div>
                        <label for="semester" class="block text-gray-600 font-medium">Semester</label>
                        <select id="semester" name="semester" required
                            class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring focus:ring-sky-300">
                            <option value="Semester I">Semester I</option>
                            <option value="Semester II">Semester II</option>
                        </select>
                    </div>

                    <!-- Submit Button -->
                    <div class="text-center">
                        <button type="submit" name="submit"
                            class="bg-sky-400 text-white px-4 py-2 rounded hover:bg-sky-300">Add Course</button>
                    </div>
                </form>
            </div>

            <!-- Display Payment Options -->
            
        </div>
    </div>
    <script>
        document.querySelector('form').addEventListener('submit', function (e) {
        const units = document.getElementById('units').value;
        if (units <= 0 || units > 6) {
        alert('Units must be between 1 and 6.');
        e.preventDefault();
        }
        });
    </script>
</body>
</html>
