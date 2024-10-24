<?php
require '../../conx.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $o_title = mysqli_real_escape_string($conn, $_POST['o_title']);
    $o_text = mysqli_real_escape_string($conn, $_POST['o_text']);

    // Handle file upload
    if (isset($_FILES['s_picture']) && $_FILES['s_picture']['error'] == 0) {
        $file_name = $_FILES['s_picture']['name'];
        $file_tmp = $_FILES['s_picture']['tmp_name'];
        $file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
        $allowed_extensions = ['jpg', 'jpeg', 'png'];

        if (in_array($file_ext, $allowed_extensions)) {
            // Create unique file name and move the uploaded file to a directory
            $new_file_name = uniqid() . '.' . $file_ext;
            move_uploaded_file($file_tmp, "../../slide_pix/" . $new_file_name);
        } else {
            echo "Invalid file format.";
            exit();
        }
    } else {
        echo "File upload error.";
        exit();
    }

    // Insert news into the database
    $query = "INSERT INTO slider (image_url, overlay_title, overlay_text) VALUES ('$new_file_name', '$o_title', '$o_text')";

    if (mysqli_query($conn, $query)) {
        echo "Record added successfully.";
        header("Location: add_slider.php");
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>
