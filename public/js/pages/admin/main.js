import { items } from "./components.js";
import * as addRoute from "./addRoute.js";

let stopsCount = 0;

items.addStopBtn.addEventListener("click", function () {
  if (!items.addStopCard) {
    items.addStopBtn.style.display = "none";
    addRoute.renderAddStation(stopsCount);
    stopsCount++;
  }
  items.addBtn = document.getElementById("js--addstop-btn-box");
});

// document.addEventListener('click', function(e) {
//     console.log(e);
//     if (e.target !== items.addStopBtn && e.target !== document.getElementById("js--addStop-card")) {
//       document.getElementById("js--addStop-card").style.display = "none";
//     } else {
//         // items.addStopBtn.style.display = "flex";
//     }
// })

window.addEventListener("load", function () {
  if (stopsCount === 0) {
    // items.addRouteBtn.style.display = "none";
  }
});

// items.deleteUserBtn.addEventListener("click", function () {
//   var myobj = document.getElementById("form-card");
//   myobj.remove();
// });
