<?php
session_start();
include('../conx.php');
// Redirect if not logged in
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit();
}
$username = $_SESSION['username'];
$section = $_SESSION['s_session'];
$newInvoiceNumber = $_SESSION['invoice_number'];
$t_amount = $_SESSION['t_amount'];
$t_fee = $_SESSION['t_fee'];
$w_amt = $_SESSION['w_amt'];
$course_id = $_SESSION['course_id'];
$item = $_SESSION["payment_items"];
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $amt_p = $_POST['amt_p'];
    $sql3 = "SELECT receipt_number FROM payment WHERE paid_for = '$item' ORDER BY id DESC LIMIT 1";
    $result = $conn->query($sql3);

    if ($result->num_rows > 0) {
        // If an receipt number exists, increment the last one
        $row = $result->fetch_assoc();
        $lastReceiptNumber = $row['receipt_number'];

        // Extract numeric part and increment it
        preg_match('/(\d+)/', $lastReceiptNumber, $matches);
        $newNumber = (int)$matches[0] + 1;
        $newReceiptNumber = str_pad($newNumber, 7, '0', STR_PAD_LEFT); // e.g., 0000001
    } else {
        // If no invoice number exists, start with 'INV-00001'
        $newReceiptNumber = '0000001';
    }
        if ($w_amt < $amt_p){
            echo "Insufficient balance in your wallet. Click <a href='v_invoice.php'>here </a> to go back";
        } else{
        $sql = "INSERT INTO payment (paid_for, reg_num, course_id, invoice_number, receipt_number, f_amount, t_fee, t_amount, sch_session, p_status)
                VALUES ('$item', '$username', '$course_id', '$newInvoiceNumber', '$newReceiptNumber', '$t_amount', '$t_fee', '$amt_p', '$section', 'PAID')";

        if ($conn->query($sql) === TRUE) {
            $w_amt = ($w_amt - $amt_p); 
            $sql2 = "UPDATE applicants SET w_amt = ? WHERE reg_num = ?";
            $stmt = $conn->prepare($sql2);
            $stmt->bind_param("is", $w_amt, $username);
            $stmt->execute();
            $_SESSION['receipt_number'] = $newReceiptNumber;
            header('location:p_receipt.php');
        } 
    }
   
}
?>