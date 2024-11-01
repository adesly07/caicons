<?php
session_start();
include ('conx.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $department = $_POST['department'];

    $query = "SELECT * FROM users WHERE username = ? AND department = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ss", $username, $department);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            $_SESSION['username'] = $username;
            $_SESSION['department'] = $department;

            switch ($department) {
                case 'Accounts':
                    header('Location: accounts/acct_db.php');
                    break;
                case 'Admission':
                    header('Location: admission/adm_db.php');
                    break;
                case 'Academics':
                    header('Location: academics/aca_db.php');
                    break;
                case 'admin':
                    header('Location: admin/admin_db.php');
                    break;
                default:
                    header('Location: index.php');
                    break;
            }
            exit();
        } else {
            echo "<script>alert('Incorrect Password'); window.history.back();</script>";
        }
    } else {
        echo "<script>alert('Invalid Credentials'); window.history.back();</script>";
    }
}
?>
