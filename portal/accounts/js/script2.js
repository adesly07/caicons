function showTab(tabName) {
    const tabs = document.querySelectorAll(".tab-content");
    tabs.forEach(tab => tab.classList.add("hidden"));

    document.getElementById(tabName).classList.remove("hidden");

    // Update button styles
    document.getElementById("staylitesTab").classList.toggle("bg-blue-500", tabName === 'staylites');
    document.getElementById("staylitesTab").classList.toggle("bg-gray-200", tabName !== 'staylites');
    document.getElementById("applicantsTab").classList.toggle("bg-blue-500", tabName === 'applicants');
    document.getElementById("applicantsTab").classList.toggle("bg-gray-200", tabName !== 'applicants');
}

function searchTable(tableId, searchId) {
    const input = document.getElementById(searchId).value.toUpperCase();
    const table = document.getElementById(tableId);
    const rows = table.getElementsByTagName("tr");

    for (let i = 1; i < rows.length; i++) {
        const cells = rows[i].getElementsByTagName("td");
        let match = false;
        
        for (let j = 0; j < cells.length; j++) {
            if (cells[j] && cells[j].innerHTML.toUpperCase().includes(input)) {
                match = true;
                break;
            }
        }
        
        rows[i].style.display = match ? "" : "none";
    }
}

// Default to show Staylites tab
showTab('staylites');
