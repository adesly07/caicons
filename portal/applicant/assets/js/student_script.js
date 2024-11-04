document.getElementById("studentLoginForm").addEventListener("submit", function (e) {
    const username = document.getElementById("username").value.trim();
    const password = document.getElementById("password").value.trim();

    if (!username || !password) {
        document.getElementById("errorMessage").textContent = "All fields are required!";
        document.getElementById("errorMessage").classList.remove("hidden");
        e.preventDefault();
    }
});
