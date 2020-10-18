import {elements, items} from "./components.js";
import * as home from "./home.js";

// const from = document.getElementById("js--from");
// const to = document.getElementById("js--to");
// const when = document.querySelector(".input__when");
// const searchBtn = document.getElementById("js--search");


// console.log(items.from.textContent, items.to.textContent);
// console.log(items.when.getAttribute('value'));

// Rendering DB resuslts

window.addEventListener("load", home.setDate);

items.searchBtn.addEventListener('click', function() {
    $.ajax({
      // url: "../../utrance-railway/public/index.php",
      url: "home",
      method: "POST",
      data: {
        from: items.from.textContent,
        to: items.to.textContent,
        when: items.when.value,
      },
      success: function (data) {
        console.log(data);
      },
    });
});

items.searchFrom.addEventListener("input", function (e) {
  home.searchStates(items.searchFrom.value);

  home.selectCity();
});

items.valueboxFrom.addEventListener("click", function () {
  items.fromValueBox.style.display = "block";
  items.searchFrom.focus();
});

items.searchboxInside.addEventListener("click", function (e) {
  e.preventDefault();
});
