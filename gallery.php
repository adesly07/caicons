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

// Fetch news data
$sql = "SELECT * FROM news ORDER BY posted_date DESC LIMIT 3";
$result = $conn->query($sql);
$news_posts = [];

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $news_posts[] = $row;
    }
} else {
    echo "0 results";
}
$sql = "SELECT * FROM management";
$result = $conn->query($sql);
$management_team = [];

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $management_team[] = $row;
    }
} else {
    echo "0 results";
}

// Fetch about data
$sql = "SELECT * FROM about LIMIT 1"; // Fetch only one row for the About Us section
$result = $conn->query($sql);
$about_data = null;

if ($result->num_rows > 0) {
    $about_data = $result->fetch_assoc();
}
// Fetch about application
$sql = "SELECT * FROM applicatn LIMIT 1"; // Fetch only one row for the Application section
$result = $conn->query($sql);
$apply_data = null;

if ($result->num_rows > 0) {
    $apply_data = $result->fetch_assoc();
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
    <link href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox-plus-jquery.min.js"></script>
</head>
    <title>Catholic Archdiocese of Ibadan College of Nursing Science</title>
</head>
<body>
 <?php include ("header.php"); ?>
    
    <section class="container mx-auto px-0 py-1  bg-gray-100">
    <div class="container mx-auto p-8">
        <h2 class="text-3xl font-bold text-center mb-8">GALLERY</h2>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
            <!-- Gallery Items will be inserted dynamically -->
            <?php
            // Database connection
            include("conx.php");
            
            // Fetch gallery images from database
            $sql = "SELECT * FROM gallery ORDER BY id DESC";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo '
                    <div class="gallery-item">
                        <a href="gallery/' . $row['image_url'] . '" data-lightbox="gallery" data-title="' . $row['descriptn'] . '">
                            <img src="gallery/' . $row['image_url'] . '" alt="' . $row['descriptn'] . '" class="w-full h-48 object-cover rounded-lg shadow-md hover:opacity-80 transition">
                        </a>
                    </div>';
                }
            } else {
                echo '<p>No images found in the gallery.</p>';
            }

            $conn->close();
            ?>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js"></script>
</body>
</html>
</body>
</html>