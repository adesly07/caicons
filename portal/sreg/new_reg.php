<?php
session_start();
include("../conx.php");

$section = $_SESSION['sch_session'];
$pin = $_SESSION['pin'];
$serial_number = $_SESSION['serial_number'];

		
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
</head>
<body class="bg-sky-300">

    <!-- Row 1: Header with Logo -->
    <header class="bg-sky-400 p-4 shadow-md flex justify-center">
        <img src="../../assets/images/header_logo2.png" alt="College Logo" class="h-12">
    </header>

    <!-- Second Row: Page Title -->
    <section class="py-8">
        <div class="container mx-auto text-center">
            <h2 class="text-xl font-bold text-gray-800">
                Fill out the form to begin registration.
            </h2>
        </div>
    </section>

    <!-- Third Row: Form and Action Buttons -->
    <section class="container w-3/4 mx-auto p-4 bg-white shadow-lg rounded-lg">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-12">

            <!-- First Column: Application Form -->
            <div>
                <form id="applicantForm" action="submit_applicant.php" method="POST">
                    <div class="mb-4 border-b border-gray-400 hover:border-blue-900">
                        <label class="block font-medium text-gray-700">Registration Number</label>
                        <input type="text" name="reg_num" required class="w-full p-1 text-sky-600 focus:outline-none" />
                        
                    </div>
                    <div class="mb-4 border-b border-gray-400 hover:border-blue-900">
                        <label class="block font-medium text-gray-700">Surname</label>
                        <input type="text" name="surname" required class="w-full p-1 text-sky-600 focus:outline-none" />
                        <input type="hidden" id="section" name="section" value="<?php echo ($_SESSION['sch_session']); ?>">
                    </div>
                    <div class="mb-4 border-b border-gray-400 hover:border-blue-900">
                        <label class="block font-medium text-gray-700">First Name</label>
                        <input type="text" name="first_name" required class="w-full p-1 text-sky-600 focus:outline-none" />
                    </div>
                    <div class="mb-4 border-b border-gray-400 hover:border-blue-900">
                        <label class="block font-medium text-gray-700">Middle Name</label>
                        <input type="text" name="middle_name" class="w-full p-1 text-sky-600 focus:outline-none" />
                    </div>
                    <div class="mb-4 border-b border-gray-400 hover:border-blue-900">
                        <label class="block font-medium text-gray-700">Email</label>
                        <input type="email" name="email" required class="w-full p-1 text-sky-600 focus:outline-none" />
                    </div>
                    <div class="mb-4 border-b border-gray-400 hover:border-blue-900">
                        <label class="block font-medium text-gray-700">Phone Number</label>
                        <input type="tel" name="phone" required class="w-full p-1 text-sky-600 focus:outline-none" />
                    </div>
                    <div class="mb-4 border-b border-gray-400 hover:border-blue-900">
                        <label class="block font-medium text-gray-700">Nationality</label>
                        <input type="text" name="nationality" required class="w-full p-1 text-sky-600 focus:outline-none" />
                    </div>
                    <div class="mb-4 border-b border-gray-400 hover:border-blue-900">
                        <label for="course_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Selete Course</label>
                        <select id="course_id" name ="course_id" class="bg-white text-sky-600 rounded focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <?php
                                $sql3 = "SELECT * FROM courses order by id ASC limit 1";
                                $result = $conn->query($sql3);
                                while($data= mysqli_fetch_array($result)){
                            ?>
                                <option value="<?php echo $data['id']; ?>"><?php echo $data['course']; ?></option>
                            <?php 
                                }
                            ?>
                        </select>
                    </div>
                    <div class="mb-4 border-b border-gray-400 hover:border-blue-900">
                        <label class="block font-medium text-gray-700">Verification Code</label>
                        <input type="text" id="generatedCode" class="w-full p-1 text-sky-600 rounded" disabled />
                    </div>
                    <div class="mb-4 border-b border-gray-400 hover:border-blue-900">
                        <label class="block font-medium text-gray-700">Enter Code</label>
                        <input type="text" id="verifyCode" required class="w-full p-1 text-sky-600" />
                    </div>
                    
                    <button type="submit" class="w-full bg-sky-400 hover:bg-sky-300 text-white p-2 rounded">
                        Submit
                    </button>
                </form>
            </div>

            

        </div>
    </section>
    <!-- Third Row (Footer) -->
    <footer class="p-4 bg-sky-400 text-white text-center">
    <p class="mt-2 text-white">&copy; CAICONS, 2023-<?php echo date("Y"); ?>. All rights reserved.</p>
    <p><a href ="#">Powered by CAICONS ICT Unit</a></p>
    </footer>

    <!-- JavaScript for Code Verification -->
    <script>
        // Generate random 6-digit code and display it
        const generatedCode = Math.floor(100000 + Math.random() * 900000);
        document.getElementById("generatedCode").value = generatedCode;

        // Verify that the input matches the generated code
        document.getElementById("applicantForm").addEventListener("submit", function (e) {
            const verifyCode = document.getElementById("verifyCode").value;
            if (verifyCode != generatedCode) {
                e.preventDefault();
                alert("Verification code does not match.");
            } else {
                document.getElementById("invoiceNumber").value = `INV-${Date.now()}`; // Serial Invoice Number
            }
        });
    </script>
</body>
</html>
