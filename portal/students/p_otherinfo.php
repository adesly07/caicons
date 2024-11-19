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
    
} 

$sql = "SELECT * FROM health_info WHERE reg_num = '$username'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $mydata = $result->fetch_assoc();
    
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

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../../cai.jpg" type="image/x-icon">
    <title>CAICONS | HEALTH</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/tailwindcss-jit-cdn@tailwindcss/latest/dist/tailwind.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-white">
    <div class="container mx-auto p-6 bg-white rounded-lg mt-10 max-w-3xl">
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
            <h2 class="text-xl font-bold">HEALTH INFORMATION</h2>
           
        </div>
        <div class="text-gray-600">
            <p class="mb-4">
                <strong>Do you have any health or physical disability? </strong> <?= $mydata['hasCondition'] ?>
            </p>
            <p class="mb-4"><strong>If Yes, explain: </strong> <?= $mydata['conditionDetails'] ?></p>
            <p class="mb-4">
                <strong>Give any other information which you consider relevant to the application </strong>
                <br> <?= $mydata['otherInfo'] ?>
            </p>
        </div>
        <div class="mb-4 text-left">
            <h2 class="text-xl font-bold">DECLARATION</h2>
            <p class="mb-8">
                I, <?= $data['surname'] ?> <?= $data['first_name'] ?> <?= $data['middle_name'] ?> the undersigned
                candidate hereby declare that information I have given on this form are true and correct. If any
                of it is later discovered to be false or incorrect, i shall be guilty of offence punishable 
                according to relevant law and the College disciplinary action.
            </p>
            
        </div>
        <div class="flex flex-row relative text-gray-600 mb-20">
            <div class="flex-item">   
                <p>
                    <strong>Candidate's Phone No: </strong> <?= $data['phone_number'] ?>
                </p>
            </div>
            <div class="flex-item absolute right-5">
                <p>
                    <strong>Candidate's Signature and Date </strong>
                </p>
            </div>
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
