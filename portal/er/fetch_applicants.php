<?php
include('../conx.php');
$section = $_SESSION['s_session'];
$query = "SELECT * FROM applicants where p_status = 'CONFIRMED' AND sch_session = '$section'";
$result = $conn->query($query);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $course_id = $row['course_id'];
        $reg = $row['reg_num'];
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
        echo "<td class='py-3 px-6'>" . "<a href='v_applicant.php?reg_num=$reg'>" . $row['reg_num'] . "</a>" . "</td>";
        echo "<td class='py-3 px-6'>" . $row['surname'] . " " . $row['first_name'] . " " . $row['middle_name'] . "</td>";
        echo "<td class='py-3 px-6'>" . $row['a_status'] . "</td>";
        echo "<td class='py-3 px-6'>" . $row['phone_number'] . "</td>";
        echo "<td class='py-3 px-6 $color'>" . $row['p_status'] . "</td>";
        //echo "<td class='py-3 px-6 $color'>" . $pay['p_status'] . "</td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='3' class='py-3 px-6 text-center'>No data available</td></tr>";
}
?>

