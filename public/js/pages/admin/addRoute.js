let newStations = [];
// import { items } from "./components.js";

// let stopValues;

// export const renderAddStation = function(stopsCount) {
//     // items.addRouteBtn.style.display = "none";
//     const markup = `
//     <div class="search__result-card addStop-card" id="js--addStop-card">
//         <div class="addstation-box addStop-card-item">
//             <div class="station-heading">
//                 Station
//             </div>
//             <input type="text" class="station-search addStop-card-item--input" id="js--station-search" required>
//         </div>
//         <div class="arrivaltime-box addStop-card-item">
//             <div class="arrival-heading">
//                 Arrival Time
//             </div>
//             <input type="time" class="arrivaltime-add addStop-card-item--input" id="js--arrivaltime-add" required>
//         </div>
//         <div class="depttime-box addStop-card-item">
//             <div class="dept-heading">
//                 Departure Time
//             </div>
//             <input type="time" class="departtime-add addStop-card-item--input" id="js--departtime-add" required>
//         </div>
//         <div class="addstop-btn-box btn-white" id="js--addstop-btn-box">
//             Add
//         </div>
//     </div>
//     `;
//     items.addStopContainer.insertAdjacentHTML('beforeend', markup);
//     document.getElementById("js--addstop-btn-box").addEventListener("click", function () {

//         // addRoute.displayAddedStop(inputValues);
//         const inputValues = {
//             inputStation: document.getElementById("js--station-search").value,
//             arrivalTime: document.getElementById("js--arrivaltime-add").value,
//             departureTime: document.getElementById("js--departtime-add").value
//         };

//         if(!inputValues.inputStation) {
//             return alert('Input the station!!');
//         } else if(!inputValues.arrivalTime) {
//             return alert('Input arrival time!!');
//         } else if(!inputValues.departureTime) {
//             return alert('Input departure time!!');
//         }

//         // stopsArray.push(inputValues);

//         // console.log(stopsArray);

//         stopValues = inputValues;

//         displayAddedStop(inputValues, stopsCount);
//         items.addStopBtn.style.display = "flex";
//         items.addRouteBtn.style.display = "block";
//       });
// }

// export const stopDetails = function() {
//     return stopValues;
// }

// const displayAddedStop = function(inputValues, stopsCount) {
//     const markup = `
//         <div class="search__result-card added__stops-card" id="js--added__stops-card">
//             <div class="stopadd__id-box"># <span>${++stopsCount}</span> </div>
//             <div class="stopadd__station-box">${inputValues.inputStation}</div>
//             <div class="stopadd__arrivaltime-box">${
//               inputValues.arrivalTime
//             }</div>
//             <div class="stopadd__departuretime-box">${
//               inputValues.departureTime
//             }</div>
//             <svg class="stop__delete-btn" id="js--stop__delete-btn">
//                 <use xlink:href="/utrance-railway/public/img/pages/admin/svg/sprite.svg#icon-cross"></use>
//             </svg>
//         </div>
//     `;
//     items.addedStopsCardContainer.insertAdjacentHTML('beforeend', markup);
//     const el = document.getElementById("js--addStop-card");
//     el.parentNode.removeChild(el);

//     document
//       .getElementById("js--stop__delete-btn")
//       .addEventListener("click", function (e) {
//         deleteAddedStop(e);
//       });
// }

// export const sendData = function() {

// }

// const deleteAddedStop = function(e) {
//     // e.preventDefault();
//     // e.target.closest("#js--added__stops-card").style.display = 'none';
//     // e.target.closest("#js--added__stops-card").remove();
//     // e.target.parentNode.parentNode.removeChild(e.target.parentNode);
// }

