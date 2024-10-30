<?php
include("../conx.php");
session_start();
$sql3 = "SELECT * FROM current where s_category = 'Applicant'";
$result3 = $conn->query($sql3);
$row3 = $result3->fetch_assoc();
$section = $row3['s_session'];
$_SESSION['s_session'] = $row3['s_session'];
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
    <title>CAICONS PORTAL</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/tailwindcss-jit-cdn@tailwindcss/latest/dist/tailwind.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" />
    <link rel="stylesheet" href="./assets/css/style.css" />
</head>
<body class="bg-sky-400 text-gray-800">
    <header class="flex justify-center items-center p-4">
        <p class="justify-center"><img src="../../assets/images/header_logo2.png" alt="Logo"></p>
    </header>
    <!-- First Row -->
    <section class="p-6 md:flex justify-between items-center bg-white shadow-md h-60">
        <!-- First Column -->
        <div class="md:w-1/2 flex items-center mb-4 md:mb-4 text-center">
            <img src="./assets/images/admission.jpg" alt="Admission Guide" class="w-16 h-16 rounded-full mr-4">
            <div>
                <h2 class="text-lg font-bold mb-4">Admission Guide</h2>
                <p class="text-gray-600">Follow our comprehensive guide to begin your journey with us.</p>
            </div>
        </div>
        <!-- Second Column -->
        <div class="md:w-1/2 flex items-center text-center">
            <a href="new_applicant.php" class="bg-sky-400 text-white rounded-full px-6 py-2 mr-4">Click here to apply for <?php echo $row3['s_session']; ?> admission</a>
            <p class="text-gray-600">Start your application and join our vibrant community of future healthcare professionals.</p>
        </div>
    </section>

    <!-- Second Row -->
    <section class="p-6 md:flex justify-between items-center bg-gray-100 shadow-md h-60">
        <!-- First Column -->
        <div class="md:w-1/2 mb-4 md:mb-0 text-center">
            <h1 class="text-lg font-bold mb-2">General Information</h1>
            <p class="text-gray-600 mb-2">Learn more about our programs, admissions, and more.</p>
            <a href="#.pdf" download class="bg-sky-400 text-white rounded px-4 py-2">Download PDF</a>
        </div>
        <!-- Second Column -->
        <div class="md:w-1/2 text-center">
            <h3 class="text-lg font-bold mb-2">Contact Us</h3>
            <p class="text-gray-600">Phone: <?php echo $contact_data['phone_number']; ?></p>
            <p class="text-gray-600">Email: <?php echo $contact_data['email_address']; ?></p>
            <p class="text-gray-600">Address: <?php echo $contact_data['address']; ?></p>
        </div>
    </section>

    <!-- Third Row (Footer) -->
    <footer class="p-4 bg-sky-400 text-white text-center">
    <p class="mt-2 text-white">&copy; CAICONS, 2023-<?php echo date("Y"); ?>. All rights reserved.</p>
    <p><a href ="#">Powered by CAICONS ICT Unit</a></p>
    </footer>

    <script src="script.js"></script>
</body>
</html>
