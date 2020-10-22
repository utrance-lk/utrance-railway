<div class="flex-container">
                <div class="div-container">
                    <img src="../../../../utrance-railway/public/img/pages/home/logo-white.png" style="width: 4rem;height:4rem;padding-left: 0.75rem;">
                </div>
                <div class="div-container" style="margin: auto;margin-right: 2rem;"> 
                    
                    <a href="#" class="headA" >Tickets</a>
                    <a href="#" class="headA" style="margin-left: 5rem;">Freights</a>
                    
                </div>
                <div class="div-container">
                    <div class="dropdown" >
       
                        <div class="dropdown-flex"><button  class="dropbtn" ><i class="fa fa-user-o" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;<text id="first_name" >Ashika</text></button></div>
                            
                            <div id="profileImage" class="dropdown-flex"></div>

                            
                            
                            
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
                </div>  
              </div>
            <div class="divAllMain">
            <div class="divMainContainer">
            <div class="container-1">
                <button class="box-button"><div class="box">
                    <div  class="div-box" style="margin-top: 1rem;">
                    <label class="text-label">Settings</label>
                    </div>
                </div>
                </button>
                <button class="box-button"><div class="box">
                    <div  class="div-box" style="margin-top: 1rem;">
                    <label class="text-label">Update my profile</label>
                    </div>
                </div>
            </button>
            <button class="box-button" id="button-Add">
                <div class="box">
                    <div class="div-box" style="margin-top: 1rem;">
                    <label class="text-label">Add Train Details</label>
                    </div>
                </div>
            </button>
            <button class="box-button">
                <div class="box">
                    <div class="div-box" style="margin-top: 1rem;">
                    <label class="text-label" >Update Train Details</label>
                    </div>
                </div>
                </button>
                <button class="box-button">
                <div class="box">
                    <div class="div-box" style="margin-top: 1rem;">
                    <label class="text-label">Update User Details</label>
                    </div>
                </div>
                
                </button>
                <button class="box-button">
                <div class="box">
                    <div class="div-box" style="margin-top: 1rem;">
                    <label class="text-label">Add notices</label>
                    </div>
                </div>
                </button>
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