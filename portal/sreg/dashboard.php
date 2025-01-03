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
    $a_status = $data['a_status'];
} 
if($a_status == "PENDING" OR $a_status == "NOT ADMITTED"){
    $color = "text-red-600";
} else {
    $color = "text-green-600";
}
$sql2 = "SELECT * FROM courses where id = '$course_id'";
$result2 = $conn->query($sql2);

if ($result2->num_rows > 0) {
    $row = $result2->fetch_assoc();
    $course = $row['course'];
    $f_amount = '0';
    $t_fee = $row['t_fee'];
    $total = $f_amount + $t_fee;

} 
$sql3 = "SELECT * FROM applicant_documents WHERE reg_num = '$username'";
$result = $conn->query($sql3);

if ($result->num_rows > 0) {
    $pic = $result->fetch_assoc();
    $passport = $pic['passport'];
    
} 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CAICONS PORTAL | APPLICANT DASHBOARD?></title>
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
            <div class="flex flex-row relative">
                <div class="flex-item">
                    <h2 class="text-2xl font-semibold text-gray-800 mb-4">Welcome <a href="#" class="text-green-600"><?= $data['first_name'] ?></a> to your Dashboard</h2>
                    <p class="text-gray-600">REGISTRATION NUMBER: <span class="text-green-600"><?php echo $username; ?></span></p>
                    <p class="text-gray-600 mb-6">PROPOSED COURSE: <span class="text-green-600"><?php echo $course; ?></span></p>
                </div>
                <div class="flex-item absolute right-0">
                    <img src="<?php echo $passport; ?>" alt="Passport" class="w-20 h-20 rounded-full mr-4">
                </div>
            </div>
            
            <!-- Sample Content Section -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <div class="bg-white p-4 shadow rounded-lg">
                    <h3 class="font-semibold text-lg text-gray-800">Wallet Balance</h3>
                    <p class="text-gray-600">&#8358;<?php echo number_format($w_amt,2); ?></p>
                </div>
                <div class="bg-white p-4 shadow rounded-lg">
                    <h3 class="font-semibold text-lg text-gray-800">Application Fee</h3>
                    <p class="text-gray-600">&#8358;<?php echo number_format($f_amount,2); ?></p>
                </div>
                <div class="bg-white p-4 shadow rounded-lg">
                    <h3 class="font-semibold text-lg text-gray-800">Admission Status</h3>
                    <p class=<?php echo $color; ?>><?php echo $a_status; ?></p>
                </div>
            </div>
            <div class="mt-6">
                <h2 class="text-xl font-semibold text-gray-800 mb-4">ENTRY QUALIFICATION</h2>
                <ul class="list-disc text-gray-600 ">
                    <li class="mb-4">
                        Entry qualification to College of Nursing Sciences as specified by the Nursing & Midwifery<br>
                        Council is a minimum of Five(5) Credits which include English Language, Mathematics, Physics,<br>
                        Chemistry, and Biology at WAEC/NECO/NABTEB at not more than two(2) sittings.
                    </li>
                    
                </ul>
                
            </div>
        </main>
    </div>

    <script src="assets/js/script.js"></script>
</body>
</html>
