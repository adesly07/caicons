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
$section = $_SESSION['s_session'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CAICONS PORTAL | <?php echo $department; ?></title>
    <link rel="shortcut icon" href="../../cai.jpg" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/tailwindcss-jit-cdn@tailwindcss/latest/dist/tailwind.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" />
</head>
<body class="bg-gray-100 h-screen flex flex-col">

        <!-- Header Section -->
        <?php
            include('header.php');
        ?>

        <!-- Main Dashboard Layout -->
    <div class="flex flex-grow overflow-hidden">

        <!-- Sidebar Menu -->
        <?php
            include('navbar.php');
        ?>

        <!-- Main Content Area -->
        <div class="bg-white w-full shadow-md rounded-lg p-6">
            <h1 class="text-2xl font-bold mb-4">View Student Documents</h1>

            <!-- Search Bar -->
            <div class="flex items-center mb-6">
                <input id="studentRegNo" type="text" placeholder="Enter Registration Number" value="CAICON/PF/"
                    class="border border-gray-300 rounded-lg p-2 w-full focus:outline-none focus:ring focus:border-blue-400">
                <button id="searchBtn" class="ml-2 px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600">Search</button>
            </div>

            <!-- Tabs -->
            <div class="border-b border-gray-200 mb-4">
                <nav class="flex space-x-4">
                    <button data-tab="schools_attended" class="tab-btn px-4 py-2 text-gray-600 hover:text-blue-500 border-b-2">School Attended</button>
                    <button data-tab="applicant_results" class="tab-btn px-4 py-2 text-gray-600 hover:text-blue-500 border-b-2">Results</button>
                    <button data-tab="applicant_documents" class="tab-btn px-4 py-2 text-gray-600 hover:text-blue-500 border-b-2">Uploaded Documents</button>
                    <button data-tab="relatives" class="tab-btn px-4 py-2 text-gray-600 hover:text-blue-500 border-b-2">Relatives/Guidance</button>
                    <button data-tab="health_info" class="tab-btn px-4 py-2 text-gray-600 hover:text-blue-500 border-b-2">Health Info</button>
                    <button data-tab="course_registration" class="tab-btn px-4 py-2 text-gray-600 hover:text-blue-500 border-b-2">Registered Courses</button>
                </nav>
            </div>

            <!-- Tab Content -->
            <div id="tabContent" class="mt-4">
                <div id="schools_attended" class="tab-content hidden">
                    <h2 class="text-lg font-semibold mb-2">School Attended</h2>
                    <table class="table-auto w-full bg-gray-50 rounded-lg shadow-md">
                        
                        <tbody id="schools_attendedTable">
                            <!-- Fetched data will be inserted here -->
                        </tbody>
                    </table>
                </div>

                <div id="applicant_results" class="tab-content hidden">
                    <h2 class="text-lg font-semibold mb-2">Results</h2>
                    <table class="table-auto w-full bg-gray-50 rounded-lg shadow-md">
                        
                        <tbody id="applicant_resultsTable">
                            <!-- Fetched data will be inserted here -->
                        </tbody>
                    </table>
                </div>

                <div id="applicant_documents" class="tab-content hidden">
                    <h2 class="text-lg font-semibold mb-2">Uploaded Documents</h2>
                    <table class="table-auto w-full bg-gray-50 rounded-lg shadow-md">
                        
                        <tbody id="applicant_documentsTable">
                            <!-- Fetched data will be inserted here -->
                        </tbody>
                    </table>
                </div>

                <div id="relatives" class="tab-content hidden">
                    <h2 class="text-lg font-semibold mb-2">Relatives/Guidance</h2>
                    <table class="table-auto w-full bg-gray-50 rounded-lg shadow-md">
                        
                        <tbody id="relativesTable">
                            <!-- Fetched data will be inserted here -->
                        </tbody>
                    </table>
                </div>

                <div id="health_info" class="tab-content hidden">
                    <h2 class="text-lg font-semibold mb-2">Health Info</h2>
                    <table class="table-auto w-full bg-gray-50 rounded-lg shadow-md">
                        
                        <tbody id="health_infoTable">
                            <!-- Fetched data will be inserted here -->
                        </tbody>
                    </table>
                </div>
                <div id="course_registration" class="tab-content hidden">
                    <h2 class="text-lg font-semibold mb-2">Courses Registered for</h2>
                    <table class="table-auto w-full bg-gray-50 rounded-lg shadow-md">
                        
                        <tbody id="course_registrationTable">
                            <!-- Fetched data will be inserted here -->
                        </tbody>
                    </table>
            </div>
        </div>
    </div>

    <script>
        document.querySelectorAll('.tab-btn').forEach(button => {
            button.addEventListener('click', () => {
                const tab = button.dataset.tab;
                document.querySelectorAll('.tab-content').forEach(content => {
                    content.classList.add('hidden');
                });
                document.getElementById(tab).classList.remove('hidden');
            });
        });

        document.getElementById('searchBtn').addEventListener('click', () => {
            const regNo = document.getElementById('studentRegNo').value;
            if (!regNo) return alert('Please enter a registration number.');

            // Fetch data for each tab
            ['schools_attended', 'applicant_results', 'applicant_documents', 'relatives', 'health_info', 'course_registration'].forEach(tab => {
                fetch(`fetch_${tab}.php?regNo=${regNo}`)
                    .then(response => response.json())
                    .then(data => {
                        const table = document.getElementById(`${tab}Table`);
                        table.innerHTML = '';
                        data.forEach(row => {
                            const tr = document.createElement('tr');
                            tr.innerHTML = Object.values(row).map(value => `<td class='border px-4 py-2'>${value}</td>`).join('');
                            //tr.innerHTML += `<td class='border px-4 py-2'><button class='text-red-500 delete-btn'>Delete</button></td>`;
                            table.appendChild(tr);
                        });
                    });
            });
        });
        function deleteRecord(table, id) {
        fetch(`delete.php?table=${table}&id=${id}`, { method: 'DELETE' })
        .then(response => response.text())
        .then(data => alert(data))
        .catch(error => console.error('Error:', error));
}
    </script>

</body>
</html>
