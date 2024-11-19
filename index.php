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
$sql = "SELECT * FROM home LIMIT 1"; // Fetch only one row for the About Us section
$result = $conn->query($sql);
$home_data = null;

if ($result->num_rows > 0) {
    $home_data = $result->fetch_assoc();
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
    
    <title>Catholic Archdiocese of Ibadan College of Nursing Science</title>
</head>
<body>
 <?php include ("header.php"); ?>
    <section class="bg-sky-400">
        <div class="relative w-full max-w-6x2 mx-auto mt-1">
            <!-- Slider Container -->
            <div class="relative overflow-hidden">
              <div id="slider" class="flex transition-transform duration-700">
                  <!-- Slide 1 -->
                  <?php foreach($slides as $slide): ?>
                  <div class="w-full flex-shrink-0 relative">
                    <img src="slide_pix/<?php echo $slide['image_url']; ?>" class="w-full h-full object-cover" alt="Slide">
                    <div class="absolute inset-0 bg-black bg-opacity-20 flex items-center justify-center">
                        <div class="text-white text-center">
                          <h2 class="text-3xl font-bold"><?php echo $slide['overlay_title']; ?></h2>
                          <p class="mt-2"><?php echo $slide['overlay_text']; ?></p>
                        </div>
                    </div>
                  </div>
                  <?php endforeach; ?>
              </div>
            </div>
        
            <!-- Navigation -->
            <div class="absolute inset-0 flex justify-between items-center px-4">
            <button id="prev" class="text-white text-2xl font-bold bg-sky-400 bg-opacity-50 hover:bg-opacity-75 px-4 py-2 rounded-full">‹</button>
            <button id="next" class="text-white text-2xl font-bold bg-sky-400 bg-opacity-50 hover:bg-opacity-75 px-4 py-2 rounded-full">›</button>
            </div>
        </div>
    </section>
    <section class="container mx-auto px-0 py-1  bg-gray-100">
        <div class="flex flex-col md:flex-row items-center bg-white shadow-lg rounded-lg overflow-hidden">
            <!-- First Column (Image) -->
            <div class="md:w-1/2 w-full">
                <img src="./assets/images/applyimg.jpg" alt="Sample Image" class="w-full h-full object-cover">
            </div>
            
            <!-- Second Column (Title, Content, Apply Now Button) -->
            <div class="md:w-1/2 w-full p-6">
                <h2 class="text-2xl font-bold text-gray-800 mb-4">Apply for Admission</h2>
                <p class="text-gray-600 mb-6 justify-between">
                  <?php echo $apply_data['content']; ?>
                </p>
                <div class="mt-6">
                  <a href="portal/applicant/index.php" class="bg-sky-400 text-white px-4 py-2 rounded-lg hover:bg-sky-300 hover:text-white transition duration-300 ease-in-out">
                      Apply Now
                  </a>
                </div>
            </div>
        </div>
    </section>
    <section class="bg-cover-section py-1 px-1 md:px-1 text-white">
        <div class="flex flex-col md:flex-row align-text-top justify-between shadow-lg rounded-lg p-6">
          <!-- Column 1: Logo -->
          <div class="flex flex-col md: mb-4 md:mb-0">
            <img src="./assets/images/about_logo.png" alt="Logo">
            <h1 class="text-xl font-bold mb-2">WELCOME TO CAICONS</h1>
          </div>
          <!-- Column 2: Description and Read More Button -->
          <div class="w-full md:w-2/3 md:text-left">
            <p class="text-white mb-6 justify-between">
              <?php 
                echo $home_data['content'];
              ?>
            </p>
          </div>
        </div>
    </section>
    <section class="py-12 bg-gray-100">
      <div class="container mx-auto">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
          <!-- Vision Card -->
          <div class="bg-white shadow-lg rounded-lg p-6 text-center hover:shadow-xl transition-shadow duration-300">
            <div class="mb-4">
              <i class="fas fa-eye text-4xl text-blue-500"></i> <!-- Vision Icon -->
            </div>
            <h3 class="text-xl font-semibold mb-2">Vision</h3>
            <p class="text-gray-600 mb-4">To produce competent Nurses that will provide comprehensive and quality health services to humanity with the fear of God, passion and integrity.</p>
            <a href="about.php" class="text-blue-500 hover:none">Read More &rarr;</a>
          </div>

          <!-- Mission Card -->
          <div class="bg-white shadow-lg rounded-lg p-6 text-center hover:shadow-xl transition-shadow duration-300">
            <div class="mb-4">
              <i class="fas fa-bullseye text-4xl text-green-500"></i> <!-- Mission Icon -->
            </div>
            <h3 class="text-xl font-semibold mb-2">Mission</h3>
            <p class="text-gray-600 mb-4">To advance the profession of nursing by imparting sound knowledge and skills to produce efficient Nurse called to reveal the healing love of Jesus to those in need.</p>
            <a href="about.php" class="text-green-500 hover:none">Read More &rarr;</a>
          </div>
    
          <!-- Philosophy Card -->
          <div class="bg-white shadow-lg rounded-lg p-6 text-center hover:shadow-xl transition-shadow duration-300">
            <div class="mb-4">
              <i class="fas fa-lightbulb text-4xl text-yellow-500"></i> <!-- Philosophy Icon -->
            </div>
            <h3 class="text-xl font-semibold mb-2">Philosophy</h3>
            <p class="text-gray-600 mb-4">We believe in fostering an environment that promotes critical thinking, ethical practices, and compassionate care.</p>
            <a href="about.php" class="text-yellow-500 hover:none">Read More &rarr;</a>
          </div>
    
          <!-- History Card -->
          <div class="bg-white shadow-lg rounded-lg p-6 text-center hover:shadow-xl transition-shadow duration-300">
            <div class="mb-4">
              <i class="fas fa-book text-4xl text-red-500"></i> <!-- History Icon -->
            </div>
            <h3 class="text-xl font-semibold mb-2">History</h3>
            <p class="text-gray-600 mb-4">The Catholic Archdiocese of Ibadan (CAI) College of Nursing, Oluyoro began as School of Midwifery in 1957 to meet the existing need for well trained nurses and midwives.</p>
            <a href="about.php" class="text-red-500 hover:none">Read More &rarr;</a>
          </div>
        </div>
      </div>
    </section>
    <!-- News Section -->
    <section class="container bg-gray-100 mx-auto p-6">
      <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
          
          <!-- First Column: Picture -->
          <div class="col-span-1">
              <img src="./assets/images/newimg.jpg" alt="Main News Image" class="w-full h-auto rounded-lg shadow-lg thumbnail">
          </div>

          <!-- Second Column: News Section -->
          <div class="col-span-1">
              <div class="space-y-4">

                  <!-- News Item 1 -->
                  <?php foreach($news_posts as $post): ?>
                  <div class="flex items-center space-x-4 p-4 bg-white shadow-md rounded-lg">
                      <img src="news/<?php echo $post['thumbnail_url']; ?>" alt="Thumbnail 1" class="w-16 h-16 rounded-lg thumbnail">
                      <div>
                          <p class="text-sm text-gray-500"><?php echo date('F d, Y h:i A', strtotime($post['posted_date'])); ?></p>
                          <a href="news_details?id=<?php echo $post['id']; ?>" class="text-lg font-semibold text-sky-600 hover:none"><?php echo $post['title']; ?></a>
                      </div>
                  </div>
                  <?php endforeach; ?>
              </div>
          </div>

          <!-- Third Column: Quick Links -->
          <div class="col-span-1 bg-sky-400 text-white p-6 rounded-lg">
              <h2 class="text-2xl font-bold mb-4">Quick Links</h2>
              <ul class="space-y-4">
                <li><a href="news_details.php?id=<?php echo $post['id']; ?>" class="hover:none">CAICONS News</a></li>
                <hr class="border-gray-200">
                <li><a href="portal/students/index.php" target = "_blank" class="hover:none">CAICONS Portal</a></li>
                <hr class="border-gray-200">
                <li><a href="gallery.php" class="hover:none">Gallery</a></li>
                <hr class="border-gray-200">
                <li><a href="ict.php" class="hover:none">ICT Centre</a></li>
                <hr class="border-gray-200">
                <li><a href="library.php" class="hover:none">Library</a></li>
              </ul>
          </div>

      </div>
    </section>
    <section class="management-section py-12 px-6 bg-gray-600">
      <div class="container mx-auto">
        <h2 class="text-3xl font-bold text-center mb-8 text-white" id="management">Our Management</h2>
  
        <div class="carousel-container">
          <div id="carousel" class="carousel">
          <?php foreach($management_team as $member): ?>
            <!-- Carousel Item 1 -->
            <div class="carousel-item p-6">
              <div class="flex flex-col items-center text-center">
                <img src="man_pix/<?php echo $member['picture_url']; ?>" alt="Manager 1" class="rounded-full mb-4">
                <h3 class="text-xl font-semibold text-white"><?php echo $member['man_name']; ?></h3>
                <p class="text-white"><?php echo $member['position']; ?></p>
                <p class="italic text-white"><?php echo $member['qualification']; ?></p>
              </div>
            </div>
            <?php endforeach; ?>
          </div>
  
          <!-- Carousel Navigation -->
          <div class="flex justify-center mt-6">
            <button id="prevBtn" class="px-4 py-2 bg-sky-400 text-white rounded-l">Prev</button>
            <button id="nextBtn" class="px-4 py-2 bg-sky-400 text-white rounded-r">Next</button>
          </div>
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
      <script>
        const carousel = document.getElementById('carousel');
        let currentSlide = 0;
        const totalSlides = document.querySelectorAll('.carousel-item').length;
    
        // Function to go to the next slide
        function nextSlide() {
          currentSlide = (currentSlide + 1) % totalSlides;
          carousel.style.transform = `translateX(-${currentSlide * 100}%)`;
        }
    
        // Function to go to the previous slide
        function prevSlide() {
          currentSlide = (currentSlide - 1 + totalSlides) % totalSlides;
          carousel.style.transform = `translateX(-${currentSlide * 100}%)`;
        }
    
        // Add event listeners for manual navigation
        document.getElementById('nextBtn').addEventListener('click', nextSlide);
        document.getElementById('prevBtn').addEventListener('click', prevSlide);
    
        // Set an interval for automatic sliding
        setInterval(nextSlide, 5000); // Change slide every 5 seconds
      </script>
</body>
</html>
</body>
</html>