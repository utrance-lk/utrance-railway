<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add notices</title>
    <link rel="stylesheet" type="text/css" href="../../../utrance-railway/public/css/add_notices.css" />
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/script" src="../public/js/JQuery.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Aldrich&display=swap" rel="stylesheet">

    
    
</head>
<body style="margin-top: 0px;margin-left: 0px;margin-right: 0px;margin-bottom: 0px;">
    <div id="user_header" >
        <tex style="padding-left: 20px;">Send messages to the admin</tex>
    </div>
    <div id="div_notice_form">
        <div class="notice">
            <text class="text_type">Notice title</text>
            <select class="select_train_details" style="margin-left: 95px;">
                <option value="Available">About Train Shedule</option>
                <option value="Not Available">About Train Ticket price</option>
                <option value="Not Available">Other</option>
                
           </select>
        </div>


        
        <div id="train_stop_stations" style="display: block;margin-top: 30px;">
            <text class="text_type" style="margin-left: 34px;">Admin List&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: </text>
            <select class="select_admin" id="train_up" style="margin-left: 70px;">
                <option value="1001A">1001A</option>
                <option value="1002A">1002A</option>
                <option value="1003A">1003A</option>
           </select>
           <button class="button_up"  >
                Add Admin
           </button>
           <textarea id="textup_area" style="margin-left: 249px;">
    
           </textarea>
    
    </div>

    <text class="text_type" style="margin-left: 30px;margin-top: 34px;">Information&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: </text>
    <textarea id="textup_area" style="margin-left: 249px;margin-top:34px;">
    
    </textarea>
    <button id="update_button" style="cursor: pointer;margin-left: 80px;height:47px;">Send message</button>


</body>
</html>