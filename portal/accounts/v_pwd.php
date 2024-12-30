<?php
session_start();
include('../conx.php');
$pwd = $_SESSION['pwd'];
$myname = $_SESSION['first_name'];
$registrationNumber= $_SESSION['reg_num'];
$email = $_SESSION['email'];
                echo "<h3>Welcome to CAI College of Nursing Sciences, Oluyoro</h3>
                       <p>Dear $myname,</p>
                       <p>Your registration was successful. Below are your login details:</p>
                       <ul>
                           <li><strong>Registration Number:</strong> $registrationNumber</li>
                           <li><strong>Password:</strong> $pwd</li>
                       </ul>
                       <p>Kindly visit <a href='https://www.caicons.edu.ng/portal/applicant/login.php'>Application portal here</a> to continue your application process.</p>	  	   
	                    <p>Thank you</p>
                       <p>Regards,<br>Registrar</p>";
    
?>