import { items } from "./components.js";
import * as register from "./register.js";


items.userRegisterButton.addEventListener("click", register.userRegistration);

    $.ajax(
        {
            type:"POST",
            url:"AuthContoller/register",
            
        }
    );
