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
$sql = "SELECT * FROM schools_attended WHERE reg_num = '$username'";
$result = $conn->query($sql);
$mydata = [];

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $mydata[] = $row;
    }
} else {
    echo "<span class = 'text-red-600'>No record found for schools attended. Add it before printing.</span>";
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../../cai.jpg" type="image/x-icon">
    <title>CAICONS | BIODATA</title>
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
        
        <!-- Invoice Title -->
        <div class="flex flex-row relative">
            <div class="flex-item text-gray-600">
                
                <p class="mb-1"><strong>Name:</strong> <?= $data['surname'] ?> <?= $data['first_name'] ?> <?= $data['middle_name'] ?></p>
                <p class="mb-1"><strong>Registration Number:</strong> <?= $data['reg_num'] ?></p>
                <p class="mb-1"><strong>Phone Number:</strong> <?= $data['phone_number'] ?></p>
                <p class="mb-1"><strong>Email:</strong> <?= $data['email'] ?></p>
                <p class="mb-1"><strong>Course:</strong> <?php echo $course; ?></p>
                <p class="mb-1"><strong>Date of Birth:</strong> <?= $data['dob'] ?></p>
                <p class="mb-1"><strong>Sex:</strong> <?= $data['sex'] ?></p>
                <p class="mb-1"><strong>Marital Status:</strong> <?= $data['marital_status'] ?></p>
                <p class="mb-1"><strong>Home Town/Registered Domicile:</strong> <?= $data['hometown'] ?></p>
                <p class="mb-1"><strong>Address:</strong> <?= $data['a_address'] ?></p>
                <p class="mb-1"><strong>State of Origin:</strong> <?= $data['state_of_origin'] ?></p>
                <p class="mb-1"><strong>Nationality:</strong> <?= $data['nationality'] ?></p>
                <p class="mb-1"><strong>Local Government Area:</strong> <?= $data['lga'] ?></p>
                <p class="mb-3"><strong>Permanent Contact Address:</strong> <?= $data['contact_address'] ?></p>
            </div>
            <div class="flex-item absolute right-0">
            <img src="<?php echo $passport; ?>" alt="Passport" class="w-20 h-20 mr-20">
            </div>
        </div>
        <div class="mb-4 text-left">
            <h2 class="text-xl font-bold">ACADEMIC BACKGROUND</h2>
           
        </div>
        <!-- Invoice Title -->
         <!-- Applicants Table -->
        <div>
            
            <table class="min-w-full bg-white border mb-4">
                <thead class="bg-gray-100 text-gray-600 uppercase text-sm leading-normal">
                    <tr>
                        <th class="py-3 px-6 text-left">Institution Name</th>
                        <th class="py-3 px-6 text-left">Place and Country</th>
                        <th class="py-3 px-6 text-left">From</th>
                        <th class="py-3 px-6 text-left">To</th>
                        <th class="py-3 px-6 text-left">Qualification</th>
                        
                    </tr>
                </thead>
                <?php foreach($mydata as $dat): ?>
                <tbody class="text-gray-700 text-sm">
                    <td class="py-3 px-6"><?php echo $dat['institution_name'] ?></td>
                    <td class="py-3 px-6"><?php echo $dat['place_country'] ?></td>
                    <td class="py-3 px-6"><?php echo $dat['from_year'] ?></td>
                    <td class="py-3 px-6"><?php echo $dat['to_year'] ?></td>
                    <td class="py-3 px-6"><?php echo $dat['qualification'] ?></td>
                </tbody>
                <?php endforeach; ?>
            </table>
        </div>
        
        

        <!-- Action Button -->
        <div class="text-center">
            <a href="dashboard.php">Back</a> | 
            <button onclick="window.print()" class="bg-blue-500 text-white px-4 py-2 rounded shadow hover:bg-blue-600">
                Print
            </button>
        </div>
    </div>
</body>
</html>
