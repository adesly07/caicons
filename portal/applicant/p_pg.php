<?php
session_start();
include("../conx.php");
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit();
}
$username = $_SESSION['username'];
$section = $_SESSION['s_session'];


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
$sql3 = "SELECT * FROM payment WHERE reg_num = '$username'";
$result = $conn->query($sql3);

if ($result->num_rows > 0) {
    $pay = $result->fetch_assoc();
    //$course_id = $data['course_id'];
} 
// Fetch contact data
$sql = "SELECT * FROM contact LIMIT 1";
$result = $conn->query($sql);
$contact_data = null;

if ($result->num_rows > 0) {
    $contact_data = $result->fetch_assoc();
}
$sql3 = "SELECT * FROM applicant_documents WHERE reg_num = '$username'";
$result = $conn->query($sql3);

if ($result->num_rows > 0) {
    $pic = $result->fetch_assoc();
    $passport = $pic['passport'];
    
} 
$sql = "SELECT * FROM relatives WHERE reg_num = '$username'";
$result = $conn->query($sql);
$mydata = [];

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $mydata[] = $row;
    }
} else {
    echo "0 results";
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../../cai.jpg" type="image/x-icon">
    <title>CAICONS | RELATIVES</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/tailwindcss-jit-cdn@tailwindcss/latest/dist/tailwind.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-white">
    <div class="container mx-auto p-6 bg-white rounded-lg shadow-lg mt-10 max-w-3xl">
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
            <h2 class="text-xl font-bold"><?php echo $section; ?> APPLICATION FORM</h2>
           
        </div>
        <div class="mb-4 text-left">
            <h2 class="text-xl font-bold">NAME AND ADDRESS OF RELATIVES</h2>
           
        </div>
        <div>
            
            <table class="min-w-full bg-white border mb-4">
                <thead class="bg-gray-100 text-gray-600 uppercase text-sm leading-normal">
                    <tr>
                        <th class="py-3 px-6 text-left">Relationship</th>
                        <th class="py-3 px-6 text-left">Name</th>
                        <th class="py-3 px-6 text-left">Residential Address</th>
                        <th class="py-3 px-6 text-left">Phone Number</th>
                        <th class="py-3 px-6 text-left">Email <Address></Address></th>
                        
                    </tr>
                </thead>
                <?php foreach($mydata as $dat): ?>
                <tbody class="text-gray-700 text-sm">
                    <td class="py-3 px-6"><?php echo $dat['relative_type'] ?></td>
                    <td class="py-3 px-6"><?php echo $dat['r_name'] ?></td>
                    <td class="py-3 px-6"><?php echo $dat['r_address'] ?></td>
                    <td class="py-3 px-6"><?php echo $dat['r_phone'] ?></td>
                    <td class="py-3 px-6"><?php echo $dat['r_email'] ?></td>
                </tbody>
                <?php endforeach; ?>
            </table>
        </div>
        
        

        <!-- Action Button -->
        <div class="text-center">
            <a href="p_doc.php">Back</a> | 
            <button onclick="window.print()" class="bg-blue-500 text-white px-4 py-2 rounded shadow hover:bg-blue-600">
                Print
            </button>
        </div>
    </div>
</body>
</html>
