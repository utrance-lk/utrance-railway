import { items } from "./components.js";
import * as register from "./register.js";


items.userRegisterButton.addEventListener("click",register.userRegistration);
   /* register.userRegistration();
    $.ajax(
        {
            type:"POST",
            url:"/utrance-railway/public/index.php/registerPage",
            data:{
               first_name:items.firstName,
               last_name:items.lastName,
               street_line1:items.streetLine1,
               street_line2:items.streetLine2,
               city:items.city,
               contactnum:items.contactnum,
               userpassword:items.userPassword,
               email:items.email,


               
               
            },
            success: function() {
               console.log("Success" ); 
            }
            
        }
    );

});*/
   


    
