<div class="booking__container">
    <div class="topic">
        <div class="station__text-box">
            <span class="start__station">Matara</span>&nbsp;to&nbsp;<span class="destination__station">Kandy</span>
        </div>
        <div class="journey__date-box">
            <span>journey date</span>&nbsp;&ndash;&nbsp;<span class="journey__date-day">
                <span class="day">28</span>
                <span class="day__upper">th</span>&nbsp;&nbsp;&nbsp;&nbsp;
            </span>
            <span class="journey__date-month">November</span>&nbsp;
            <span class="journey__date-year">2020</span>
        </div>
        <div class="journey__time-box">
            <span>journey time</span>&nbsp;&ndash;&nbsp;<span class="total__journey-time">6 hrs</span>
        </div>
    </div>
    <form action="#" class="booking__form">
        <?php 
            include_once "../views/components/seatBookingCard.php";
            echo renderTrainBookingCard(1, 'Matara', 'Colombo Fort', 'Dakshina Intercity', 'express', '02:42 am', '05:21 am', '02h 39min', 400);
        ?>
        <div class="total-price__box">
            <span class="total-price__box--text">final amount&nbsp;&colon;</span>
            <div class="card__price">
                <span>Rs</span>&nbsp;<span class="ticket__price">500</span>
            </div>
        </div>
        <div class="btn__container">
            <button class="btn btn-round-blue">
                Book now
            </button>
        </div>
    </form>
</div>
