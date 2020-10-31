const first_name=document.getElementById('first_name');
const last_name=document.getElementById('last_name');
const street_line1=document.getElementById('street_line1');
const street_line2=document.getElementById('street_line2');
const city=document.getElementById('city');
const email_id=document.getElementById('email_id');
const contact_num=document.getElementById('contact_num');
const user_password=document.getElementById('user_password');
const user_confirmPassword=document.getElementById('user_confirmPassword');
const register_form=document.getElementById('register_form');
const errorElement=document.getElementById('error');

register_form.addEventListener('submit',(e)=>{
    let messages=[]
    if(first_name.value === ' ' || first_name == null){
       messages.push("first Name is required!!!");
    }
    if(user_password.length <=6){
        messages.push("password must be longer than 6 chracter");
    }

    if(messages.length >0){
        e.preventDefault();
        errorElement.innerText=messages.join(',');
    
    }
})
    
