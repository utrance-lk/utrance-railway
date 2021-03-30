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
                            <use xlink:href='/public/img/svg/sprite2.svg#icon-add_circle_outline'></use>
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