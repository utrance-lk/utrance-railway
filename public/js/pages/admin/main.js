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
