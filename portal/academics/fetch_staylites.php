<?php
include('../conx.php');

$query = "SELECT * FROM applicants WHERE a_status = 'ADMITTED'";
$result = $conn->query($query);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $reg = $row['reg_num'];
        echo "<tr>";
        echo "<td class='py-3 px-6'>" . "<a href='v_result.php?reg_num=$reg'>" . $row['reg_num'] . "</a>" . "</td>";
        echo "<td class='py-3 px-6'>" . "<a href='v_result.php?reg_num=$reg'>" . $row['matric_no'] . "</a>" . "</td>";
        echo "<td class='py-3 px-6'>" . $row['surname'] . " " . $row['first_name'] . " " . $row['middle_name'] . "</td>";
        echo "<td class='py-3 px-6'>" . $row['phone_number'] . "</td>";
        echo "<td class='py-3 px-6'>" . $row['email'] . "</td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='3' class='py-3 px-6 text-center'>No data available</td></tr>";
}
?>
