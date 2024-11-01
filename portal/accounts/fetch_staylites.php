<?php
include('../conx.php');

$query = "SELECT id, name, department FROM staylites";
$result = $conn->query($query);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td class='py-3 px-6'>" . $row['id'] . "</td>";
        echo "<td class='py-3 px-6'>" . $row['name'] . "</td>";
        echo "<td class='py-3 px-6'>" . $row['department'] . "</td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='3' class='py-3 px-6 text-center'>No data available</td></tr>";
}
?>
