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
            </div>

            <div class="train-booking__stat-card--container">
                <div class="train-booking__stat-card">
                    <div class="train-booking__stat-card--train-id">#1</div>
                    <div class="train-booking__stat-card--train-name">Dakshina Intercity</div>
                    <div class="train-booking__stat-card--weight weight">
                        <div class="weight__text">
                            Weight
                        </div>
                        <div class="weight">
                            20 / 50 kg
                        </div>
                    </div>
                    <a href="/utrance-railway/freight-booking-train" class="btn__view--bookings">
                        view
                    </a>
                </div>
                <div class="train-booking__stat-card">
                    <div class="train-booking__stat-card--train-id">#3</div>
                    <div class="train-booking__stat-card--train-name">Galu Kumari</div>
                    <div class="train-booking__stat-card--weight weight">
                        <div class="weight__text">
                            Weight
                        </div>
                        <div class="weight">
                            20 / 50 kg
                        </div>
                    </div>
                    <a href="/utrance-railway/freight-booking-train" class="btn__view--bookings">
                        view
                    </a>
                </div>
            </div>

          </div>
        </div>
</div>
</div>