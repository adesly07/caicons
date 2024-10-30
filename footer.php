<!-- Contact Us Section -->
<section class="bg-sky-300 py-12">
      <!-- First Row: Title -->
      <div class="text-center mb-8">
        <h2 class="text-4xl font-bold text-white" id="contact">Contact Us</h2>
      </div>

      <!-- Second Row: Content -->
      <div class="text-center max-w-2xl mx-auto mb-12">
        <p class="text-white">Get Intouch</p>
      </div>

      <!-- Third Row: Contact Info Columns -->
      <div class="grid grid-cols-1 md:grid-cols-3 gap-8 px-4 md:px-0">
        <!-- Phone Column -->
        <div class="flex flex-col items-center">
          <div class="text-4xl text-white mb-4">
            <i class="fas fa-phone-alt"></i> <!-- FontAwesome Icon for Phone -->
          </div>
          <h3 class="text-xl font-semibold text-white">Phone</h3>
          <p class="text-white mt-2">
            <?php echo $contact_data['phone_number']; ?>
          </p>
        </div>

        <!-- Email Column -->
        <div class="flex flex-col items-center">
          <div class="text-4xl text-white mb-4">
            <i class="fas fa-envelope"></i> <!-- FontAwesome Icon for Email -->
          </div>
          <h3 class="text-xl font-semibold text-white">Email</h3>
          <p class="text-white mt-2">
            <?php echo $contact_data['email_address']; ?>
          </p>
        </div>

        <!-- Address Column -->
        <div class="flex flex-col items-center">
          <div class="text-4xl text-white mb-4">
            <i class="fas fa-map-marker-alt"></i> <!-- FontAwesome Icon for Address -->
          </div>
          <h3 class="text-xl font-semibold text-white">Address</h3>
          <p class="text-white mt-2">
            <?php echo $contact_data['address']; ?>
          </p>
        </div>
      </div>
    </section>
<footer class="bg-sky-300 text-white py-8">
      <div class="container mx-auto px-4">
        <div class="flex flex-wrap justify-between">
          
          <!-- First Column: Logo and Copyright -->
          <div class="w-full sm:w-1/3 mb-6 sm:mb-0 text-center sm:text-left">
            <a href="#" class="text-2xl font-bold">
              <img src="./assets/images/header_logo2.png" alt="Logo" class="mb-4 w-40">
            </a>
            <p class="mt-2 text-white">&copy; CAICONS, 2023-<?php echo date("Y"); ?>. All rights reserved.</p>
            <p><a href ="#">Powered by CAICONS ICT Unit</a></p>
          </div>
    
          <!-- Second Column: Menu Links -->
          <div class="w-full sm:w-1/3 mb-6 sm:mb-0">
            <div class="flex justify-between">
              <div>
                <h5 class="font-bold mb-2">Menus</h5>
                <hr>
                <ul>
                  <li><a href="index.php" class="hover:text-sky-500">Home</a></li>
                  <li><a href="about.php" class="hover:text-sky-500">About Us</a></li>
                  <li><a href="academics.php" class="hover:text-sky-500">Academics</a></li>
                  <li><a href="admission.php" class="hover:text-sky-500">Admission</a></li>
                  <li><a href="library.php" class="hover:text-sky-500">Library</a></li>
                </ul>
              </div>
              <div>
                <h5 class="font-bold mb-2">Administration</h5>
                <hr>
                <ul>
                  <li><a href="administration.php" class="hover:text-sky-500">Administration</a></li>
                  <li><a href="#management" class="hover:text-sky-500">Management</a></li>
                  <li><a href="g_council.php" class="hover:text-sky-500">Governing Council</a></li>
                  <li><a href="#" class="hover:text-sky-500">xxxxx</a></li>
                  <li><a href="#" class="hover:text-sky-500">xxxxx</a></li>
                </ul>
              </div>
              <div>
                <h5 class="font-bold mb-2">Quick Link</h5>
                <hr>
                <ul>
                  <li><a href="news_details" class="hover:text-sky-500">CAICONS News</a></li>
                  <li><a href="#" class="hover:text-sky-500">CAICONS Portal</a></li>
                  <li><a href="gallery.php" class="hover:text-sky-500">Gallery</a></li>
                  <li><a href="ict.php" class="hover:text-sky-500">ICT Centre</a></li>
                  <li><a href="#contact" class="hover:text-sky-500">Contact Us</a></li>
                </ul>
              </div>
            </div>
          </div>
    
          <!-- Third Column: Social Media Links -->
          <div class="w-full sm:w-1/3 text-center sm:text-center">
            <h4 class="text-lg font-semibold mb-4">Follow Us</h4>
            <div class="flex justify-center sm:justify-centre space-x-4">
              <a href="#" class="text-white hover:text-sky-700"><i class="fab fa-facebook"></i></a>
              <a href="#" class="text-white hover:text-sky-700"><i class="fab fa-twitter"></i></a>
              <a href="#" class="text-white hover:text-red-700"><i class="fab fa-instagram"></i></a>
              <a href="#" class="text-white hover:text-sky-700"><i class="fab fa-linkedin-in"></i></a>
            </div>
          </div>
        </div>
    
        <!-- Back to Top Button -->
        <div class="mt-6 text-right">
          <button id="backToTop" class="bg-white hover:bg-sky-500 text-sky-400 px-4 py-2 rounded-full">
            <i class="fas fa-arrow-up"></i>
          </button>
        </div>
      </div>
    </footer>