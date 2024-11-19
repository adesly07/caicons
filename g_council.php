<?php
include("conx.php");






// Fetch contact data
$sql = "SELECT * FROM contact LIMIT 1";
$result = $conn->query($sql);
$contact_data = null;

if ($result->num_rows > 0) {
    $contact_data = $result->fetch_assoc();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="cai.jpg" type="image/x-icon">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/tailwindcss-jit-cdn@tailwindcss/latest/dist/tailwind.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" />
    <link rel="stylesheet" href="./assets/css/style.css" />

</head>
    <title>Catholic Archdiocese of Ibadan College of Nursing Science</title>
</head>
<body>
 <?php include ("header.php"); ?>
    
    <section class="container mx-auto px-0 py-1  bg-gray-100">
    <div class="container mx-auto p-1">
        <!-- First row for the title -->
        <div id="title" class="text-center bg-white shadow-md rounded-md p-4 mb-1">
            <h1 class="text-3xl font-bold text-gray-800" id="content-title">MEMBERS OF THE GOVERNING COUNCIL</h1>
        </div>

        <!-- Second row for the content -->
        <div id="content" class="bg-white shadow-md rounded-md p-6">
        <table class="min-w-full table-auto">
                    
                    
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
                                <img src="council_pix/<?php echo $row['image_url'] ?>" alt="Member image" class=" mb-4">
                                <p class="text-black"><?php echo $row['title']; ?></p>
                                <p class="text-black"><?php echo $row['gname']; ?></p>
                            </td>
                            <td class="border px-4 py-2 align-text-top">
                                <?php echo $row['bio']; ?>                         
                            </td>
                            
                            
                        </tr>
                        
                        <!-- Add rows for other pages (Admission, Gallery, News, etc.) -->
                    </tbody>
                    <?php } }?>
                </table>
        </div>
    </div>
    </section>
 
    
    <!-- Footer Section -->
     <?php include("footer.php") ?>
    
    
      <script src="assets/js/script.js"></script>
      <!-- Tailwind JS for Menu Toggle -->
      <script>
        const menuBtn = document.getElementById('menu-btn');
        const mobileMenu = document.getElementById('mobile-menu');
    
        menuBtn.addEventListener('click', () => {
          mobileMenu.classList.toggle('hidden');
        });
      </script>
      <!-- Include Lightbox2 JavaScript -->
    
</body>
</html>
</body>
</html>