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
            <div class="mx-auto bg-white p-6 rounded-md shadow-md">
                <h2 class="text-2xl font-bold mb-4 text-center">Parents/Guardian Information</h2>
                <form id="relativesForm" method="POST" action="a_pgui.php">
                <div id="relative-forms">
                    <!-- Relative Form Template will be injected here by JavaScript -->
                </div>
                <button type="button" onclick="addRelativeForm()" class="bg-blue-400 text-white px-4 py-2 mt-4 rounded">
                    Add More
                </button>
                <button type="submit" class="bg-sky-400 text-white px-4 py-2 mt-4 rounded">Submit</button>
                </form>
            </div>

            <script>
                // Counter for relative forms
                let relativeCount = 0;

                // Add a new relative form
                function addRelativeForm() {
                relativeCount++;
                const relativeForms = document.getElementById("relative-forms");

                const formTemplate = `
                    <div class="relative-form mb-4 p-4 border rounded-md bg-white">
                    <button type="button" onclick="removeRelativeForm(this)" class="absolute top-1 right-1 text-red-500">Remove</button>
                    <div class="mb-2">
                        <label class="block font-medium">Relative Selection</label>
                        <select name="relative_type[]" class="w-full p-2 border rounded" required>
                        <option value="Father">Father</option>
                        <option value="Mother">Mother</option>
                        <option value="Guardian">Guardian</option>
                        </select>
                    </div>
                    <div class="mb-2">
                        <label class="block font-medium">Name</label>
                        <input type="text" name="name[]" class="w-full p-2 border rounded" required>
                    </div>
                    <div class="mb-2">
                        <label class="block font-medium">Residential Address</label>
                        <input type="text" name="address[]" class="w-full p-2 border rounded" required>
                    </div>
                    <div class="mb-2">
                        <label class="block font-medium">Phone Number</label>
                        <input type="tel" name="phone[]" class="w-full p-2 border rounded" pattern="[0-9]{10,15}" required>
                    </div>
                    <div class="mb-2">
                        <label class="block font-medium">Email Address (optional)</label>
                        <input type="email" name="email[]" class="w-full p-2 border rounded">
                    </div>
                    </div>
                `;

                relativeForms.insertAdjacentHTML('beforeend', formTemplate);
                }

                // Remove a specific relative form
                function removeRelativeForm(button) {
                button.closest(".relative-form").remove();
                }

                // Add the initial form on page load
                document.addEventListener("DOMContentLoaded", addRelativeForm);
            </script>
        </main>
    </div>

</body>
</html>
