<?php
session_start();
include("../conx.php");
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit();
}
$username = $_SESSION['username'];
$section = $_SESSION['s_session'];
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
$sql2 = "SELECT * FROM course_registration where reg_num = '$username' AND level = '$level'";
$result2 = $conn->query($sql2);


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

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../../cai.jpg" type="image/x-icon">
    <title>CAICONS | COURSE</title>
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
            <h2 class="text-xl font-bold"><?php echo $section; ?> COURSE FORM</h2>
           
        </div>
        <div class="flex flex-row relative mb-6">
            <div class="flex-item">
                <p><strong>Name:</strong> <?= $data['surname'] ?> <?= $data['first_name'] ?> <?= $data['middle_name'] ?></p>
                <p><strong>Registration Number:</strong> <?= $data['reg_num'] ?></p>
                <p><strong>Course:</strong> <?php echo $course; ?></p>
                <p><strong>Level:</strong> <?php echo $level; ?></p>
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
                        <th class="border border-gray-300 p-2">Course Title</th>
                        <th class="border border-gray-300 p-2">Units</th>
                        <th class="border border-gray-300 p-2">Semester</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = mysqli_fetch_assoc($result2)) : ?>
                        <tr class="text-gray-600">
                            <td class="border border-gray-300 text-center"><?= htmlspecialchars($row['course_code']); ?></td>
                            <td class="border border-gray-300"><?= htmlspecialchars($row['course_title']); ?></td>
                            <td class="border border-gray-300 text-center"><?= htmlspecialchars($row['unit']); ?></td>
                            <td class="border border-gray-300"><?= htmlspecialchars($row['semester']); ?></td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
        
        

        <!-- Action Button -->
        <div class="text-center">
            <a href="p_course.php">Back</a> |
            <button onclick="window.print()" class="bg-blue-500 text-white px-4 py-2 rounded shadow hover:bg-blue-600">
                Print
            </button>
            
        </div>
    </div>
</body>
</html>
