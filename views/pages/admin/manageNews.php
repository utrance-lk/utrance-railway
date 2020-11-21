<style>
textarea {
  border-style: none;
  border-color: Transparent;
  overflow: auto;
  outline: none;
}
</style>



<div class="load-content-container">
        <div class="load-content">
          <div class="load-content--manage-trains">
            <div class="content-title">
              <p> Manage News</p>
            </div>
    
          <form action="/utrance-railway/manageNews" method="POST" >
          <div class="content__fields">

      

                <div class="emai-box content__fields-item">
                <label for="email" class="form__label">Headline</label>
                <input type="text" name="news_headline" class="form__input">
                </div>
              


            <fieldset class="classess-box content__fields-item">
                        <legend class="form__label">News Type</legend>
                        <div class="reservation-categorybox__container checkbox__horizontal">
                         
                            <div class="seatbox-sleepingberths reservation__category-item">
                                <label for="train_schedule">Train Schedule</label>
                                <input type="radio" value="train_schedule" name="details_type" id="train_schedule" >
                            </div>
                            <div class="seatbox-sleepingberths reservation__category-item">
                                <label for="ticket_price">Ticket Price</label>
                                <input type="radio" value="ticket_price" name="details_type" id="ticket_price" >
                            </div>
                            <div class="seatbox-sleepingberths reservation__category-item">
                                <label for="other">Other</label>
                                <input type="radio" value="other" name="details_type" id="other" >
                            </div>
                           
                        </div> 
                        <br>
                                
                    </fieldset>
              
                <fieldset class="classess-box content__fields-item">
                        <legend class="form__label">News</legend>
                
            
                <textarea rows="10" cols="60" name="detail" placeholder=" Enter the news here..."></textarea>
                </fieldset>
                
                <div class="btn__save-box">
                <input type="submit" class="btn__save btn-settings"  name="submit" value="Post"></div>


      
          </div>
          </div>
          </div>
          </form>
            
       
          </div>
        </div>
      </div>