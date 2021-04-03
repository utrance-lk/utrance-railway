var cardPrices = [];

function getValues(arr, seatArr) {
  console.log(seatArr);

  var basePrices = arr;

  basePrices.forEach(function (e, i) {
    setTicketPrice(i + 1);
  });

  function setTicketPrice(id) {
    var selectElement = document.getElementById("train_class" + id);

    cardPrices[id - 1] = basePrices[id - 1].scBasePrice; //default
    var ticketPrice = document.getElementById("tickprice" + id);
    ticketPrice.value = cardPrices[id - 1]; //default

    var personsElement = document.getElementById("persons" + id);

    var finalAmountElement = document.getElementById("finalAmount");

    // basic accumulator
    var cardAcc = cardPrices.reduce(function (acc, i) {
      return acc + i;
    });

    finalAmountElement.value = cardAcc;

    var seatsAvailElement = document.getElementById("remaining-seats" + id);

    var bookBtnElement = document.getElementById("btn-book-now");

    selectElement.addEventListener("change", function () {
      var trainclass = selectElement.value;
      if (trainclass === "firstClass") {
        cardPrices[id - 1] =
          personsElement.value * 1 * basePrices[id - 1].fcBasePrice;
        ticketPrice.value = cardPrices[id - 1];
        seatsAvailElement.innerText = seatArr[id - 1].fcSeats + " seats left!";
        if (seatArr[id - 1].fcSeats === 0) {
          bookBtnElement.disabled = true;
          bookBtnElement.classList.add("button-inactive");
        } else {
          bookBtnElement.disabled = false;
          bookBtnElement.classList.remove("button-inactive");
        }
      }
      if (trainclass === "secondClass") {
        cardPrices[id - 1] =
          personsElement.value * 1 * basePrices[id - 1].scBasePrice;
        ticketPrice.value = cardPrices[id - 1];
        seatsAvailElement.innerText = seatArr[id - 1].scSeats + " seats left!";
        if (seatArr[id - 1].scSeats === 0) {
          bookBtnElement.disabled = true;
          bookBtnElement.classList.add("button-inactive");
        } else {
          bookBtnElement.disabled = false;
          bookBtnElement.classList.remove("button-inactive");
        }
      }

      cardAcc = cardPrices.reduce(function (acc, i) {
        return acc + i;
      });

      finalAmountElement.value = cardAcc;
    });

    personsElement.addEventListener("change", function (e) {
      if (e.target.value > 10) {
        e.target.value = 10;
      }
      if (e.target.value < 1) {
        e.target.value = 1;
      }

      if (selectElement.value === "firstClass") {
        cardPrices[id - 1] =
          basePrices[id - 1].fcBasePrice * (personsElement.value * 1);
      }
      if (selectElement.value === "secondClass") {
        cardPrices[id - 1] =
          basePrices[id - 1].scBasePrice * (personsElement.value * 1);
      }

      ticketPrice.value = cardPrices[id - 1];

      cardAcc = cardPrices.reduce(function (acc, i) {
        return acc + i;
      });

      finalAmountElement.value = cardAcc;
    });
  }
}

function changeSeatsClass() {}
