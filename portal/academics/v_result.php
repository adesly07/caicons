<?php
session_start();
include('../conx.php');
// Redirect if not logged in
if (!isset($_SESSION['username'])&&(!isset($_SESSION['department']))) {
    header('Location: ../index.php');
    exit();
}
$username = $_SESSION['username'];
$department = $_SESSION['department'];
$section = $_SESSION['s_session'];
$reg = $_GET['reg_num'];
$_SESSION['reg_num'] = $reg;
$sql = "SELECT * FROM applicants WHERE reg_num = '$reg'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $data = $result->fetch_assoc();
    //$course_id = $data['course_id'];
} 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CAICONS PORTAL | <?php echo $department; ?></title>
    <link rel="shortcut icon" href="../../cai.jpg" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/tailwindcss-jit-cdn@tailwindcss/latest/dist/tailwind.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" />
</head>
<body class="bg-gray-100 h-screen flex flex-col">

        <!-- Header Section -->
        <?php
            include('header.php');
        ?>

        <!-- Main Dashboard Layout -->
    <div class="flex flex-grow overflow-hidden">

        <!-- Sidebar Menu -->
        <?php
            include('navbar.php');
        ?>
        <!-- Main Content Area -->
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <caption class="text-center p-5 text-lg font-semibold text-left rtl:text-right text-gray-900 bg-white dark:text-white dark:bg-gray-800">
                <?php echo $data['surname'] . " " . $data['first_name'] . " " . $data['middle_name']; ?> SCORES <?php echo $section; ?> SESSION
            </caption>
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Registration Number
                    </th>
                    <th scope="col" class="px-6 py-3">
                        CA
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Exam
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Total
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Letter Grade
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Grade Point
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Remark
                    </th>
                    <th scope="col" class="px-6 py-3">
                        <span class="sr-only">Action</span>
                    </th>
                </tr>
            </thead>
            <?php
                $result = $conn->query("SELECT * FROM scores where reg_num = '$reg' AND s_session = '$section' AND added_by = '$username' ORDER BY course_code ASC");
                while ($row = $result->fetch_assoc()) {
            ?>
            <tbody>
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        <?php echo $row['reg_num']; ?>
                    </th>
                    <td class="px-6 py-4">
                        <?php echo $row['ca_score']; ?>
                    </td>
                    <td class="px-6 py-4">
                        <?php echo $row['exam_score']; ?>
                    </td>
                    <td class="px-6 py-4">
                        <?php echo $row['total_score']; ?>
                    </td>
                    <td class="px-6 py-4">
                        <?php echo $row['letter_grade']; ?>
                    </td>
                    <td class="px-6 py-4">
                        <?php echo $row['grade_point']; ?>
                    </td>
                    <td class="px-6 py-4">
                        <?php echo $row['remark']; ?>
                    </td>
                    <td class="px-6 py-4 text-right">
                        <a href="delete_score.php?id=<?php echo $row['id']; ?>" class="font-medium text-red-600 dark:text-blue-500 hover:underline">Delete</a>
                    </td>
                </tr>
            </tbody>
            <?php } ?>
        </table>
    </div>
    </div>

</body>
</html>
