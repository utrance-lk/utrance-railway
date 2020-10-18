import {elements, items} from "./components.js";

// const from = document.getElementById("js--from");
// const to = document.getElementById("js--to");
// const when = document.querySelector(".input__when");
// const searchBtn = document.getElementById("js--search");


// console.log(items.from.textContent, items.to.textContent);
// console.log(items.when.getAttribute('value'));

// Rendering DB resuslts

items.searchBtn.addEventListener('click', function() {
    $.ajax({
      // url: "../../utrance-railway/public/index.php",
      url: "register",
      method: "POST",
      data: {
        firstname: items.from.textContent,
        lastname: items.to.textContent,
        when: items.when.value,
      },
      success: function (data) {
        console.log(data);
      },
    });
});