let newStations = [];
let newnewStations = [];
let emptyStations=0;


function addStops(x) {
  document.querySelectorAll(".stop-card__add-btn").forEach(function (item) {
    item.addEventListener("click", function (e) {

      const isAvailPopup = document.querySelector(".add-stop-popup");
      if (!isAvailPopup) {
        const parent = e.target.closest(".stop-card");
        console.log(parent);
      //  console.log(parent.firstChild.firstChild.innerText.split("#")[1] * 1);
        const markup = `
        <style>
        .autocom-box li{
          display: none;  
        }
        .add-stop-popup__station.active .autocom-box li{
          display: block;
        }
        </style>
        
                        <div class="add-stop-popup margin-t-s margin-b-s">
                            <form action="#" class="add-stop-popup__form ser">
                              <div class="wrapper">
                                <div class="add-stop-popup__station">
                                  <input type="text" class="add-stop-popup__station--input">
                                  <div class="autocom-box">
                                     <li>matara</li>
                                     <li>colombo</li>
                                  </div>
                                </div>
                                </div>
                                <div class="add-stop-popup__arr-time">
                                    <input id="arrtime" type="time" class="add-stop-popup__arr-time--input" value="" required>
                                </div>
                                <div class="add-stop-popup__dept-time">
                                    <input id="deptime" type="time" class="add-stop-popup__dept-time--input" value="" required>
                                </div>
                                <button id = "addButton" class="add-stop-popup__btn-add-station btn-square-small">
                                    Add Station
                                </button>
                            </form>
                            <div class="add-stop-popup__close-btn">
                                <svg class="close-icon">
                                    <use xlink:href='/utrance-railway/public/img/svg/sprite2.svg#icon-clear'></use>
                                </svg>
                            </div>
                        </div>
            `;
        parent.insertAdjacentHTML("afterend", markup);

///////////////////////////////start validation///////////////////////////////////////////
        // let newindex5= parent.firstChild.firstChild.innerText.split("#")[1] * 1;
       
        $(document).ready(function(){
          $("#arrtime").click(function(){
            // let newindex5= parent.firstChild.childNodes;
            let newindex5= parent.querySelector(".stop-card__details").querySelector(".stop-card__dept-time").innerText;
            console.log(newindex5);
            // console.log(newindex5[2]);
            document.querySelector(".add-stop-popup__arr-time--input").min = newindex5;
            
            let newIndexMax = parent.parentNode.nextElementSibling.querySelector(".stop-card__arr-time").innerText;
            console.log(newIndexMax);
            document.querySelector(".add-stop-popup__arr-time--input").max = newIndexMax;
          })
        });

        $(document).ready(function(){
          $("#deptime").click(function(){
            
            
            
            let newIndexMax = parent.parentNode.nextElementSibling.querySelector(".stop-card__arr-time").innerText;
            console.log(newIndexMax);
            document.querySelector(".add-stop-popup__dept-time--input").max = newIndexMax;
          })
        });

        document.querySelector( ".add-stop-popup__dept-time--input").addEventListener("change", function (){

          if(document.querySelector("#myerror")!=null){
            document.querySelector("#myerror").remove();
          }
          
          document.querySelector(".add-stop-popup__dept-time--input").min = document.getElementById("arrtime").value;
          console.log(document.getElementById("arrtime").value);
          var startDate = document.getElementById("arrtime").value;
          var endDate = document.getElementById("deptime").value;
          var nextCardStartDate = document.querySelector(".add-stop-popup__dept-time--input").max;
          var time1Date= new Date("01/01/2000 "+startDate);
          var time2Date= new Date("01/01/2000 "+endDate); 
          var time3Date= new Date("01/01/2000 "+nextCardStartDate);
          // if (time1Date >= time2Date) { alert("Please enter proper date") }
          // if (time2Date >= time3Date) { alert("Please enter proper date") }
          const newmarkup = `<p id ="myerror">error found</p>`;
          const newx = document.querySelector( ".add-stop-popup");
          if (time1Date >= time2Date) { 
             newx.insertAdjacentHTML("beforebegin", newmarkup);
            document.getElementById("addButton").disabled = true;
         }else if(time2Date >= time3Date){
          newx.insertAdjacentHTML("beforebegin", newmarkup);
            document.getElementById("addButton").disabled = true;
         }
         else if(document.querySelector(".add-stop-popup__arr-time--input").value != "" && emptyStations!=0){
         
          document.getElementById("addButton").disabled = false;
         }
        });

        document.querySelector( ".add-stop-popup__arr-time--input").addEventListener("change", function (){

        
        if(document.querySelector("#myerror")!=null){
          document.querySelector("#myerror").remove();
        }

          var startDate = document.querySelector(".add-stop-popup__arr-time--input").min;
          var endDate = document.getElementById("arrtime").value;
          var nextCardStartDate = document.querySelector(".add-stop-popup__arr-time--input").max;
          var time1Date= new Date("01/01/2000 "+startDate);
          var time2Date= new Date("01/01/2000 "+endDate); 
          var time3Date= new Date("01/01/2000 "+nextCardStartDate);

          const newmarkup = `<p id ="myerror">error found</p>`;
          const newx = document.querySelector( ".add-stop-popup");
          if (time1Date >= time2Date) { 
             newx.insertAdjacentHTML("beforebegin", newmarkup);
            document.getElementById("addButton").disabled = true;
         }else if(time2Date >= time3Date){
          newx.insertAdjacentHTML("beforebegin", newmarkup);
            document.getElementById("addButton").disabled = true;
         }
         else if(document.querySelector(".add-stop-popup__dept-time--input").value != "" && emptyStations!=0){
         
          document.getElementById("addButton").disabled = false;
         }
          // if (time2Date >= time3Date) { 
          //   alert("Please enter proper date");
          // }else{
          //   document.getElementById("addButton").disabled = false;
          // }

          

        });
     
        if(document.querySelector(".add-stop-popup__arr-time--input").value == ""){
          document.getElementById("addButton").disabled = true;
        }
        else if(document.querySelector(".add-stop-popup__dept-time--input").value == ""){
          document.getElementById("addButton").disabled = true;
        }else if(emptyStations==0){
          document.getElementById("addButton").disabled = true;
        }else{
          document.getElementById("addButton").disabled = false;
        }
//////////////////////////////////end validation/////////////////////////
        const popupCloseBtn = document.querySelector(
          ".add-stop-popup__close-btn"
        );


        popupCloseBtn.addEventListener("click", function (elem) {
          const popup = elem.target.closest(".add-stop-popup");
          popup.parentNode.removeChild(popup);
        });

        document
          .querySelector(".add-stop-popup__btn-add-station")
          .addEventListener("click", function (elem) {
            const stationName = document.querySelector(
              ".add-stop-popup__station--input"
            ).value;
            let arrTime = document.querySelector(
              ".add-stop-popup__arr-time--input"
            ).value;
            let deptTime = document.querySelector(
              ".add-stop-popup__dept-time--input"
            ).value;



            const parentPathId =
              parent.children[0].children[0].innerText.split("#")[1] * 1;
           
            let pathId = parentPathId + 1
            const obj = {
              stationName,
              arrTime,
              deptTime,
              pathId,
            };


            let l = 0;


            for (let i = 0; i < newStations.length; i++) {
              let car = newStations[i];
              if (car.pathId >= pathId) {
                l++;

              }

            }
            console.log(l);

            if (l != 0) {
              for (let n = 0; n < newStations.length; n++) {

                if (newStations[n].pathId >= pathId) {
                  newStations[n].pathId++;
                  // console.log(newStations[n]);  
                }


              }



            }
            newStations.push(obj);
          

            console.log(newStations);


           
            
            arrTime = timeConversion(arrTime);
            deptTime = timeConversion(deptTime);
          
            // const isBackOdd = parent.classList.value
            //   .split(" ")
            //   .includes("back-odd");

            const isBackOdd = parent.classList.contains("back-odd");

            const html = `
                    <div class="stop-card ${isBackOdd ? "back-even" : "back-odd"
              }">
                        <div class="stop-card__details">
                            <div class="stop-card__path-id">
                                #${parentPathId + 1}
                            </div>
                            <div class="stop-card__station">
                                ${stationName}
                            </div>
                            <div class="stop-card__arr-time">
                                ${arrTime}
                            </div>
                            <div class="stop-card__dept-time">
                                ${deptTime}
                            </div>
                        </div>
                        <div class="stop-card__add-btn">
                            <svg class="add-icon">
                                <use xlink:href='/utrance-railway/public/img/svg/sprite2.svg#icon-add_circle_outline'></use>
                            </svg>
                        </div>
                    </div>
                `;

            const popup = elem.target.closest(".add-stop-popup");
            popup.parentNode.removeChild(popup);
            parent.insertAdjacentHTML("afterend", html);

            changePathIdAndBG(parentPathId + 1);
            addStops(x);
           
          });
          
      }
      myfun(x);
      // const items = { 
      //   inputDate: document.querySelector(".add-stop-popup__arr-time--input"),
      // };

      // items.inputDate.value = today;
      // items.inputDate.min = today;
        
      // document.querySelector(".add-stop-popup").style.display = 'flex';
    });

  });  
}

