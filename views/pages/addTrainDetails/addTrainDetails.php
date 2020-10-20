
    <div id="user_header" >
        <tex style="padding-left: 20px;">Add Train Details</tex>
    </div>
    <div id="divAll">
<form action="" method="post">
    <div id="update_train_form">
    <div class="names">
        <text class="text_type">Train ID</text>
       <input type="text" class="input_train_details" style="margin-left: 25rem;">
    </div>
    <div class="names">
        <text class="text_type">Route ID</text>
       <input type="text" class="input_train_details" style="margin-left: 24rem;">
    </div>
    <div class="names">
        <text class="text_type"> Total Frieght Weight</text>
       <input type="text" class="input_train_details" style="margin-left: 11.2rem;">
    </div>
    <div class="names">
        <text class="text_type">Train Name</text>
       <input type="text" class="input_train_details" style="margin-left: 21rem;">
    </div>
    <div class="names">
        <text class="text_type">Train Available status</text>
        <select class="select_train_details" style="margin-left: 10.4rem;">
            <option value="Available">Available</option>
            <option value="Not Available">Not Available</option>
            
       </select>
    </div>
  <div class="names">
        <text class="text_type">Train Type</text>
       <select class="select_train_details" style="margin-left: 22.5rem;">
            <option value="Express">Express</option>
            <option value="Suburban">Suburban</option>
            <option value="Night mail">Night mail</option>
       </select>
    </div>
    <div id="name_train">
          
           <text class="text_type" style="margin-left: 3rem;">From&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</text>
           <select class="select_train_details" id="select_from" style="margin-left: 7.5rem;float: left;">
            <option value="Matara">Matara</option>
            <option value="Galle">Galle</option>
            <option value="Colombo">Colombo</option>
       </select>
       <text class="text_type"  style="margin-left: 8rem;">To &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</text>
       <select class="select_train_details" id="select_to" style="margin-left: 3.5rem;display: block;">
        <option value="Matara">Matara</option>
        <option value="Galle">Galle</option>
        <option value="Colombo">Colombo</option>
       </select>
       <!--text class="text_type" style="margin-top: 20px;" >Down</text>
       <text class="text_type" style="margin-top: 20px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;From&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</text>
           <select class="select_train_details" id="select_from1" style="margin-left: 85px;float: left;">
            <option value="Matara">Matara</option>
            <option value="Galle">Galle</option>
            <option value="Colombo">Colombo</option>
       </select>
       <text class="text_type"  style="margin-left: 120px;margin-top: 20px;">To &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</text>
       <select class="select_train_details" id="select_to1" style="display: block;margin-left: 30px;">
        <option value="Matara">Matara</option>
        <option value="Galle">Galle</option>
        <option value="Colombo">Colombo</option>
       </select!-->
   

   
    </div>
    <div id="train_stop_stations" style="display: block;">
        <text class="text_type"> Train Stop stations&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: </text>
        <select class="select_train_details"   id="train_up">
            <option value="Matara">Matara</option>
            <option value="Galle">Galle</option>
            <option value="Colombo">Colombo</option>
       </select>
       <button class="button_up" >
            Add Station
       </button>
       <textarea id="textup_area">

       </textarea>


       <!--text class="text_type"> Train Down stations&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: </text>
        <select class="select_train_details"   id="train_up1">
            <option value="Matara">Matara</option>
            <option value="Galle">Galle</option>
            <option value="Colombo">Colombo</option>
       </select>
       <button class="button_up" style="margin-top: 10px;">
        Add Station
   </button>
       <textarea id="textup_area1">

    </textarea!-->
    </div>

    <div id="train_ticket_prices">
        <text class="text_type" style="margin-left: 4rem;margin-top: 2rem;"> Number of Seats &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: </text>
        <input class="input_class" id="input_first_class_seats" placeholder="First Class seats ">
        <input class="input_class" id="input_second_class_seats" placeholder="Second Class seats">
        <input class="input_class" id="input_observation_class_seats" placeholder="Obeservation Class seats ">
        <input class="input_class" id="input_sleepingbirth_class_seats" placeholder="Sleeping births seats ">
        
    </div>
    <div id="train_duration">
        <text class="text_type1" > Train Schedule Dates&nbsp;&nbsp;&nbsp;&nbsp;:</text>
        <text class="text_type" class="train_up_uration" > Mon&nbsp;&nbsp;: </text>
        <input type="checkbox"   class="checkbox" >
        
        <text class="text_type" class="train_up_uration" >Tue&nbsp;&nbsp;:</text>
        <input type="checkbox"  class="checkbox" >

        <text class="text_type" class="train_up_uration" >Wen&nbsp;&nbsp;:</text>
        <input type="checkbox"  class="checkbox">

        <text class="text_type" class="train_up_uration" >Thu&nbsp;&nbsp;:</text>
        <input type="checkbox"  class="checkbox">

        <text class="text_type" class="train_up_uration" >Fri&nbsp;&nbsp;:</text>
        <input type="checkbox"  class="checkbox">

        <text class="text_type" class="train_up_uration" >Sat&nbsp;&nbsp;:</text>
        <input type="checkbox"  class="checkbox">

        <text class="text_type" class="train_up_uration" >Sun&nbsp;&nbsp;:</text>
        <input type="checkbox"  class="checkbox">
    </div>
    <button id="update_button" >Update details</button>
   
    </div>
    </form>
</div>