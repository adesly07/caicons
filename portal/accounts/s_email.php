<?php
session_start();
include('../conx.php');
$pwd = $_SESSION['pwd'];
$myname = $_SESSION['first_name'];
$registrationNumber= $_SESSION['reg_num'];
$email = $_SESSION['email'];
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php'; // Ensure Composer autoloader is included

 // Send Email
 $mail = new PHPMailer(true);
 try {
     // Server settings
     $mail->isSMTP();
     $mail->Host = 'caicons.edu.ng'; // Replace with your SMTP server
     $mail->SMTPAuth = true;
     $mail->Username = 'admissionoffice@caicons.edu.ng'; // Replace with your email address
     $mail->Password = 'caiconsoluyoro'; // Replace with your email password
     $mail->SMTPSecure = 'ssl';
     $mail->Port = 465;
     // Recipients
     $mail->setFrom('admissionoffice@caicons.edu.ng', 'CAICONS Application');
     $mail->addAddress($email, $myname);
     // Content
     $mail->isHTML(true);
     $mail->Subject = 'Application Login Details';
     $mail->Body    = "<h1>Welcome to CAI College of Nursing Sciences, Oluyoro</h1>
                       <p>Dear $myname,</p>
                       <p>Your registration was successful. Below are your login details:</p>
                       <ul>
                           <li><strong>Registration Number:</strong> $registrationNumber</li>
                           <li><strong>Password:</strong> $pwd</li>
                       </ul>
                       <p>Kindly visit <a href='https://www.caicons.edu.ng/portal/applicant/login.php'>Application portal here</a> to continue your application process.</p>	  	   
	                    <p>Thank you</p>
                       <p>Regards,<br>Registrar</p>";
     // Send the email
     $mail->send();
     echo "The applicant login details has been sent to his/her email. <br/> Click <a href='https://www.caicons.edu.ng/portal/accounts/wallet.php'>here</a> to go back.";
 } catch (Exception $e) {
     echo json_encode(["success" => false, "message" => "Registration successful but email could not be sent. Mailer Error: {$mail->ErrorInfo}"]);
 }

    
?>