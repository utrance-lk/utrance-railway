let trainsSet;
let trainnew;

var trainctive;
var i = 0;
let k;

const renderResults = function (trains, y, l, page = 1, resPerPage = 4) {
  clearResults();
  // render results of current page
  trainnew = y;
  trainctive = l;
  trainsSet = trains;
  const start = (page - 1) * resPerPage;
  const end = page * resPerPage;

  trains.slice(start, end).forEach(renderUser);

  renderButtons(page, trains.length, resPerPage);
};

const renderUser = function (train) {
  let markup = `<div class='manage-trains__result-card margin-b-m'>
                  <div class='manage-trains__card-item--train-id'>#<span name='id'>${train.train_id}</span></div>
                  <div class='manage-trains__card-item--train-name'>${train.train_name}</div>
                  <div>${train.train_type}</div>`;

  if (train.train_active_status == 1) {
    markup += `<div>Active</div>`;
  } else {
    markup += `<div>Deactive</div>`;
  }

  markup += `<a href='/utrance-railway/trains/view?id=${train.train_id}' class='btn btn-box-white margin-r-s'>View</a>`;

  if (train.train_active_status == 1) {
    markup += `<a href='/utrance-railway/trains/Deactivated?id=${train.train_id}' class='btn btn-box-white btn-box-white--delete' id='isActive' onclick=\"return confirm('Are you sure?');\">
      Deactivate</a>`;
  } else {
    markup += `<a href='/utrance-railway/trains/Activated?id=${train.train_id}' class='btn btn-box-white btn-box-white--activate' id='isActive' onclick=\"return confirm('Are you sure?');\">
      Activate</a>`;
  }

  markup += `</div></div>`;

  document
    .getElementById("manage-trains__search-results")
    .insertAdjacentHTML("beforeend", markup);
};

const clearResults = function () {
  document.getElementById("manage-trains__search-results").innerHTML = "";
  document.getElementById("pagination").innerHTML = "";
};

// EVENT LISTNERS

document
  .getElementById("pagination")
  .addEventListener("click", function (e) {
    const btn = e.target.closest(".btn-round-pagination");
    if (btn) {
      clearResults();
      const goToPage = parseInt(btn.dataset.goto, 4);
      renderResults(trainsSet, trainnew, trainctive, goToPage);
    }
  });