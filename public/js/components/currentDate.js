let setDate = function () {
  let today = new Date();
  let dd = String(today.getDate());
  let mm = String(today.getMonth() + 1);
  let yyyy = today.getFullYear();
  today = yyyy + "-" + formatDate(mm) + "-" + formatDate(dd);
  var maxDay = yyyy + "-" + formatDate(mm*1 + 5) + "-" + formatDate(dd);
  items.inputDate.max = maxDay;

  items.inputDate.value = today;
  items.inputDate.min = today;
};

let formatDate = function (date) {
  if (date < 10) {
    date = "0" + date;
  }
  return date;
};

window.addEventListener("load", function () {
  if (!items.inputDate.value) {
    setDate();
  } else {
    let today = new Date();
    let dd = String(today.getDate());
    let mm = String(today.getMonth() + 1);
    let yyyy = today.getFullYear();
    today = yyyy + "-" + formatDate(mm) + "-" + formatDate(dd);
    var maxDay = yyyy + "-" + formatDate(mm*1 + 5) + "-" + formatDate(dd);
    items.inputDate.min = today;
    items.inputDate.max = maxDay;
  }
  // // items.fromStationLabel.textContent = inputSearchFrom.value;
  // console.log(items.fromStationLabel.textContent);
});
