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
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $item = $_POST['payment_items'];
    $section = $_POST['section'];
    $_SESSION['payment_items'] = $item;
    $_SESSION['section'] = $section;
    header('location:p_detail.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../../cai.jpg" type="image/x-icon">
    <title>CAICONS PORTAL | <?php echo $department; ?></title>
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
            <h2 class="text-2xl font-bold text-center mb-6">PAYEMENT ITEMS</h2>
            <form method="POST" action="s_pitem.php">
                
                <div class="mb-4">
                    <label for="payment_items" class="block text-gray-700 font-semibold mb-2">Select Payment Item</label>
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
                    <span class="button-text">OK</span>
                    
                </button>
            </form>
            
        </div>
    </div>
    <script src="dash.js"></script>
</body>
</html>
