document.getElementById("add-course").addEventListener("click", () => {
    const courseCode = document.getElementById("course-code").value;
    if (courseCode) {
      const table = document.getElementById("course-list");
      const row = document.createElement("tr");
      row.innerHTML = `
        <td class="border px-4 py-2">${courseCode}</td>
        
        <td class="border px-4 py-2 text-center">
          <button type="button" class="text-red-600 remove-course">Remove</button>
        </td>
      `;
      table.appendChild(row);
  
      // Clear input field
      document.getElementById("course-code").value = "";
  
      // Add event listener for remove button
      row.querySelector(".remove-course").addEventListener("click", () => {
        table.removeChild(row);
      });
    }
  });
  
  document.getElementById("course-form").addEventListener("submit", (event) => {
    event.preventDefault();
    // Save data logic can go here (e.g., AJAX call to PHP script).
    alert("Courses saved successfully!");
  });
  