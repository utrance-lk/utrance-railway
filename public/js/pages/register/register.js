
import {items} from './components.js';

export const userRegistration = function() {
  let a=items.first_name.value;
  let b=items.last_name.value;
  let c=items.street_line1.value;
  let d=items.street_line2.value;
 
  let f=items.user_confirmPassword.value;
  let g=items.user_password.value;
  let h=items.email_id.value;
 
  let j=items.contact_num.value;
  if(a==" "){
    alert("Please Enter First Name!!");
  }else if(b==" "){
    alert("Please Enter Last Name!!!");
  }else if(c==" "){
    alert("Please Enter Street Line1!!");
  }else if(d==" "){
    alert("Please Enter Street Line2!!");
  }
   if(h==" "){
    alert("Please Enter Email!!! ");
  }else if(j==" "){
    alert("Please Ad User Image!!!");
  }

  if(g==" "){
    alert("Please Enter password!!!");
  }else if(f==" "){
    alert("Please Enter Confirm Password!!");
  }

 
}



