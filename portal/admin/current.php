<?php
session_start();
include("../conx.php");
// Redirect if not logged in
if (!isset($_SESSION['username'])&&(!isset($_SESSION['department']))) {
    header('Location: ../index.php');
    exit();
}
$username = $_SESSION['username'];
$department = $_SESSION['department'];
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Sanitize user input
    $cat = $_POST['category'];
    $semester = $_POST['semester'];
    $section = $_POST['section'];
    $r_status = $_POST['r_status'];
    $query = "UPDATE current set s_semester = ?, s_session = ?, r_status = ? WHERE s_category = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ssss", $semester, $section, $r_status, $cat);

    if ($stmt->execute()) {
        echo "<script>alert('Current updated successfully'); window.location.href='current.php';</script>";
    } else {
        echo "<script>alert('Error updating current'); window.history.back();</script>";
    }
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../../cai.jpg" type="image/x-icon">
    <title>CAICON PORTAL</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/tailwindcss-jit-cdn@tailwindcss/latest/dist/tailwind.min.js"></script>
    
</head>
<body class="bg-gray-100">
    <div class="min-h-screen flex flex-col">
        <!-- Header -->
        <?php 
            include("header.php");
        ?>

        <div class="max-w-3xl mx-auto bg-white p-6 rounded-lg shadow-md mt-10">
            <h1 class="text-2xl font-bold mb-6 text-center">Update Current Session</h1>
            <!-- Add  Form -->
            <form action="current.php" method="POST">
            <div class="mb-4">
                    <label for="semester" class="block text-gray-700 font-semibold mb-2">Semester</label>
                        <select id="semester" name ="semester" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-sky-400">
                        <?php
                                $sql4 = "SELECT * FROM semester order by id ASC";
                                $result4 = $conn->query($sql4);
                                while($rows= mysqli_fetch_array($result4)){
                            ?>
                                <option value="<?php echo $rows['s_semester']; ?>"><?php echo $rows['s_semester']; ?></option>
                            <?php 
                                }
                            ?>
                        </select>
                </div>
                <div class="mb-4">
                    <label for="section" class="block text-gray-700 font-semibold mb-2">School Session</label>
                        <select id="section" name ="section" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-sky-400">
                        <?php
                                $sql3 = "SELECT * FROM sch_session order by id DESC";
                                $result = $conn->query($sql3);
                                while($data= mysqli_fetch_array($result)){
                            ?>
                                <option value="<?php echo $data['s_session']; ?>"><?php echo $data['s_session']; ?></option>
                            <?php 
                                }
                            ?>
                        </select>
                </div>               
                <div class="mb-4">
                    <label for="category" class="block text-gray-700 font-semibold mb-2">Select Category</label>
                        <select id="category" name ="category" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-sky-400">
                                <option value="Staylite">Staylite</option>
                                <option value="Applicant">Applicant</option>
                        </select>
                </div>
                <div class="mb-4">
                    <label for="r_status" class="block text-gray-700 font-semibold mb-2">Select Result Status</label>
                        <select id="r_status" name ="r_status" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-sky-400">
                                <option value="Pending">Pending</option>
                                <option value="Released">Released</option>
                        </select>
                </div>                
                <div class="text-center">
                    <button type="submit" class="w-full bg-sky-400 text-white py-2 rounded-lg hover:bg-sky-300">Update</button>
                </div>
            </form>
        </div>
        <div class="flex-grow container mx-auto py-6">
            <h2 class="text-2xl font-semibold mb-6 text-center">Current Update</h2>

            <div class="bg-white rounded-lg shadow-md p-6">
            
                <table class="min-w-full table-auto">
                    
                    <thead>
                        <tr class="bg-gray-200">
                            <th class="px-4 py-2">Student Category</th>
                            <th class="px-4 py-2">Semester</th>
                            <th class="px-4 py-2">Session</th>
                            <th class="px-4 py-2">Result status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Example Page Rows -->
                        <?php
                            $query = "SELECT * FROM current";
                            $result = mysqli_query($conn, $query);
                            if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                        <tr>
                            <td class="border px-4 py-2"><?php echo $row['s_category'] ?></td>
                            <td class="border px-4 py-2"><?php echo $row['s_semester'] ?></td>
                            <td class="border px-4 py-2"><?php echo $row['s_session'] ?></td>
                            <td class="border px-4 py-2"><?php echo $row['r_status'] ?></td>
                        </tr>
                    </tbody>
                    <?php } }?>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
