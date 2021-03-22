var fromArray = [];
var toArray = [];

document.querySelectorAll("span[id^='from']").forEach((e) => {
  fromArray.push(e.innerHTML);
});

document.querySelectorAll("span[id^='to']").forEach((e) => {
  toArray.push(e.innerHTML);
});

fromArray.forEach(function (e, i) {
  setTicketPrice(fromArray[i], toArray[i], i + 1);
});

var cardPrices = [];
var basePrices = [];

function setTicketPrice(fromStation, toStation, id) {

  $.ajax({
    url: "ajax-ticket-price",
    method: "post",
    data: {
      start: fromStation,
      destination: toStation,
    },
    error: console.log("errorr"),
    success: function (trainvalues) {
      console.log(trainvalues);
      trainvalues = JSON.parse(trainvalues);
      var obj = {
        fcBasePrice: trainvalues.first_class,
        scBasePrice: trainvalues.second_class,
      };

      basePrices.push(obj);

      var selectElement = document.getElementById("train_class" + id);

      cardPrices[id - 1] = basePrices[id - 1].scBasePrice; //default
      var ticketPrice = document.getElementById("tickprice" + id);
      ticketPrice.innerText = cardPrices[id - 1]; //default

      var personsElement = document.getElementById("persons" + id);

      var finalAmountElement = document.getElementById("finalAmount");

      // basic accumulator
      var cardAcc = cardPrices.reduce(function (acc, i) {
        return acc + i;
      });

      finalAmountElement.value = cardAcc;

      selectElement.addEventListener("change", function () {
        var trainclass = selectElement.value;
        if (trainclass === "firstClass") {
          cardPrices[id - 1] =
            personsElement.value * 1 * basePrices[id - 1].fcBasePrice;
          ticketPrice.innerText = cardPrices[id - 1];
        }
        if (trainclass === "secondClass") {
          cardPrices[id - 1] =
            personsElement.value * 1 * basePrices[id - 1].scBasePrice;
          ticketPrice.innerText = cardPrices[id - 1];
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

        ticketPrice.innerText = cardPrices[id - 1];

        cardAcc = cardPrices.reduce(function (acc, i) {
          return acc + i;
        });

        finalAmountElement.value = cardAcc;
      });
    },
  });
}
