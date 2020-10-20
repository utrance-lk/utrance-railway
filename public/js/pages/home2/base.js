import {items} from './components.js';
import * as home from './home.js';

window.addEventListener("load", home.setDate);

// document
//   .querySelector(".js--when__date")
//   .addEventListener("click", function (e) {
//     console.log(e);
//   });

items.inputSearchFrom.addEventListener("input", function (e) {
  home.searchStates(items.inputSearchFrom.value);
});

// items.fromStationLabel.addEventListener("click", function () {
//   items.searchDropdownFrom.style.display = "block";
//   items.inputSearchFrom.focus();
// });

document.addEventListener("click", function (e) {
  if (e.target === items.fromStationLabel || e.target === items.inputSearchFrom) {
    items.inputSearchFrom.value = "";
    items.searchDropdownFrom.style.display = "block";
    items.cityList.style.display = "block";
    items.inputSearchFrom.focus();
  } else {
    items.searchDropdownFrom.style.display = "none";
    items.cityList.style.display = "none";
    home.searchStates("");
  }
});

//  || e.target.id === "from"