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
$sql3 = "SELECT * FROM current where s_category = 'Staylite'";
$result3 = $conn->query($sql3);
$row3 = $result3->fetch_assoc();
$section = $row3['s_session'];
$semester = $row3['s_semester'];
$_SESSION['s_session'] = $section;
$_SESSION['s_semester'] = $semester;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $level = $_POST['level'];
    $code = $_POST['course_code'];
    $sql2 = "SELECT * FROM courses_reg where course_code = '$code'";
    $result2 = $conn->query($sql2);
if ($result2->num_rows > 0) {
    $row = $result2->fetch_assoc();
    $unit = $row['units'];
    $_SESSION['level'] = $level;
    $_SESSION['course_code'] = $code;
    $_SESSION['units'] = $unit;
    header('location:compute_score.php');
} 
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../../cai.jpg" type="image/x-icon">
    <title>CAICONS PORTAL | ACADEMICS</title>
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
            <h2 class="text-2xl font-bold text-center mb-6">SELECT COURSE</h2>
            <form method="POST" action="add_scores.php">
                <div class="mb-4">
                    <label for="course_code" class="block text-gray-700 font-semibold mb-2">Course Code</label>
                        <select id="course_code" name ="course_code" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-sky-400">
                            <?php
                                $sql3 = "SELECT course_code FROM courses_reg order by course_code ASC";
                                $result = $conn->query($sql3);
                                while($data= mysqli_fetch_array($result)){
                            ?>
                                <option value="<?php echo $data['course_code']; ?>"><?php echo $data['course_code']; ?></option>
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
                                $result3 = $conn->query($sql4);
                                while($rows= mysqli_fetch_array($result3)){
                            ?>
                                <option value="<?php echo $rows['level_name']; ?>"><?php echo $rows['level_name']; ?></option>
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
