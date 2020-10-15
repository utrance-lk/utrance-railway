<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Profile</title>
    <link rel="stylesheet" type="text/css" href="../../../utrance-railway/public/css/update_userProfile.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Aldrich&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body style="margin-top: 0px;margin-left: 0px;margin-right: 0px;margin-bottom: 0px;">
    
        <div id="user_header" >
            <tex style="padding-left: 20px;">Update Profile</tex>
        </div>
        
        <div id="update_form" style="border-color: black;border-radius: 1px;border-style: solid;font-size: 25px;">
        <br>
        <text class="update_text"> <i class="fa fa-user" aria-hidden="true"></i>&nbsp;&nbsp;Name</text>
        <br>
        <input class="input_text" type="text" style="float: left;" placeholder="First Name"> <input class="input_text" type="text" style="margin-left: 40px;" placeholder="Last Name">
        <br>
        <br>
        <text class="update_text"><i class="fa fa-envelope" aria-hidden="true"></i>&nbsp;&nbsp;E mail</text>
        <br>
        <input class="input_text" type="text" >
        <br>
        <br>
        <text class="update_text" ><i class="fa fa-map-marker" aria-hidden="true"></i>&nbsp;&nbsp;Address</text>
        <br>
        <br>
        <input class="input_text" type="text" placeholder="Street Line 1">
        <br>
        <br>
        <input class="input_text" type="text" placeholder="Street Line 2">
        <br>
        <br>
        <br>
        <select class="select_city">
            <option class="city_values" value="Matara">Matara</option>
            <option class="city_values" value="Weligama">Weligama</option>
            <option class="city_values" value="Galle">Galle</option>
            <option class="city_values" value="Colombo">Colombo</option>

        </select>

        <br>
        <br>
        
        
        <text class="update_text"><i class="fa fa-phone-square" aria-hidden="true"></i>&nbsp;&nbsp;Contact number</text>
        <br>
        <br>
        <input class="input_text" type="text" placeholder="Ex-071-1234567">
        <br>
        <br>
        <button id="update_button" style="cursor: pointer;margin-left: 80px;height:47px;">Update details</button>
      </div>
    
    
</body>
    