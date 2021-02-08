const items = {
  cityListFrom: document.querySelector(".js--results__list-from"),
  cityListTo: document.querySelector(".js--results__list-to"),
  inputSearchFrom: document.querySelector(".js--search-dropdown__search-from"), // js--searchbox-from"
  inputSearchTo: document.querySelector(".js--search-dropdown__search-to"),
  fromStationLabel: document.querySelector(".js--from__station"),
  toStationLabel: document.querySelector(".js--to__station"),
  searchDropdownFrom: document.querySelector(".js--search-dropdown__from"),
  searchDropdownTo: document.querySelector(".js--search-dropdown__to"),
  inputDate: document.querySelector(".js--when__date"),
  searchBtn: document.querySelector(".js--searchbar__search-btn"),
  swapBtn: document.querySelector(".js--swap-btn"),
};

const stationsArray = [
  "Matara",
  "Colombo-Fort",
  "Galle",
  "Gampaha",
  "Kandy",
  "Puttalam",
  "Aluthgama",
  "Midigama",
  "Weligama",
  "Beliatta",
  "Maradana"
];

const searchStates = function (searchText, direction) {
  clearResults(direction);

  let matches = stationsArray.filter(function (state) {
    const regex = new RegExp(`^${searchText}`, "gi");
    return state.match(regex);
  });

  if (searchText.length === 0) {
    matches = [];
  } else {
    matches.forEach(function (city) {
      if (direction == "from") {
        if (city !== items.toStationLabel.textContent) {
          renderCity(direction, city);
        }
      } else if (direction == "to") {
        if (city !== items.fromStationLabel.textContent) {
          renderCity(direction, city);
        }
      }
    });
  }

  selectCity(direction);
};

const selectCity = function (direction) {
  let v;
  if (direction === "from") {
    v = document.querySelectorAll(
      ".js--results__list-from .js--results__list-item"
    );
  } else {
    v = document.querySelectorAll(
      ".js--results__list-to .js--results__list-item"
    );
  }

  if (v.length > 0) {
    for (let i = 0; i < v.length; i++) {
      (function () {
        v[i].addEventListener("click", function (e) {
          if (direction === "from") {
            items.fromStationLabel.textContent = e.target.textContent;
            items.inputSearchFrom.value = e.target.textContent;
          } else {
            items.toStationLabel.textContent = e.target.textContent;
            items.inputSearchTo.value = e.target.textContent;
            items.searchBtn.style.visibility = "visible";
          }
        });
      })();
    }
  }
};

// let setDate = function () {
//   let today = new Date();
//   let dd = String(today.getDate());
//   let mm = String(today.getMonth() + 1);
//   let yyyy = today.getFullYear();
//   today = yyyy + "-" + formatDate(mm) + "-" + formatDate(dd);

//   items.inputDate.value = today;
//   items.inputDate.min = today;
// };

// let formatDate = function (date) {
//   if (date < 10) {
//     date = "0" + date;
//   }
//   return date;
// };

const clearResults = function (direction) {
  if (direction === "from") {
    items.cityListFrom.innerHTML = "";
  } else {
    items.cityListTo.innerHTML = "";
  }
};

const renderCity = function (direction, city) {
  const markup = `
        <li class="searchbar-main__dropdown-search-results-item js--results__list-item">${city}</li>
    `;

  if (direction === "from") {
    items.cityListFrom.insertAdjacentHTML("beforeend", markup);
  } else if (direction === "to") {
    items.searchBtn.style.visibility = "hidden";
    items.cityListTo.insertAdjacentHTML("beforeend", markup);
  }
};

// EVENT LISTNERS

// window.addEventListener("load", function () {
//   setDate();
//   // // items.fromStationLabel.textContent = inputSearchFrom.value;
//   // console.log(items.fromStationLabel.textContent);
// });

items.inputSearchFrom.addEventListener("input", function () {
  searchStates(items.inputSearchFrom.value, "from");
});

items.inputSearchTo.addEventListener("input", function () {
  searchStates(items.inputSearchTo.value, "to");
});

items.swapBtn.addEventListener("click", function () {
  let temp = items.fromStationLabel.textContent;
  items.fromStationLabel.textContent = items.toStationLabel.textContent;
  items.inputSearchFrom.value = items.toStationLabel.textContent;
  items.toStationLabel.textContent = temp;
  items.inputSearchTo.value = temp;
});

document.addEventListener("click", function (e) {
  if (
    e.target === items.fromStationLabel ||
    e.target === items.inputSearchFrom
  ) {
    items.inputSearchFrom.value = "";
    items.searchDropdownFrom.style.display = "block";
    items.cityListFrom.style.display = "block";
    items.inputSearchFrom.focus();
  } else {
    items.searchDropdownFrom.style.display = "none";
    items.cityListFrom.style.display = "none";
    items.inputSearchFrom.value = items.fromStationLabel.textContent;
    console.log(items.inputSearchFrom.value);
    searchStates("", "from");
  }
});

document.addEventListener("click", function (e) {
  if (e.target === items.toStationLabel || e.target === items.inputSearchTo) {
    items.inputSearchTo.value = "";
    items.searchDropdownTo.style.display = "block";
    items.cityListTo.style.display = "block";
    items.inputSearchTo.focus();
  } else {
    items.searchDropdownTo.style.display = "none";
    items.cityListTo.style.display = "none";
    items.inputSearchTo.value = items.toStationLabel.textContent;
    items.searchBtn.style.visibility = "visible";
    searchStates("", "to");
  }
});