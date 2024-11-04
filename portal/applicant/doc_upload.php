<?php
session_start();
include('../conx.php');
// Redirect if not logged in
if (!isset($_SESSION['username'])) {
    header('Location: ../index.php');
    exit();
}
$username = $_SESSION['username'];
$section = $_SESSION['s_session'];
$sql = "SELECT * FROM applicants WHERE reg_num = '$username'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $data = $result->fetch_assoc();
    $course_id = $data['course_id'];
    $w_amt = $data['w_amt'];
    $inv = $data['invoice_number'];
} 
$sql2 = "SELECT * FROM courses where id = '$course_id'";
$result2 = $conn->query($sql2);

if ($result2->num_rows > 0) {
    $row = $result2->fetch_assoc();
    $course = $row['course'];
    $f_amount = $row['f_amount'];
    $t_fee = $row['t_fee'];
    $total = $f_amount + $t_fee;

} 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CAICONS PORTAL | APPLICATION FORM</title>
    <link rel="shortcut icon" href="../../cai.jpg" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/tailwindcss-jit-cdn@tailwindcss/latest/dist/tailwind.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" />
</head>
<body class="bg-white h-screen flex flex-col">

        <!-- Header Section -->
        <?php
            include('header.php');
        ?>

    <!-- Main Dashboard Layout -->
    <div class="flex flex-grow overflow-hidden">

        <!-- Sidebar Menu -->
        <?php
            include('navbar.php');
        ?>

        <!-- Main Content Area -->
        <main class="flex-grow p-6 overflow-auto">
            <div class="mx-auto p-6 bg-white rounded shadow-lg mt-5">
                <h2 class="text-2xl font-bold mb-4 text-center">Upload Applicant's Documents</h2>
                <form id="uploadForm" action="upload_documents.php" method="POST" enctype="multipart/form-data" class="space-y-4">
                    <!-- O-Level First Sitting -->
                    <div>
                        <label class="block text-sm font-medium">O-Level Result (First Sitting)</label>
                        <input type="file" name="o_level_first_sitting" accept=".pdf,.jpg,.jpeg,.png" required
                            class="block w-full text-sm text-gray-600 file:mr-4 file:py-2 file:px-4 file:rounded file:border-0 file:text-sm file:bg-blue-50 file:text-sky-700 hover:file:bg-blue-100">
                    </div>

                    <!-- O-Level Second Sitting (Optional) -->
                    <div>
                        <label class="block text-sm font-medium">O-Level Result (Second Sitting)</label>
                        <input type="file" name="o_level_second_sitting" accept=".pdf,.jpg,.jpeg,.png"
                            class="block w-full text-sm text-gray-600 file:mr-4 file:py-2 file:px-4 file:rounded file:border-0 file:text-sm file:bg-blue-50 file:text-sky-700 hover:file:bg-blue-100">
                    </div>

                    <!-- Date of Birth Certificate -->
                    <div>
                        <label class="block text-sm font-medium">Date of Birth Certificate</label>
                        <input type="file" name="birth_certificate" accept=".pdf,.jpg,.jpeg,.png" required
                            class="block w-full text-sm text-gray-600 file:mr-4 file:py-2 file:px-4 file:rounded file:border-0 file:text-sm file:bg-blue-50 file:text-sky-700 hover:file:bg-blue-100">
                    </div>

                    <!-- Marriage Certificate (Optional) -->
                    <div>
                        <label class="block text-sm font-medium">Marriage Certificate</label>
                        <input type="file" name="marriage_certificate" accept=".pdf,.jpg,.jpeg,.png"
                            class="block w-full text-sm text-gray-600 file:mr-4 file:py-2 file:px-4 file:rounded file:border-0 file:text-sm file:bg-blue-50 file:text-sky-700 hover:file:bg-blue-100">
                    </div>

                    <!-- Passport Photo -->
                    <div>
                        <label class="block text-sm font-medium">Passport Photo</label>
                        <input type="file" name="passport" accept=".jpg,.jpeg,.png" required
                            class="block w-full text-sm text-gray-600 file:mr-4 file:py-2 file:px-4 file:rounded file:border-0 file:text-sm file:bg-blue-50 file:text-sky-700 hover:file:bg-blue-100">
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" class="w-full bg-sky-400 text-white py-2 rounded-lg hover:bg-sky-300">Upload Documents</button>
                </form>
            </div>

        <!-- Display Uploaded Documents -->
            <div id="uploadedFiles" class="max-w-lg mx-auto mt-6 p-4 bg-white rounded shadow-lg">
                <h2 class="text-xl font-bold mb-4 text-center">Uploaded Documents</h2>
            <div id="fileList" class="space-y-2">
                <!-- JavaScript will insert uploaded file links here -->
            </div>
        </div>
        </main>
    </div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    // Display uploaded files if available
    function displayUploadedFiles(files) {
        let fileList = document.getElementById('fileList');
        fileList.innerHTML = '';
        files.forEach(file => {
            let fileLink = document.createElement('a');
            fileLink.href = file.path;
            fileLink.target = '_blank';
            fileLink.classList.add('block', 'text-sky-400', 'hover:underline');
            fileLink.textContent = file.label;
            fileList.appendChild(fileLink);
        });
    }

    // AJAX call to fetch uploaded files for display
    $.ajax({
        url: 'fetch_uploaded_files.php', // Separate file to fetch file data
        method: 'GET',
        success: function(response) {
            displayUploadedFiles(JSON.parse(response));
        }
    });
</script>
</html>
