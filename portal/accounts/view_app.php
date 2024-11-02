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

        <div class="container mx-auto">
            <h1 class="text-xl font-bold text-center mb-8">Application Amounts</h1>
            <div class="overflow-auto">
                <table class="min-w-full bg-white shadow-md rounded-lg">
                    <thead>
                        <tr class="bg-gray-200 text-gray-600">
                            <th class="py-3 px-6 text-left">Course</th>
                            <th class="py-3 px-6 text-left">Form Amount</th>
                            <th class="py-3 px-6 text-left">Tuition Fee</th>
                            <th class="py-3 px-6 text-left">Acceptance Fee</th>
                            <th class="py-3 px-6 text-left">Acceptance Transaction Fee</th>
                            <th class="py-3 px-6 text-center" colspan="2">Actions</th>
                        </tr>
                    </thead>
                    <?php
                        $query = "SELECT id, course, f_amount, t_fee, acceptance_fee, accp_tran_fee FROM courses";
                        $result = $conn->query($query);
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                
                            
                        
                        
                    ?>
                    <tbody class="divide-y divide-gray-200">
                    <!-- Data from the database will be populated here -->
                        <tr>
                            <td class="py-2 px-4"><?php echo $row['course']; ?></td>
                            <td class="py-2 px-4"><?php echo $row['f_amount']; ?></td>
                            <td class="py-2 px-4"><?php echo $row['t_fee']; ?></td>
                            <td class="py-2 px-4"><?php echo $row['acceptance_fee']; ?></td>
                            <td class="py-2 px-4"><?php echo $row['accp_tran_fee']; ?></td>
                            <td class="py-2 px-4 text-center">
                                <a href="edit.php?id=<?php echo $row['id']; ?>" class="text-blue-500 hover:underline">
                                    <img src="../../assets/images/edit.png" alt="Logo" width="20" height="20">
                                </a>                                 
                            </td>
                            <td class="py-2 px-4 text-center">
                                <a href="delete_amount.php?id=<?php echo $row['id']; ?>" class="text-red-500 hover:underline" onclick="return confirm('Are you sure you want to delete this record?')">
                                    <img src="../../assets/images/delete.png" alt="Logo" width="20" height="20">
                                </a>
                            </td>
                        </tr>
                    </tbody>
                    <?php } }?>
                </table>
            </div>
        </div>

    </div>
    
</body>
</html>
