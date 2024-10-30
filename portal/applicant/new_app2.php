<?php

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

    <!-- Row 2: Page Title -->
    <section class="my-8 text-center">
        <h1 class="text-2xl font-semibold text-gray-700 mb-4">
            Fill out the form to start a new application or
            log in to continue an existing application.
        </h1>
        <hr>
    </section>

    <!-- Row 3: Form and Action Buttons -->
    <section class="container mx-auto p-6 grid grid-cols-1 lg:grid-cols-2 gap-8">
        
        <!-- Form Column -->
        <div class="bg-white shadow-lg p-6 rounded-lg">
            <form action="s_applicant.php" method="POST" onsubmit="return verifyCode()" class="space-y-4">
                
                <!-- Form Fields -->
                <div>
                    <label class="block font-medium text-gray-700">Surname</label>
                    <input type="text" name="surname" required class="mt-1 p-2 w-full border rounded-md">
                </div>
                <div>
                    <label class="block font-medium text-gray-700">First Name</label>
                    <input type="text" name="first_name" required class="mt-1 p-2 w-full border rounded-md">
                </div>
                <div>
                    <label class="block font-medium text-gray-700">Middle Name</label>
                    <input type="text" name="middle_name" class="mt-1 p-2 w-full border rounded-md">
                </div>
                <div>
                    <label class="block font-medium text-gray-700">Email</label>
                    <input type="email" name="email" required class="mt-1 p-2 w-full border rounded-md">
                </div>
                <div>
                    <label class="block font-medium text-gray-700">Phone Number</label>
                    <input type="tel" name="phone_number" required class="mt-1 p-2 w-full border rounded-md">
                </div>
                <div>
                    <label class="block font-medium text-gray-700">Nationality</label>
                    <input type="text" name="nationality" required class="mt-1 p-2 w-full border rounded-md">
                </div>

                <!-- Verification Code -->
                <?php $generatedCode = rand(1000, 9999); ?>
                <div>
                    <label class="block font-medium text-gray-700">Verification Code</label>
                    <input type="text" value="<?php echo $generatedCode; ?>" disabled class="mt-1 p-2 w-full border rounded-md bg-gray-100">
                    <input type="hidden" id="generatedCode" value="<?php echo $generatedCode; ?>">
                </div>
                <div>
                    <label class="block font-medium text-gray-700">Enter Code</label>
                    <input type="text" id="userCode" name="verification_code" required class="mt-1 p-2 w-full border rounded-md">
                </div>

                <!-- Submit Button -->
                <button type="submit" class="w-full bg-sky-400 text-white font-bold py-2 rounded-md mt-4">Submit</button>
            </form>
        </div>
        
        <!-- Action Buttons Column -->
        <div class="flex flex-col space-y-4">
            <button onclick="window.location.href='login.php'" class="bg-blue-500 text-white font-bold py-2 rounded-md">Login to Continue Application</button>
            <button onclick="resendVerificationEmail()" class="bg-yellow-500 text-white font-bold py-2 rounded-md">Resend Authentication Email</button>
        </div>
    </section>

    <script>
        // JavaScript function to verify code
        function verifyCode() {
            const generatedCode = document.getElementById('generatedCode').value;
            const userCode = document.getElementById('userCode').value;

            if (userCode === generatedCode) {
                return true; // Proceed with form submission
            } else {
                alert("The verification code entered does not match. Please try again.");
                return false; // Prevent form submission
            }
        }

        // Resend Authentication Email
        function resendVerificationEmail() {
            alert('An authentication email has been resent.');
            // Implement AJAX or redirection for server-side email handling.
        }
    </script>
</body>
</html>
