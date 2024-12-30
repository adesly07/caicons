document.getElementById("walletForm").addEventListener("submit", function (e) {
    const walletAmount = document.getElementById("walletAmount").value.trim();

    if (walletAmount <= 0) {
        alert("Please enter a valid amount to add.");
        e.preventDefault();
    }
});
