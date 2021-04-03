
<section class="newsfeed">
    <div class="newsfeed__slider">
        <svg id="prevBtn">
            <use xlink:href="/public/img/svg/sprite.svg#icon-chevron-thin-left"></use>
        </svg>
        <svg id="nextBtn">
            <use xlink:href="/public/img/svg/sprite.svg#icon-chevron-thin-right"></use>
        </svg>
        <div class="slider-container">
            <div class="carousel-slide">
                </div>
            </div>

        </div>
</section>

<script type="text/javascript" src="/public/js/pages/admin/news.js"></script>
<script>
 $(document).ready(function(){
    $.ajax({
        url: "getNewNews",
        method: "get",
        success: function (data) {
            news=JSON.parse(data);
            renderNewsCard(news);
        }
    });
 });
</script>
