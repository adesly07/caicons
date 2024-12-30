<?php
session_start();
include('../conx.php');
// Redirect if not logged in
if (!isset($_SESSION['username'])) {
    header('Location: ../index.php');
    exit();
}
$username = $_SESSION['username'];
$section = $_SESSION['s_session'];
$sql = "SELECT * FROM applicants WHERE reg_num = '$username'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $data = $result->fetch_assoc();
    $course_id = $data['course_id'];
    $w_amt = $data['w_amt'];
    $inv = $data['invoice_number'];
} 
$sql2 = "SELECT * FROM courses where id = '$course_id'";
$result2 = $conn->query($sql2);

if ($result2->num_rows > 0) {
    $row = $result2->fetch_assoc();
    $course = $row['course'];
    $f_amount = $row['f_amount'];
    $t_fee = $row['t_fee'];
    $total = $f_amount + $t_fee;

} 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CAICONS PORTAL | APPLICATION FORM</title>
    <link rel="shortcut icon" href="../../cai.jpg" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/tailwindcss-jit-cdn@tailwindcss/latest/dist/tailwind.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" />
    <link href=
"https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" />
    <link href=
"https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css"
        rel="stylesheet" />
    <script src=
"https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js">
    </script>
    <script src=
"https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js">
    </script>
    <script src=
"https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js">
</script>
</head>
<body class="bg-white h-screen flex flex-col">

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
        <main class="flex-grow p-6 overflow-auto">
            <div class="w-full bg-white rounded-lg shadow-lg p-8">
                <h2 class="text-2xl font-bold text-center mb-6">My Biodata</h2>
                <form id="applicantForm" method="POST" action="u_bio.php">
                    <div class="mb-4">
                        <label for="surname" class="block text-gray-700 font-semibold">Surname</label>
                        <input type="text" id="surname" name="surname" value="<?= $data['surname'] ?>" disabled class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-sky-300" required>
                    </div>
                    <div class="mb-4">
                        <label for="other_names" class="block text-gray-700 font-semibold">Other Names</label>
                        <input type="text" id="other_names" name="other_names" value="<?= $data['first_name'] ?> <?= $data['middle_name'] ?>" disabled class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-sky-300" required>
                    </div>
                    <div class="mb-4">
                        <label for="dob" class="block text-gray-700 font-semibold">Date of Birth</label>
                        <input type="text" id="dob" name="dob" placeholder="MM-DD-YYYY" class="date w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-sky-300" required>
                    </div>
                    <div class="mb-4">
                        <label for="sex" class="block text-gray-700 font-semibold">Sex</label>
                        <select id="sex" name="sex" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-sky-300" required>
                            <option value="">Select</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                    </div>
                    <div class="mb-4">
                        <label for="marital_status" class="block text-gray-700 font-semibold">Marital Status</label>
                        <select id="marital_status" name="marital_status" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-sky-300" required>
                            <option value="">Select</option>
                            <option value="Single">Single</option>
                            <option value="Married">Married</option>
                        </select>
                    </div>
                    <div class="mb-4">
                        <label for="hometown" class="block text-gray-700 font-semibold">Home Town/Registered Domicile</label>
                        <input type="text" id="hometown" name="hometown" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-sky-300" required>
                    </div>
                    <div class="mb-4">
                        <label for="address" class="block text-gray-700 font-semibold">Address</label>
                        <textarea id="address" name="address" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-sky-300" required></textarea>
                    </div>
                    <div class="mb-4">
                        <label for="state_of_origin" class="block text-gray-700 font-semibold">State of Origin</label>
                        <input type="text" id="state_of_origin" name="state_of_origin" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-sky-300" required>
                    </div>
                    <div class="mb-4">
                        <label for="lga" class="block text-gray-700 font-semibold">Local Government Area</label>
                        <input type="text" id="lga" name="lga" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-sky-300" required>
                    </div>
                    <div class="mb-4">
                        <label for="contact_address" class="block text-gray-700 font-semibold">Permanent Contact Address</label>
                        <textarea id="contact_address" name="contact_address" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-sky-300" required></textarea>
                    </div>
                    <button type="submit" class="w-full bg-sky-400 text-white font-semibold py-2 rounded-md hover:bg-sky-300 transition duration-200">Submit</button>
                </form>
            </div>
        </main>
    </div>
    <script type="text/javascript">
        $(".date").datepicker({
            format: "dd-mm-yyyy",
        });
    </script>
</body>
</html>
