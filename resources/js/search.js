const searchInput = document.getElementById('searchInput');
const searchButton = document.getElementById('searchButton');
const predictionList = document.getElementById('predictionList');
const searchResults = document.getElementById('searchResults');

function performSearch() {
    const searchTerm = searchInput.value.trim();

    if (searchTerm.length === 0) {
        predictionList.innerHTML = '';
        searchResults.innerHTML = '';
        return;
    }

    fetch(`/search?searchTerm=${encodeURIComponent(searchTerm)}`)
        .then(response => response.json())
        .then(data => {
            let html = '';
            data.forEach(item => {
                html += `<li class="list-group-item">${item.name}</li>`; // Replace 'name' with the property you want to display
            });
            searchResults.innerHTML = html;
        })
        .catch(error => {
            console.error('Error fetching data:', error);
        });
}

function showPredictions() {
    const searchTerm = searchInput.value.trim();

    if (searchTerm.length === 0) {
        predictionList.innerHTML = '';
        return;
    }

    // In this example, the predictions are hard-coded for demonstration purposes.
    // In a real-world scenario, you'd fetch predictions from the server using AJAX.
    const predictions = ['Apple', 'Banana', 'Orange', 'Grapes', 'Pineapple'];

    let html = '';
    predictions.forEach(prediction => {
        if (prediction.toLowerCase().startsWith(searchTerm.toLowerCase())) {
            html += `<li class="list-group-item">${prediction}</li>`;
        }
    });
    predictionList.innerHTML = html;
}

searchInput.addEventListener('input', showPredictions);
searchButton.addEventListener('click', performSearch);
