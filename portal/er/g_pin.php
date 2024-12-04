
<?php
session_start();
include('../conx.php');
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
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/tailwindcss-jit-cdn@tailwindcss/latest/dist/tailwind.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script defer src="js/script.js"></script> <!-- Add external JS file for controlling the animation -->

</head>
<body class="bg-gray-100">
        <?php
            include('header.php');
        ?>
    <div class="flex flex-grow overflow-hidden">

        <!-- Sidebar Menu -->
        <?php
            include('navbar.php');
        ?>
        <div class="container mx-auto p-5">
            <h1 class="text-2xl font-bold mb-5">Pin Generation Section</h1>

            <!-- Generate Pins Button -->
            <div class="mb-5">
                <button id="generatePinsBtn" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                    Generate 10 Pins
                </button>
            </div>

            <!-- Display Pins -->
            <div id="pinsContainer" class="bg-white shadow-md rounded p-5">
                <h2 class="text-xl font-bold mb-4 text-center">Generated Pins | <a href="p_pins.php">Print Pins</a></h2>
                <table class="table-auto w-full">
                    <thead>
                        <tr>
                            <th class="border px-4 py-2">Pin</th>
                            <th class="border px-4 py-2">Serial Number</th>
                            <th class="border px-4 py-2">Status</th>
                        </tr>
                    </thead>
                    <tbody id="pinsTableBody">
                        <!-- Dynamic rows will be added here -->
                    </tbody>
                </table>
            </div>
        </div>
        <div id="printSection" class="hidden bg-white shadow-md rounded p-5 mt-5">
            <h2 class="text-xl font-bold mb-4">Pin Details</h2>
            <div id="printContent">
            <!-- Pin details will be dynamically added here -->
            </div>
            <button onclick="printPins()" class="mt-4 bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">
                Print Pins
            </button>
    </div>

    <script>
        // Fetch and display pins
        async function fetchPins() {
            const response = await fetch('fetch_pins.php');
            const pins = await response.json();
            const tableBody = document.getElementById('pinsTableBody');
            tableBody.innerHTML = pins.map(pin => `
                <tr>
                    <td class="border px-4 py-2">${pin.pin}</td>
                    <td class="border px-4 py-2">${pin.serial_number}</td>
                    <td class="border px-4 py-2">${pin.status}</td>
                </tr>
            `).join('');
        }

        // Generate 10 new pins
        document.getElementById('generatePinsBtn').addEventListener('click', async () => {
            const response = await fetch('generate_pins.php');
            const result = await response.json();
            if (result.success) {
                alert('10 new pins and serial numbers generated successfully!');
                fetchPins(); // Refresh the table
            } else {
                alert(`Error: ${result.error}`);
            }
        });

        // Initial fetch of pins
        fetchPins();
    </script>
    </div>
    
</body>
</html>
