

<div class="load-content-container">
        <div class="load-content">
          <div class="load-content--settings">
            <div class="content-title">
              <p>New Train Profile Settings</p>
            </div>
            <form action="" class="form__train-data" method='post' enctype="multipart/form-data">
                <div class="content__fields">
                    <div class="trainname-box content__fields-item">
                        <label for="trainname" class="form__label">Train Name</label>
                        <input type="text" name="train_name" class="form__input" value=" " />
                    </div>
                    <div class="traintype-box content__fields-item">
                        <label for="traintype" class="form__label">Train Type</label>
                        <select name="train_type" id="train_type" class="form__input">
                            <option value="Express">Express</option>
                            <option value="Slow">Slow</option>
                            <option value="Intercity">Intercity</option>
                        </select>
                    </div>
                    <div class="routeid-box content__fields-item">
                        <label for="routeid" class="form__label">Route Id</label>
                        <input type="number" min="0" value="0" name="route_id" id="routeid" class="form__input number__input route-id__number-input">
                    </div>
                    <fieldset class="traintaveldays-box content__fields-item">
                        <legend class="form__label">Train Travel Days</legend>
                        <div class="traveldaysbox__container checkbox__horizontal">
                            <div class="">
                                <input type="checkbox" id="monday" name="train_travel_days[]" value="monday">
                                <label for="monday" class="checkbox__label">Mon</label>
                            </div>
                            <div class="">
                                <input type="checkbox" id="tuesday" name="train_travel_days[]" value="tuesday">
                                <label for="tuesday" class="checkbox__label">Tue</label>
                            </div>
                            <div class="">
                                <input type="checkbox" id="wednesday" name="train_travel_days[]" value="wednesday">
                                <label for="wednesday" class="checkbox__label">Wed</label>
                            </div>
                            <div class="">
                                <input type="checkbox" id="thursday" name="train_travel_days[]" value="thursday">
                                <label for="thursday" class="checkbox__label">Thurs</label>
                            </div>
                            <div class="">
                                <input type="checkbox" id="friday" name="train_travel_days[]" value="friday">
                                <label for="friday" class="checkbox__label">Fri</label>
                            </div>
                            <div class="">
                                <input type="checkbox" id="saturday" name="train_travel_days[]" value="saturday">
                                <label for="saturday" class="checkbox__label">Sat</label>
                            </div>
                            <div class="">
                                <input type="checkbox" id="sunday" name="train_travel_days[]" value="sunday">
                                <label for="sunday" class="checkbox__label">Sun</label>
                            </div>
                        </div>
                    </fieldset>
                    <div class="trainactive-box content__fields-item">
                        <label for="trainactive" class="form__label form__label--active">Active Status</label>
                        <input type="checkbox" name="train_active_status" id="trainactive" value="0">
                    </div>
                    <div class="freightallowed-box content__fields-item">
                        <label for="freightsallowed" class="form__label form__label--freights-allowed">Freights Allowed (Kg)</label>
                        <input type="checkbox" name="train_freights_allowed" id="freightsallowed" value="0">
                        <input type="number" min="0" value="0" name="train_total_weight" id="freights-quantity" class="form__input number__input freights-quantity__number-input">
                    </div>
                    <fieldset class="classess-box content__fields-item">
                        <legend class="form__label">Reservation Categories</legend>
                        <div class="reservation-categorybox__container checkbox__horizontal">
                            <div class="seatbox-firstclass reservation__category-item">
                                <label for="firstclass">First Class</label>
                                <input type="number" min="0" value="0" name="train_fc_seats" id="firstclass" class="form__input number__input">
                            </div>
                            <div class="seatbox-secondclass reservation__category-item">
                                <label for="secondclas">Second Class</label>
                                <input type="number" min="0" value="0" name="train_sc_seats" id="secondclass" class="form__input number__input">
                            </div>
                            <div class="seatbox-sleepingberths reservation__category-item">
                                <label for="sleepingberths">Sleeping Berths</label>
                                <input type="number" min="0" value="0" name="train_sleeping_berths" id="sleepingberths" class="form__input number__input">
                            </div>
                        </div> 
                        <div class="reservation-categorybox__container checkbox__horizontal">
                            <div class="seatbox-observation--saloon reservation__category-item">
                                <label for="observation-saloon">Observation Saloon</label>
                                <input type="hidden" name="train_observation_seats" value="0">
                                <input type="checkbox" name="train_observation_seats" id="observation-saloon" value="1" checked } >
                            </div> 
                        </div>          
                    </fieldset>
                    <div class="btn__save-box">
                    <button class="btn__save btn__add-train" type="submit">Add Train</button>
                        <!-- <div class="btn__save btn__add-train">Add Train</div> -->
                    </div>
                </div>
            </form>
          </div>
        </div>
        </div>
</div>


