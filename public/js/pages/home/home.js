import {items} from "./components.js";

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

    selectCity();

};

export const selectCity = function () {
   let v = document.querySelectorAll(".results__list .results__list-inside");

  if (v.length > 0) {
    for (let i = 0; i < v.length; i++) {
        (function() {
            v[i].addEventListener("click", function (e) {
                items.from.textContent = e.target.textContent;
              });
        }());
    }
  }
};

export let setDate = function () {

  let today = new Date();
  let dd = String(today.getDate());
  let mm = String(today.getMonth() + 1);
  let yyyy = today.getFullYear();
  today = yyyy + "-" + formatDate(mm) + "-" + formatDate(dd);

  items.when.value = today;
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

let formatDate = function(date) {
    if(date < 10) {
        date = '0' + date;
    }
    return date;
}