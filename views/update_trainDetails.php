<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Profile</title>
    <link rel="stylesheet" type="text/css" href="../../../utrance-railway/public/css/update_trainDetails.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body style="margin-top: 0px;margin-left: 0px;margin-right: 0px;margin-bottom: 0px;">
    <div id="user_header" >
        <tex style="padding-left: 20px;">Update Profile</tex>
    </div>
    <div id="update_train_form">
    <div class="names">
        <text class="text_type">Train ID</text>
       <input type="text" class="input_train_details" style="margin-left: 237px;">
    </div>
    <div class="names">
        <text class="text_type">Route ID</text>
       <input type="text" class="input_train_details" style="margin-left: 228px;">
    </div>
    <div class="names">
        <text class="text_type"> Total Frieght Weight</text>
       <input type="text" class="input_train_details" style="margin-left: 102px;">
    </div>
    <div class="names">
        <text class="text_type">Train Name</text>
       <input type="text" class="input_train_details" style="margin-left: 200px;">
    </div>
    <div class="names">
        <text class="text_type">Train Available status</text>
        <select class="select_train_details" style="margin-left: 90px;">
            <option value="Available">Available</option>
            <option value="Not Available">Not Available</option>
            
       </select>
    </div>
  <div class="names">
        <text class="text_type">Train Type</text>
       <select class="select_train_details" style="margin-left: 215px;">
            <option value="Express">Express</option>
            <option value="Suburban">Suburban</option>
            <option value="Night mail">Night mail</option>
       </select>
    </div>
    <div id="name_train">
          
           <text class="text_type" style="margin-left: 60px;">From&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</text>
           <select class="select_train_details" id="select_from" style="margin-left: 85px;float: left;">
            <option value="Matara">Matara</option>
            <option value="Galle">Galle</option>
            <option value="Colombo">Colombo</option>
       </select>
       <text class="text_type"  style="margin-left: 120px;">To &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</text>
       <select class="select_train_details" id="select_to" style="margin-left: 35px;display: block;">
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
        <text class="text_type" style="margin-left: 40px;margin-top: 20px;"> Number of Seats &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: </text>
        <input class="input_class" id="input_first_class_seats" placeholder="First Class seats ">
        <input class="input_class" id="input_second_class_seats" placeholder="Second Class seats ">
        <input class="input_class" id="input_observation_class_seats" placeholder="Obeservation Class seats ">
        <input class="input_class" id="input_sleepingbirth_class_seats" placeholder="Sleeping births seats ">
        
    </div>
    <div id="train_duration">
        <text class="text_type1" > Train Schedule Dates&nbsp;&nbsp;&nbsp;&nbsp;:</text>
        <text class="text_type" id="train_up_uration" style="margin-top: 15px;float: left;"> Mon&nbsp;&nbsp;: </text>
        <input type="checkbox" style="float: left;margin-top: 15px;width: 30px;height: 30px;">
        
        <text class="text_type" id="train_up_uration" style="margin-top: 15px;margin-left: 20px;">Tue&nbsp;&nbsp;:</text>
        <input type="checkbox" style="float: left;margin-top: 15px;width: 30px;height: 30px;">

        <text class="text_type" id="train_up_uration" style="margin-top: 15px;margin-left: 20px;">Wen&nbsp;&nbsp;:</text>
        <input type="checkbox" style="float: left;margin-top: 15px;width: 30px;height: 30px;">

        <text class="text_type" id="train_up_uration" style="margin-top: 15px;margin-left: 20px;">Thu&nbsp;&nbsp;:</text>
        <input type="checkbox" style="float: left;margin-top: 15px;width: 30px;height: 30px;">

        <text class="text_type" id="train_up_uration" style="margin-top: 15px;margin-left: 20px;">Fri&nbsp;&nbsp;:</text>
        <input type="checkbox" style="float: left;margin-top: 15px;width: 30px;height: 30px;">

        <text class="text_type" id="train_up_uration" style="margin-top: 15px;margin-left: 20px;">Sat&nbsp;&nbsp;:</text>
        <input type="checkbox" style="float: left;margin-top: 15px;width: 30px;height: 30px;">

        <text class="text_type" id="train_up_uration" style="margin-top: 15px;margin-left: 20px;">Sun&nbsp;&nbsp;:</text>
        <input type="checkbox" style="float: left;margin-top: 15px;width: 30px;height: 30px;">
    </div>

    <button id="update_button" style="cursor: pointer;margin-left: 150px;height:47px;">Update Train details</button>

   
    </div>
</body>
</html>