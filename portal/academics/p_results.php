<?php
session_start();
include("../conx.php");
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit();
}
$username = $_SESSION['username'];
$section = $_SESSION['s_session'];
$reg = $_SESSION['reg_num'];


// Fetch contact data
$sql = "SELECT * FROM contact LIMIT 1";
$result = $conn->query($sql);
$contact_data = null;

if ($result->num_rows > 0) {
    $contact_data = $result->fetch_assoc();
}



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../../cai.jpg" type="image/x-icon">
    <title>CAICONS | RESULTS</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/tailwindcss-jit-cdn@tailwindcss/latest/dist/tailwind.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-white">
    <div class="container mx-auto p-6 bg-white rounded-lg shadow-lg mt-10 max-w-3xl">
        <!-- College Details -->
        <div class="flex flex-row gap-10">
            <div class="flex-item text-center">
                <img src="../../assets/images/about_logo.png" alt="Logo">
            </div>
            <div class="flex-item text-center mb-6">
                <h1 class="text-2xl font-bold">CAI COLLEGE OF NURSING SCIENCES</h1>
                <p class="text-gray-600"><?php echo $contact_data['address']; ?></p>
                <p class="text-gray-600">Phone: <?php echo $contact_data['phone_number']; ?> | Email: <?php echo $contact_data['email_address']; ?></p>
            </div>
        </div>
        
        <!-- Invoice Title -->
        <div class="mb-4 text-center border-b pb-4 mb-4">
            <h2 class="text-xl font-bold"><?php echo $section; ?> APPLICATION FORM</h2>
           
        </div>
        <div class="mb-4 text-left">
            <h2 class="text-xl font-bold">O'LEVEL RESULT(S)</h2>
           
        </div>
       <?php
            // Fetch the data from the applicant_results table
            $sql = "SELECT exam_type_first_sitting, subject_first_sitting, exam_type_second_sitting, subject_second_sitting
            FROM applicant_results
            WHERE reg_num = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("s", $reg);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
            // Decode the JSON data
            $exam_type_first = $row['exam_type_first_sitting'];
            $subjects_first = json_decode($row['subject_first_sitting'], true);

            $exam_type_second = $row['exam_type_second_sitting'];
            $subjects_second = json_decode($row['subject_second_sitting'], true);

            echo "<h3>First Sitting</h3>";
            echo "<p><strong>Examination Type:</strong> " . htmlspecialchars($exam_type_first) . "</p>";
            echo "<table class='min-w-full bg-white border mb-4'>";
            echo "<thead class='bg-gray-100 text-gray-600 uppercase text-sm leading-normal'><tr><th class='py-3 px-6 text-left'>Subject</th><th class='py-3 px-6 text-left'>Grade</th></tr></thead>";
            foreach ($subjects_first as $subject => $grade) {
                echo "<tr class='text-gray-700 text-sm'><td class='py-3 px-6'>" . htmlspecialchars($subject) . "</td><td class='py-3 px-6'>" . htmlspecialchars($grade) . "</td></tr>";
            }
            echo "</table>";

            if ($exam_type_second) {
                echo "<h3>Second Sitting</h3>";
                echo "<p><strong>Examination Type:</strong> " . htmlspecialchars($exam_type_second) . "</p>";
                echo "<table class='min-w-full bg-white border mb-4'>";
                echo "<thead class='bg-gray-100 text-gray-600 uppercase text-sm leading-normal'><tr><th class='py-3 px-6 text-left'>Subject</th><th class='py-3 px-6 text-left'>Grade</th></tr></thead>";
                foreach ($subjects_second as $subject => $grade) {
                    echo "<tr class='text-gray-700 text-sm'><td class='py-3 px-6'>" . htmlspecialchars($subject) . "</td><td class='py-3 px-6'>" . htmlspecialchars($grade) . "</td></tr>";
                }
                echo "</table>";
            }
            }
            } else {
            echo "<span class = 'text-red-600'>No record found for this applicant.</span>";
            }

            $stmt->close();
            $conn->close();
       ?>
        
        

        <!-- Action Button -->
        <div class="text-center">
            <a href="v_applicant.php?reg_num=<?php echo $reg; ?>">Back</a> | 
            <button onclick="window.print()" class="bg-blue-500 text-white px-4 py-2 rounded shadow hover:bg-blue-600">
                Print
            </button>
        </div>
    </div>
</body>
</html>
