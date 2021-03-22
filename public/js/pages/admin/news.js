function renderNewsCard(newsArray){
    console.log(newsArray);

    newsArray.forEach(myFunction)
   
    myFunction1();
  
    
}

function myFunction(news){
    
    const markup = `<div class='newscard-small'>
            <div class='newscard-small__img-box'>
                <img src='/utrance-railway/public/img/NewsImages/${news.NewsImage}' class='newscard-small__img' alt='news-img' width='60' height='60'>
                <div class='newscard-small__view-btn'>
                <a class="parentclass" href='/utrance-railway/news/news01?id=${news.News_id}'>
                    <span id ='view' class='view'>View</span>
                </a>
                    <svg class='newscard-small__icon'>
                        <use xlink:href='/utrance-railway/public/img/svg/sprite.svg#icon-chevron-right'></use>
                    </svg>
                </div>
            </div>
            <div class='newscard-small__content'>
            ${news.Content}
            </div>
        </div>`
        // document.querySelector(".newsfeed").innerHTML=markup;
        document.querySelector(".newsfeed").insertAdjacentHTML("beforeend", markup);
        
        
}



function myFunction1(){
 
  const els= document.querySelectorAll(".view");
  
  for (var i = 0; i < els.length; i++) {
    els[i].onclick = function (e){
        console.log(e.target.closest(".newscard-small").querySelector(".newscard-small__content").innerText);
        let newsContent = e.target.closest(".newscard-small").querySelector(".newscard-small__content").innerText;
        let newNewsContent = newsContent.trim();
         $.ajax({
                url: "getNewNews",
                method: "post",
                data: { index1: newNewsContent },
                success: function (data) {
                   
                    console.log(data);
                
                     console.log(document.querySelector(".content-title"));
                     document.querySelector(".content-title").insertAdjacentHTML("beforeend",html);
                }
         });
      
      };
    
  }
          
      
        
          
}
