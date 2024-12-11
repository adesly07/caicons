<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="flex flex-col lg:flex-row min-h-screen">
        
        <!-- Sidebar / Vertical Menu -->
        <aside class="bg-blue-900 text-white w-full lg:w-1/4 lg:min-h-screen p-5 space-y-4">
            <h2 class="text-2xl font-bold">Dashboard</h2>
            <nav>
                <ul>
                    <li><a href="profile.php" class="block py-2 px-4 rounded hover:bg-blue-700">Profile</a></li>
                    <li><a href="messages.php" class="block py-2 px-4 rounded hover:bg-blue-700">Messages</a></li>
                    <li><a href="settings.php" class="block py-2 px-4 rounded hover:bg-blue-700">Settings</a></li>
                    <li><a href="notifications.php" class="block py-2 px-4 rounded hover:bg-blue-700">Notifications</a></li>
                    <li><a href="logout.php" class="block py-2 px-4 rounded hover:bg-blue-700">Logout</a></li>
                </ul>
            </nav>
        </aside>

        <!-- Main Content Area -->
        <main class="flex-1 p-6">
            <!-- Header -->
            <header class="bg-white shadow mb-6 p-4 rounded-lg">
                <div class="flex justify-between items-center">
                    <h1 class="text-2xl font-semibold">Welcome, <span id="username">User</span></h1>
                    <button id="toggleMenu" class="lg:hidden text-blue-900 hover:text-blue-700">☰ Menu</button>
                </div>
            </header>

            <!-- Dashboard Content -->
            <section>
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                    <div class="bg-white p-6 rounded-lg shadow">
                        <h2 class="font-bold text-lg mb-2">Overview</h2>
                        <p>Your recent activity and account details.</p>
                    </div>
                    <div class="bg-white p-6 rounded-lg shadow">
                        <h2 class="font-bold text-lg mb-2">Messages</h2>
                        <p>Check your latest messages and updates.</p>
                    </div>
                    <div class="bg-white p-6 rounded-lg shadow">
                        <h2 class="font-bold text-lg mb-2">Notifications</h2>
                        <p>Recent notifications from your department.</p>
                    </div>
                </div>
            </section>
        </main>
    </div>

    <script src="dashboard.js"></script>
</body>
</html>
