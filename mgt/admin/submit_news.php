<?php
require '../../conx.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $content = mysqli_real_escape_string($conn, $_POST['content']);
    $posted_date = $_POST['posted_date'];

    // Handle file upload
    if (isset($_FILES['news_picture']) && $_FILES['news_picture']['error'] == 0) {
        $file_name = $_FILES['news_picture']['name'];
        $file_tmp = $_FILES['news_picture']['tmp_name'];
        $file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
        $allowed_extensions = ['jpg', 'jpeg', 'png'];

        if (in_array($file_ext, $allowed_extensions)) {
            // Create unique file name and move the uploaded file to a directory
            $new_file_name = uniqid() . '.' . $file_ext;
            move_uploaded_file($file_tmp, "../../news/" . $new_file_name);
        } else {
            echo "Invalid file format.";
            exit();
        }
    } else {
        echo "File upload error.";
        exit();
    }

    // Insert news into the database
    $query = "INSERT INTO news (title, content, thumbnail_url, posted_date) VALUES ('$title', '$content', '$new_file_name', '$posted_date')";

    if (mysqli_query($conn, $query)) {
        echo "News added successfully.";
        header("Location: add_news.php");
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>
