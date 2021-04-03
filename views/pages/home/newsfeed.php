
<section class="newsfeed">
    <div class="newsfeed__slider">
        <svg id="prevBtn">
            <use xlink:href="/utrance-railway/public/img/svg/sprite.svg#icon-chevron-thin-left"></use>
        </svg>
        <svg id="nextBtn">
            <use xlink:href="/utrance-railway/public/img/svg/sprite.svg#icon-chevron-thin-right"></use>
        </svg>
        <div class="slider-container">
            <div class="carousel-slide">
                </div>
            </div>

        </div>
</section>

<<<<<<< HEAD
<script type="text/javascript" src="/public/js/pages/admin/carousel.js"></script>
<script type="text/javascript" src="/public/js/pages/admin/news.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
=======
<script type="text/javascript" src="../../../utrance-railway/public/js/pages/admin/carousel.js"></script>
<script type="text/javascript" src="../../../utrance-railway/public/js/pages/admin/news.js"></script>
>>>>>>> master
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
