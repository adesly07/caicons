<?php
session_start();
include('../conx.php');
//$pwd = $_SESSION['p_decr'];
$first_name = $_SESSION['first_name'];
$reg_num= $_SESSION['reg_num'];
$email = $_SESSION['email'];
$sql3 = "SELECT * FROM applicants WHERE reg_num = '$reg_num'";
    $result = $conn->query($sql3);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $pwd = $row['p_decr'];
    }
                echo "<h1>Welcome to CAI College of Nursing Sciences, Oluyoro</h1>
                       <p>Dear $first_name,</p>
                       <p>Your registration was successful. Below are your login details:</p>
                       <ul>
                           <li><strong>Registration Number:</strong> $reg_num</li>
                           <li><strong>Password:</strong> $pwd</li>
                       </ul>
                       <p>Kindly visit <a href='https://www.caicons.edu.ng/portal/sreg/login.php'>Registration portal here</a> to continue your registration process.</p>	  	   
	                    <p>Thank you</p>
                       <p>Regards,<br>Registrar</p>";
    
?>