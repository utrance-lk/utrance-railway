let mydate;
let newcount;
let newmycount;

const renderResults = function (trains,date){
    newcount=0;
    newmycount=0
    mydate=date;
    clearResults();
    trains.forEach(myrenderCard);
}


const myrenderCard = function (train){
    newcount++;
    newmycount++;
    let markup = `<div class='train-booking__stat-card'>
                    <div class='train-booking__stat-card--train-id'>#${train.train_id}</div>
                    <div class='train-booking__stat-card--train-name'>${train.train_name}</div>
                    <div class='train-booking__stat-card--seating fcseats'>
                        <div class='fcseats__text'>
                            FC seats
                        </div>
                        <div class='fcseats__seatnos'>
                        ${train.sa_first_class} / 50
                        </div>
                    </div>
                    <div class='train-booking__stat-card--seating scseats'>
                        <div class='scseats__text'>
                            SC seats
                        </div>
                        <div class='scseats__seatnos'>
                        ${train.sa_first_class} / 50
                        </div>
                    </div>
                    
                    <a href='/utrance-railway/booking-train?id=${train.train_id}&date=${mydate}' id = 'bookMyId'class='btn btn-box-white'>
                        view
                    </a>
                </div>`;

            

                document.querySelector(".train-booking__stat-card--container").insertAdjacentHTML("beforeend", markup);
                 
                if(document.querySelectorAll(".fcseats__seatnos")[newcount-1].innerText==="50 / 50"  && document.querySelectorAll(".scseats__seatnos")[newcount-1].innerText==="50 / 50")
                {
                    
                var element = document.querySelectorAll(".btn-box-white")[newmycount-1];
                element.remove();
                newmycount--;
                
                }
}

const clearResults = function () {
    document.querySelector(".train-booking__stat-card--container").innerHTML = "";
    
  };