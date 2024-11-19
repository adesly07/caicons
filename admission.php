<?php
include("conx.php");

// Fetch slider data
$sql = "SELECT * FROM slider ORDER BY id DESC";
$result = $conn->query($sql);
$slides = [];

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $slides[] = $row;
    }
} else {
    echo "0 results";
}


// Fetch about data
$sql = "SELECT * FROM admission LIMIT 1"; // Fetch only one row for the About Us section
$result = $conn->query($sql);
$about_data = null;

if ($result->num_rows > 0) {
    $about_data = $result->fetch_assoc();
}

// Fetch contact data
$sql = "SELECT * FROM contact LIMIT 1";
$result = $conn->query($sql);
$contact_data = null;

if ($result->num_rows > 0) {
    $contact_data = $result->fetch_assoc();
}
$conn->close();
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
            <h1 class="text-3xl font-bold text-gray-800" id="content-title">ADMISSION</h1>
        </div>

        <!-- Second row for the content -->
        <div id="content" class="bg-white shadow-md rounded-md p-6">
            <p class="text-lg text-gray-700" id="content-body"><?php echo $about_data['content'];?></p>
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