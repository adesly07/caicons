<!-- navbar.php -->
<header class="bg-white shadow-md">
    <div class="container mx-auto px-4 py-3 flex items-center justify-between">
        <!-- Portal Name/Logo -->
        <div class="flex items-center space-x-4">
            <a href="index.php" class="text-lg font-bold text-gray-800">Nursing Portal</a>
        </div>

        <!-- Notifications -->
        <div class="relative">
            <!-- Notification Bell -->
            <button id="notificationBell" class="relative text-gray-600 hover:text-gray-800 focus:outline-none">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14V11a6 6 0 10-12 0v3c0 .386-.146.735-.405 1.015L4 17h5m6 0a3.001 3.001 0 01-6 0m6 0H9" />
                </svg>
                <!-- Notification Count -->
                <span id="notificationCount" class="absolute -top-2 -right-2 bg-red-500 text-white text-xs font-bold rounded-full px-1">
                    3
                </span>
            </button>

            <!-- Dropdown Menu -->
            <div id="notificationDropdown" class="hidden absolute right-0 mt-2 w-64 bg-white border border-gray-200 rounded shadow-md">
                <div class="p-4">
                    <h4 class="text-gray-800 font-semibold mb-2">Notifications</h4>
                    <ul id="notificationList" class="space-y-2">
                        <li class="text-sm text-gray-600">Course registration opens next week.</li>
                        <li class="text-sm text-gray-600">Your transcript is now available for download.</li>
                        <li class="text-sm text-gray-600">Fee payment due by the 15th.</li>
                    </ul>
                </div>
                <a href="#" class="block text-center text-blue-500 py-2 border-t border-gray-200">View All</a>
            </div>
        </div>
    </div>
</header>
