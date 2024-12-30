document.getElementById("search-bar").addEventListener("input", function () {
    const searchQuery = this.value.toLowerCase();
    const rows = document.querySelectorAll("#applicants-table tr");

    rows.forEach((row) => {
        const name = row.children[1].textContent.toLowerCase();
        const email = row.children[2].textContent.toLowerCase();
        if (name.includes(searchQuery) || email.includes(searchQuery)) {
            row.style.display = "";
        } else {
            row.style.display = "none";
        }
    });
});
