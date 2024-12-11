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
$sql3 = "SELECT * FROM current where s_category = 'Applicant'";
$result3 = $conn->query($sql3);
$row3 = $result3->fetch_assoc();
$section = $row3['s_session'];
$_SESSION['s_session'] = $section;
$sql = "SELECT * from applicants where sch_session = '$section' AND p_status = 'CONFIRMED'";
if ($result = mysqli_query($conn, $sql)) {
    // Return the number of rows in result set
    $countapp = mysqli_num_rows( $result );
 }
 $sql2 = "SELECT * from applicants where a_status = 'ADMITTED' AND p_status = 'CONFIRMED'";
if ($result2 = mysqli_query($conn, $sql2)) {
    // Return the number of rows in result set
    $countstd = mysqli_num_rows( $result2);
 }
 $sql4 = "SELECT * from applicants where sch_session = '$section' AND a_status = 'ADMITTED' AND p_status = 'CONFIRMED'";
if ($result4 = mysqli_query($conn, $sql4)) {
    // Return the number of rows in result set
    $countadm = mysqli_num_rows( $result4);
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
        <!-- Main Content Area -->
        <main class="flex-grow p-6 overflow-auto">
            <h2 class="text-2xl font-semibold text-gray-800 mb-4">Welcome <?php echo $username; ?> to your Dashboard</h2>
            <p class="text-gray-600 mb-6">Use the menu on the left to navigate through the dashboard options.</p>

            <!-- Sample Content Section -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <div class="bg-white p-4 shadow rounded-lg">
                    <h3 class="font-semibold text-lg text-gray-800">Number of Students in the School</h3>
                    <p class="text-green-600 text-2xl"><?php echo $countstd; ?></p>
                </div>
                <div class="bg-white p-4 shadow rounded-lg">
                    <h3 class="font-semibold text-lg text-gray-800"><?php echo $section; ?> Applicants</h3>
                    <p class="text-green-600 text-2xl"><?php echo $countapp; ?></p>
                </div>
                <div class="bg-white p-4 shadow rounded-lg">
                    <h3 class="font-semibold text-lg text-gray-800"><?php echo $section; ?> Admitted</h3>
                    <p class="text-green-600 text-2xl"><?php echo $countadm; ?></p>
                </div>
            </div>
        </main>
    </div>

    <script src="js/script.js"></script>
</body>
</html>
