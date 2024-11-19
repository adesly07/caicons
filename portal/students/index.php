<?php
include("../conx.php");
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
    <script defer src="js/script.js"></script> <!-- Add external JS file for controlling the animation -->
</head>
<body class="bg-sky-400 flex flex-col min-h-screen">
    <!-- Login Section -->
  <div class="flex items-center justify-center flex-grow">
    <div class="bg-white p-8 rounded-lg shadow-md w-full max-w-md">
      <h2 class="text-2xl font-semibold text-center text-sky-400 mb-6">Student Login</h2>
      <form action="login.php" method="POST" class="space-y-4">
        
        <!-- Registration Number Field -->
        <div class="relative">
          <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 11c1.656 0 3-1.344 3-3S13.656 5 12 5s-3 1.344-3 3 1.344 3 3 3zm0 4c-2.528 0-7 1.266-7 3.8V21h14v-2.2c0-2.534-4.472-3.8-7-3.8z"/>
            </svg>
          </span>
          <input type="text" name="username" placeholder="Registration Number" required 
                 class="pl-10 p-3 border border-gray-300 rounded-md w-full focus:ring focus:ring-blue-200">
        </div>

        <!-- Password Field -->
        <div class="relative">
          <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 11V7m0 8v4m0-6a5 5 0 110-10 5 5 0 010 10z"/>
            </svg>
          </span>
          <input type="password" name="password" placeholder="Password" required 
                 class="pl-10 p-3 border border-gray-300 rounded-md w-full focus:ring focus:ring-blue-200">
        </div>

        <!-- Submit Button -->
        <div>
          <button type="submit" class="w-full bg-sky-400 text-white py-3 rounded-md hover:bg-sky-300">Login</button>
        </div>
      </form>
    </div>
  </div>

  <!-- Footer Section -->
  
    <div class="bg-sky-400">
        <?php
            include("footer.php");
        ?>
    </div>
    
    
    <script src="js/script.js"></script>
</body>
</html>
