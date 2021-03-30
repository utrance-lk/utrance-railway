let countMessages;
const messagerenderResults = function (messages){
    countMessages=0;
    // clearResults();
    let html = `<div class='form-popup' id='myForm'>
            <form action='' class='form-container' method='GET'>
            <svg class='form-popup__btn-close'>
                <use xlink:href='/public/img/svg/sprite.svg#icon-circle-with-cross'>
                </use
            </svg>
           <h3 id = 'newMessage'><br>New Messages</h3><br></br>
    
    
          <button type='button' class='btn cancel' onclick='closeForm()'>
          </button>
        </form>
        <a>View all messages</a>
        </div>`;
        document.getElementById("pop-notification").insertAdjacentHTML("afterend", html);
    messages.forEach(renderCard);
   
    
}



const renderCard = function (message){
    countMessages++;
  

    let markup = `<div class='firstname-box content__fields-item'>
            <label for='firstname' class='form__label_message'><hr>New message from ${message.first_name}: (${message.details_type})
            <a href='/messageFull?details_id=${message.details_id}' class=''>
            <div class='button'>View</div></a></label><hr>
            <a href='/message'>
           <button type='button' class='btn2'>
           </button></a>

          `;
          

          document.getElementById("newMessage").insertAdjacentHTML("afterend", markup);
}

// const clearResults = function () {
//     if(document.getElementById("myForm")){
//         let element =  document.getElementById("myForm");
//         element.remove();
//     }
    
    
//   };

// <svg class='notification__icon navbar__icon'>
//           <use xlink:href='../../../../public/img/pages/admin/svg/sprite.svg#icon-list'></use></svg>

{/* <svg class='notification__icon navbar__icon'>
<use xlink:href='../../../../public/img/pages/admin/svg/sprite.svg#icon-cross'></use></svg> */}