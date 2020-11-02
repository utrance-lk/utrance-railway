import { items } from "./components.js";
import * as register from "./register.js";


items.userRegisterButton.addEventListener('click',function(){
   
    
    console.log("hy");
    register.userRegistration();

     $.ajax(
        {
            type:"POST",
            url:"/utrance-railway/registerPage",
            data:{
               first_name:items.first_name,
               last_name:items.last_name,
               street_line1:items.street_line1,
               street_line2:items.street_line2,
               city:items.city,
               contact_num:items.contact_num,
               user_password:items.user_password,
               email_id:items.email_id,


               
               
            },
            success: function() {
               console.log("Success" ); 
            }
            
        }
    );

});


   



    
