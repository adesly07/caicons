<?php
include('../conx.php');

$query = "SELECT * FROM applicants";
$result = $conn->query($query);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $course_id = $row['course_id'];
        $inv = $row['invoice_number'];
        $p_status = $row['p_status'];
        $applicant_id = $row['applicant_id'];
        //$_SESSION['applicant_id'] = $applicant_id;
        //$_SESSION['invoice_number'] = $inv;
        if($p_status=="CONFIRMED"){
            $color="text-green-600";
        } else {
            $color="text-red-600";
        }
        $sql2 = "SELECT * FROM courses where id = '$course_id'";
        $result2 = $conn->query($sql2);
        if ($result2->num_rows > 0) {
        $row2 = $result2->fetch_assoc();
        //$course = $row['course'];
        } 
        echo "<tr>";
        echo "<td class='py-3 px-6'>" . "<a href='a_wallet.php?invoice_number=$inv'>" . $row['invoice_number'] . "</a>" . "</td>";
        echo "<td class='py-3 px-6'>" . $row['surname'] . " " . $row['first_name'] . " " . $row['middle_name'] . "</td>";
        echo "<td class='py-3 px-6'>" . $row2['course'] . "</td>";
        echo "<td class='py-3 px-6'>" . $row2['f_amount'] + $row2['t_fee'] . "</td>";
        echo "<td class='py-3 px-6 $color'>" . $row['p_status'] . "</td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='3' class='py-3 px-6 text-center'>No data available</td></tr>";
}
?>

