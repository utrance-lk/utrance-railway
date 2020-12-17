let trainsSet;
let trainnew;

var trainctive;
var i=0;
let k;

const renderResults = function (trains,y,l, page = 1, resPerPage = 4) {
  clearResults();
    // render results of current page
 console.log(l);
 console.log(y);
    trainnew=y;
   trainctive=l
    trainsSet = trains;
    const start = (page - 1) * resPerPage;
    const end = page * resPerPage;
  
    trains.slice(start, end).forEach(renderUser);
    

    renderButtons(page, trains.length, resPerPage);
    
  };
  
 

  const renderUser = function (train){
    if(trainctive==null && trainnew==null){
      newResult(train);
    }
    else if(train.train_type== trainnew && trainctive==null ){
      newResult(train);
    }else if(train.train_active_status==trainctive && trainnew==null){
      newResult(train);
    }else if(train.train_type=== trainnew && train.train_active_status===trainctive){
      newResult(train);
    }else if(trainctive=="all" && trainnew=="all"){
      newResult(train);
    }
    else if(train.train_type== trainnew && trainctive=="all" ){
      newResult(train);
    }else if(train.train_active_status==trainctive && trainnew=="all"){
      newResult(train);
    }

};

const newResult = function(train){
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
      renderResults(trainsSet,trainnew,trainctive, goToPage);
    }
  });

//  var y;
//   document.getElementById("train__type").addEventListener("change", function () {

//     y = train__type.value;
//     newResults(y);
    
//       console.log(y);
    
//   });
 
  
  // const newrenderUser = function (train){
  //   var y;
  // document.getElementById("train__type").addEventListener("change", function () {

  //   y = train__type.value;
  //   if(y!==null){
      
  //   }
  //     console.log(y); 
  // });
  // }
  


 









