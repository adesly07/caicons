document.addEventListener("DOMContentLoaded", function () {
    let sittingCount = 1;

    document.getElementById("addSitting").addEventListener("click", function () {
        sittingCount++;
        const sittingContainer = document.createElement("div");
        sittingContainer.classList.add("sitting", "mt-6");
        sittingContainer.setAttribute("data-sitting", sittingCount);

        sittingContainer.innerHTML = `
            <h3 class="text-lg font-semibold mb-2">${sittingCount === 2 ? "Second Sitting" : `Sitting ${sittingCount}`}</h3>
            <div class="mb-4">
                <label for="examType${sittingCount}" class="block text-gray-700 font-semibold">Examination Type</label>
                <select id="examType${sittingCount}" name="examType[]" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-400" required>
                    <option value="WAEC">WAEC</option>
                    <option value="NECO">NECO</option>
                </select>
            </div>
            <div id="subjectsContainer${sittingCount}">
                <h4 class="text-md font-semibold mb-2">Subjects</h4>
                <div class="grid grid-cols-2 gap-4 mb-4">
                    <div class="subject-row">
                        <label class="text-gray-700">Subject:</label>
                        <input type="text" name="subject${sittingCount}[]" class="w-full px-3 py-2 border rounded-md" required>
                        <label class="text-gray-700">Grade:</label>
                        <input type="text" name="grade${sittingCount}[]" class="w-full px-3 py-2 border rounded-md" required>
                    </div>
                </div>
            </div>
        `;

        document.getElementById("sittingsContainer").appendChild(sittingContainer);
    });
});
