<?php
session_start();
include('../conx.php');
$pwd = $_SESSION['pwd'];
$first_name = $_SESSION['first_name'];
$reg_num= $_SESSION['reg_num'];
$email = $_SESSION['email'];
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php'; // Ensure Composer autoloader is included

 // Send Email
 $mail = new PHPMailer(true);
 try {
     // Server settings
     $mail->isSMTP();
     $mail->Host = ''; // Replace with your SMTP server
     $mail->SMTPAuth = true;
     $mail->Username = ''; // Replace with your email address
     $mail->Password = ''; // Replace with your email password
     $mail->SMTPSecure = 'ssl';
     $mail->Port = 465;
     // Recipients
     $mail->setFrom('', '');
     $mail->addAddress($email, $first_name);
     // Content
     $mail->isHTML(true);
     $mail->Subject = 'Registration Login Details';
     $mail->Body    = "<h1>Welcome to CAI College of Nursing Sciences, Oluyoro</h1>
                       <p>Dear $first_name,</p>
                       <p>Your registration was successful. Below are your login details:</p>
                       <ul>
                           <li><strong>Registration Number:</strong> $reg_num</li>
                           <li><strong>Password:</strong> $pwd</li>
                       </ul>
                       <p>Kindly visit <a href='https://www.caicons.edu.ng/portal/sreg/login.php'>Registration portal here</a> to continue your registration process.</p>	  	   
	                    <p>Thank you</p>
                       <p>Regards,<br>Registrar</p>";
     // Send the email
     $mail->send();
     echo  "Registration successful. Your password has been sent to your email. <br/> Click <a href='https://www.caicons.edu.ng/portal/sreg/login.php'>here</a> to continue your registration.";
 } catch (Exception $e) {
     header('location:v_pwd.php');
 }

    
?>