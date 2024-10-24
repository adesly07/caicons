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
