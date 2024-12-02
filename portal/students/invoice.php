<?php
session_start();
include('../conx.php');
if (!isset($_SESSION['username'])) {
    header('Location: index.php');
    exit();
}
$username = $_SESSION['username'];
$section = $_SESSION['s_session'];
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $item = $_POST['payment_items'];
    $sql2 = "SELECT * FROM payment_items WHERE item_name = '$item'";
    $result2 = $conn->query($sql2);

if ($result2->num_rows > 0) {
    $row = $result2->fetch_assoc();
    $t_fee = $row['t_fee'];
   // $myitem = $row['item_name'];
}
$sql3 = "SELECT SUM(amount) FROM billing WHERE item_names = '$item'";
    $result2 = $conn->query($sql3);

if ($result2->num_rows > 0) {
    $row = $result2->fetch_assoc();
    $i_amt = $row['SUM(amount)'];
}
    // Retrieve the last invoice number
$sql = "SELECT invoice_number FROM s_invoice WHERE paid_for = '$item' ORDER BY id DESC LIMIT 1";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // If an invoice number exists, increment the last one
    $row = $result->fetch_assoc();
    $lastInvoiceNumber = $row['invoice_number'];

    // Extract numeric part and increment it
    preg_match('/(\d+)/', $lastInvoiceNumber, $matches);
    $newNumber = (int)$matches[0] + 1;
    $newInvoiceNumber = 'INV-' . str_pad($newNumber, 7, '0', STR_PAD_LEFT); // e.g., INV-0000001
} else {
    // If no invoice number exists, start with 'INV-00001'
    $newInvoiceNumber = 'INV-0000001';
}

    $sql = "INSERT INTO s_invoice (paid_for, reg_num, invoice_number, t_amount, t_fee, sch_session, p_status)
            VALUES ('$item', '$username', '$newInvoiceNumber', '$i_amt', '$t_fee', '$section', 'UNPAID')";

    if ($conn->query($sql) === TRUE) {
        $_SESSION['invoice_number'] = $newInvoiceNumber;
        $_SESSION['payment_items'] = $item;
        header('location:p_invoice.php');
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
}
?>