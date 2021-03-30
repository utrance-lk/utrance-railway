
<section class="newsfeed">
    <div class="newsfeed__slider">

        <!-- <i class="fas fa-angle-double-left" id='prevBtn'></i> -->
        <!-- <i class="fas fa-angle-double-right" id='nextBtn'></i> -->
        <svg id="prevBtn">
            <use xlink:href="/utrance-railway/public/img/svg/sprite.svg#icon-chevron-thin-left"></use>
        </svg>
        <svg id="nextBtn">
            <use xlink:href="/utrance-railway/public/img/svg/sprite.svg#icon-chevron-thin-right"></use>
        </svg>
        <div class="slider-container">
            <div class="carousel-slide">
                </div> 
                <!-- <button id='prevBtn'>Prev</button>
                <button id='nextBtn'>Next</button> -->
            </div>
            
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