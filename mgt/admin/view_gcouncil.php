<?php
session_start();
require '../../conx.php';

// Redirect if not logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: ../index.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../../cai.jpg" type="image/x-icon">
    <title>Dashboard | CMS</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/tailwindcss-jit-cdn@tailwindcss/latest/dist/tailwind.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" />

</head>
<body class="bg-gray-100">
    <div class="min-h-screen flex flex-col">
        <!-- Header -->
        <?php 
            include("header.php");
        ?>

        <!-- Content -->
        <div class="flex-grow container mx-auto py-6">
            <h2 class="text-2xl font-semibold mb-6 text-center">Governing Council</h2>

            <div class="bg-white rounded-lg shadow-md p-6">
            
                <table class="min-w-full table-auto">
                    
                    <thead>
                        <tr class="bg-gray-200">
                            <th class="px-4 py-2">Members</th>
                            <th class="px-4 py-2">Bio</th>
                            <th colspan="2" class="px-4 py-2">Actions</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Example Page Rows -->
                        <?php
                            $query = "SELECT * FROM g_council ORDER BY id ASC";
                            $result = mysqli_query($conn, $query);
                            if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                        <tr>
                            <td class="border px-4 py-2">
                                <img src="../../council_pix/<?php echo $row['image_url'] ?>" alt="Slide 1" class=" mb-4">
                                <p class="text-black"><?php echo $row['title']; ?></p>
                                <p class="text-black"><?php echo $row['gname']; ?></p>
                            </td>
                            <td class="border px-4 py-2">
                                <?php echo $row['bio']; ?>                         
                            </td>
                            <td class="border px-4 py-2">
                                <a href="edit_gcouncil.php?id=<?php echo $row['id'] ?>" class="text-indigo-600 hover:text-indigo-800">
                                    <img src="../../assets/images/edit.png" alt="Logo" width="20" height="20">
                                </a>                           
                            </td>
                            <td class="border px-4 py-2">
                                <a href="delete_gcouncil.php?id=<?php echo $row['id'] ?>" class="text-red-600 hover:text-red-800">
                                    <img src="../../assets/images/delete.png" alt="Logo" width="20" height="20">
                                </a>
                            </td>
                        </tr>
                        
                        <!-- Add rows for other pages (Admission, Gallery, News, etc.) -->
                    </tbody>
                    <?php } }?>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
