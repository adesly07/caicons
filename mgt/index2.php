<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | CMS</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        /* Loading spinner style */
        .spinner {
            border: 2px solid #f3f3f3;
            border-top: 2px solid #ffffff;
            border-radius: 50%;
            width: 20px;
            height: 20px;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
    </style>
</head>
<body class="bg-gray-100 flex items-center justify-center h-screen">
    <div class="w-full max-w-sm bg-white rounded-lg shadow-md p-8">
        <h2 class="text-2xl font-semibold text-gray-700 text-center">Login to CMS</h2>
        <form id="loginForm" action="login.php" method="POST" class="mt-6">
            <div class="mb-4">
                <label class="block text-gray-700">Username</label>
                <input type="text" name="username" class="w-full px-4 py-2 mt-2 border rounded-lg focus:outline-none focus:ring-1 focus:ring-indigo-600" required>
            </div>
            <div class="mb-6">
                <label class="block text-gray-700">Password</label>
                <input type="password" name="password" class="w-full px-4 py-2 mt-2 border rounded-lg focus:outline-none focus:ring-1 focus:ring-indigo-600" required>
            </div>
            <button id="loginBtn" type="submit" class="w-full bg-indigo-600 text-white font-bold py-2 px-4 rounded hover:bg-indigo-700 flex justify-center items-center" disabled>
                <span id="btnText">Login</span>
                <span id="loadingSpinner" class="spinner ml-2 hidden"></span>
            </button>
        </form>
    </div>

    <script>
        const loginForm = document.getElementById('loginForm');
        const loginBtn = document.getElementById('loginBtn');
        const btnText = document.getElementById('btnText');
        const loadingSpinner = document.getElementById('loadingSpinner');

        loginForm.addEventListener('submit', function(event) {
            // Prevent form from submitting immediately
            event.preventDefault();

            // Disable the button and show the spinner
            loginBtn.disabled = true;
            btnText.textContent = 'Logging in...';
            loadingSpinner.classList.remove('hidden');

            // Submit the form after a small delay (to simulate loading)
            setTimeout(() => {
                loginForm.submit(); // You can remove the delay if you don't need it
            }, 1000);
        });
    </script>
</body>
</html>
