document.getElementById("addEntry").addEventListener("click", function () {
    const formContainer = document.getElementById("formContainer");
    const newEntry = document.querySelector(".school-entry").cloneNode(true);

    // Clear the input fields in the new entry
    newEntry.querySelectorAll("input").forEach(input => input.value = "");

    // Add event listener to the remove button in the new entry
    newEntry.querySelector(".remove-entry").addEventListener("click", function () {
        newEntry.remove();
    });

    formContainer.appendChild(newEntry);
});

// Attach event listener to the initial remove button
document.querySelectorAll(".remove-entry").forEach(button => {
    button.addEventListener("click", function () {
        button.closest(".school-entry").remove();
    });
});
