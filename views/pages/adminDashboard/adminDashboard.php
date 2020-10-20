<!--div id="logo_header" style="float: left;">
       <img src="../../../../utrance-railway/public/img/logo2.jpeg" style="width: 80px;height:80px;padding-left: 20px;float: left;">

     <mg src="img/user1.jpg" class="img_role" style="width: 30px;height: 30px;padding-top: 10px;float: right;">
      <div class="dropdown" style="float:right;">
        <button  class="dropbtn" style="margin-top: 10px;"><img src="../../../../utrance-railway/public/img/user1.jpg"  class="img_role" style="width: 30px;height: 30px;float: left;"><i class="far fa-bell-on"></i>&nbsp;&nbsp;&nbsp;<text id="first_name">Ashika&nbsp;&nbsp;&nbsp;</text><i class="fa fa-bars"></i></button>
        <div class="dropdown-content">
          <a href="#"><i class="fa fa-tachometer" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;Dashboard</a>
          <a href="#"><i class="fa fa-pencil" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;Update Profile</a>
          <a href="#"><i class="fa fa-lock" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;Reset Password</a>
          <a href="#"><i class="fa fa-bell" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;Notifications</a>
          <a href="#"><i class="fa fa-train" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;Update Train Details</a>
          <a href="#"><i class="fa fa-users" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;Update User Details</a>
          <a href="#"><i class="fa fa-plus" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;Add notices</a>
          <a href="#"><i class="fa fa-plus" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;Add Train Details</a>
          <a href="#"><i class="fa fa-sign-out" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;Sign out</a>
        </div>
      </div> 

       
        
           
           </div!-->
    


    <div id="hello_body" >
        <br>
        <br>
        <br>
        <br>
        <text id="text_hello">Hello, Ashika</text>
        <div id="profileImage"></div>


        <script>
            $(document).ready(function(){
                var firstName = $('#first_name').text();
               // var lastName = $('#lastName').text();
                var intials = $('#first_name').text().charAt(0) ;
                var profileImage = $('#profileImage').text(intials);
              });
            </script>
        
        <br><br><br>
        <text style="color: white;font-size: 2.5rem;padding-left: 10rem;"> Account Email</text>
        <br>
        <text id="user_email" style="color: white;font-size: 1.9rem;padding-left: 10rem;font-weight: bold;">ashikaabeysuriya456@gmail.com</text>
   </div>

   <!--div id="functions_body" >
       <div id="functions_body_button_set">
       <button id="button_dashboard" class="button_function" style="float: left;" value="1" onload="loadPage()" >Dashboard&nbsp;&nbsp;|</button>
       <button id="button_update" class="button_function" style="float: left;" value="2" onload="loadPage()">Update Own profile&nbsp;&nbsp;|</button>
       <button  id="button_changePassword" class="button_function" style="float: left;" value="3" onload="loadPage()">Reset Password&nbsp;&nbsp;|</button>
       <button id="button_update_Traindetails" class="button_function" style="float: left;" value="4" onload="loadPage()">Update Train details&nbsp;&nbsp;|</button>
       <button id="button_add_Traindetails" class="button_function" style="float: left;" value="5" onload="loadPage()">Add Train details&nbsp;&nbsp;|</button>
       <button class="button_function" style="float: left;margin-left: 15px;" value="6" onload="loadPage()">Update User Details&nbsp;&nbsp;|</button>
      
       <button class="button_function" id="button_add_notices" style="float: left;margin-left: 15px;" value="7" onload="loadPage()">Add notices</button>
      </div>
   </div!-->
 
   <ul>
  <li><a class="active" href="#home">Dashboard</a></li>
  <li><a href="#news">Update My Profile</a></li>
  <li><a href="#contact">Reset Password</a></li>
  <li><a href="#about">Update Train Details</a></li>
  <li><a href="#about">Add Train Details</a></li>
  <li><a href="#about">Update User Profile</a></li>
  <li><a href="#about">Add notices</a></li>
  </ul>
 
   
   <div id="button_area_newsFeed" style="width: 100%;">
       <div id="button_area"  >
       
        <!--div id="newsFeed" >
            <div class="newsCollection" style="float: left;font-weight: bold;">
                <div class="img_train"><img  src="../../../utrance-railway/public/img/train1.webp" style="width: 250px;height:175px;"></div>
                <div class="newFedd_content" style="font-family:Aldrich;cursor: pointer;padding: 10px;color: black;font-weight: bold;">Tommorow railway department will added aditional train to Matara to Colombo<button class="button" style="vertical-align:middle;font-size: 15px;"><span>More Details</span></button> </div>
                
            </div>
    
            <div class="newsCollection" style="float: left;">
                <div class="img_train"><img src="../../../utrance-railway/public/img/train2.jpg" style="width: 250px;height:175px;"></div>
                <div class="newFedd_content" style="font-family:Aldrich;cursor: pointer;padding: 10px;color: black;font-weight: bold;">Tommorow railway department will added aditional train to Matara to Colombo<button class="button" style="vertical-align:middle;font-size: 15px;"><span>More Details</span></button> </div>
            </div>
    
            <div class="newsCollection" style="float: left;">
                <div class="img_train"><img src="../../../utrance-railway/public/img/train3.jpg" style="width: 250px;height:175px;"></div>
                <div class="newFedd_content" style="font-family:Aldrich;cursor: pointer;padding: 10px;color: black;font-weight: bold;">Tommorow railway department will added aditional train to Matara to Colombo<button class="button" style="vertical-align:middle;font-size: 15px;"><span>More Details</span></button> </div>
            </div>
            <div class="newsCollection" style="float: left;">
                <div class="img_train"><img  src="../../../utrance-railway/public/img/train1.webp" style="width: 250px;height:175px;"></div>
                <div class="newFedd_content" style="font-family:Aldrich;cursor: pointer;padding: 10px;color: black;font-weight: bold;">Tommorow railway department will added aditional train to Matara to Colombo<button class="button" style="vertical-align:middle;font-size: 15px;"><span>More Details</span></button> </div>
                
            </div>
            <div class="newsCollection" style="float: left;margin-top: 50px;">
                <div class="img_train"><img src="../../../utrance-railway/public/img/train3.jpg" style="width: 250px;height:175px;"></div>
                <div class="newFedd_content" style="font-family:Aldrich;cursor: pointer;padding: 10px;color: black;font-weight: bold;">Tommorow railway department will added aditional train to Matara to Colombo<button class="button" style="vertical-align:middle;font-size: 15px;"><span>More Details</span></button> </div>
            </div>

            <div class="newsCollection" style="float: left;margin-top: 50px;">
                <div class="img_train"><img src="../../../utrance-railway/public/img/train3.jpg" style="width: 250px;height:175px;"></div>
                <div class="newFedd_content" style="font-family:Aldrich;cursor: pointer;padding: 10px;color: black;font-weight: bold;">Tommorow railway department will added aditional train to Matara to Colombo<button class="button" style="vertical-align:middle;font-size: 15px;"><span>More Details</span></button> </div>
            </div>
            </div!-->
    </div>
