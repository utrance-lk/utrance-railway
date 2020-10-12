const searchFrom = document.querySelector(".js--searchbox-from");
// const searchTo = document.querySelector(".js--searchbox-to").value;

// const searchButton = document.querySelector(".js--searchbox-search");

const fromValueBox = document.querySelector(".from__valuebox");
const cityList = document.querySelector(".results__list");

const stationsArray = ['Matara', 'Colombo-Fort', 'Galle', 'Gampaha']

// functions

const searchStates = function(searchText) {

    clearResults();

    let matches = stationsArray.filter(function(state) {
        const regex = new RegExp(searchText, 'gi');
        return state.match(regex);
    });

    if(searchText.length === 0) {
        matches = [];
    } else {
        matches.forEach(renderCity)
    }

};

const renderCity = function(city) {
    const markup = `
        <li>${city}</li>
    `;

    cityList.insertAdjacentHTML("beforeend", markup);
}

const clearResults = function() {
    cityList.innerHTML = '';
}



// events

searchFrom.addEventListener('input', function() {
    searchStates(searchFrom.value);
})

document.querySelector(".searchbar__valuebox-from").addEventListener('click', function() {
    fromValueBox.style.display = 'block';
    fromValueBox.style.alignItems = 'center';
    fromValueBox.style.justifyContent = 'center';
    fromValueBox.style.transition = 'all .5s'
});

document.querySelector(".input_from").addEventListener('select', function() {
    fromValueBox.style.display = 'none';
});


document.querySelector(".js--searchbox-search").addEventListener('click', function(e) {
    e.preventDefault();
    console.log(searchFrom);
});