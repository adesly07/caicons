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
            <div class="w-full p-8 bg-white rounded-lg shadow-md">
                <h2 class="text-2xl font-bold text-gray-800 text-center mb-6">Health and Other Information</h2>
                <form id="healthForm" action="a_otherinfo.php" method="POST" class="space-y-6">
                    
                    <!-- Health Information -->
                    <div>
                        <label for="hasCondition" class="block text-gray-700 font-medium">Do you have any health or physical disability?</label>
                        <select id="hasCondition" name="hasCondition" class="w-full p-2 border rounded mt-2" onchange="toggleConditionInput()">
                            <option value="">Select an option</option>
                            <option value="Yes">Yes</option>
                            <option value="No">No</option>
                        </select>
                    </div>

                    <!-- Conditional Text Field for Health Condition -->
                    <div id="conditionField" class="hidden">
                        <label for="conditionDetails" class="block text-gray-700 font-medium mt-4">
                            Please mention, in brief, if there is any history of previous illness, allergy or physical/psychological illness.
                        </label>
                        <textarea id="conditionDetails" name="conditionDetails" placeholder="Describe your condition" class="w-full p-2 border rounded mt-2"></textarea>
                    </div>

                    <!-- Other Relevant Information -->
                    <div>
                        <label for="otherInfo" class="block text-gray-700 font-medium">Other Relevant Information:</label>
                        <textarea id="otherInfo" name="otherInfo" rows="4" placeholder="Provide any other relevant information here" class="w-full p-2 border rounded mt-2"></textarea>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" class="w-full bg-sky-400 text-white p-2 rounded hover:bg-sky-300">Submit</button>
                </form>
            </div>

            <script>
                function toggleConditionInput() {
                    const hasCondition = document.getElementById("hasCondition").value;
                    const conditionField = document.getElementById("conditionField");
                    conditionField.classList.toggle("hidden", hasCondition !== "Yes");
                }
            </script>

            
        </main>
    </div>

</body>
</html>