</div>

   <script type="text/javascript">
       $(document).ready(function(){
           $("#button_dashboard").click(function(){
               $("#button_area").load("../../../../utrance-railway/views/pages/admin/dashboard_newsFeed.php");
           });
       });
   </script>

     


<script type="text/javascript">
    $(document).ready(function(){
        $("#button_update").click(function(){
            $("#button_area").load("../../../../utrance-railway/views/pages/admin/update_userProfile.php");
        });
    });
</script>


<script type="text/javascript">
    $(document).ready(function(){
        $("#button_changePassword").click(function(){
            $("#button_area").load("../../../../utrance-railway/views/pages/admin/user_change_password.php");
        });
    });
</script>



<script type="text/javascript">
    $(document).ready(function(){
        $("#button_update_Traindetails").click(function(){
            $("#button_area").load("../../../../utrance-railway/views/pages/admin/update_trainDetails.php");
        });
    });
</script>


<script type="text/javascript">
    $(document).ready(function(){
        $("#button_add_Traindetails").click(function(){
            $("#button_area").load("../../../../utrance-railway/views/pages/admin/add_train_details.php");
        });
    });
</script>


   
<script type="text/javascript">
    $(document).ready(function(){
        $("#button_add_notices").click(function(){
            $("#button_area").load("../../../../utrance-railway/views/pages/admin/add_notices_admin.php");
        });
    });
</script>
