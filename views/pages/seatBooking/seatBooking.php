<div class="flex-col-stretch-center margin-t-m">
    <div class="flex-col-stretch-center margin-b-huge">
        <div class="heading-tertiary">
            <span>Matara</span>&nbsp;to&nbsp;<span>Kandy</span>
        </div>
        <div class="topic-greyed margin-b-xxs">
            <span>journey date</span>&nbsp;&ndash;&nbsp;<span class="seat-booking__day">
                <span>28</span>
                <span class="seat-booking__day-up">th</span>&nbsp;&nbsp;&nbsp;&nbsp;
            </span>
            <span>November</span>&nbsp;
            <span>2020</span>
        </div>
        <div class="topic-greyed">
            <span>journey time</span>&nbsp;&ndash;&nbsp;<span>6 hrs</span>
        </div>
    </div>
    <form action="#" class="seat-booking__form">
        <?php 
            include_once "../views/components/seatBookingCard.php";
            echo renderTrainBookingCard(1, 'Matara', 'Colombo Fort', 'Dakshina Intercity', 'express', '02:42 am', '05:21 am', '02h 39min', 400);
        ?>
        <div class="seat-booking__total-price">
            <span class="margin-r-xs">final amount&nbsp;&colon;</span>
            <div class="card__price">
                <span>Rs</span>&nbsp;<span class="ticket__price">500</span>
            </div>
        </div>
        <div class="seat-booking__btn-container">
            <button class="btn btn-round-blue">
                Book now
            </button>
        </div>
    </form>
</div>
