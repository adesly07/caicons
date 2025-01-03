<?php
include("../conx.php");
session_start();
$pin = $_SESSION['pin'];
$serial_number = $_SESSION['serial_number'];
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $reg_num = mysqli_real_escape_string($conn, $_POST['reg_num']);
    $surname = mysqli_real_escape_string($conn, $_POST['surname']);
    $first_name = mysqli_real_escape_string($conn, $_POST['first_name']);
    $middle_name = mysqli_real_escape_string($conn, $_POST['middle_name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $nationality = mysqli_real_escape_string($conn, $_POST['nationality']);
    $course_id = mysqli_real_escape_string($conn, $_POST['course_id']);
    $section = mysqli_real_escape_string($conn, $_POST['section']);
   
    
    $pwd = substr(str_shuffle(strtoupper(sha1(rand() . time() . "my salt string"))),0, 8);
    $pwd_hash = password_hash($pwd, PASSWORD_BCRYPT);
    if($section=='2023/2024'){
     $w_amt = '820000';   
    } else {
        $w_amt = '1250000';   
    }
    
    $sql = "INSERT INTO applicants (a_status, reg_num, pwd, p_decr, w_amt, surname, first_name, middle_name, email, phone_number, nationality, invoice_number, course_id, sch_session, p_status)
            VALUES ('ADMITTED', '$reg_num', '$pwd_hash', '$pwd', '$w_amt', '$surname', '$first_name', '$middle_name', '$email', '$phone', '$nationality', '-', '$course_id', '$section', 'CONFIRMED')";

    if ($conn->query($sql) === TRUE) {
        $updateSql = "UPDATE pins SET status='USED' WHERE pin='$pin' AND serial_number='$serial_number'";
        $conn->query($updateSql);
        $_SESSION['reg_num'] = $reg_num;
        $_SESSION['pwd'] = $pwd;
        $_SESSION['first_name'] = $first_name;
        $_SESSION['email'] = $email;
        header('location:s_email.php');
        /*echo "<script>
                alert('Congratulations, Your registration number is: $reg_num and your password is: $pwd');
                window.location.href = 'login.php';
              </script>";*/
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
}
?>