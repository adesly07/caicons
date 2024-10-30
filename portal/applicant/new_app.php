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
  <script defer src="./assets/js/app.js"></script>
</head>
<body class="bg-sky-400">

  <!-- Header Section -->
  <header class="bg-white py-4">
    <div class="container mx-auto text-center">
      <img src="logo.png" alt="College Logo" class="mx-auto h-16">
    </div>
  </header>

  <!-- Title Section -->
  <section class="container mx-auto text-center py-6">
    <h2 class="text-2xl font-semibold text-gray-800">Fill out the form to start a new application or<br/> log in to continue an existing application.</h2>
  </section>

  <!-- Form Section -->
  <section class="container mx-auto py-6 px-4 lg:px-0">
    <div class="grid lg:grid-cols-2 gap-6">

      <!-- Registration Form -->
      <div class="bg-white p-8 shadow-md rounded-lg">
        <form action="submit_application.php" method="POST">
          <label class="block mb-2 text-gray-700">Surname</label>
          <input type="text" name="surname" required class="w-full p-2 mb-4 border border-gray-300 rounded">

          <label class="block mb-2 text-gray-700">First Name</label>
          <input type="text" name="first_name" required class="w-full p-2 mb-4 border border-gray-300 rounded">

          <label class="block mb-2 text-gray-700">Middle Name</label>
          <input type="text" name="middle_name" class="w-full p-2 mb-4 border border-gray-300 rounded">

          <label class="block mb-2 text-gray-700">Email</label>
          <input type="email" name="email" required class="w-full p-2 mb-4 border border-gray-300 rounded">

          <label class="block mb-2 text-gray-700">Phone Number</label>
          <input type="tel" name="phone" required class="w-full p-2 mb-4 border border-gray-300 rounded">

          <label class="block mb-2 text-gray-700">Nationality</label>
          <input type="text" name="nationality" required class="w-full p-2 mb-4 border border-gray-300 rounded">

          <button type="submit" class="w-full bg-blue-500 text-white py-2 mt-4 rounded">Submit Application</button>
        </form>
      </div>

      <!-- Login and Verification Column -->
      <div class="bg-white p-8 shadow-md rounded-lg">
        <div class="mb-4">
          <button class="w-full bg-green-500 text-white py-2 mb-2 rounded">Login to Continue Application</button>
          <button class="w-full bg-yellow-500 text-white py-2 mb-4 rounded">Resend Authentication Email</button>
        </div>

        <!-- Verification Section -->
        <div>
          <label class="block mb-2 text-gray-700">Verification Code</label>
          <input id="generatedNumber" type="text" disabled class="w-full p-2 mb-4 border border-gray-300 rounded text-center">

          <label class="block mb-2 text-gray-700">Enter Verification Code</label>
          <input id="verificationInput" type="text" required class="w-full p-2 mb-4 border border-gray-300 rounded">
        </div>
      </div>
    </div>
  </section>
  
</body>
</html>
