import { items } from "./components.js";
import * as home from "./home.js";

window.addEventListener("load", home.setDate);

items.inputSearchFrom.addEventListener("input", function () {
  home.searchStates(items.inputSearchFrom.value, "from");
});

items.inputSearchTo.addEventListener("input", function () {
  home.searchStates(items.inputSearchTo.value, "to");
});

items.swapBtn.addEventListener('click', function() {
  let temp = items.fromStationLabel.textContent;
  items.fromStationLabel.textContent = items.toStationLabel.textContent;
  items.inputSearchFrom.value = items.toStationLabel.textContent;
  items.toStationLabel.textContent = temp;
  items.inputSearchTo.value = temp;
})

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
    home.searchStates("", "from");
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
    items.searchBtn.style.visibility = "visible";
    home.searchStates("", "to");
  }
});

console.log(document.cookie['user']);
