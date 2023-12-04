
        const isFirstLogin = /* Replace with cookie */ true;

        
        if (isFirstLogin) {
            document.getElementById('welcomeNote').innerText = "Welcome! Thank you for choosing our real state company.";
        }

        function search() {
            const searchTerm = document.getElementById('searchInput').value;

            const searchResults = fetchDataFromDB(searchTerm);

            displaySearchResults(searchResults);
        }

        function fetchDataFromDB(searchTerm) {
            // Replace this with actual database
            return [
                { id: 1, name: 'Property 1', price: '$200000' },
                { id: 2, name: 'Property 2', price: '$300000' },
                { id: 3, name: 'Property 3', price: '$250000' }
            ];
        }

        function displaySearchResults(results) {
            const searchResultsContainer = document.getElementById('searchResults');
            searchResultsContainer.innerHTML = '';

            if (results.length === 0) {
                searchResultsContainer.innerHTML = 'No results found.';
            } else {
                results.forEach(result => {
                    const resultItem = document.createElement('div');
                    resultItem.innerHTML = `<strong>${result.name}</strong> - Price: ${result.price}`;
                    searchResultsContainer.appendChild(resultItem);
                });
            }
        }