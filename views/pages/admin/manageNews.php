<style>
/* 
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
} */
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
    <div class="dash-content__container">
      <div class="dash-content">
        <div class="heading-secondary margin-b-m margin-t-m">
          <p class="center-text">Manage News</p>
        </div>

        <form action="/utrance-railway/manage-news" method="POST" >
          <fieldset class="margin-b-xs">
            <legend class="topic-greyed topic-greyed--dark padding-xxs">News Type</legend>
            <div class="flex-row-sa-center margin-tb-s">
              <div>
                  <label for="train_schedule">Train Schedule</label>
                  <input type="radio" value="train_schedule" name="details_type" id="train_schedule" >
              </div>
              <div>
                  <label for="ticket_price">Ticket Price</label>
                  <input type="radio" value="ticket_price" name="details_type" id="ticket_price" >
              </div>
              <div>
                  <label for="other">Other</label>
                  <input type="radio" value="other" name="details_type" id="other" >
              </div>
            </div>                   
          </fieldset>
             
          <fieldset class="margin-b-xs">
            <legend class="topic-greyed topic-greyed--dark padding-xxs">News</legend>
            <div class="flex-col-sa-center margin-tb-s">
              <div class="dash-content__input width-full padding-lr-s">
                <input type="text" name="news_headline" class="form__input" placeholder="Headline">
              </div>
              <textarea class="textinput" rows="10" cols="60" name="detail" placeholder=" Enter the news here..."></textarea>
            </div>
          </fieldset>

          <fieldset class="margin-b-xs">
            <legend class="topic-greyed topic-greyed--dark padding-xxs">Image</legend>   
            <div class="">
              <img 
                src="/public/img/pages/admin/train.jpg"
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
              <label for="photo" class="btn-square-upload margin-b-s">Choose Photo</label>
            </div>
          </fieldset>

          <button class="btn btn-round-blue margin-b-l margin-t-s" type="submit">Post</button>

        </form>
      </div>
          
    </div>
        </div>
      </div>