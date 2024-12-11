<?php
session_start();
include('../conx.php');
// Redirect if not logged in
if (!isset($_SESSION['username'])) {
    header('Location: index.php');
    exit();
}
$username = $_SESSION['username'];
//$section = $_SESSION['s_session'];
$sql = "SELECT * FROM applicants WHERE reg_num = '$username'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $data = $result->fetch_assoc();
    $course_id = $data['course_id'];
    $w_amt = $data['w_amt'];
    $inv = $data['invoice_number'];
    $a_status = $data['a_status'];
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../../cai.jpg" type="image/x-icon">
    <title>CAICONS PORTAL | INVOICE</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/tailwindcss-jit-cdn@tailwindcss/latest/dist/tailwind.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script defer src="js/script.js"></script> <!-- Add external JS file for controlling the animation -->
</head>
<body class="bg-sky-200">
    <!-- Header Section -->
    <?php
        include('header.php');
    ?>
    <div class="flex items-center justify-center min-h-screen" >
        <div class="w-full max-w-md bg-white rounded-lg shadow-lg p-6">
            <h2 class="text-2xl font-bold text-center mb-6">GENERATE INVOICE</h2>
            <form method="POST" action="invoice.php">
                
                <div class="mb-4">
                    <label for="payment_items" class="block text-gray-700 font-semibold mb-2">What Item do you want to pay for?</label>
                        <select id="payment_items" name ="payment_items" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-sky-400">
                            <?php
                                $sql3 = "SELECT * FROM payment_items order by id ASC";
                                $result = $conn->query($sql3);
                                while($data= mysqli_fetch_array($result)){
                                    $item = $data['item_name'];
                                    
                                
                            ?>
                                <option value="<?php echo $data['item_name']; ?>"><?php echo $data['item_name']; ?></option>
                            <?php 
                                }
                            ?>
                        </select>
                </div>
                <div class="mb-4">
                    <label for="level" class="block text-gray-700 font-semibold mb-2">Level</label>
                        <select id="level" name ="level" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-sky-400">
                            <?php
                                $sql4 = "SELECT * FROM level order by id ASC";
                                $result = $conn->query($sql4);
                                while($data= mysqli_fetch_array($result)){
                            ?>
                                <option value="<?php echo $data['level_name']; ?>"><?php echo $data['level_name']; ?></option>
                            <?php 
                                }
                            ?>
                        </select>
                </div>
                <div class="mb-4">
                <label for="section" class="block text-gray-700 font-semibold mb-2">School Session</label>
                        <select id="section" name ="section" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-sky-400">
                        <?php
                                $sql4 = "SELECT * FROM sch_session order by id ASC";
                                $result = $conn->query($sql4);
                                while($data= mysqli_fetch_array($result)){
                            ?>
                                <option value="<?php echo $data['s_session']; ?>"><?php echo $data['s_session']; ?></option>
                            <?php 
                                }
                            ?>
                        </select>
                </div>
                <button type="submit" class="w-full bg-sky-400 text-white font-bold py-2 px-4 rounded hover:bg-sky-300 flex justify-center items-center">
                    <span class="button-text">Generate Invoice</span>
                    
                </button>
            </form>
            
        </div>
    </div>
    <script src="dash.js"></script>
</body>
</html>
