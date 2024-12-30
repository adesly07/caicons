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
$code = $_SESSION['course_code'];
$level = $_SESSION['level'];
$unit = $_SESSION['units'];
$section = $_SESSION['s_session'];
$semester = $_SESSION['s_semester'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../../cai.jpg" type="image/x-icon">
    <title>CAICONS PORTAL | ACADEMICS</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/tailwindcss-jit-cdn@tailwindcss/latest/dist/tailwind.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script defer src="js/script.js"></script> <!-- Add external JS file for controlling the animation -->
</head>
<body class="bg-sky-200">
    <!-- Header Section -->
    <?php
        include('header.php');
    ?>
    <div class="max-w-lg mx-auto bg-white p-6 rounded-lg shadow-lg mt-6">
        <h2 class="text-2xl font-bold mb-4 text-center">Compute Score</h2>
        <div id="message" class="mt-4 text-center text-red"></div>
        <form id="computeScoreForm" class="space-y-4">
            <div>
                <label for="registrationNumber" class="block font-semibold">Registration Number</label>
                <input type="text" id="registrationNumber" name="registration_number" 
                    class="w-full p-2 border rounded-md" 
                    placeholder="Enter Registration Number" required>
                <ul id="suggestions" class="mt-2 bg-white shadow-lg"></ul>
            </div>
            <div>
                <label for="caScore" class="block font-semibold">CA Score</label>
                <input type="number" id="caScore" name="ca_score" 
                    class="w-full p-2 border rounded-md" 
                    min="0" max="30" placeholder="Enter CA Score" required>
            </div>
            <div>
                <label for="examScore" class="block font-semibold">Examination Score</label>
                <input type="number" id="examScore" name="exam_score" 
                    class="w-full p-2 border rounded-md" 
                    min="0" max="100" placeholder="Enter Examination Score" required>
            </div>
            <button type="submit" 
                class="w-full bg-sky-400 text-white p-2 rounded-md hover:bg-sky-300">Submit</button>
        </form>
        
    </div>
    <div>
        <p>&nbsp;</p>
    </div>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <caption class="text-center p-5 text-lg font-semibold text-left rtl:text-right text-gray-900 bg-white dark:text-white dark:bg-gray-800">
                <?php echo $code; ?> SCORES
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
                $result = $conn->query("SELECT * FROM scores where course_code = '$code' AND s_session = '$section' AND added_by = '$username' ORDER BY id DESC");
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
    <script>
document.getElementById("registrationNumber").addEventListener("input", function () {
    const query = this.value;
    if (query.length > 2) {
        fetch(`search.php?query=${query}`)
            .then(response => response.json())
            .then(data => {
                const suggestions = document.getElementById("suggestions");
                suggestions.innerHTML = data
                    .map(item => `<li class="p-2 cursor-pointer hover:bg-gray-200">${item.reg_num}</li>`)
                    .join("");
                suggestions.querySelectorAll("li").forEach(li => {
                    li.addEventListener("click", () => {
                        document.getElementById("registrationNumber").value = li.textContent;
                        suggestions.innerHTML = "";
                    });
                });
            });
    }
});

document.getElementById("computeScoreForm").addEventListener("submit", function (e) {
    e.preventDefault();
    const formData = new FormData(this);
    fetch("submit_score.php", {
        method: "POST",
        body: formData
    })
        .then(response => response.text())
        .then(data => {
            document.getElementById("message").innerHTML = data;
            this.reset();
        });
});
</script>

</body>
</html>
