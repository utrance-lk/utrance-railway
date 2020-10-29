<div class="load-content-container">
        <div class="load-content">
          <div class="load-content--settings">
            <div class="content-title">
              <p>New Train Profile Settings</p>
            </div>
            <form action="" class="form__train-data">
                <div class="content__fields">
                    <div class="trainname-box content__fields-item">
                        <label for="trainname" class="form__label">Train Name</label>
                        <input type="text" name="trainname" class="form__input" />
                    </div>
                    <div class="traintype-box content__fields-item">
                        <label for="traintype" class="form__label">Train Type</label>
                        <select name="traintype" id="traintype" class="form__input">
                            <option value="express">Express</option>
                            <option value="express">Slow</option>
                            <option value="express">Intercity</option>
                        </select>
                    </div>
                    <div class="routeid-box content__fields-item">
                        <label for="routeid" class="form__label">Route Id</label>
                        <input type="number" min="0" value="0" name="routeid" id="routeid" class="form__input number__input route-id__number-input">
                    </div>
                    <fieldset class="traintaveldays-box content__fields-item">
                        <legend class="form__label">Train Travel Days</legend>
                        <div class="traveldaysbox__container checkbox__horizontal">
                            <div class="">
                                <input type="checkbox" id="monday" name="traveldays" value="monday">
                                <label for="monday" class="checkbox__label">Mon</label>
                            </div>
                            <div class="">
                                <input type="checkbox" id="tuesday" name="traveldays" value="tuesday">
                                <label for="tuesday" class="checkbox__label">Tue</label>
                            </div>
                            <div class="">
                                <input type="checkbox" id="wednesday" name="traveldays" value="monday">
                                <label for="wednesday" class="checkbox__label">Wed</label>
                            </div>
                            <div class="">
                                <input type="checkbox" id="thursday" name="traveldays" value="monday">
                                <label for="thursday" class="checkbox__label">Thurs</label>
                            </div>
                            <div class="">
                                <input type="checkbox" id="friday" name="traveldays" value="monday">
                                <label for="friday" class="checkbox__label">Fri</label>
                            </div>
                            <div class="">
                                <input type="checkbox" id="saturday" name="traveldays" value="monday">
                                <label for="saturday" class="checkbox__label">Sat</label>
                            </div>
                            <div class="">
                                <input type="checkbox" id="sunday" name="traveldays" value="monday">
                                <label for="sunday" class="checkbox__label">Sun</label>
                            </div>
                        </div>
                    </fieldset>
                    <div class="trainactive-box content__fields-item">
                        <label for="trainactive" class="form__label form__label--active">Active Status</label>
                        <input type="checkbox" name="trainactivestatus" id="trainactive" value="active">
                    </div>
                    <div class="freightallowed-box content__fields-item">
                        <label for="freightsallowed" class="form__label form__label--freights-allowed">Freights Allowed (Kg)</label>
                        <input type="checkbox" name="freightsallowed" id="freightsallowed" value="allowed">
                        <input type="number" min="0" value="0" name="freights-quantity" id="freights-quantity" class="form__input number__input freights-quantity__number-input">
                    </div>
                    <fieldset class="classess-box content__fields-item">
                        <legend class="form__label">Reservation Categories</legend>
                        <div class="reservation-categorybox__container checkbox__horizontal">
                            <div class="seatbox-firstclass reservation__category-item">
                                <label for="firstclass">First Class</label>
                                <input type="number" min="0" value="0" name="firstclass" id="firstclass" class="form__input number__input">
                            </div>
                            <div class="seatbox-secondclass reservation__category-item">
                                <label for="secondclas">Second Class</label>
                                <input type="number" min="0" value="0" name="secondclass" id="secondclass" class="form__input number__input">
                            </div>
                            <div class="seatbox-sleepingberths reservation__category-item">
                                <label for="sleepingberths">Sleeping Berths</label>
                                <input type="number" min="0" value="0" name="sleepingberths" id="sleepingberths" class="form__input number__input">
                            </div>
                        </div> 
                        <div class="reservation-categorybox__container checkbox__horizontal">
                            <div class="seatbox-observation--saloon reservation__category-item">
                                <label for="observation-saloon">Observation Saloon</label>
                                <input type="checkbox" name="observation-saloon" id="observation-saloon">
                            </div> 
                        </div>          
                    </fieldset>
                    <div class="btn__save-box">
                        <div class="btn__save btn__add-train">Add Train</div>
                    </div>
                </div>
            </form>
          </div>
        </div>
</div>