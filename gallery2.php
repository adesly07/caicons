<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dynamic Gallery</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Include Lightbox CSS and JS (you can use any library, e.g., Lightbox2 or FancyBox) -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox-plus-jquery.min.js"></script>
</head>
<body class="bg-gray-100">
    <div class="container mx-auto p-8">
        <h2 class="text-3xl font-bold text-center mb-8">Gallery</h2>

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

    <!-- Include Lightbox2 JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js"></script>
</body>
</html>
