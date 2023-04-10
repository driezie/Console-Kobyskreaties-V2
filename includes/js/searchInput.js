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