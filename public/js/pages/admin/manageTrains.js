
let trainsSet;
let trainnew;
let Mycount;

var trainctive;
var i = 0;
let k;

const renderResults = function (trains, y, l, page = 1, resPerPage = 4) {
  clearResults();
  Mycount=0;
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
  Mycount++;
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

              // if(document.querySelectorAll(".fcseats__seatnos")[count-1].innerText==="50 / 50"  && document.querySelectorAll(".scseats__seatnos")[count-1].innerText==="50 / 50" && document.querySelectorAll(".sleeping-berths__seatnos")[count-1].innerText==="30 / 30"
                // && document.querySelectorAll(".observation__seatnos")[count-1].innerText==="2 / 2")
                // {
                  let newindex = train.train_id;
                
                  $(document).ready(function(){
                   
                    if(document.querySelectorAll(".btn-box-white--delete")[Mycount-1].innerText == "Deactivate"){
                      $.ajax({
                        url:'getNewBookingTrain',
                        method:'post',
                        data:{index1:newindex}
                      }).done(function(train){
                        console.log(train)
                        trains=JSON.parse(train)
                        if(trains.length==0){
                          var element = document.querySelectorAll(".btn-box-white--delete")[Mycount-1];
                              element.remove();

                        }
                        
                      })
                      
                    }
                      
                    
                  });
                    
                // //     document.querySelectorAll(".block")[count-1].remove();
                // var element = document.querySelectorAll(".btn")[count-1];
                // element.remove();
                
                // }

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