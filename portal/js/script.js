document.getElementById("loginForm").addEventListener("submit", function (e) {
    const username = document.getElementById("username").value.trim();
    const password = document.getElementById("password").value.trim();
    const department = document.getElementById("department").value;

    if (!username || !password || !department) {
        document.getElementById("errorMessage").textContent = "All fields are required!";
        document.getElementById("errorMessage").classList.remove("hidden");
        e.preventDefault();
    }
});
document.addEventListener('DOMContentLoaded', function() {
    const loginForm = document.getElementById('loginForm');
    const loginButton = document.getElementById('loginButton');
    const loadingSpinner = document.getElementById('loadingSpinner');
    const buttonText = document.querySelector('.button-text');

    loginForm.addEventListener('submit', function(e) {
        // Prevent the form from submitting immediately
        e.preventDefault();

        // Show loading spinner and hide button text
        loadingSpinner.classList.remove('hidden');
        buttonText.classList.add('hidden');

        // Simulate form submission delay (remove this if unnecessary)
        setTimeout(function() {
            loginForm.submit(); // Submit the form after 1 second delay (you can adjust)
        }, 1000);
    });
});