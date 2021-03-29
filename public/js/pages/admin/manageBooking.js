let mydate;
let count;
let mycount;

const renderResults = function (trains,date){
    count=0;
    mycount=0
    mydate=date;
    clearResults();
    trains.forEach(renderCard);
}


const renderCard = function (train){
    count++;
    mycount++;
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
                    
                    <a href='/utrance-railway/booking-train?id=${train.train_id}&date=${mydate}' class='btn btn-box-white'>
                        view
                    </a>
                </div>`;

            

                document.querySelector(".train-booking__stat-card--container").insertAdjacentHTML("beforeend", markup);
                 
                if(document.querySelectorAll(".fcseats__seatnos")[count-1].innerText==="50 / 50"  && document.querySelectorAll(".scseats__seatnos")[count-1].innerText==="50 / 50")
                {
                    
                var element = document.querySelectorAll(".btn")[mycount-1];
                element.remove();
                mycount--;
                
                }
}

const clearResults = function () {
    document.querySelector(".train-booking__stat-card--container").innerHTML = "";
    
  };