document.addEventListener("DOMContentLoaded", () => {
    fetch("fetch_data.php")
        .then(response => response.json())
        .then(data => {
            const tableBody = document.getElementById("dataTable");
            tableBody.innerHTML = data.map(item => `
                <tr>
                    <td class="py-2 px-4">${item.course}</td>
                    <td class="py-2 px-4">${item.f_amount}</td>
                    <td class="py-2 px-4">${item.t_fee}</td>
                    <td class="py-2 px-4">${item.acceptance_fee}</td>
                    <td class="py-2 px-4">${item.accp_tran_fee}</td>
                    <td class="py-2 px-4 text-center">
                        <a href="edit.php?id=${item.id}" class="text-blue-500 hover:underline">Edit</a> |
                        <a href="delete.php?id=${item.id}" class="text-red-500 hover:underline" onclick="return confirm('Are you sure you want to delete this record?')">Delete</a>
                    </td>
                </tr>
            `).join("");
        })
        .catch(error => console.error('Error fetching data:', error));
});
