
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
		

function viewPropertyDetails(propertyId) {
    
    // We can replace this with actual data from DB

    // Examples
    const propertyDetails = [
        {
            id: 1,
            name: 'Property 2',
            location: 'Atlanta, GA',
            price: '$1,000,000',
            description: 'House 1',
        },
        {
            id: 2,
            name: 'Property 1',
            location: 'Atlanta, GA',
            price: '$1,000,000',
            description: 'House 2.',
        },
		{
            id: 3,
            name: 'Property 3',
            location: 'Atlanta, GA',
            price: '$1,000,000',
            description: 'House 3',
        },
    ];

    const property = propertyDetails.find((p) => p.id === propertyId);

    if (property) {
        const newPageContent = `
            <h1>${property.name}</h1>
            <p>Location: ${property.location}</p>
            <p>Price: ${property.price}</p>
            <p>Description: ${property.description}</p>
        `;

        const newPage = window.open('', '_blank');
        
        newPage.document.write(newPageContent);
    } else {
        alert('Property details not found.');
    }
}



// Function to get the wishlist from local storage but we need to change it to DB
function getWishlist() {
    const wishlistJSON = localStorage.getItem('wishlist');
    return JSON.parse(wishlistJSON) || [];
}

function updateWishlist(wishlist) {
    const wishlistJSON = JSON.stringify(wishlist);
    localStorage.setItem('wishlist', wishlistJSON);
}

function addToWishlist(propertyId) {
    const wishlist = getWishlist();

    const isPropertyInWishlist = wishlist.some((item) => item.id === propertyId);

    if (!isPropertyInWishlist) {
        wishlist.push({ id: propertyId });

        updateWishlist(wishlist);

        alert('Property added to wishlist!');
    } else {
        alert('Property is already in the wishlist.');
    }
}
