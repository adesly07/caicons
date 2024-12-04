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
        <div class="container mx-auto py-10">
        <h2 class="text-2xl font-bold mb-6 text-center">Add O' Level Results |  <a href=v_result.php>View Result</a></h2>
        <form id="resultForm" class="bg-white p-8 rounded-lg shadow-lg" action="a_result.php" method="POST">
            
            <!-- First Sitting Section -->
            <div id="first-sitting" class="mb-8">
                <h3 class="text-xl font-semibold mb-4">First Sitting</h3>
                <div class="mb-4">
                    <label class="block font-medium text-gray-700">Examination Type</label>
                    <select name="exam_type_first" class="mt-1 block w-full border border-gray-300 rounded-md p-2" required>
                        <option value="">Select Examination Type</option>
                        <option value="WAEC">WAEC</option>
                        <option value="NECO">NECO</option>
                        <option value="NABTEB">NABTEB</option>
                    </select>
                </div>
                
                <!-- Subject and Grade Selection for First Sitting -->
                <div id="firstSittingSubjects">
                    <div class="flex space-x-4 mb-4">
                        <select name="subject_first[]" class="w-1/2 border border-gray-300 rounded-md p-2" required>
                        <option value="">Select Subject</option>
                            <option value="Mathematics">Mathematics</option>
                            <option value="English Language">English Language</option>
                            <option value="Physics">Physics</option>
                            <option value="Chemistry">Chemistry</option>
                            <option value="Biology">Biology</option>
                            <option value="Geography">Geography</option>
                            <option value="Agricultural Science">Agricultural Science</option>
                            <option value="Economics">Economics</option>
                            <option value="Further Mathematics">Further Mathematics</option>
                            <option value="Food and Nutrition">Food and Nutrition</option>
                            <option value="Computer Science">Computer Science</option>
                            <option value="Civic Education">Civic Education</option>
                            <option value="Animal husbandry">Animal husbandry</option>
                            <option value="Data Processing">Data Processing</option>
                            <!-- Add more subjects as needed -->
                        </select>
                        <select name="grade_first[]" class="w-1/2 border border-gray-300 rounded-md p-2" required>
                            <option value="">Select Grade</option>
                            <option value="A1">A1</option>
                            <option value="A1">A2</option>
                            <option value="A1">A3</option>
                            <option value="B2">B2</option>
                            <option value="B3">B3</option>
                            <option value="C4">C4</option>
                            <option value="C5">C5</option>
                            <option value="C6">C6</option>
                            <option value="D7">D7</option>
                            <option value="E8">E8</option>
                            <option value="F9">F9</option>
                            <!-- Add more grades as needed -->
                        </select>
                    </div>
                </div>

                <!-- Button to Add More Subjects for First Sitting -->
                <button type="button" id="addFirstSittingSubject" class="text-blue-600">Add Subject</button>
            </div>

            <!-- Second Sitting Section -->
            <div id="second-sitting" class="mb-8">
                <h3 class="text-xl font-semibold mb-4">Second Sitting (if applicable)</h3>
                <div class="mb-4">
                    <label class="block font-medium text-gray-700">Examination Type</label>
                    <select name="exam_type_second" class="mt-1 block w-full border border-gray-300 rounded-md p-2">
                        <option value="">Select Examination Type</option>
                        <option value="WAEC">WAEC</option>
                        <option value="NECO">NECO</option>
                    </select>
                </div>
                
                <!-- Subject and Grade Selection for Second Sitting -->
                <div id="secondSittingSubjects">
                    <div class="flex space-x-4 mb-4">
                        <select name="subject_second[]" class="w-1/2 border border-gray-300 rounded-md p-2">
                        <option value="">Select Subject</option>
                            <option value="Mathematics">Mathematics</option>
                            <option value="English Language">English Language</option>
                            <option value="Physics">Physics</option>
                            <option value="Chemistry">Chemistry</option>
                            <option value="Biology">Biology</option>
                            <!-- Add more subjects as needed -->
                        </select>
                        <select name="grade_second[]" class="w-1/2 border border-gray-300 rounded-md p-2">
                        <option value="A1">A1</option>
                            <option value="B2">B2</option>
                            <option value="B3">B3</option>
                            <option value="C4">C4</option>
                            <option value="C5">C5</option>
                            <option value="C6">C6</option>
                            <option value="D7">D7</option>
                            <option value="E8">E8</option>
                            <option value="F9">F9</option>
                            <!-- Add more grades as needed -->
                        </select>
                    </div>
                </div>

                <!-- Button to Add More Subjects for Second Sitting -->
                <button type="button" id="addSecondSittingSubject" class="text-blue-600">Add Subject</button>
            </div>

            <!-- Submit Button -->
            <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded-md">Submit</button>
        </form>
    </div>

    
        </main>
    </div>
    <script>
        document.getElementById("addFirstSittingSubject").addEventListener("click", function() {
            const firstSittingSubjects = document.getElementById("firstSittingSubjects");
            const newSubject = firstSittingSubjects.children[0].cloneNode(true);
            firstSittingSubjects.appendChild(newSubject);
        });

        document.getElementById("addSecondSittingSubject").addEventListener("click", function() {
            const secondSittingSubjects = document.getElementById("secondSittingSubjects");
            const newSubject = secondSittingSubjects.children[0].cloneNode(true);
            secondSittingSubjects.appendChild(newSubject);
        });
    </script>
</body>
</html>
