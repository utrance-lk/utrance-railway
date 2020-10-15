<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add notices</title>
    <link rel="stylesheet" type="text/css" href="../../../utrance-railway/public/css/add_notices_admin.css" />
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Aldrich&display=swap" rel="stylesheet">
</head>
<body>
  
</body style="margin-top: 0px;margin-left: 0px;margin-right: 0px;margin-bottom: 0px;">
<div id="user_header" >
    <tex style="padding-left: 20px;">Add notices</tex>
</div>

<div id="add_notices_form"  style="margin-top:40px">
    <div class="names">
        <text class="text_type">Notice ID</text>
       <input type="text" class="input_notice_details" style="margin-left: 237px;">
    </div>

    <div class="names">
        <text class="text_type">Notice added date</text>
       <input type="date" class="input_notice_details" style="margin-left: 147px;" name="date">
    </div>
    <div class="names">
        <text class="text_type">Notice content</text>
        <textarea id="textup_area" style="margin-left: 336px;border-radius: 4px;">
    
        </textarea>
    </div>
    <div class="names">
        <text class="text_type">Notice Image</text>
        <div  id="image_file">
        <form action="" method="POST" enctype="multipart/form-data">
            <input type="file" name="image" id="input_image">
            <input type="submit" id="submit_button">
         </form>
        </div>
        
    
        
    </div>

    <button id="add_notice_button" style="cursor: pointer;margin-left: 90px;height:47px;margin-top: 80px;">Add notices</button>

</div>
</html>