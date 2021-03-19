function newaddStops(m) {
  // const item1 = document.querySelectorAll(".stop-card__add-btn")[m-1];
  //   const parent = item1.closest(".stop-card");
  const parent = document.querySelectorAll(".stop-card")[m - 1];

  const markup = `
    <style>
    .autocom-box li{
      display: none;  
    }
    .add-stop-popup__station.active .autocom-box li{
      display: block;
    }
    </style>
    
                    <div class="add-stop-popup margin-t-s margin-b-s">
                        <form action="#" class="add-stop-popup__form ser">
                          <div class="wrapper">
                            <div class="add-stop-popup__station">
                              <input type="text" class="add-stop-popup__station--input">
                              <div class="autocom-box">
                                 <li>matara</li>
                                 <li>colombo</li>
                              </div>
                            </div>
                            </div>
                            <div class="add-stop-popup__arr-time">
                                <input type="time" class="add-stop-popup__arr-time--input">
                            </div>
                            <div class="add-stop-popup__dept-time">
                                <input type="time" class="add-stop-popup__dept-time--input">
                            </div>
                            <button class="add-stop-popup__btn-add-station btn-square-small">
                                Add Station
                            </button>
                        </form>
                        <div class="add-stop-popup__close-btn">
                            <svg class="close-icon">
                                <use xlink:href='/utrance-railway/public/img/svg/sprite2.svg#icon-clear'></use>
                            </svg>
                        </div>
                    </div>
        `;
  parent.insertAdjacentHTML("afterend", markup);

  const popupCloseBtn = document.querySelector(".add-stop-popup__close-btn");

  popupCloseBtn.addEventListener("click", function (elem) {
    const popup = elem.target.closest(".add-stop-popup");
    popup.parentNode.removeChild(popup);
  });

  document
    .querySelector(".add-stop-popup__btn-add-station")
    .addEventListener("click", function (elem) {
      const stationName = document.querySelector(
        ".add-stop-popup__station--input"
      ).value;
      let arrTime = document.querySelector(".add-stop-popup__arr-time--input")
        .value;
      let deptTime = document.querySelector(".add-stop-popup__dept-time--input")
        .value;

      const parentPathId =
        parent.children[0].children[0].innerText.split("#")[1] * 1;

      let pathId = parentPathId + 1;
      const obj = {
        stationName,
        arrTime,
        deptTime,
        pathId,
      };

      let l = 0;

      for (let i = 0; i < newStations.length; i++) {
        let car = newStations[i];
        if (car.pathId >= pathId) {
          l++;
        }
      }

      if (l != 0) {
        for (let n = 0; n < newStations.length; n++) {
          if (newStations[n].pathId >= pathId) {
            newStations[n].pathId++;
            // console.log(newStations[n]);
          }
        }
      }
      newStations.push(obj);

      arrTime = timeConversion(arrTime);
      deptTime = timeConversion(deptTime);

      // const isBackOdd = parent.classList.value
      //   .split(" ")
      //   .includes("back-odd");

      const isBackOdd = parent.classList.contains("back-odd");

      const html = `
                <div class="stop-card ${isBackOdd ? "back-even" : "back-odd"}">
                    <div class="stop-card__details">
                        <div class="stop-card__path-id">
                            #${parentPathId + 1}
                        </div>
                        <div class="stop-card__station">
                            ${stationName}
                        </div>
                        <div class="stop-card__arr-time">
                            ${arrTime}
                        </div>
                        <div class="stop-card__dept-time">
                            ${deptTime}
                        </div>
                    </div>
                    <div class="stop-card__add-btn">
                        <svg class="add-icon">
                            <use xlink:href='/utrance-railway/public/img/svg/sprite2.svg#icon-add_circle_outline'></use>
                        </svg>
                    </div>
                </div>
            `;

      const popup = elem.target.closest(".add-stop-popup");
      //   const newparent = popup.closest(".schedule");
      // console.log(popup.previousSibling.previousElementSibling);

      popup.parentNode.removeChild(popup);
      parent.insertAdjacentHTML("afterend", html);

      changePathIdAndBG(parentPathId + 1);
    });
}

$(document).ready(function () {
  $("#arrtime").click(function () {
    let newindex4 = x;
    let newindex5 = parent.firstChild.firstChild.innerText.split("#")[1] * 1;

    $.ajax({
      url: "newmanageRoutesValidations",
      method: "get",
      data: { index1: newindex4, index2: newindex5 },
      success: function (data) {
        // var errorResult = JSON.parse(data);
      },
    });
  });
});
