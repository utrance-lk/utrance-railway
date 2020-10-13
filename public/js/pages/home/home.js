const searchFrom = document.querySelector(".js--searchbox-from");
// const searchTo = document.querySelector(".js--searchbox-to").value;

// const searchButton = document.querySelector(".js--searchbox-search");

const fromValueBox = document.querySelector(".from__valuebox");
const cityList = document.querySelector(".results__list");
const inputFromField = document.querySelector(".input__from");

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
        matches.forEach(renderCity);
    }

};

const renderCity = function(city) {
    const markup = `
        <li class="results__list-inside">${city}</li>
    `;

    cityList.insertAdjacentHTML("beforeend", markup);
}

const clearResults = function() {
    cityList.innerHTML = '';
}

// const closeAllLists = function(e) {
//     let 
// }

const selectCity = function() {
     let v = document.querySelectorAll(".results__list .results__list-inside");

     if (v.length > 0) {
       for (let i = 0; i < v.length; i++) {
         v[i].addEventListener("click", function (e) {
           selectedCity = e.target.textContent;
           // I tested fromValueBox.style.display = 'none' here;
         });
       }
     }

}

let selectedCity = '';


// events

searchFrom.addEventListener('input', function(e) {

    searchStates(searchFrom.value);


    selectCity();

    // if(selectedCity.length > 0) {

    //     fromValueBox.style.display = "none";
    //     document.querySelector(".selected__city-from").textContent = selectedCity;
    // }

});

// if(selectedCity.length > 0) {
//     fromValueBox.style.display = "none";
// }


document.querySelector(".searchbar__valuebox-from").addEventListener('click', function() {
    fromValueBox.style.display = 'block';
    document.querySelector(".input__from").focus();
});

document.querySelector(".js--searchbox-search").addEventListener('click', function(e) {
    e.preventDefault();
});

// date picker

let setDate = function() {
    let today = new Date();
    let dd = String(today.getDate());
    let mm = String(today.getMonth() + 1);
    let yyyy = today.getFullYear();
    today = formatDate(dd) + "/" + formatDate(mm) + "/" + yyyy;

    // console.log(document.querySelector('.js--input-date'));

    document.querySelector(".js--input-date").value = today;

}

let formatDate = function(date) {
    if(date < 10) {
        date = '0' + date;
    }
    return date;
}



window.addEventListener('load', setDate);
