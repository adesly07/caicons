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
    <script>
        function validatePassword() {
            const password = document.getElementById('password').value;
            const confirmPassword = document.getElementById('confirm-password').value;
            const message = document.getElementById('message');

            if (password !== confirmPassword) {
                message.textContent = "Passwords do not match!";
                message.classList.remove('text-green-500');
                message.classList.add('text-red-500');
                return false;
            } else {
                message.textContent = "Passwords match!";
                message.classList.remove('text-red-500');
                message.classList.add('text-green-500');
                return true;
            }
        }
    </script>
</head>
<body class="bg-gray-100">
    <div class="min-h-screen flex flex-col">
        <!-- Header -->
        <?php 
            include("header.php");
        ?>

        <div class="max-w-3xl mx-auto bg-white p-6 rounded-lg shadow-md">
            <h1 class="text-2xl font-bold mb-6 text-center">Create Account | <a href = "v_user.php">View Accounts</a></h1>
            <!-- Add  Form -->
            <form action="user.php" method="POST" onsubmit="return validatePassword()">
                <div class="mb-4">
                    <label for="name" class="block text-gray-700">Name</label>
                    <input type="text" id="name" name="name" required class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>    
                <div class="mb-4">
                    <label for="username" class="block text-gray-700">Username</label>
                    <input type="text" id="username" name="username" required class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <div class="mb-4">
                    <label for="password" class="block text-gray-700">Password</label>
                    <input type="password" id="password" name="password" required class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <div class="mb-4">
                    <label for="confirm-password" class="block text-gray-700">Confirm Password</label>
                    <input type="password" id="confirm-password" name="confirm-password" required class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <div class="mb-4">
                    <label for="department" class="block text-gray-700 font-semibold">Department</label>
                    <select id="department" name="department" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-sky-400" required>
                        <option value="Accounts">Accounts</option>
                        <option value="Academics">Academics</option>
                        <option value="Exams and Records">Exams and Records</option>
                        <option value="ICT">ICT</option>
                    </select>
                </div>
                <!-- Academics Details -->
                <div id="academicsDetails" class="hidden space-y-4">
                    <!-- Course Code -->
                    <div>
                        <label for="course_code" class="block text-gray-700">Course Code:</label>
                        <select id="course_code" name="course_code[]" multiple class="w-full border border-gray-300 rounded p-2">
                            <option value="">Select Course Code</option>
                            <?php
                                $sql3 = "SELECT course_code FROM courses_reg order by course_code ASC";
                                $result = $conn->query($sql3);
                                while($data= mysqli_fetch_array($result)){
                            ?>
                            <option value="<?php echo $data['course_code']; ?>"><?php echo $data['course_code']; ?></option>
                            <?php 
                                }
                            ?>
                        </select>
                        <small class="text-gray-500">Hold down Ctrl (Windows) or Command (Mac) to select multiple options.</small>
                    </div>                   
                </div>
                <div id="message" class="text-sm mb-4"></div>
                <div class="text-center">
                    <button type="submit" class="w-full bg-sky-400 text-white py-2 rounded-lg hover:bg-sky-300">Create Account</button>
                </div>
        </form>
        </div>
    </div>
    <script>
    // Show or hide Academics details based on department selection
    document.getElementById('department').addEventListener('change', function () {
      const academicsDetails = document.getElementById('academicsDetails');
      if (this.value === 'Academics') {
        academicsDetails.classList.remove('hidden');
      } else {
        academicsDetails.classList.add('hidden');
      }
    });
  </script>
</body>
</html>
