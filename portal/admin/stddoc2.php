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
        <div class=" flex-grow p-6 overflow-auto bg-white">
            <h2 class="text-xl font-bold text-center mb-6">Students</h2>

            <!-- Tabs for  -->
            <div class="max-w-4xl mx-auto bg-white rounded shadow">
    <div class="p-4 border-b">
        <input id="search" class="w-full p-2 border rounded" type="text" placeholder="Enter Registration Number" value="CAICON/PF/">
    </div>
    
    <div class="tabs flex justify-around border-b">
        <button data-tab="schools_attended" class="tab-button px-4 py-2">School Attended</button>
        <button data-tab="applicant_results" class="tab-button px-4 py-2">Results</button>
        <button data-tab="applicant_documents" class="tab-button px-4 py-2">Uploaded Documents</button>
        <button data-tab="relatives" class="tab-button px-4 py-2">Relatives/Guidance</button>
        <button data-tab="health_info" class="tab-button px-4 py-2">Health Info</button>
    </div>

    <div id="tab-content" class="p-4"></div>
</div>

        </div>

        
<script>
    
    document.addEventListener('DOMContentLoaded', () => {
        const searchInput = document.getElementById('search');
        const tabButtons = document.querySelectorAll('.tab-button');
        const tabContent = document.getElementById('tab-content');

        let activeTab = 'schools_attended';
        
        const fetchTabData = () => {
            const registrationNumber = searchInput.value.trim();
            if (!registrationNumber) return;

            fetch(`fetch_student_data.php?registration_number=${registrationNumber}&table=${activeTab}`)
                .then(res => res.json())
                .then(data => {
                    tabContent.innerHTML = data.map(record => `
                        <div class="p-2 border-b flex justify-between">
                            <span>${Object.values(record).join(' - ')}</span>
                            <button onclick="deleteRecord(${record.id})" class="text-red-500">Delete</button>
                        </div>
                    `).join('');
                });
        };
    const deleteRecord = (id) => {
    const registrationNumber = document.getElementById('search').value.trim();
    if (!id || !registrationNumber) {
        alert('Record ID or Registration Number is missing.');
        return;
    }

    fetch('delete_student_record.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ id, table: activeTab }),
    })
    .then((res) => res.json())
    .then((response) => {
        if (response.status === 'success') {
            alert('Record deleted successfully.');
            fetchTabData(); // Refresh the tab content
        } else {
            alert('Failed to delete record.');
            console.error(response);
        }
    })
    .catch((err) => {
        alert('An error occurred.');
        console.error(err);
    });
};
        /*const deleteRecord = (id) => {
            fetch('delete_student_record.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({ id, table: activeTab })
            }).then(res => res.json())
            .then(response => {
                if (response.status === 'success') fetchTabData();
            });
        };*/

        tabButtons.forEach(button => {
            button.addEventListener('click', () => {
                activeTab = button.getAttribute('data-tab');
                tabButtons.forEach(btn => btn.classList.remove('bg-blue-500', 'text-white'));
                button.classList.add('bg-blue-500', 'text-white');
                fetchTabData();
            });
        });

        searchInput.addEventListener('input', fetchTabData);
    });
</script>

</body>
</html>