function renderAddStation() {
    return `
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
}

function addRouteEvents() {
    const addFirstStopElement = document.getElementById("add-first-stop");
    addFirstStopElement.addEventListener('click', function() {
        addFirstStopElement.parentNode.removeChild(addFirstStopElement);
    });
    const addRouteElement = document.getElementById("add-first-stop");
    addRouteElement.insertAdjacentHTML('afterend', renderAddStation());


    if(document.querySelector(".add-stop-popup__arr-time--input").value == ""){
        // newx.insertAdjacentHTML("beforebegin", newmarkup);
        document.getElementById("addButton").disabled = true;
        document.getElementById("addButton").style.opacity = "0.5";
    }
    if(document.querySelector(".add-stop-popup__dept-time--input").value == ""){
        // newx.insertAdjacentHTML("beforebegin", newmarkup);
        document.getElementById("addButton").disabled = true;
        document.getElementById("addButton").style.opacity = "0.5";
    } 
    if(document.querySelector(".add-stop-popup__station--input").value == ""){
        // newx.insertAdjacentHTML("beforebegin", newmarkup);
        document.getElementById("addButton").disabled = true;
        document.getElementById("addButton").style.opacity = "0.5";
    }

    

    document.querySelector( ".add-stop-popup__dept-time--input").addEventListener("change", function (){
        if(document.querySelector("#myerror")!=null){
            document.querySelector("#myerror").remove();
          }
            const newmarkup = `<p id ="myerror">error found</p>`;
            const newx = document.querySelector( ".add-stop-popup");
            var endDate = document.getElementById("arrtime").value;
            var startDate =  document.getElementById("deptime").value;
            var time1Date= new Date("01/01/2000 "+startDate);
            var time2Date= new Date("01/01/2000 "+endDate);

            if (time2Date >= time1Date){
                newx.insertAdjacentHTML("beforebegin", newmarkup);
                document.getElementById("addButton").disabled = true;
                document.getElementById("addButton").style.opacity = "0.5";
                
            }
        if(document.querySelector(".add-stop-popup__arr-time--input").value != "" && document.querySelector(".add-stop-popup__dept-time--input").value != "" && document.querySelector(".add-stop-popup__station--input").value != "" && document.querySelector("#myerror")==null){
          
            document.getElementById("addButton").disabled = false;
            document.getElementById("addButton").style.opacity = "1";
        }

    });

    document.querySelector( ".add-stop-popup__arr-time--input").addEventListener("change", function (){

           
        if(document.querySelector(".add-stop-popup__arr-time--input").value != "" && document.querySelector(".add-stop-popup__dept-time--input").value != "" && document.querySelector(".add-stop-popup__station--input").value != ""){
           
            document.getElementById("addButton").disabled = false;
            document.getElementById("addButton").style.opacity = "1";


        }
    });
    $(".add-stop-popup__station--input").on("input", function(e){
        if(document.querySelector(".add-stop-popup__arr-time--input").value != "" && document.querySelector(".add-stop-popup__dept-time--input").value != "" && document.querySelector(".add-stop-popup__station--input").value != ""){
        
            document.getElementById("addButton").disabled = false;
            document.getElementById("addButton").style.opacity = "1";
        }
    });
    
    
      


  ////hasani////////
    document
    .querySelector(".add-stop-popup__btn-add-station")
    .addEventListener("click", function (elem){
        const stationName = document.querySelector(
            ".add-stop-popup__station--input"
            ).value;
            let arrTime = document.querySelector(
            ".add-stop-popup__arr-time--input"
            ).value;
            let deptTime = document.querySelector(
            ".add-stop-popup__dept-time--input"
            ).value;


            let pathId =1;          
        const obj = {
        stationName,
        arrTime,
        deptTime,
        pathId,
        };
        
    newStations.push(obj);
    arrTime = timeConversion(arrTime);
    deptTime = timeConversion(deptTime);

    isBackOdd = "false";

    const html = `
                        <div class="stop-card back-odd">
                        <div class="stop-card__details">
                            <div class="stop-card__path-id">
                                #${1}
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
                        <div class="stop-card__add-btn id = "hhh">
                            <svg class="add-icon">
                                <use xlink:href='/utrance-railway/public/img/svg/sprite2.svg#icon-add_circle_outline'></use>
                            </svg>
                        </div>
                    </div>
                `;
             

                let myobj = document.querySelector(".add-stop-popup")
                myobj.remove();
                const newaddRouteElement = document.querySelector(".dash-content__input");
                newaddRouteElement.insertAdjacentHTML('afterend', html);
                console.log(document.querySelector(".stop-card"));
                addStops(39);

                if(newStations.length==1){
                    console.log(newStations.length);
                    document.getElementById("updatebutton").disabled = true;
                    document.getElementById("updatebutton").style.opacity = "0.5";
                }

              

            });
     
            myfun1();
                // const newmarkup = `<p id ="myerror">error found</p>`;
                // const newx = document.querySelector( ".add-stop-popup");
                
               
             

                 
}

const timeConversion = function (time) {
    const arrTimeHour = time.split(":")[0] * 1;
  
    if (arrTimeHour < 12) {
      return `${time} AM`;
    }
  
    return `${arrTimeHour - 12}:${time.split(":")[1]} PM`;
  };


  function myfun1(){
    var suggestions = [];


    $(document).ready(function(){
        $(".add-stop-popup__station--input").click(function(){
             
          
          $.ajax({
            url:'addnewmanageRoutesValidations',
            method:'get',
            success : function (data){
                console.log(data);
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