// console.log(popupCloseBtn);

const changePathIdAndBG = function (changedPathId) {
  let pathIdCount = 0;
  document.querySelectorAll(".stop-card").forEach(function (e) {
    const pathId = e.children[0].children[0].innerText.split("#")[1] * 1;
    if (pathId === changedPathId) {
      pathIdCount += 1;
    }
    if (pathIdCount === 2) {
      e.children[0].children[0].innerHTML = `#${pathId + 1}`;
      e.classList.toggle("back-odd");
      e.classList.toggle("back-even");
    }
  });
};

const timeConversion = function (time)
 {
  const arrTimeHour = time.split(":")[0] * 1;

  if (arrTimeHour < 12) {
    return `${time} AM`;
  }

  return `0${arrTimeHour - 12}:${time.split(":")[1]} PM`;
};



function myfun(x){
  var suggestions = [];

  $(document).ready(function(){
    $(".add-stop-popup__station--input").click(function(){
         
      let newRoutID=x;
      $.ajax({
        url:'newmanageRoutesValidations',
        method:'post',
        data:{index1:newRoutID},
        success : function (data){
          train=JSON.parse(data)
          
          let stationLength = document.querySelectorAll(".stop-card").length;
          console.log(stationLength);
          // for(let j=0;j<stationLength;j++){
           
          //    console.log(document.querySelectorAll(".stop-card")[j].querySelector(".stop-card__station").innerText);
                
          // }
          
          for(let i=0;i<train.length;i++){
            var validStations=0;
            for(let j=0;j<stationLength;j++){
                   if(document.querySelectorAll(".stop-card")[j].querySelector(".stop-card__station").innerText==train[i]['station_name']){
                    validStations++;
                  
                   }    
            }
            if(validStations==0){
              suggestions.push(train[i]['station_name']);
            }


          }
        }

      })
  
    }) 
  })




const searchWrapper = document.querySelector(".add-stop-popup__station");
const inputBox = searchWrapper.querySelector("input");
const suggBox = searchWrapper.querySelector(".autocom-box");

// const suggestions = [
//   "Matara",
//     "Colombo Fort",
//     "Galle",
//     "Katugoda",
//     "Gampaha",
//     "Kandy",
//     "Puttalam",
//     "Aluthgama",
//     "Midigama",
//     "Weligama",
//     "Avissawella",
//     "Beliatta",
//     "Wewurukannala",
//     "Kekanadura",
//     "Maradana",
//     "Kalutara",
//     "Kegalle",
// ];

inputBox.onkeyup = (e)=>{
  function getUnique(array){
    var uniqueArray = [];
    
    // Loop through array values
    for(i=0; i < array.length; i++){
        if(uniqueArray.indexOf(array[i]) === -1) {
            uniqueArray.push(array[i]);
        }
    }
    return uniqueArray;
}


  
  let userData = e.target.value;
  let emptyArray = [];
  if(userData){
    emptyArray = suggestions.filter((data)=>{
      return data.toLocaleLowerCase().startsWith(userData.toLocaleLowerCase()); 
    });

    emptyArray = getUnique(emptyArray);
    emptyArray = emptyArray.map((data)=>{
      return data = '<li>'+ data +'</li>';
    });
    console.log(emptyArray);

    searchWrapper.classList.add("active");
    showSuggestions(emptyArray); 
    let allList = suggBox.querySelectorAll("li");
        for (let i = 0; i < allList.length; i++) {
            //adding onclick attribute in all li tag
            allList[i].setAttribute("onclick", "selected(this)");
            
        }
       
  }else{
    searchWrapper.classList.remove("active"); //hide autocomplete box
}


}


function showSuggestions(list){
  let listData;
  if(!list.length){
      // userValue = inputBox.value;
      // listData = '<li>'+ userValue +'</li>';
  }else{
      listData = list.join('');
  }
  suggBox.innerHTML = listData;
}

}



function selected(element){
  
  emptyStations++;
  if(document.querySelector(".add-stop-popup__dept-time--input").value != "" && document.querySelector(".add-stop-popup__arr-time--input").value != ""){
         
    document.getElementById("addButton").disabled = false;
   }



  const searchWrapper = document.querySelector(".add-stop-popup__station");
  const inputBox = searchWrapper.querySelector("input");
  const suggBox = searchWrapper.querySelector(".autocom-box");
  let selectUserData = element.textContent;
  inputBox.value = selectUserData;
  searchWrapper.classList.remove("active");
  
};

