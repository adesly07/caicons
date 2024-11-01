<nav class="bg-sky-400 shadow mb-0">
    <div class="container mx-auto px-6 py-3 flex justify-between items-center">
                <div class = "flex">
                    <div class ="flex-item">
                        <a href="#" class="text-gray-800 text-xl font-bold">
                            <img src="../../assets/images/about_logo.png" alt="Logo" class="h-12">
                        </a>
                    </div>
                    <div class ="flex-item">
                        <a href="dashboard.php" class="text-white text-2xl font-bold">
                            CAICONS CMS<p> DASHBOARD</p>
                        </a>
                    </div>
                </div>
                <div>
                    <span class="text-white mr-4">Welcome, <?php echo htmlspecialchars($_SESSION['name']); ?></span>
                    <a href="logout.php" class="bg-red-500 px-4 py-2 rounded text-white">Logout</a>
                </div>
    </div>
</nav>