let usersSet;

const renderResults = function (users, page = 1, resPerPage = 4) {
    // render results of current page
    usersSet = users;
    const start = (page - 1) * resPerPage;
    const end = page * resPerPage;
  
    users.slice(start, end).forEach(renderUser);
  
    // document
    //   .querySelector(".search__results-container")
    //   .insertAdjacentHTML("beforeend", `<div class="btn__container"></div>`);
    // render pagination buttons
    renderButtons(page, users.length, resPerPage);
  };
  
var x="all";

  const renderUser = function (train){
    if(x=="all"){

    
    let markup=`<div class='search__result-card'>
    <div class='search__result-train-idbox'>#
  <span class='train__id ' name='id'>${train.train_id}</span></div>
  
  <div class='search__result-train-namebox'>${train.train_name}</div>
  <div class='search__result-train-typebox'>${train.train_type}</div>`;
  if(train.train_active_status==1){
    markup +=`<div class='search__result-train-typebox'>Active</div>`;
}else{
    markup +=`<div class='search__result-train-typebox'>Deactive</div>`;
}

markup +=`<a href='/utrance-railway/trains/view?id=${train.train_id}' class='btn btn-box-white margin-r-s'>
View</a>`;
if(train.train_active_status==1){
 
    markup +=`<a href='/utrance-railway/trains/Activated?id=${train.train_id}' class='btn btn-box-white btn-box-white--delete' id='isActive' onclick=\"return confirm('Are you sure?');\">
    Deactive</a></div></div>`;
}else{
    markup +=`<a href='/utrance-railway/trains/deleted?id=${train.train_id}' class='btn btn-box-white btn-box-white--delete' id='isActive' onclick=\"return confirm('Are you sure?');\">
    Active</a></div></div>`;
}

  // console.log(markup);
  document
    .querySelector(".search__results-container")
    .insertAdjacentHTML("beforeend", markup);
}
};

const clearResults = function () {
  document.querySelector(".search__results-container").innerHTML = "";
  document.querySelector(".btn__container").innerHTML = "";
};

// EVENT LISTNERS

document
  .querySelector(".btn__container")
  .addEventListener("click", function (e) {
    const btn = e.target.closest(".btn-round-pagination");
    if (btn) {
      clearResults();
      const goToPage = parseInt(btn.dataset.goto, 4);
      renderResults(usersSet, goToPage);
    }
  });

//  var y;
//   document.getElementById("train__type").addEventListener("change", function () {

//     y=train__type.value;
  
//   });
//   console.log(y); 

 
//   const train__type = document.getElementById("train__type");
//   train__type.addEventListener("change", () => {

//     accInfo = train__type.value;
   
// })

// console.log(accInfo);
let train;
const train__type = document.querySelector('#train_type');
document.addEventListener("change",function(e){
    if(e.target===train__type){
         train=train__type.value;
         console.log(train);
    }
});





