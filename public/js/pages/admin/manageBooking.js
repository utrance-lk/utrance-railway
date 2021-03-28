let mydate;
let count=0;

const renderResults = function (trains,date){
    count=0;
    mydate=date;
    clearResults();
    trains.forEach(renderCard);
}


const renderCard = function (train){
    count++;

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
                    <div class='train-booking__stat-card--seating sleeping-berths'>
                        <div class='sleeping-berths__text'>
                            Sleeping berths
                        </div>
                        <div class='sleeping-berths__seatnos'>
                        ${train.sa_sleeping_births} / 30
                        </div>
                    </div>
                    <div class='train-booking__stat-card--seating observation'>
                        <div class='observation__text'>
                            OS
                        </div>
                        <div class='observation__seatnos'>
                        ${train.sa_observation_class} / 2
                        </div>
                    </div>
                    <a href='/utrance-railway/booking-train?id=${train.train_id}&date=${mydate}' class='btn btn-box-white'>
                        view
                    </a>
                </div>`;

            

                document.querySelector(".train-booking__stat-card--container").insertAdjacentHTML("beforeend", markup);
                 
                // if(document.querySelectorAll(".fcseats__seatnos")[count-1].innerText==="50 / 50"  && document.querySelectorAll(".scseats__seatnos")[count-1].innerText==="50 / 50" && document.querySelectorAll(".sleeping-berths__seatnos")[count-1].innerText==="30 / 30"
                // && document.querySelectorAll(".observation__seatnos")[count-1].innerText==="2 / 2")
                // {
                    
                // //     document.querySelectorAll(".block")[count-1].remove();
                // var element = document.querySelectorAll(".btn")[count-1];
                // element.remove();
                
                // }
}

const clearResults = function () {
    document.querySelector(".train-booking__stat-card--container").innerHTML = "";
    
  };