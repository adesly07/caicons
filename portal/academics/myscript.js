<script>
document.getElementById("registrationNumber").addEventListener("input", function () {
    const query = this.value;
    if (query.length > 2) {
        fetch(`search.php?query=${query}`)
            .then(response => response.json())
            .then(data => {
                const suggestions = document.getElementById("suggestions");
                suggestions.innerHTML = data
                    .map(item => `<li class="p-2 cursor-pointer hover:bg-gray-200">${item.registration_number}</li>`)
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
