
 <section class="newsfeed">
    <div class="slider-container">
    <div class="carousel-slide">
    </div> 
    <button id='prevBtn'>Prev</button>
    <button id='nextBtn'>Next</button>
    </div>


<!--newsfeed = carousel-container -->
<!--slider-container =  carousel-slide -->
</section> 



    


<script type="text/javascript" src="../../../utrance-railway/public/js/pages/admin/carousel.js"></script>
<script type="text/javascript" src="../../../utrance-railway/public/js/pages/admin/news.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script>
 $(document).ready(function(){
    $.ajax({
        url: "getNewNews",
        method: "get",
        success: function (data) {
            console.log(data);
            news=JSON.parse(data);
            renderNewsCard(news);
            
        }
       

    });

   
    
          
 });




 
</script>