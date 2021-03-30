

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="../../../utrance-railway/public/js/pages/admin/pop_up_message.js"></script>

<script>

$(document).ready(function(){
    var newindex="<?php echo App::$APP->activeUser()['email_id'] ;?>";
    $.ajax({
      url:'getCount',
      method:'post',
      data:{index1:newindex},
      success : function (data) {
        message=JSON.parse(data)
        document.querySelector(".header-user__notification-number").innerText = message[0].myCount;
        
        }
    })
  
    $(".header-user__notifications").click(function(){   
    document.querySelector(".header-user__notification-number").style.visibility="hidden";


    $.ajax({
      url:'getMessages',
      method:'post',
      data:{index1:newindex},
      success : function (data) {
        
        message=JSON.parse(data)
        messagerenderResults( message);
        }
    })

    });

  
});
</script>



