<style>

.textinput {
    float: left;
    width: 100%;
    min-height: 75px;
    outline: none;
    resize: none;
    border: 1px solid grey;
    border-style: none;
    border-color: Transparent;
    overflow: auto;
    outline: none;
}
.newsimage {
    float: left;
    width: 100%;
    min-height: 75px;
    outline: none;
    resize: none;
    border: 1px solid grey;
    border-style: none;
    border-color: Transparent;
    overflow: auto;
    outline: none;
}
</style>

<div class="dashboard">
    <?php include_once '../views/layouts/adminSideNav.php';?>

<div class="load-content-container ">
        <div class="load-content">
          <div class="load-content--manage-trains">
            <div class="content-title">
              <p> Manage News</p>
            </div>
    
          <form action="/utrance-railway/manage-news" method="POST" >
          <div class="content__fields">

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
                <div class="emai-box content__fields-item">
             
                <input type="text" name="news_headline" class="form__input" placeholder="Headline">
                </div>
                <textarea class="textinput" rows="10" cols="60" name="detail" placeholder=" Enter the news here..."></textarea>
                </fieldset>
                <fieldset class="classess-box content__fields-item">
                <legend class="form__label">Image</legend>
                
                <div class="">
                 <img 
                    src="../../../../utrance-railway/public/img/pages/admin/train.jpg"
                    alt="news-picutre"
                    class="newsimage"
                  />
                    <input
                    type="file"
                    name="photo"
                    accept="image/*"
                    class="form__upload"
                    id="photo"
                  />
                  <label for="photo">Choose Photo</label>
                </div>
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