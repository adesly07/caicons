<?php
session_start();
include("../conx.php");
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit();
}
$username = $_SESSION['username'];
$section = $_SESSION['s_session'];
$level = $_SESSION['level'];

$sql = "SELECT * FROM applicants WHERE reg_num = '$username'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $data = $result->fetch_assoc();
    $course_id = $data['course_id'];
    $a_date = $data['a_date'];
} 

$sql2 = "SELECT * FROM courses where id = '$course_id'";
$result2 = $conn->query($sql2);

if ($result2->num_rows > 0) {
    $row = $result2->fetch_assoc();
    $course = $row['course'];
} 
$sql2 = "SELECT * FROM courses_reg where year = '$level'";
$result2 = $conn->query($sql2);

if ($result2->num_rows > 0) {
    $row = $result2->fetch_assoc();
    //$course = $row['course'];
} 
$sql3 = "SELECT * FROM applicant_documents WHERE reg_num = '$username'";
$result = $conn->query($sql3);

if ($result->num_rows > 0) {
    $pic = $result->fetch_assoc();
    $passport = $pic['passport'];
    
} 
// Fetch contact data
$sql = "SELECT * FROM contact LIMIT 1";
$result = $conn->query($sql);
$contact_data = null;

if ($result->num_rows > 0) {
    $contact_data = $result->fetch_assoc();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../../cai.jpg" type="image/x-icon">
    <title>CAICONS | COURSE</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/tailwindcss-jit-cdn@tailwindcss/latest/dist/tailwind.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-white">
    <?php
        include('header.php');
    ?>
  
  <!-- Form Section -->
  <section class="container mx-auto my-6 ml-6">
    <ul class="list-disc pl-6">
      <li>Students can select and modify courses for the current session.</li>
      <li>Ensure that selected courses do not exceed the maximum allowed units.</li>
      <li>Click "Save" after finalizing course selection.</li>
    </ul>
  </section>

  <!-- Form Section -->
 <!-- Form Section -->
 <section class="container mx-auto bg-white p-6 rounded shadow-md ml-6">
    <form id="courseForm" method="POST">
      <!-- Course Selection -->
      <div class="mb-4">
        <label for="courseSelect" class="block text-gray-700 font-semibold mb-2">Select a Course:</label>
        <select multiple id="courseSelect" class="h-60 border-2 border-gray-300 rounded-md">
          <option value="" disabled selected>Select a course</option>
          <!-- Courses fetched from the database will populate here -->
        </select><br/>
        <button type="button" onclick="addCourse()" class="mt-2 bg-sky-400 text-white px-4 py-2 rounded hover:bg-sky-300">Add Course</button>
      </div>

      <!-- Selected Courses -->
      <div class="mb-4">
        <h2 class="text-gray-700 font-semibold mb-2">Selected Courses:</h2>
        <table id="selectedCourses" class="border-collapse border border-gray-300 text-sm">
          <thead>
            <tr class="bg-gray-100">
              <th class="border border-gray-300 px-4 py-2">Course Code</th>
              <th class="border border-gray-300 px-4 py-2">Course Title</th>
              <th class="border border-gray-300 px-4 py-2">Units</th>
              <th class="border border-gray-300 px-4 py-2">Semester</th>
              <th class="border border-gray-300 px-4 py-2">Action</th>
            </tr>
          </thead>
          <tbody>
            <!-- Dynamically added rows will appear here -->
          </tbody>
        </table>
      </div>

      <!-- Save Button -->
      <div class="mt-4">
        <button type="button" onclick="saveCourses()" class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700">Save</button>
      </div>
    </form>
  </section>

  <script>
    // Fetch courses from the database
    document.addEventListener("DOMContentLoaded", () => {
      fetch("fetch_courses.php")
        .then(response => response.json())
        .then(data => {
          const courseSelect = document.getElementById("courseSelect");
          data.forEach(course => {
            const option = document.createElement("option");
            option.value = course.course_code;
            option.textContent = `${course.course_code} - ${course.course_title}`;
            courseSelect.appendChild(option);
          });
        });
    });

    const selectedCoursesTable = document.getElementById("selectedCourses").querySelector("tbody");

    // Add selected course to the table
    function addCourse() {
      const courseSelect = document.getElementById("courseSelect");
      const selectedCode = courseSelect.value;

      if (!selectedCode) {
        alert("Please select a course before adding.");
        return;
      }

      // Fetch course details
      fetch(`get_course_details.php?course_code=${selectedCode}`)
        .then(response => response.json())
        .then(course => {
          // Check if the course is already added
          const existingRow = Array.from(selectedCoursesTable.children).find(
            row => row.children[0].textContent === course.course_code
          );
          if (existingRow) {
            alert("This course is already added.");
            return;
          }

          // Add course to the table
          const row = document.createElement("tr");
          row.innerHTML = `
            <td class="border border-gray-300 px-4 py-2">${course.course_code}</td>
            <td class="border border-gray-300 px-4 py-2">${course.course_title}</td>
            <td class="border border-gray-300 px-4 py-2">${course.units}</td>
            <td class="border border-gray-300 px-4 py-2">${course.semester}</td>
            <td class="border border-gray-300 px-4 py-2">
              <button onclick="removeRow(this)" class="text-red-600 hover:underline">Remove</button>
            </td>
          `;
          selectedCoursesTable.appendChild(row);
        });
    }

    // Remove selected course row
    function removeRow(button) {
      const row = button.closest("tr");
      row.remove();
    }

    // Save selected courses
    function saveCourses() {
      const rows = Array.from(selectedCoursesTable.querySelectorAll("tr"));
      if (rows.length === 0) {
        alert("No courses selected.");
        return;
      }

      const courses = rows.map(row => ({
        course_code: row.children[0].textContent,
        course_title: row.children[1].textContent,
        units: row.children[2].textContent,
        semester: row.children[3].textContent,
      }));

      fetch("save_courses.php", {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify({ courses }),
      })
        .then(response => response.text())
        .then(data => alert(data))
        .catch(err => console.error(err));
    }
  </script>


  
  <script src="dash.js"></script>
</body>
</html>
