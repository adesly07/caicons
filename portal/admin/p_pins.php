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
        // Function to fetch and display pins in the print section
async function populatePrintSection() {
    const response = await fetch('fetch_pins.php');
    const pins = await response.json();

    const printContent = document.getElementById('printContent');
    printContent.innerHTML = pins.map(pin => `
        <div class="border-b pb-2 mb-2">
            <p><strong>Pin:</strong> ${pin.pin}</p>
            <p><strong>Serial Number:</strong> ${pin.serial_number}</p>
            <p><strong>Session:</strong> ${pin.sch_session}</p>
            <p><a href="https://caicons.edu.ng/portal/sreg/index.php" class="text-blue-500">https://caicons.edu.ng/portal/sreg/index.php</a></p>
            
        </div>
    `).join('');

    document.getElementById('printSection').classList.remove('hidden');
}

// Function to print the pins
function printPins() {
    const printContent = document.getElementById('printContent').innerHTML;
    const printWindow = window.open('', '_blank');
    printWindow.document.write(`
        <html>
        <head>
            <title>Print Pins</title>
            <style>
                body { font-family: Arial, sans-serif; margin: 20px; }
                h2 { text-align: center; }
                .pin-details { margin-bottom: 20px; padding: 10px; border: 1px solid #ccc; border-radius: 5px; }
            </style>
        </head>
        <body>
            <h2>Pin and Serial Number Details</h2>
            ${printContent}
        </body>
        </html>
    `);
    printWindow.document.close();
    printWindow.print();
}

// Attach populatePrintSection to fetchPins so it refreshes print content too
fetchPins = async function() {
    const response = await fetch('fetch_pins.php');
    const pins = await response.json();

    const tableBody = document.getElementById('printContent');
    tableBody.innerHTML = pins.map(pin => `
        <tr>
            <td class="border px-4 py-2">${pin.pin}</td>
            <td class="border px-4 py-2">${pin.serial_number}</td>
            <td class="border px-4 py-2">${pin.status}</td>
        </tr>
    `).join('');

    // Update print section
    populatePrintSection();
};

// Initial fetch of pins
fetchPins();
    </script>
        </div>
    
    </body>
    </html>