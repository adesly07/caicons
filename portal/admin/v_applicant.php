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
                    <li><a href="photocard.php">View Photo Card</a></l1>
                    <li><a href="mybio.php">View Biodata</a></l1>
                    <li><a href="p_results.php">View O'Level Results</a></l1>
                    <li><a href="p_pg.php">View Parents/Guardian</a></li>
                    <li><a href="p_otherinfo.php">View Other Information</a></li>
                    <li><a href="v_course.php">View Course Form</a></li>
                </ul>
        </div>
    </div>

</body>
</html>