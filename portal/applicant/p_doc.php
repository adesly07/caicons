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
            <div class="mx-auto p-6 bg-white rounded shadow-lg mt-5">
                <h2 class="text-2xl font-bold mb-4 text-center">Print Documents</h2>
                    <div class="mb-6 w-full max-w-40 text-center bg-blue-500 text-white font-bold py-2 px-2 mb-2">
                        <a href="photocard.php" target="_blank" >Photo Card</a>
                    </div>
                    <div class="mb-6 w-full max-w-40 text-center bg-blue-500 text-white font-bold py-2 px-2 mb-2">
                        <a href="mybio.php" target="_blank">Biodata</a>
                    </div>
                    
                    <div class="mb-6 w-full max-w-40 text-center bg-blue-500 text-white font-bold py-2 px-2 mb-2">
                        <a href="p_results.php" target="_blank">Results</a>
                    </div>
                    <div class="mb-6 w-full max-w-40 text-center bg-blue-500 text-white font-bold py-2 px-2 mb-2">
                        <a href="p_pg.php" target="_blank">Parents/Guardian</a>
                    </div>
                    <div class="mb-6 w-full max-w-40 text-center bg-blue-500 text-white font-bold py-2 px-2 mb-2">
                        <a href="p_otherinfo.php" target="_blank">Other Information</a>
                    </div>           

                   
            </div>
        </main>
    </div>
</body>

</html>
