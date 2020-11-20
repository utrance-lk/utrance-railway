import { items } from "./components.js";

let stopValues;

export const renderAddStation = function(stopsCount) {
    // items.addRouteBtn.style.display = "none";
    const markup = `
    <div class="search__result-card addStop-card" id="js--addStop-card">
        <div class="addstation-box addStop-card-item">
            <div class="station-heading">
                Station
            </div>
            <input type="text" class="station-search addStop-card-item--input" id="js--station-search" required>
        </div>
        <div class="arrivaltime-box addStop-card-item">
            <div class="arrival-heading">
                Arrival Time
            </div>
            <input type="time" class="arrivaltime-add addStop-card-item--input" id="js--arrivaltime-add" required>
        </div>
        <div class="depttime-box addStop-card-item">
            <div class="dept-heading">
                Departure Time
            </div>
            <input type="time" class="departtime-add addStop-card-item--input" id="js--departtime-add" required>
        </div>
        <div class="addstop-btn-box btn-white" id="js--addstop-btn-box">
            Add
        </div>
    </div>
    `;
    items.addStopContainer.insertAdjacentHTML('beforeend', markup);
    document.getElementById("js--addstop-btn-box").addEventListener("click", function () {

        // addRoute.displayAddedStop(inputValues);
        const inputValues = {
            inputStation: document.getElementById("js--station-search").value,
            arrivalTime: document.getElementById("js--arrivaltime-add").value,
            departureTime: document.getElementById("js--departtime-add").value
        };

        if(!inputValues.inputStation) {
            return alert('Input the station!!');
        } else if(!inputValues.arrivalTime) {
            return alert('Input arrival time!!');
        } else if(!inputValues.departureTime) {
            return alert('Input departure time!!');
        }

        // stopsArray.push(inputValues);

        // console.log(stopsArray);

        stopValues = inputValues;

        displayAddedStop(inputValues, stopsCount);
        items.addStopBtn.style.display = "flex";
        items.addRouteBtn.style.display = "block";
      });
}

export const stopDetails = function() {
    return stopValues;
}

const displayAddedStop = function(inputValues, stopsCount) {
    const markup = `
        <div class="search__result-card added__stops-card" id="js--added__stops-card">
            <div class="stopadd__id-box"># <span>${++stopsCount}</span> </div>
            <div class="stopadd__station-box">${inputValues.inputStation}</div>
            <div class="stopadd__arrivaltime-box">${
              inputValues.arrivalTime
            }</div>
            <div class="stopadd__departuretime-box">${
              inputValues.departureTime
            }</div>
            <svg class="stop__delete-btn" id="js--stop__delete-btn">
                <use xlink:href="/utrance-railway/public/img/pages/admin/svg/sprite.svg#icon-cross"></use>
            </svg>
        </div>
    `;
    items.addedStopsCardContainer.insertAdjacentHTML('beforeend', markup);
    const el = document.getElementById("js--addStop-card");
    el.parentNode.removeChild(el);

    document
      .getElementById("js--stop__delete-btn")
      .addEventListener("click", function (e) {
        deleteAddedStop(e);
      });
}

export const sendData = function() {

}

const deleteAddedStop = function(e) {
    // e.preventDefault();
    // e.target.closest("#js--added__stops-card").style.display = 'none';
    // e.target.closest("#js--added__stops-card").remove();
    // e.target.parentNode.parentNode.removeChild(e.target.parentNode);
}