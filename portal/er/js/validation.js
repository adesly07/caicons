document.getElementById("applicationAmountForm").addEventListener("submit", function (e) {
    const fields = ["course", "f_amount", "t_fee", "acceptance_fee", "accp_tran_fee"];
    let isValid = true;

    fields.forEach(field => {
        const input = document.getElementById(field);
        if (input.value.trim() === "" || parseFloat(input.value) < 0) {
            input.classList.add("border-red-500");
            isValid = false;
        } else {
            input.classList.remove("border-red-500");
        }
    });

    if (!isValid) {
        alert("Please fill all fields correctly.");
        e.preventDefault();
    }
});
