<?php
session_start();
include('../conx.php');
// Redirect if not logged in
if (!isset($_SESSION['username'])) {
    header('Location: index.php');
    exit();
}
$username = $_SESSION['username'];
$sql = "SELECT * FROM applicants WHERE reg_num = '$username'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $data = $result->fetch_assoc();
    $course_id = $data['course_id'];
    $matric_no = $data['matric_no'];
    $w_amt = $data['w_amt'];
    $inv = $data['invoice_number'];
    $a_status = $data['a_status'];
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
$sql3 = "SELECT * FROM applicant_documents WHERE reg_num = '$username'";
$result = $conn->query($sql3);

if ($result->num_rows > 0) {
    $pic = $result->fetch_assoc();
    $passport = $pic['passport'];
    
} 
$sql3 = "SELECT * FROM current where s_category = 'Staylite'";
$result3 = $conn->query($sql3);
$row3 = $result3->fetch_assoc();
$section = $row3['s_session'];
$_SESSION['s_session'] = $section;
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
<body class="bg-sky-200">
    <!-- Header Section -->
    <?php
        include('header.php');
    ?>
    <div class="flex">
       

        <div class="flex-1">
        

            <!-- Dashboard Overview -->
            <div class="p-6 space-y-4">
                <div class="flex flex-row shadow-md mb-10">
                    <div class="flex-item ml-4">
                        <img src="<?php echo $passport; ?>" alt="Passport" class="w-20 h-20 mr-4">
                    </div>
                    <div class="flex-item ml-4 mb-5">
                        <h2 class="text-1xl font-semibold text-gray-800">Welcome <a href="#" class="text-green-600"><?= $data['surname'] ?> <?= $data['first_name'] ?> <?= $data['middle_name'] ?></a></h2>
                        <p class="text-gray-600"><span class="text-green-600"><?php echo $username; ?></span></p>
                        <p class="text-gray-600 mb-6"><span class="text-green-600"><?php echo $matric_no; ?></span></p>
                        <p class="text-gray-600 mb-6"><span class="text-green-600"><?php echo $course; ?></span></p>
                        <a href="logout.php" class="block text-white text-center bg-red-500 py-2 px-4 rounded-md hover:bg-red-600">Logout</a>
                        
                    </div>
                    
                </div>
                <div>
                <p class="text-gray-600 text-center"><strong>CURRENT SCHOOL SESSION: <span class="text-green-600"><?php echo $section; ?></span></strong></p>
                </div>
                <!-- Academic Performance and Notifications -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div class="bg-white p-4 shadow-md rounded-lg">
                        <h3 class="text-lg font-semibold">Wallet Balance</h3>
                        <p>&#8358;<?php echo number_format($data['w_amt'],2); ?></p>
                    </div>
                    <div class="bg-white p-4 shadow-md rounded-lg">
                        <h3 class="text-lg font-semibold">Invoice</h3>
                        <ul>
                            <li><a href="g_invoice.php">Generate Invoice</a></li>
                            <li><a href="v_invoice.php">View Invoice</a></li>
                        </ul>
                    </div>
                    <div class="bg-white p-4 shadow-md rounded-lg">
                        <h3 class="text-lg font-semibold">Payments</h3>
                        <ul>
                            <li><a href="p_rec.php">Print Receipt</a></li>
                            <li><a href="p_rec.php">Payment Records</a></li>
                        </ul>
                    </div>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div class="bg-white p-4 shadow-md rounded-lg">
                        <h3 class="text-lg font-semibold">Course Form</h3>
                        <ul>
                            <li><a href="r_course.php">Register Course</a></li>
                            <li><a href="p_course.php">Print Course</a></li>
                        </ul>
                    </div>
                    <div class="bg-white p-4 shadow-md rounded-lg">
                        <h3 class="text-lg font-semibold">Lectures</h3>
                        <ul>
                            <li><a href="v_lectures.php">Online Lectures</a></li>
                            
                        </ul>
                        <h3 class="text-lg font-semibold">Results</h3>
                        <ul>
                            <li><a href="c_result.php">Check Result</a></li>
                            <li><a href="c_transcript.php">Check Transcript</a></li>
                        </ul>
                    </div>
                    <div class="bg-white p-4 shadow-md rounded-lg">
                        <h3 class="text-lg font-semibold">Biodata</h3>
                        <ul>
                            <li><a href="photocard.php">Photo Card</a></l1>
                            <li><a href="mybio.php">Biodata</a></l1>
                            <li><a href="p_results.php">Results</a></l1>
                            <li><a href="p_pg.php">Parents/Guardian</a></li>
                            <li><a href="p_otherinfo.php">Other Information</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
        include('footer.php');
    ?>
    <script src="dash.js"></script>
</body>
</html>