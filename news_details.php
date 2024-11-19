<?php
include("conx.php");
$news_id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
// Fetch news details from the database
$sql = "SELECT * FROM news WHERE id = $news_id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $title = $row['title'];
    $content = $row['content'];
    $image = $row['thumbnail_url'];
    $posted_date = $row['posted_date'];
} else {
    $title = "News not found";
    $content = "Sorry, the news you are looking for does not exist.";
    //$image = "default.jpg"; // A default image if news is not found
}
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
    <title>Catholic Archdiocese of Ibadan College of Nursing Science</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/tailwindcss-jit-cdn@tailwindcss/latest/dist/tailwind.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" />
    <link rel="stylesheet" href="./assets/css/style.css" />
</head>
<body>
<?php include ("header.php"); ?>
    <div class="container mx-auto p-1">
        <!-- News Title -->
        <div class="text-center shadow-md rounded-md p-6 mb-6">
        <h1 class="text-3xl font-bold text-gray-800 mb-4">NEWS UPDATE</h1>
        </div>

        <div class="flex flex-row relative ">
            <div class="flex-item ">
                <div class="mb-6 text-left mt-4">
                    <h1 class="text-3xl font-bold text-gray-800 mb-4"><?php echo $title; ?></h1>
                    <span class="text-green-800"><?php echo date('F d, Y h:i A', strtotime($row['posted_date'])); ?></span>
                    <img src="news/<?php echo $row['thumbnail_url']; ?>" alt="News Image" class="mt-5 h-auto max-h-96 object-cover rounded-lg shadow-md">
                    <p class="text-lg text-gray-700 mb-5"><?php echo $content; ?></p>
                </div>
            </div>
            <div class="flex-item absolute right-0">
                <div class="p-6 shadow-md rounded-md">
                    <?php
                        // Define how many results you want per page
                       

                        

                        // Fetch the news items for the current page
                        $sql = "SELECT * FROM news ORDER BY posted_date DESC LIMIT 10";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo '<li class="py-4">';
                                echo '<a href="news_details.php?id=' . $row['id'] . '" class="text-base font-semibold text-sky-400 hover:text-sky-300">' . $row['title'] . '</a>';
                                echo '</li>';
                            }
                        } else {
                            echo '<p>No news found.</p>';
                        }

                        
                    ?>
                </div>
            </div>
        </div>
    </div>
     <!-- Footer Section -->
     <?php include("footer.php") ?>
    
</body>
</html>
