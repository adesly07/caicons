// dashboard.js
document.addEventListener("DOMContentLoaded", function () {
    const bell = document.getElementById("notificationBell");
    const dropdown = document.getElementById("notificationDropdown");

    // Toggle notification dropdown visibility
    bell.addEventListener("click", function () {
        dropdown.classList.toggle("hidden");
    });

    // Close the dropdown when clicking outside
    document.addEventListener("click", function (event) {
        if (!dropdown.contains(event.target) && !bell.contains(event.target)) {
            dropdown.classList.add("hidden");
        }
    });
});
