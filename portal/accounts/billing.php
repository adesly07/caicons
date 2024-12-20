
<?php
session_start();
include('../conx.php');
// Redirect if not logged in
if (!isset($_SESSION['username'])&&(!isset($_SESSION['department']))) {
    header('Location: ../index.php');
    exit();
}
$username = $_SESSION['username'];
$department = $_SESSION['department'];
$sql3 = "SELECT * FROM current where s_category = 'Staylite'";
$result3 = $conn->query($sql3);
$row3 = $result3->fetch_assoc();
//$section = $row3['s_session'];
//$_SESSION['s_session'] = $section;
// Handle form submission to add payment options
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $item_name = $_POST['item_name'];
    $cat = $_POST['category'];
    $amt = $_POST['amt'];
    $level = $_POST['level'];
    $section = $_POST['section'];
    if (!empty($cat)) {
        $stmt = $conn->prepare("INSERT INTO billing (item_names, category, sch_session, level, amount) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssi", $item_name, $cat, $section, $level, $amt);
        if ($stmt->execute()) {
            $success_message = "Item added successfully!";
        } else {
            $error_message = "Failed to add item.";
        }
        $stmt->close();
    } else {
        $error_message = "Category cannot be empty.";
    }
}

// Fetch payment options
$options_query = "SELECT * FROM billing ORDER BY id DESC LIMIT 30";
$options_result = $conn->query($options_query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../../cai.jpg" type="image/x-icon">
    <title>CAICON PORTAL</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/tailwindcss-jit-cdn@tailwindcss/latest/dist/tailwind.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script defer src="js/script.js"></script> <!-- Add external JS file for controlling the animation -->

</head>
<body class="bg-gray-100">
        <?php
            include('header.php');
        ?>
    <div class="flex flex-grow overflow-hidden">

        <!-- Sidebar Menu -->
        <?php
            include('navbar.php');
        ?>
        <div class="container mx-auto p-6">
            <h1 class="text-xl font-bold text-center mb-6">Session School Fee Bills</h1>

            <!-- Add Payment Option Form -->
            <div class="bg-white shadow-md rounded-lg p-6 mb-6">
                <h2 class="text-xl font-semibold mb-4">Add Bill</h2>

                <?php if (!empty($success_message)): ?>
                    <div class="bg-green-100 text-green-800 p-3 mb-4 rounded">
                        <?php echo $success_message; ?>
                    </div>
                <?php elseif (!empty($error_message)): ?>
                    <div class="bg-red-100 text-red-800 p-3 mb-4 rounded">
                        <?php echo $error_message; ?>
                    </div>
                <?php endif; ?>

                <form action="billing.php" method="POST" class="space-y-4">
                <label for="item_name" class="block text-gray-700 font-semibold mb-2">What Item do you want to pay for?</label>
                        <select id="item_name" name ="item_name" class="px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-sky-400">
                            <?php
                                $sql3 = "SELECT * FROM payment_items order by id ASC";
                                $result = $conn->query($sql3);
                                while($data= mysqli_fetch_array($result)){
                            ?>
                                <option value="<?php echo $data['item_name']; ?>"><?php echo $data['item_name']; ?></option>
                            <?php 
                                }
                            ?>
                        </select>
                    <br/>    
                    <input type="text" name="category" placeholder="Enter Item Name" autofocus class="p-3 border rounded-md focus:ring-2 focus:ring-sky-400" required>
                    <br/>
                    <input type="text" name="amt" placeholder="Enter Amount" class="p-3 border rounded-md focus:ring-2 focus:ring-sky-400" required>
                    <br/>
                    <label for="level" class="block text-gray-700 font-semibold mb-2">Level</label>
                        <select id="level" name ="level" class="w-40 px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-sky-400">
                        <?php
                                $sql4 = "SELECT * FROM level order by id ASC";
                                $result = $conn->query($sql4);
                                while($data= mysqli_fetch_array($result)){
                            ?>
                                <option value="<?php echo $data['level_name']; ?>"><?php echo $data['level_name']; ?></option>
                            <?php 
                                }
                            ?>
                        </select>
                    <br/>
                    <label for="section" class="block text-gray-700 font-semibold mb-2">School Session</label>
                        <select id="section" name ="section" class="w-40 px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-sky-400">
                        <?php
                                $sql4 = "SELECT * FROM sch_session order by id ASC";
                                $result = $conn->query($sql4);
                                while($data= mysqli_fetch_array($result)){
                            ?>
                                <option value="<?php echo $data['s_session']; ?>"><?php echo $data['s_session']; ?></option>
                            <?php 
                                }
                            ?>
                        </select>
                        <br/>
                    <button type="submit" class="bg-sky-400 text-white py-2 px-4 rounded-md hover:bg-sky-300">Add</button>
                </form>
            </div>

            <!-- Display Payment Options -->
            <div class="bg-white shadow-md rounded-lg p-6">
                <h2 class="text-xl font-semibold mb-4">Items Added</h2>
                <?php if ($options_result->num_rows > 0): ?>
                    <table class="w-full border-collapse border border-gray-200">
                        <thead>
                            <tr class="bg-gray-100">
                                
                               
                                <th class="border border-gray-200 p-3 text-left">Category</th>
                                <th class="border border-gray-200 p-3 text-left">Amount(&#8358;)</th>
                                <th class="border border-gray-200 p-3 text-left">Level</th>
                                <th class="border border-gray-200 p-3 text-left">School Session</th>
                                <th class="border border-gray-200 p-3 text-left">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($row = $options_result->fetch_assoc()): ?>
                                <tr>
                                    
                                    
                                    <td class="border border-gray-200 p-3"><?php echo $row['category']; ?></td>
                                    <td class="border border-gray-200 p-3"><?php echo number_format($row['amount'],2); ?></td>
                                    <td class="border border-gray-200 p-3"><?php echo $row['level']; ?></td>
                                    <td class="border border-gray-200 p-3"><?php echo $row['sch_session']; ?></td>
                                    <td class="border border-gray-200 p-3">
                                        <a href="delete_bill.php?id=<?php echo $row['id']; ?>" class="text-red-500 hover:underline" onclick="return confirm('Are you sure you want to delete this record?')">
                                            <img src="../../assets/images/delete.png" alt="Logo" width="20" height="20">
                                        </a>
                                    </td>
                                </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                <?php else: ?>
                    <p class="text-gray-500">No item available.</p>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <script>
        // Example: Adding interactivity to clear messages after 3 seconds
        document.addEventListener("DOMContentLoaded", () => {
        const messages = document.querySelectorAll(".bg-green-100, .bg-red-100");
        setTimeout(() => {
            messages.forEach(message => message.remove());
        }, 3000);
        });
    </script>
</body>
</html>
