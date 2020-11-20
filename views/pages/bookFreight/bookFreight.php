<section class="freight__booking">
    <div class="topic">
        <div class="station__text-box">
            <span class="start__station">Matara</span>&nbsp;to&nbsp;<span class="destination__station">Galle</span>
        </div>
        <div class="journey__date-box">
            <span>journey date</span>&nbsp;–&nbsp;<span class="journey__date-day">
                <span class="day">28</span>
                <span class="day__upper">th</span>&nbsp;&nbsp;&nbsp;&nbsp;
            </span>
            <span class="journey__date-month">November</span>&nbsp;
            <span class="journey__date-year">2020</span>
        </div>
        <div class="journey__time-box">
            <span>journey time</span>&nbsp;–&nbsp;<span class="total__journey-time">1 hr</span>
        </div>
    </div>
    <div class="freight__form">
        <div class="freight__details-box">
            <div class="freight__type-container freight__detail--item">
                <label for="freight__type" class="freight__detail--item-label">Item type</label>
                <select name="freight__type" id="freight__type">
                    <option value="grains">Grains</option>
                    <option value="wood">Wood</option>
                </select>
            </div>
            <div class="freight__weight-container freight__detail--item">
                <label for="freight__weight" class="freight__detail--item-label">Weight group</label>
                <select name="freight__weight" id="freight__weight">
                    <option value="0-5">0-5 kg</option>
                    <option value="5-10">5-10 kg</option>
                    <option value="10-15">10-15 kg</option>
                </select>
            </div>
            <div class="freight__total freight__detail--item">
                <label for="freight__total" class="freight__detail--item-label">Total</label>
                <input type="text" value="Rs 50" disabled>
            </div>
        </div>
        <div class="seperator"></div>
        <div class="reciever__details-box">
            <div class="receiver__details--topic">Reciever details</div>
            <div class="receiver__details--name receiver__details--item">
                <label for="receiver_name">Reciever name</label>
                <input type="text" id="receiver_name" placeholder="A.D.D Perera" required>
            </div>
            <div class="receiver__details--contactno receiver__details--item">
                <label for="receiver_contactno">Reciever contact no</label>
                <input type="text" id="receiver_contactno" placeholder="07*123456" required>
            </div>
            <div class="receiver__details--email receiver__details--item">
                <label for="receiver_email">Reciever email</label>
                <input type="email" id="receiver_email" placeholder="dperera@example.com" required>
            </div>
            <div class="receiver__details--address receiver__details--item">
                <label for="receiver_address">Reciever address</label>
                <input type="text" id="receiver_address" placeholder="No 22, Sumana mw, Kotuwegoda, Matara" required>
            </div>
            <button class="btn__book-now">Book now</button>
        </div>
    </div>
</section>
