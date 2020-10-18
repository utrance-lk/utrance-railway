import {items} from "./components";

const stationsArray = ['Matara', 'Colombo-Fort', 'Galle', 'Gampaha'];

export const searchStates = function(searchText) {

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

    items.cityList.insertAdjacentHTML("beforeend", markup);
}

const clearResults = function() {
    items.cityList.innerHTML = '';
}


export const selectCity = function() {
    //  let v = document.querySelectorAll(".results__list .results__list-inside");
    let v =  items.resultsListRow;

     if (v.length > 0) {
       for (let i = 0; i < v.length; i++) {
         v[i].addEventListener("click", function (e) {
        //    selectedCity = e.target.textContent;
           // I tested fromValueBox.style.display = 'none' here;
         });
       }
     }

}


// events

items.searchFrom.addEventListener('input', function(e) {

    searchStates(searchFrom.value);

    selectCity();

});


items.valueboxFrom.addEventListener('click', function() {
    items.fromValueBox.style.display = 'block';
    items.searchFrom.focus();
});

items.searchboxInside.addEventListener("click", function (e) {
  e.preventDefault();
});

// date picker

let setDate = function() {
    let today = new Date();
    let dd = String(today.getDate());
    let mm = String(today.getMonth() + 1);
    let yyyy = today.getFullYear();
    today = formatDate(mm) + "/" + formatDate(dd) + "/" + yyyy;

    items.when.value = today;

}

let formatDate = function(date) {
    if(date < 10) {
        date = '0' + date;
    }
    return date;
}

window.addEventListener('load', setDate);
