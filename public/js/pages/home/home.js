import {items} from './components.js';

const stationsArray = ["Matara", "Colombo-Fort", "Galle", "Gampaha", "Kandy", "Puttalam", "Aluthgama", "Midigama", "Weligama"];

export const searchStates = function(searchText, direction) {
    clearResults(direction);

    let matches = stationsArray.filter(function (state) {
      const regex = new RegExp(`^${searchText}`, "gi");
      return state.match(regex);
    });

    if (searchText.length === 0) {
      matches = [];
    } else {
      matches.forEach(function(city) {
        if(direction == 'from') {
          if(city !== items.toStationLabel.textContent) {
            renderCity(direction, city);
          }
        } else if(direction == 'to') {
          if (city !== items.fromStationLabel.textContent) {
            renderCity(direction, city);
          }
        }
      });
    }

    selectCity(direction);
}

export const selectCity = function (direction) {
    let v;
    if(direction === 'from') {
      v = document.querySelectorAll(".js--results__list-from .js--results__list-item");
    } else {
      v = document.querySelectorAll(".js--results__list-to .js--results__list-item");
    }

  if (v.length > 0) {
    for (let i = 0; i < v.length; i++) {
      (function () {
        v[i].addEventListener("click", function (e) {
          if(direction === 'from') {
            items.fromStationLabel.textContent = e.target.textContent;
            items.inputSearchFrom.value = e.target.textContent;
          } else {
            items.toStationLabel.textContent = e.target.textContent;
            items.inputSearchTo.value = e.target.textContent;
            items.searchBtn.style.visibility = 'visible';
          }
        });
      })();
    }
  }
};

export let setDate = function () {
  let today = new Date();
  let dd = String(today.getDate());
  let mm = String(today.getMonth() + 1);
  let yyyy = today.getFullYear();
  today = yyyy + "-" + formatDate(mm) + "-" + formatDate(dd);

  items.inputDate.value = today;
  items.inputDate.min = today;
};

let formatDate = function (date) {
  if (date < 10) {
    date = "0" + date;
  }
  return date;
};

const clearResults = function (direction) {
  if(direction === 'from') {
    items.cityListFrom.innerHTML = "";
  } else {
    items.cityListTo.innerHTML = "";
  }
}

const renderCity = function (direction, city) {
  const markup = `
        <li class="search-dropdown__search-results-item js--results__list-item">${city}</li>
    `;

  if (direction === "from") {
    items.cityListFrom.insertAdjacentHTML("beforeend", markup);
  } else if(direction === 'to') {
    items.searchBtn.style.visibility = "hidden";
    items.cityListTo.insertAdjacentHTML("beforeend", markup);
  }
};
