const items = {
  cityListFrom: document.querySelector(".js--results__list-from"),
  cityListTo: document.querySelector(".js--results__list-to"),
  inputSearchFrom: document.querySelector(".js--search-dropdown__search-from"),
  inputSearchTo: document.querySelector(".js--search-dropdown__search-to"),
  fromStationLabel: document.querySelector(".js--from__station"),
  toStationLabel: document.querySelector(".js--to__station"),
  searchDropdownFrom: document.querySelector(".js--search-dropdown__from"),
  searchDropdownTo: document.querySelector(".js--search-dropdown__to"),
  searchBtn: document.querySelector(".btn-search"),
  firstClassPrice: document.querySelector(
    ".js__class--box-item first__class__price"
  ),
  secondClassPrice: document.querySelector(
    ".js__class--box-item second__class__price"
  ),
  thirdClassPrice: document.querySelector(
    ".js__class--box-item third__class__price"
  ),
  searchBtn: document.querySelector(".btn-search"),
  numberofPassengers: document.querySelector(".number__box margin-r-xs"),

  checkIncrement: document.querySelector(".increment_btn"),
  checkDecrement: document.querySelector(".decrement_btn"),
};

const stationsArray = [
  "Matara",
  "Colombo Fort",
  "Galle",
  "Badulla",
  "Peradeniya",
  "Matale",
  "Ragama",
  "Noor Nagar",
  "Polgahawela",
  "Kankesanthurai",
  "Mannar Line",
  "Talaimannar",
  "Beliatta",
  "Wewurukannala",
  "Gal Oya",
  "Traincomalee",
  "Maho Juction",
  "Batticaloa",
  
];
let from;
let destination;

const searchStates = function (searchText, direction) {
  clearResults(direction);

  let matches = stationsArray.filter(function (state) {
    const regex = new RegExp(`^${searchText}`, "gi");
    return state.match(regex);
  });

  if (searchText.length === 0) {
    matches = [];
  } else {
    matches.forEach(function (city) {
      if (direction == "from") {
        if (city !== items.toStationLabel.textContent) {
          renderCity(direction, city);
        }
      } else if (direction == "to") {
        if (city !== items.fromStationLabel.textContent) {
          renderCity(direction, city);
        }
      }
    });
  }
  selectCity(direction);
};

const selectCity = function (direction) {
  let v;
  if (direction === "from") {
    v = document.querySelectorAll(
      ".js--results__list-from .js--results__list-item"
    );
  } else {
    v = document.querySelectorAll(
      ".js--results__list-to .js--results__list-item"
    );
  }

  if (v.length > 0) {
    for (let i = 0; i < v.length; i++) {
      (function () {
        v[i].addEventListener("click", function (e) {
          if (direction === "from") {
            items.fromStationLabel.textContent = e.target.textContent;
            items.inputSearchFrom.value = e.target.textContent;
          } else {
            items.toStationLabel.textContent = e.target.textContent;
            destination = items.toStationLabel.textContent;
            items.inputSearchTo.value = e.target.textContent;
            items.searchBtn.style.visibility = "visible";
          }
        });
      })();
    }
  }
};

const clearResults = function (direction) {
  if (direction === "from") {
    items.cityListFrom.innerHTML = "";
  } else {
    items.cityListTo.innerHTML = "";
  }
};

const renderCity = function (direction, city) {
  const markup = `
    <li class="ticket__prices__search-dropdown-search-results-item js--results__list-item ">${city}</li>
`;

  if (direction === "from") {
    items.cityListFrom.insertAdjacentHTML("beforeend", markup);
  } else if (direction === "to") {
    items.cityListTo.insertAdjacentHTML("beforeend", markup);
  }
};

items.inputSearchFrom.addEventListener("input", function () {
  //items.cityListTo.style.visibility = "hidden";

  searchStates(items.inputSearchFrom.value, "from");
});

items.inputSearchTo.addEventListener("input", function () {
  searchStates(items.inputSearchTo.value, "to");
});

document.addEventListener("click", function (e) {
  if (
    e.target === items.fromStationLabel ||
    e.target === items.inputSearchFrom
  ) {
    items.inputSearchFrom.value = "";
    items.searchDropdownFrom.style.display = "block";
    items.cityListFrom.style.display = "block";
    items.cityListFrom.style.visibility = "visible";

    items.inputSearchFrom.focus();
  } else {
    items.searchDropdownFrom.style.display = "none";
    items.cityListFrom.style.display = "none";
    items.inputSearchFrom.value = items.fromStationLabel.textContent;
    items.cityListFrom.style.visibility = "hidden";
    from = items.inputSearchFrom.value;
    searchStates("", "from");
  }
});

document.addEventListener("click", function (e) {
  if (e.target === items.toStationLabel || e.target === items.inputSearchTo) {
    items.inputSearchTo.value = "";
    items.searchDropdownTo.style.display = "block";
    items.cityListTo.style.display = "block";
    items.cityListTo.style.visibility = "visible";
    items.inputSearchTo.focus();
  } else {
    items.searchDropdownTo.style.display = "none";
    items.cityListTo.style.display = "none";
    items.inputSearchTo.value = items.toStationLabel.textContent;
    items.searchBtn.style.visibility = "visible";
    items.cityListTo.style.visibility = "hidden";
    destination = items.toStationLabel.textContent;
    searchStates("", "to");
  }
});

