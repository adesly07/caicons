<?php
session_start();
include("../conx.php");
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit();
}
$username = $_SESSION['username'];
$section = $_SESSION['s_session'];


$sql = "SELECT * FROM schools_attended WHERE reg_num = '$username' ORDER BY id DESC";
$result = $conn->query($sql);
$data = [];

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
} else {
    echo "0 results";
}


// Fetch contact data
$sql = "SELECT * FROM contact LIMIT 1";
$result = $conn->query($sql);
$contact_data = null;

if ($result->num_rows > 0) {
    $contact_data = $result->fetch_assoc();
}
/*$sql3 = "SELECT * FROM applicant_documents WHERE reg_num = '$username'";
$result = $conn->query($sql3);

if ($result->num_rows > 0) {
    $pic = $result->fetch_assoc();
    $passport = $pic['passport'];
    
} */
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../../cai.jpg" type="image/x-icon">
    <title>CAICONS | ACADEMIC BACKGROUND</title>
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
        <div class="mb-4 text-center">
            <h2 class="text-xl font-bold"><?php echo $section; ?> APPLICATION FORM</h2>
           
        </div>
        <div class="mb-4 text-center border-b pb-4 mb-4">
            <h2 class="text-xl font-bold">ACADEMIC BACKGROUND</h2>
           
        </div>
        <!-- Invoice Title -->
         <!-- Applicants Table -->
        <div>
            
            <table class="min-w-full bg-white border">
                <thead class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                    <tr>
                        <th class="py-3 px-6 text-left">Institution Name</th>
                        <th class="py-3 px-6 text-left">Place and Country</th>
                        <th class="py-3 px-6 text-left">From</th>
                        <th class="py-3 px-6 text-left">To</th>
                        <th class="py-3 px-6 text-left">Qualification</th>
                        
                    </tr>
                </thead>
                <?php foreach($data as $dat): ?>
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
            <a href="p_doc.php">Back</a> | 
            <button onclick="window.print()" class="bg-blue-500 text-white px-4 py-2 rounded shadow hover:bg-blue-600">
                Print
            </button>
        </div>
    </div>
</body>
</html>
