<?php
require '../../conx.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $position = mysqli_real_escape_string($conn, $_POST['position']);
    $qualification = mysqli_real_escape_string($conn, $_POST['qualification']);

    // Handle file upload
    if (isset($_FILES['man_picture']) && $_FILES['man_picture']['error'] == 0) {
        $file_name = $_FILES['man_picture']['name'];
        $file_tmp = $_FILES['man_picture']['tmp_name'];
        $file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
        $allowed_extensions = ['jpg', 'jpeg', 'png'];

        if (in_array($file_ext, $allowed_extensions)) {
            // Create unique file name and move the uploaded file to a directory
            $new_file_name = uniqid() . '.' . $file_ext;
            move_uploaded_file($file_tmp, "../../man_pix/" . $new_file_name);
        } else {
            echo "Invalid file format.";
            exit();
        }
    } else {
        echo "File upload error.";
        exit();
    }

    // Insert news into the database
    $query = "INSERT INTO management (picture_url, man_name, position, qualification) VALUES ('$new_file_name', '$name', '$position', '$qualification')";

    if (mysqli_query($conn, $query)) {
        echo "Record added successfully.";
        header("Location: add_management.php");
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>
