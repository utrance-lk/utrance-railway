
<div id="user_header" >
    <tex style="padding-left: 20px;">Add notices</tex>
</div>
<div id="divMain">
<form action="" method="post">
<div id="add_notices_form"  style="margin-top:40px">
    <div class="names">
        <text class="text_type">Notice ID</text>
       <input type="text" class="input_notice_details" style="margin-left: 23.7rem;">
    </div>

    <div class="names">
        <text class="text_type">Notice added date</text>
       <input type="date" class="input_notice_details" style="margin-left: 14.7rem;" name="date">
    </div>
    <div class="names">
        <text class="text_type">Notice content</text>
        <textarea id="textup_area" style="margin-left: 33.6rem;border-radius: 0.4rem;">
    
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

    <button id="add_notice_button" style="cursor: pointer;margin-left: 9rem;height:4.7rem;margin-top: 8rem;">Add notices</button>

</div>
</form>
