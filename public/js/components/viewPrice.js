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
    firstClassPrice: document.querySelector(".js__class--box-item first__class__price"),
    secondClassPrice: document.querySelector(".js__class--box-item second__class__price"),
    thirdClassPrice: document.querySelector(".js__class--box-item third__class__price"),
    searchBtn: document.querySelector(".btn-search"),
    numberofPassengers: document.querySelector(".number__box margin-r-xs"),

    checkIncrement: document.querySelector(".increment_btn"),
    checkDecrement: document.querySelector(".decrement_btn"),

};

const stationsArray = [
    "Matara",
    "Colombo Fort",
    "Galle",
    "Katugoda",
    "Gampaha",
    "Kandy",
    "Puttalam",
    "Aluthgama",
    "Midigama",
    "Weligama",
    "Avissawella",
    "Beliatta",
    "Wewurukannala",
    "Kekanadura",
    "Maradana",
    "Kalutara",
    "Kegalle",



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
                        // from=items.fromStationLabel.textContent;
                        // console.log(from);
                        console.log(items.fromStationLabel.textContent);
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
}

items.inputSearchFrom.addEventListener("input", function () {
    //items.cityListTo.style.visibility = "hidden";

    searchStates(items.inputSearchFrom.value, "from");
});

items.inputSearchTo.addEventListener("input", function () {
    searchStates(items.inputSearchTo.value, "to");
});


document.addEventListener("click", function (e) {

    console.log(items.fromStationLabel);
    console.log(e.target);

    if (e.target === items.fromStationLabel || e.target === items.inputSearchFrom) {
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
        console.log(items.inputSearchFrom.value);
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
                    <use xlink:href='../../../../utrance-railway/public/img/svg/sprite2.svg#icon-looks_one'></use>
                </svg>
                <div class='seat__class--box-item class__name'>First class</div>
                <div class='seat__class--box-item class__price' class='js__class--box-item first__class__price' id='first_class'>Rs ${user.first_class}</div>
            </div>
            <div class='seat__class--box second__class--box'>
                <svg class='seat__class--box-item class__icon'>
                    <use xlink:href='../../../../utrance-railway/public/img/svg/sprite2.svg#icon-looks_two'></use>
                </svg>
                <div class='seat__class--box-item class__name'>Second class</div>
                <div class='seat__class--box-item class__price' class='js__class--box-item second__class__price' id='second_class'>Rs ${user.second_class}</div>
            </div>
            <div class='seat__class--box third__class--box'>
                <svg class='seat__class--box-item class__icon'>
                    <use xlink:href='../../../../utrance-railway/public/img/svg/sprite2.svg#icon-looks_3'></use>
                </svg>
                <div class='seat__class--box-item class__name'>Third class</div>
                <div class='seat__class--box-item class__price' class='js__class--box-item third__class__price' id='third_class'> Rs ${user.third_class}</div>
            </div>
        </div>

        <div class='number-of-persons__box'>
            <button class='btn minus-btn disabled' type='button'>-</button>
            
            <!--span class='number__box '>1</span!-->
            <input id='number__box' value=1>
            <button class='btn plus-btn' type='button'>+</button>
            
            <span id='number__box__name'>Person</span>
        </div>
        

    

    `




    document
        .querySelector(".search__results-container")
        .insertAdjacentHTML("beforeend", markup);

}




const renderDefaultResults = function () {

    let markup = `
      
        <div class='results__set'>
            <div class='seat__class--box first__class--box'>
                <svg class='seat__class--box-item class__icon'>
                    <use xlink:href='../../../../utrance-railway/public/img/svg/sprite2.svg#icon-looks_one'></use>
                </svg>
                <div class='seat__class--box-item class__name'>First class</div>
                <div class='seat__class--box-item class__price' class='js__class--box-item first__class__price' id='first_class'>Rs 800</div>
            </div>
            <div class='seat__class--box second__class--box'>
                <svg class='seat__class--box-item class__icon'>
                    <use xlink:href='../../../../utrance-railway/public/img/svg/sprite2.svg#icon-looks_two'></use>
                </svg>
                <div class='seat__class--box-item class__name'>Second class</div>
                <div class='seat__class--box-item class__price' class='js__class--box-item second__class__price'  id='second_class'>Rs 700</div>
            </div>
            <div class='seat__class--box third__class--box'>
                <svg class='seat__class--box-item class__icon'>
                    <use xlink:href='../../../../utrance-railway/public/img/svg/sprite2.svg#icon-looks_3'></use>
                </svg>
                <div class='seat__class--box-item class__name'>Third class</div>
                <div class='seat__class--box-item class__price' class='js__class--box-item third__class__price'  id='third_class'>Rs 600</div>
            </div>
        </div>

        <div class='number-of-persons__box'>
            <button class='btn minus-btn disabled' type='button' > -</button>
           
            <input id='number__box' value=1>
            <button class='btn plus-btn' type='button'>+</button>
            
            <span id='number__box__name'>Person</span>
        </div>
    `

    document
        .querySelector(".search__results-container")
        .insertAdjacentHTML("beforeend", markup);
};




