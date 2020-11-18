<body>  
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
                <div class="train__booking-card">
                    <div class="train__number-box">
                        train 1
                    </div>
                    <div class="card__train-details card__item">
                        <div class="journey train__details-item">
                            <span class="journey__start-station">Matara</span> &ndash; <span class="journey__destination-station">Colombo Fort</span>
                        </div>
                        <div class="train__name train__details-item">
                            <span class="train__name--name">Dakshina Intercity</span><span class="train__type">express</span>
                        </div>
                        <div class="journey__start__end-time train__details-item">02 : 42 am - 05 : 21 am</div>
                        <div class="journey__time train__details-item">02 h 39 min</div>
                    </div>
                    <div class="seperator"></div>
                    <div class="card__persons card__item">
                        <input type="number" class="person__count" name="person__count" value="1" min="1" max="10"></input>&nbsp;<label for="person__count">person(s)</label>
                    </div>
                    <div class="seperator"></div>
                    <div class="card__class card__item">
                        <select name="train_class" id="train_class" class="train_class">
                            <option value="firstClass">first class</option>
                            <option value="secondClass">second class</option>
                        </select>
                    </div>
                    <div class="seperator"></div>
                    <div class="card__price card__item">
                        <span>Rs&nbsp;</span><span class="ticket__price">200</span>
                    </div>
                </div>
                <div class="train__booking-card">
                    <div class="train__number-box">
                        train 2
                    </div>
                    <div class="card__train-details card__item">
                        <div class="journey train__details-item">
                            <span class="journey__start-station">Colombo Fort</span> &ndash; <span class="journey__destination-station">Kandy</span>
                        </div>
                        <div class="train__name train__details-item">
                            <span class="train__name--name">Intercity (Kandy)</span><span class="train__type">express</span>
                        </div>
                        <div class="journey__start__end-time train__details-item">09 : 00 am - 11 : 31 am</div>
                        <div class="journey__time train__details-item">02 h 31 min</div>
                    </div>
                    <div class="seperator"></div>
                    <div class="card__persons card__item">
                        <input type="number" class="person__count" name="person__count" value="1" min="1" max="10"></input>&nbsp;<label for="person__count">person(s)</label>
                    </div>
                    <div class="seperator"></div>
                    <div class="card__class card__item">
                        <select name="train_class" id="train_class" class="train_class">
                            <option value="firstClass">first class</option>
                            <option value="secondClass">second class</option>
                        </select>
                    </div>
                    <div class="seperator"></div>
                    <div class="card__price card__item">
                        <span>Rs&nbsp;</span><span class="ticket__price">300</span>
                    </div>
                </div>
                <div class="total-price__box">
                    <span class="total-price__box--text">final amount&nbsp;&colon;</span>
                    <div class="card__price">
                        <span>Rs</span>&nbsp;<span class="ticket__price">500</span>
                    </div>
                </div>
                <button class="btn__submit">
                    Book now
                </button>
            </form>
        </div>

    