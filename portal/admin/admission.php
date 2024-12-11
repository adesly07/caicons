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
<body class="bg-white h-screen flex flex-col">

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
        <div class="container mx-auto py-6 ml-5">
            <h2 class="text-2xl font-semibold mb-4 text-center"><?php echo $section; ?> Admission</h2>

            <!-- Search Bar -->
            <div class="mb-4">
                <input
                    type="text"
                    id="search-bar"
                    class="w-1/3 p-2 border border-gray-300 rounded"
                    placeholder="Search applicants by name or email..."
                />
            </div>

                <!-- Applicants Table -->
            <form id="admission-form" method="POST" action="u_admission.php">
                <div class="overflow-x-auto">
                    <table class="table-auto w-full bg-white shadow-md rounded-lg">
                        <thead>
                            <tr class="bg-gray-200 text-left">
                                <th class="p-4">Registration Number</th>
                                <th class="p-4">Name</th>
                                <th class="p-4">Email</th>
                                <th class="p-4">Phone</th>
                                <th class="p-4">Status</th>
                                <th class="p-4">Admit</th>
                            </tr>
                        </thead>
                        <tbody id="applicants-table">
                    <?php
                    $query = "SELECT * FROM applicants WHERE a_status = 'PENDING' AND sch_session = '$section'";
                    $result = mysqli_query($conn, $query);
                    while ($row = mysqli_fetch_assoc($result)) {
                        $name = $row['surname'] . " " . $row['first_name'] . " " . $row['middle_name'];
                        echo "
                        <tr class='border-b'>
                            <td class='p-4'>{$row['reg_num']}</td>
                            <td class='p-4'>{$name}</td>
                            <td class='p-4'>{$row['email']}</td>
                            <td class='p-4'>{$row['phone_number']}</td>
                            <td class='p-4'>{$row['a_status']}</td>
                            <td class='p-4'>
                                <input type='checkbox' name='admit[]' value='{$row['applicant_id']}' class='admit-checkbox'>
                            </td>
                        </tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>

        <!-- Submit Button -->
        <div class="mt-4">
            <button
                type="submit"
                class="bg-sky-400 text-white py-2 px-4 rounded hover:bg-sky-300"
            >
                Update Admission
            </button>
        </div>
    </form>
</div>
<script src="admission.js"></script>
<script src="js/script.js"></script>
</body>
</html>
