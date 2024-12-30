<header class="bg-sky-400 text-white p-4 flex items-center justify-between">
        <div class="flex items-center space-x-4">
            <img src="../../assets/images/about_logo.png" alt="Logo" class="w-10 h-10">
            <a href="aca_db.php">
                <h1 class="text-xl font-bold">CAICONS <br/><?php echo strtoupper($department); ?></h1>
            </a>
            
        </div>
        <button id="menuToggle" class="lg:hidden bg-white p-2 rounded-md">
            <svg class="w-6 h-6 text-black" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
            </svg>
        </button>
    </header>