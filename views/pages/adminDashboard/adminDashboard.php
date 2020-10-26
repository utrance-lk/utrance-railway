<div class="flex-container">
                <div class="div-container">
                    <img src="../../../../utrance-railway/public/img/pages/home/logo-white.png" style="width: 6.5rem;height:5.5rem;padding-left: 0.75rem;">
                </div>
                <div class="div-container" style="margin: auto;margin-right: 4rem;"> 
                    
                    <a href="#" class="headA" >Tickets</a>
                    <a href="#" class="headA" style="margin-left: 5rem;">Freights</a>
                    
                </div>
                <div class="div-container">
                    <div class="dropdown" >
       
                        <div class="dropdown-flex" style="float:left"><button  class="dropbtn" style="float:left" ><i class="fa fa-user-o" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;<text id="first_name" >Ashika</text></button></div>
                            
                            
                            <span id="profileImage" class="dropdown-flex"  style="float:left"></span>
                            <button id="btn-profileImage"style="margin-top:0.35rem;background-color:#3B3B98;width:3.5rem;height:3.5rem;outline:none"><img src="../../../../utrance-railway/public/img/chevron1.png" style="width:2rem;height:2rem">

                            </button>
                            
                            
                            
                        <!--div class="dropdown-content">
                          <a href="#"><i class="fa fa-tachometer" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;Dashboard</a>
                          <a href="#"><i class="fa fa-pencil" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;Update Profile</a>
                          <a href="#"><i class="fa fa-lock" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;Reset Password</a>
                          <a href="#"><i class="fa fa-bell" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;Notifications</a>
                          <a href="#"><i class="fa fa-train" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;Update Train Details</a>
                          <a href="#"><i class="fa fa-users" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;Update User Details</a>
                          <a href="#"><i class="fa fa-plus" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;Add notices</a>
                          <a href="#"><i class="fa fa-plus" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;Add Train Details</a>
                          <a href="#"><i class="fa fa-sign-out" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;Sign out</a>
                        </div!-->
                      </div> 
                </div>  
              </div>
            <div class="divAllMain">
            <div class="divMainContainer">
            <div class="container-1">
                <div class="userfunctions">
                    <div class="user__setting">
                        <i class="fas fa-cog"></i>
                        <span>Settings</span>
                    </div>
                    <div class="user__mybookings">my bookings</div>
                </div>
                <span>Admin</span>
                <div class="adminfunctions">admin functions</div>
            </div>
            </div>
            </div>

            <script type="text/javascript">
                $(document).ready(function(){
                    $("#button-Add").click(function(){
                        $("#divMainContainer").load("../../../../utrance-railway/views/pages/adminTrainDetails/add_train_.php");
                    });
                });
            </script>