const renderResults = function (user) {
  let markup = `
      
        <div class='results__set'>
            <div class='seat__class--box first__class--box'>
                <svg class='seat__class--box-item class__icon'>
                    <use xlink:href='../../../../utrance-railway/public/img/svg/sprite2.svg#icon-park'></use>
                </svg>
                <div class='seat__class--box-item class__name'>Timber</div>
                <div class='seat__class--box-item class__price' class='js__class--box-item first__class__price' id='first_class'>Rs ${user.timber}</div>
            </div>
            <div class='seat__class--box second__class--box'>
                <svg class='seat__class--box-item class__icon'>
                    <use xlink:href='../../../../utrance-railway/public/img/svg/sprite2.svg#icon-construction''></use>
                </svg>
                <div class='seat__class--box-item class__name'>Metal</div>
                <div class='seat__class--box-item class__price' class='js__class--box-item second__class__price' id='second_class'>Rs ${user.metal}</div>
            </div>
            <div class='seat__class--box third__class--box'>
                <svg class='seat__class--box-item class__icon'>
                    <use xlink:href='../../../../utrance-railway/public/img/svg/sprite2.svg#icon-local_mall'></use>
                </svg>
                <div class='seat__class--box-item class__name'>Textile </div>
                <div class='seat__class--box-item class__price' class='js__class--box-item third__class__price' id='third_class'> Rs ${user.textile_products}</div>
            </div>
            <div class='seat__class--box sleeping__berth--box'>
                <svg class='seat__class--box-item class__icon'>
                    <use xlink:href='../../../../utrance-railway/public/img/svg/sprite2.svg#icon-spa'></use>
                </svg>
                <div class='seat__class--box-item class__name'>Agriculture </div>
                <div class='seat__class--box-item class__price' id='agricultural__class'>Rs ${user.agricultural_products}</div>
            </div>
            <!--div class='seat__class--box observartion__saloon--box'>
                <svg class='seat__class--box-item class__icon'>
                    <use xlink:href='../../../../utrance-railway/public/img/svg/sprite2.svg#icon-filter_hdr'></use>
                </svg>
                <div class='seat__class--box-item class__name'>Others</div>
                <div class='seat__class--box-item class__price'>Rs ${user.others}</div>
            </div!-->
        </div>

       
        <div class='number-of-persons__box'>
        <select id='select-weight__range' style='font-size: 1.5rem;height: 30px;width: 100px;border: 1px solid var(--color-main);' onchange='getSelectValue();'>
        <option value='1'>01 - 05 kg</option>
        <option value='2'>05 - 10 kg</option>
        <option value='3'>10 - 20 kg</option>
        <option value='4'>20 - 40 kg</option>
        <option value='5'>40 - 70 kg</option>
        <option value='6'>70 - 99 kg</option>
        </select>
        </div>
        

    

    `




//     document
//         .querySelector(".search__results-container")
//         .insertAdjacentHTML("beforeend", markup);

// }



  document
    .querySelector(".search__results-container")
    .insertAdjacentHTML("beforeend", markup);
};

const renderDefaultResults = function () {
  let markup = `
      
        <div class='results__set'>
            <div class='seat__class--box first__class--box'>
                <svg class='seat__class--box-item class__icon'>
                    <use xlink:href='../../../../utrance-railway/public/img/svg/sprite2.svg#icon-park'></use>
                </svg>
                <div class='seat__class--box-item class__name'>Timber</div>
                <div class='seat__class--box-item class__price' class='js__class--box-item first__class__price' id='first_class'>Rs:800</div>
            </div>
            <div class='seat__class--box second__class--box'>
                <svg class='seat__class--box-item class__icon'>
                    <use xlink:href='../../../../utrance-railway/public/img/svg/sprite2.svg#icon-construction'></use>
                </svg>
                <div class='seat__class--box-item class__name'>Metal</div>
                <div class='seat__class--box-item class__price' class='js__class--box-item second__class__price'  id='second_class'>Rs 700</div>
            </div>
            <div class='seat__class--box third__class--box'>
                <svg class='seat__class--box-item class__icon'>
                    <use xlink:href='../../../../utrance-railway/public/img/svg/sprite2.svg#icon-local_mall'></use>
                </svg>
                <div class='seat__class--box-item class__name'>Textile </div>
                <div class='seat__class--box-item class__price' class='js__class--box-item third__class__price'  id='third_class'>Rs 600</div>
            </div>
            <div class='seat__class--box sleeping__berth--box'>
                <svg class='seat__class--box-item class__icon'>
                    <use xlink:href='../../../../utrance-railway/public/img/svg/sprite2.svg#icon-spa'></use>
                </svg>
                <div class='seat__class--box-item class__name'>Agricultural</div>
                <div class='seat__class--box-item class__price' id='agricultural__class'>Rs 400</div>
            </div>
            <!--div class='seat__class--box observartion__saloon--box'>
                <svg class='seat__class--box-item class__icon'>
                    <use xlink:href='../../../../utrance-railway/public/img/svg/sprite2.svg#icon-filter_hdr'></use>
                </svg>
                <div class='seat__class--box-item class__name'>Other</div>
                <div class='seat__class--box-item class__price'>Rs 700</div>
            </div!-->
        </div>

        
        <div class='number-of-persons__box'>
        <select id='select-weight__range' style='font-size: 1.5rem;height: 30px;width: 100px;border: 1px solid var(--color-main);' onchange="getSelectValue();">
        <option value='1'>01 - 05 kg</option>
        <option value='2'>05 - 10 kg</option>
        <option value='3'>10 - 20 kg</option>
        <option value='4'>20 - 40 kg</option>
        <option value='5'>40 - 70 kg</option>
        <option value='6' >70 - 99 kg</option>
        </select>
        </div>
    `;

  document
    .querySelector(".search__results-container")
    .insertAdjacentHTML("beforeend", markup);
};
