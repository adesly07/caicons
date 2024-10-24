<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CMS Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
</head>
<body class="bg-gray-100">

    <!-- Header -->
    <header class="bg-blue-600 p-4 text-white flex justify-between items-center">
        <div class="text-lg font-bold">
            <i class="fas fa-tools"></i> CMS Dashboard
        </div>
        <div class="flex items-center space-x-4">
            <span>Admin</span>
            <button class="bg-red-500 px-4 py-2 rounded">Logout</button>
        </div>
    </header>

    <!-- Main content -->
    <div class="flex">

        <!-- Sidebar -->
        <aside class="bg-gray-800 text-white w-1/5 min-h-screen p-4">
            <nav>
                <ul>
                    <li class="my-4">
                        <a href="#" class="flex items-center space-x-2 hover:text-blue-400">
                            <i class="fas fa-home"></i> <span>Dashboard</span>
                        </a>
                    </li>
                    <li class="my-4">
                        <a href="#" class="flex items-center space-x-2 hover:text-blue-400">
                            <i class="fas fa-newspaper"></i> <span>News</span>
                        </a>
                    </li>
                    <li class="my-4">
                        <a href="#" class="flex items-center space-x-2 hover:text-blue-400">
                            <i class="fas fa-image"></i> <span>Gallery</span>
                        </a>
                    </li>
                    <li class="my-4">
                        <a href="#" class="flex items-center space-x-2 hover:text-blue-400">
                            <i class="fas fa-file-alt"></i> <span>Content</span>
                        </a>
                    </li>
                    <li class="my-4">
                        <a href="#" class="flex items-center space-x-2 hover:text-blue-400">
                            <i class="fas fa-user-cog"></i> <span>Settings</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </aside>

        <!-- Main section -->
        <main class="w-4/5 p-6 bg-white shadow-lg">
            <h1 class="text-2xl font-bold mb-6">Dashboard Overview</h1>
            
            <!-- Add/Edit/Delete Content Section -->
            <section id="contentSection" class="mb-10">
                <h2 class="text-xl font-semibold mb-4">Manage Content</h2>
                <div class="mb-4">
                    <button class="bg-green-500 text-white px-4 py-2 rounded" onclick="showAddContentModal()">Add New Content</button>
                </div>
                <table class="table-auto w-full">
                    <thead>
                        <tr class="bg-gray-200">
                            <th class="px-4 py-2">Title</th>
                            <th class="px-4 py-2">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Dynamic content from MySQL -->
                        <?php
                            // Fetch content from the database
                            include('config.php');
                            $query = "SELECT * FROM content";
                            $result = mysqli_query($conn, $query);

                            while($row = mysqli_fetch_assoc($result)) {
                                echo "
                                <tr>
                                    <td class='border px-4 py-2'>{$row['title']}</td>
                                    <td class='border px-4 py-2'>
                                        <button class='bg-blue-500 text-white px-4 py-2 rounded mr-2' onclick='editContent({$row['id']})'>Edit</button>
                                        <button class='bg-red-500 text-white px-4 py-2 rounded' onclick='deleteContent({$row['id']})'>Delete</button>
                                    </td>
                                </tr>";
                            }
                        ?>
                    </tbody>
                </table>
            </section>

            <!-- Add/Edit/Delete Gallery Section -->
            <section id="gallerySection" class="mb-10">
                <h2 class="text-xl font-semibold mb-4">Manage Gallery</h2>
                <button class="bg-green-500 text-white px-4 py-2 rounded" onclick="showAddGalleryModal()">Add New Gallery</button>
                <!-- Add dynamic gallery here -->
            </section>

            <!-- Add/Edit/Delete News Section -->
            <section id="newsSection" class="mb-10">
                <h2 class="text-xl font-semibold mb-4">Manage News</h2>
                <button class="bg-green-500 text-white px-4 py-2 rounded" onclick="showAddNewsModal()">Add New News</button>
                <!-- Add dynamic news list here -->
            </section>
        </main>
    </div>

    <!-- Modals for Add/Edit actions (hidden by default) -->
    <div id="addContentModal" class="fixed inset-0 bg-gray-900 bg-opacity-75 hidden justify-center items-center">
        <div class="bg-white p-8 rounded-lg">
            <h2 class="text-2xl mb-4">Add New Content</h2>
            <form action="add_content.php" method="POST">
                <div class="mb-4">
                    <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                    <input type="text" name="title" id="title" class="mt-1 p-2 border rounded w-full">
                </div>
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Save</button>
            </form>
        </div>
    </div>

    <script>
        // JavaScript to handle modal display
        function showAddContentModal() {
            document.getElementById('addContentModal').classList.remove('hidden');
        }
        function hideAddContentModal() {
            document.getElementById('addContentModal').classList.add('hidden');
        }

        // Add JavaScript to handle edit and delete content dynamically
    </script>
</body>
</html>
