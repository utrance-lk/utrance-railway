<div class="load-content-container js--load-content-container">
        <div class="load-content">
          <div class="load-content--manage-bookings">
            <form class="dashboard-searchbar--container" method='POST' action="/utrance-railway/users">

              <input
                type="text"
                class="dashboard-searchbar"
                placeholder="Search trains by name or id"  name="searchUserByNameOrId"
              />
              <svg class="search-icon__btn">
                <use xlink:href="/utrance-railway/public/img/pages/admin/svg/sprite.svg#icon-magnifying-glass"></use>
              </svg>
            </form>
            <div class="filters">
                <div class="date__picker">
                    <label for="date__select" class="select__date-label filter__label">Pick date</label>
                    <input type="date" class="date__selecting--box" name="date__select" value="2020-11-29">
                </div>
                <!-- <span class="seperator"></span>
                <div class="class__selector">
                    <label for="class__select" class="filter__label">Select class</label>
                    <select name="class__select" id="class__select" class="class__select">
                        <option value="first__class">first class</option>
                        <option value="second__class">second class</option>
                    </select>
                </div> -->
            </div>

            <div class="train-booking__stat-card--container">
                <div class="train-booking__stat-card">
                    <div class="train-booking__stat-card--train-id">#1</div>
                    <div class="train-booking__stat-card--train-name">Dakshina Intercity</div>
                    <div class="train-booking__stat-card--seating fcseats">
                        <div class="fcseats__text">
                            FC seats
                        </div>
                        <div class="fcseats__seatnos">
                            20 / 50
                        </div>
                    </div>
                    <div class="train-booking__stat-card--seating scseats">
                        <div class="scseats__text">
                            SC seats
                        </div>
                        <div class="scseats__seatnos">
                            30 / 50
                        </div>
                    </div>
                    <div class="train-booking__stat-card--seating sleeping-berths">
                        <div class="sleeping-berths__text">
                            Sleeping berths
                        </div>
                        <div class="sleeping-berths__seatnos">
                            2 / 10
                        </div>
                    </div>
                    <div class="train-booking__stat-card--seating observation">
                        <div class="observation__text">
                            OS
                        </div>
                        <div class="observation__seatnos">
                            1 / 1
                        </div>
                    </div>
                    <a href="/utrance-railway/booking-train" class="btn__view--bookings">
                        view
                    </a>
                </div>
                <div class="train-booking__stat-card">
                    <div class="train-booking__stat-card--train-id">#3</div>
                    <div class="train-booking__stat-card--train-name">Galu Kumari</div>
                    <div class="train-booking__stat-card--seating fcseats">
                        <div class="fcseats__text">
                            FC seats
                        </div>
                        <div class="fcseats__seatnos">
                            1 / 50
                        </div>
                    </div>
                    <div class="train-booking__stat-card--seating scseats">
                        <div class="scseats__text">
                            SC seats
                        </div>
                        <div class="scseats__seatnos">
                            22 / 50
                        </div>
                    </div>
                    <div class="train-booking__stat-card--seating sleeping-berths">
                        <div class="sleeping-berths__text">
                            Sleeping berths
                        </div>
                        <div class="sleeping-berths__seatnos">
                            10 / 10
                        </div>
                    </div>
                    <div class="train-booking__stat-card--seating observation">
                        <div class="observation__text">
                            OS
                        </div>
                        <div class="observation__seatnos">
                            0 / 1
                        </div>
                    </div>
                    <a href="/utrance-railway/booking-train" class="btn__view--bookings">
                        view
                    </a>
                </div>
            </div>

          </div>
        </div>
</div>
</div>