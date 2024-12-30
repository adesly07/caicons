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
$section = $_SESSION['s_session'];
$reg = $_GET['reg_num'];
$_SESSION['reg_num'] = $reg;
$sql = "SELECT * FROM applicants WHERE reg_num = '$reg'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $data = $result->fetch_assoc();
    //$course_id = $data['course_id'];
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
<body class="bg-gray-100 h-screen flex flex-col">

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
        <div class=" flex-grow p-6 overflow-auto bg-white">
            <h2 class="text-xl font-bold text-center mb-6">Student's Details</h2>

            <!-- Tabs for Staylites and Applicants -->
            

            <div class="bg-white p-4 shadow-md rounded-lg">
                <h3 class="text-lg font-semibold"><?= $data['surname']; ?> <?= $data['first_name']; ?> <?= $data['middle_name']; ?> Biodata</h3>
                <ul class="ml-6 list-disc">
                    <li><a href="#" id="add-matric-link">Add Matric Number</a></l1>
                    <li><a href="photocard.php">View Photo Card</a></l1>
                    <li><a href="mybio.php">View Biodata</a></l1>
                    <li><a href="p_results.php">View O'Level Results</a></l1>
                    <li><a href="p_pg.php">View Parents/Guardian</a></li>
                    <li><a href="p_otherinfo.php">View Other Information</a></li>
                    <li><a href="v_course.php">View Course Form</a></li>
                </ul>
            </div>
            <!-- Modal for Adding Matric Number -->
<div id="matric-modal" class="hidden fixed inset-0 bg-gray-800 bg-opacity-75 flex justify-center items-center">
    <div class="bg-white p-6 rounded shadow-lg w-96">
        <h2 class="text-xl font-bold mb-4">Add Matric Number</h2>
        <form id="matric-form">
            <div class="mb-4">
                <label for="student-id" class="block text-gray-700 font-bold mb-2">Registration Number</label>
                <input type="text" id="student-id" name="student_id" value="<?php echo $reg; ?>" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Enter Student ID" required>
            </div>
            <div class="mb-4">
                <label for="matric-number" class="block text-gray-700 font-bold mb-2">Matric Number</label>
                <input type="text" id="matric-number" value="<?= $data['matric_no']; ?>" name="matric_number" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Enter Matric Number" required>
            </div>
            <div class="flex items-center justify-between">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    Update
                </button>
                <button type="button" id="close-modal" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    Cancel
                </button>
            </div>
        </form>
    </div>
</div>
        </div>
    </div>
<script>
document.addEventListener("DOMContentLoaded", () => {
    const addMatricLink = document.getElementById("add-matric-link");
    const matricModal = document.getElementById("matric-modal");
    const closeModalButton = document.getElementById("close-modal");
    const matricForm = document.getElementById("matric-form");

    // Show the modal
    addMatricLink.addEventListener("click", (e) => {
        e.preventDefault();
        matricModal.classList.remove("hidden");
    });

    // Hide the modal
    closeModalButton.addEventListener("click", () => {
        matricModal.classList.add("hidden");
    });

    // Submit the matric number update form
    matricForm.addEventListener("submit", (e) => {
        e.preventDefault();

        const formData = new FormData(matricForm);

        // Send data to the server using fetch
        fetch("update_matric_number.php", {
            method: "POST",
            body: formData,
        })
            .then((response) => response.text())
            .then((data) => {
                alert(data); // Display server response
                matricModal.classList.add("hidden"); // Close the modal
                matricForm.reset(); // Reset the form
            })
            .catch((error) => console.error("Error:", error));
    });
});

</script>
</body>
</html>
