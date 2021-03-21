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
  var xmlHttp = new XMLHttpRequest();
  xmlHttp.open("POST", "/utrance-railway/ajax-ticket-price", true);
  xmlHttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
  xmlHttp.responseType = "json";
  xmlHttp.onreadystatechange = async function () {
    if (this.readyState === 4 && this.status === 200) {
      var trainvalues = await this.response;

      console.log(trainvalues);

    //   if(!trainvalues) {
    //       // recurse until get the values
    //       setTicketPrice(fromStation, toStation, id);
    //   }

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
    } else {
      console.log("station not found");
    }
  };

  xmlHttp.send(`start=${fromStation}&destination=${toStation}`);
}

// $.ajax({
//   url: "/utrance-railway/ajax-ticket-price",
//   type: "post",
//   data: {
//     start: fromArray[0],
//     destination: toArray[0],
//   },
//   async: false,
// }).done(function (res) {
//   train1Prices = JSON.parse(res);
//   console.log(train1Prices);
// });

// if (fromArray.length > 1) {
//   $.ajax({
//     url: "/utrance-railway/ajax-ticket-price",
//     type: "post",
//     data: {
//       start: fromArray[1],
//       destination: toArray[1],
//     },
//     async: false,
//   }).done(function (res) {
//     train2Prices = JSON.parse(res);
//   });
// }

// console.log(train1Prices);

//  success: function (response) {
//      console.log(JSON.parse(response));
//    },
//    error: function (jqXHR, textStatus, errorThrown) {
//      console.log(textStatus, errorThrown);
//    },
