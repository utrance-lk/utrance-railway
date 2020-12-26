let newStations = [];

function addStops() {
  document.querySelectorAll(".stop-card__add-btn").forEach(function (item) {
    item.addEventListener("click", function (e) {
      const isAvailPopup = document.querySelector(".add-stop-popup");
      if (!isAvailPopup) {
        const parent = e.target.closest(".stop-card");
        const markup = `
                        <div class="add-stop-popup margin-t-s margin-b-s">
                            <form action="#" class="add-stop-popup__form">
                                <div class="add-stop-popup__station">
                                    <input type="text" class="add-stop-popup__station--input">
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

        const popupCloseBtn = document.querySelector(
          ".add-stop-popup__close-btn"
        );

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
            let arrTime = document.querySelector(
              ".add-stop-popup__arr-time--input"
            ).value;
            let deptTime = document.querySelector(
              ".add-stop-popup__dept-time--input"
            ).value;

            const obj = {
              stationName,
              arrTime,
              deptTime,
            };

            newStations.push(obj);
            console.log(newStations);

            const parentPathId =
              parent.children[0].children[0].innerText.split("#")[1] * 1;

            arrTime = timeConversion(arrTime);
            deptTime = timeConversion(deptTime);

            // const isBackOdd = parent.classList.value
            //   .split(" ")
            //   .includes("back-odd");

            const isBackOdd = parent.classList.contains("back-odd");

            const html = `
                    <div class="stop-card ${
                      isBackOdd ? "back-even" : "back-odd"
                    }">
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
            popup.parentNode.removeChild(popup);
            parent.insertAdjacentHTML("afterend", html);

            changePathIdAndBG(parentPathId + 1);
            addStops();
          });
      }
      // document.querySelector(".add-stop-popup").style.display = 'flex';
    });
  });
}

// console.log(popupCloseBtn);

const changePathIdAndBG = function (changedPathId) {
  let pathIdCount = 0;
  document.querySelectorAll(".stop-card").forEach(function (e) {
    const pathId = e.children[0].children[0].innerText.split("#")[1] * 1;
    if (pathId === changedPathId) {
      pathIdCount += 1;
    }
    if (pathIdCount === 2) {
      e.children[0].children[0].innerHTML = `#${pathId + 1}`;
      e.classList.toggle("back-odd");
      e.classList.toggle("back-even");
    }
  });
};

const timeConversion = function (time) {
  const arrTimeHour = time.split(":")[0] * 1;

  if (arrTimeHour < 12) {
    return `${time} AM`;
  }

  return `0${arrTimeHour - 12}:${time.split(":")[1]} PM`;
};
