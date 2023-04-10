$(document).ready(function() {
    const searchInput = document.querySelector('#searchInput');
    const dataTable = document.querySelector('#tableBody');
    const itemCountElem = document.querySelector('#itemCount');
    const totalRowCount = dataTable.querySelectorAll('tbody tr').length;

    // Set the initial item count
    itemCountElem.textContent = `${totalRowCount} item${totalRowCount === 1 ? '' : 's'} gevonden`;

    // Listen for changes to the search input
    searchInput.addEventListener('input', () => {
        const query = searchInput.value.toLowerCase().trim();

        // Filter the table rows based on the search query
        let visibleRowCount = 0;
        const rows = dataTable.querySelectorAll('tbody tr');
        rows.forEach(row => {
            let match = false;
            const columns = row.querySelectorAll('td');
            columns.forEach(column => {
                const text = column.textContent.toLowerCase();
                if (text.includes(query)) {
                    match = true;
                }
            });

            if (match) {
                row.style.display = '';
                visibleRowCount++;
            } else {
                row.style.display = 'none';
            }
        });

        // Update the item count in the table caption
        if (visibleRowCount > 0) {
            itemCountElem.textContent = `${visibleRowCount} item${visibleRowCount === 1 ? '' : 's'} gevonden`;
        } else {
            itemCountElem.textContent = 'Geen items gevonden';
        }

        // Log the current search query and the number of visible rows
        console.log(`Query: "${query}", Visible Rows: ${visibleRowCount}`);
    });
});

// Get the filter button and dropdown elements
const filterButton = document.getElementById("filterButton");
const filterDropdown = document.getElementById("filterDropdown");

// Add a click event listener to the filter button
filterButton.addEventListener("click", function() {
    // Toggle the "hidden" class on the filter dropdown
    filterDropdown.classList.toggle("hidden");
    console.log("toggle");
});







const tableHeaders = document.querySelectorAll('#tableHead th');
const tableBody = document.querySelector('#tableBody');
let index; // define index variable outside event listener

// Loop through each checkbox in the filter dropdown and listen for changes
filterDropdown.querySelectorAll('input[type=checkbox]').forEach(function(checkbox) {
    // Get the title of the checkbox
    const checkboxTitle = checkbox.parentNode.querySelector('label').textContent.toLowerCase();

    // Load the checkbox state from localStorage
    const storedValue = localStorage.getItem(checkboxTitle);
    if (storedValue !== null) {
        checkbox.checked = JSON.parse(storedValue);
        index = Array.from(filterDropdown.querySelectorAll('input[type=checkbox]')).indexOf(checkbox);
        // Loop through each row in the table and toggle the visibility of the corresponding cell
        tableBody.querySelectorAll('tr').forEach(function(row) {
            const cell = row.querySelectorAll('td')[index];
            if (cell) { // Check if cell is not undefined
                if (checkbox.checked) {
                    cell.classList.remove('hidden');
                } else {
                    cell.classList.add('hidden');
                }
            }
        });

        // Loop through each table header and toggle the visibility of the corresponding header cell
        tableHeaders.forEach(function(header) {
            const cell = header.parentNode.querySelectorAll('td')[index];
            if (cell) { // Check if cell is not undefined
                const th = header.parentNode.querySelectorAll('th')[index];
                if (checkbox.checked) {
                    header.classList.remove('hidden');
                    cell.classList.remove('hidden');
                    th.classList.remove('hidden');
                } else {
                    header.classList.add('hidden');
                    cell.classList.add('hidden');
                    th.classList.add('hidden');
                }
            }
        });
    }

    // Listen for changes to the checkbox
    checkbox.addEventListener('change', function() {
        // Get the index of the column corresponding to the checkbox
        index = Array.from(filterDropdown.querySelectorAll('input[type=checkbox]')).indexOf(this);

        // Loop through each row in the table and toggle the visibility of the corresponding cell
        tableBody.querySelectorAll('tr').forEach(function(row) {
            const cell = row.querySelectorAll('td')[index];
            if (cell) { // Check if cell is not undefined
                if (checkbox.checked) {
                    cell.classList.remove('hidden');
                } else {
                    cell.classList.add('hidden');
                }
            }
        });


        // Loop through each table header and toggle the visibility of the corresponding header cell
        tableHeaders.forEach(function(header) {
            const cell = header.parentNode.querySelectorAll('td')[index];
            if (cell) { // Check if cell is not undefined
                const th = header.parentNode.querySelectorAll('th')[index];
                if (checkbox.checked) {
                    header.classList.remove('hidden');
                    cell.classList.remove('hidden');
                    th.classList.remove('hidden');
                } else {
                    header.classList.add('hidden');
                    cell.classList.add('hidden');
                    th.classList.add('hidden');
                }
            }
        });

        // Save the state of the checkbox to localStorage
        localStorage.setItem(checkboxTitle, checkbox.checked);
    });
});