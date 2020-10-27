
import {items} from './components.js';

export const userRegistration = function() {
  let a=items.firstName.value;
  let b=items.lastName.value;
  let c=items.streetLine1.value;
  let d=items.streetLine2.value;
  let e=items.userCity.value;
  let f=items.userConfirmPassword.value;
  let g=items.userPassword.value;
  let h=items.userEmail.value;
  let i=items.userImage.value;
  let j=items.userContactNumber.value;
  if(a==" "){
    alert("Please Enter First Name!!");
  }else if(b==" "){
    alert("Please Enter Last Name!!!");
  }else if(c==" "){
    alert("Please Enter Street Line1!!");
  }else if(d==" "){
    alert("Please Enter Street Line2!!");
  }else if(e==" "){
    alert("Please Enter City!!!");
  }else if(h==" "){
    alert("Please Enter Email!!! ");
  }else if(i==" "){
    alert("Please Ad User Image!!!");
  }else if(j==" "){
    alert("Please Enter Contact Number!!");
  }

  if(g==" "){
    alert("Please Enter password!!!");
  }else if(f==" "){
    alert("Please Enter Confirm Password!!");
  }

 
}



