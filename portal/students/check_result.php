<?php
session_start();
include("../conx.php");
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit();
}
$username = $_SESSION['username'];
$section = $_SESSION['s_session'];
$r_status = $_SESSION['r_status'];
$level = $_SESSION['level'];

$sql = "SELECT * FROM applicants WHERE reg_num = '$username'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $data = $result->fetch_assoc();
    $course_id = $data['course_id'];
    $a_date = $data['a_date'];
} 
$sql2 = "SELECT * FROM courses where id = '$course_id'";
$result2 = $conn->query($sql2);
if ($result2->num_rows > 0) {
    $row = $result2->fetch_assoc();
    $course = $row['course'];
} 
$sql3 = "SELECT * FROM applicant_documents WHERE reg_num = '$username'";
$result = $conn->query($sql3);

if ($result->num_rows > 0) {
    $pic = $result->fetch_assoc();
    $passport = $pic['passport'];
    
} 
// Fetch contact data
$sql = "SELECT * FROM contact LIMIT 1";
$result = $conn->query($sql);
$contact_data = null;

if ($result->num_rows > 0) {
    $contact_data = $result->fetch_assoc();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../../cai.jpg" type="image/x-icon">
    <title>CAICONS | RESULTS</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/tailwindcss-jit-cdn@tailwindcss/latest/dist/tailwind.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-white">
    <div class="container mx-auto p-6 bg-white rounded-lg shadow-lg mt-5 max-w-3xl">
        <!-- College Details -->
        <div class="flex flex-row gap-10">
            <div class="flex-item text-center">
                <img src="../../assets/images/about_logo.png" alt="Logo">
            </div>
            <div class="flex-item text-center mb-6">
                <h1 class="text-2xl font-bold">CAI COLLEGE OF NURSING SCIENCES</h1>
                <p class="text-gray-600"><?php echo $contact_data['address']; ?></p>
                <p class="text-gray-600">Phone: <?php echo $contact_data['phone_number']; ?> | Email: <?php echo $contact_data['email_address']; ?></p>
            </div>
        </div>
        
        <!-- Invoice Title -->
        <div class="mb-4 text-center border-b pb-4 mb-4">
            <h2 class="text-xl font-bold"><?php echo $section; ?> SESSION <?php echo strtoupper($level); ?> RESULT </h2>
           
        </div>
        <div class="flex flex-row relative mb-6">
            <div class="flex-item">
                <p><strong>Name:</strong> <?= $data['surname'] ?> <?= $data['first_name'] ?> <?= $data['middle_name'] ?></p>
                <p><strong>Registration Number:</strong> <?= $data['reg_num'] ?></p>
                <p><strong>Matric Number:</strong> <?= $data['matric_no'] ?></p>
                <p><strong>Course:</strong> <?php echo $course; ?></p>
                
            </div>
            <div class="flex-item absolute right-0">
            <img src="<?php echo $passport; ?>" alt="Passport" class="w-20 h-20 rounded mr-20">
            </div>
        </div>
        <div class="bg-white rounded-lg shadow-lg p-6">
            <table class="w-full table-auto border-collapse border border-gray-300">
                <thead>
                    <tr class="bg-gray-200 text-gray-700">
                        <th class="border border-gray-300 p-2">Course Code</th>
                        <th class="border border-gray-300 p-2">Units</th>
                        <th class="border border-gray-300 p-2">Semester</th>
                        <th class="border border-gray-300 p-2">CA</th>
                        <th class="border border-gray-300 p-2">Exam</th>
                        <th class="border border-gray-300 p-2">Total</th>
                        <th class="border border-gray-300 p-2">Grade Letter</th>
                        <th class="border border-gray-300 p-2">Grade Point</th>
                        <th class="border border-gray-300 p-2">Remark</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        $sql2 = "SELECT * FROM scores where reg_num = '$username' AND level = '$level'";
                        $result2 = $conn->query($sql2);
                        while ($row = mysqli_fetch_assoc($result2)) : 
                    ?>
                    <tr class="text-gray-600">
                        <td class="border border-gray-300 text-center"><?= htmlspecialchars($row['course_code']); ?></td>
                        <td class="border border-gray-300 text-center"><?= htmlspecialchars($row['units']); ?></td>
                        <td class="border border-gray-300"><?= htmlspecialchars($row['s_semester']); ?></td>
                        <td class="border border-gray-300"><?= htmlspecialchars($row['ca_score']); ?></td>
                        <td class="border border-gray-300"><?= htmlspecialchars($row['exam_score']); ?></td>
                        <td class="border border-gray-300"><?= htmlspecialchars($row['total_score']); ?></td>
                        <td class="border border-gray-300 text-center"><?= htmlspecialchars($row['letter_grade']); ?></td>
                        <td class="border border-gray-300 text-center"><?= htmlspecialchars($row['grade_point']); ?></td>
                        <td class="border border-gray-300"><?= htmlspecialchars($row['remark']); ?></td>
                    </tr>
                    <?php endwhile; ?>
                    <tr class="text-gray-600">
                        <td colspan="9" class="border border-gray-300 text-red-600 text-center">
                            <?php
                                if(!mysqli_num_rows($result2)){
                                    echo "Result not found";
                                }
                            ?>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        
        

        <!-- Action Button -->
        <div class="text-center">
            <a href="c_result.php">Back</a> |
            <button onclick="window.print()" class="bg-blue-500 text-white px-4 py-2 rounded shadow hover:bg-blue-600">
                Print
            </button>
            
        </div>
    </div>
</body>
</html>
