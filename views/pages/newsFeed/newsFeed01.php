<div class="main-container">
<?php
$dom = new DOMDocument;
libxml_use_internal_errors(true);
$dom->loadHTML('...');
libxml_clear_errors();

if (isset($news)){
  
  $html ="<div class='load-content-container js--load-content-container'>";
  $html .="<div class='load-content'>";
  $html .="<div class='load-content--settings'>";
  $html .="<div class='content-title'>";
  $html .="<p>" . $news[0]['Headline'] . "</p><br></div>";
  $html .="<div class='row'><div class='columnFull'><div class='cardFull'>";
  $html .="<img src='/utrance-railway/public/img/NewsImages/" . $news[0]['NewsImage'] . "' style='width:100%' width='365px' height='460px'>";
  $html .="<div class='container'><br>";
  $html .="<p style='text-align:justify;'>".$news[0]['Content']."</p><br></div></div></div></div></div></div></div>";
  

}
$dom = new DOMDocument();
$dom->loadHTML($html);
print_r($dom->saveHTML());
 ?>


<div class="sidebar">
        <div class="sidebar__nav">
   
          <div class="sidebar__nav-role-items">

          <a href="/utrance-railway/news" class="sidebar__nav-manage--trains sidebar__nav-item">
              <svg class="bookings-icon sidebar__nav-icon">
                <use xlink:href="../../../../utrance-railway/public/img/pages/admin/svg/sprite.svg#icon-clock"></use>
              </svg>
              <span class="manage--bookings-name">Recent News</span>
              </a>
      
           
            <div class="userrole-name">Recent Headlines</div>
            <br>

            <?php
              $dom = new DOMDocument;
              libxml_use_internal_errors(true);
              $dom->loadHTML('...');
              libxml_clear_errors();

              if (isset($allnews)){
                $count = 0;
                foreach ($allnews as $key => $value){
                  if($count<5){
                    $html = "<a href='/utrance-railway/news/news01?id=" . $value['News_id'] . "' class='sidebar__nav-manage--trains sidebar__nav-item'>";
                    $html .="<svg class='bookings-icon sidebar__nav-icon'>";
                    $html .="<use xlink:href='../../../../utrance-railway/public/img/svg/sprite.svg#icon-news'></use></svg>";
                    $html .="<span class='manage--bookings-name'>" . $value['Headline'] . " ...</span></a>";
                    
                  
                    
                    $dom = new DOMDocument();
                    $dom->loadHTML($html);
                    print_r($dom->saveHTML());
                    
                  }
                  $count++;
                }
               
              }
              ?>

            <!-- <a href="/utrance-railway/news/news02" class="sidebar__nav-manage--trains sidebar__nav-item">
              <svg class="freights-icon sidebar__nav-icon">
                <use xlink:href="../../../../utrance-railway/public/img/pages/admin/svg/sprite.svg#icon-news"></use>
              </svg>
              <span class="manage--freights-name">Schedule Change ...</span>
              </a>

            
            <a href="/utrance-railway/news/news03" class="sidebar__nav-manage--trains sidebar__nav-item">
              <svg class="bookings-icon sidebar__nav-icon">
                <use xlink:href="../../../../utrance-railway/public/img/pages/admin/svg/sprite.svg#icon-news"></use>
              </svg>
              <span class="manage--bookings-name">No change in ...</span>
            </a>
            <a href="/utrance-railway/news/news04" class="sidebar__nav-manage--trains sidebar__nav-item">
              <svg class="freights-icon sidebar__nav-icon">
                <use xlink:href="../../../../utrance-railway/public/img/pages/admin/svg/sprite.svg#icon-news"></use>
              </svg>
              <span class="manage--freights-name">Change in ...</span>
            </a>
            <a href="/utrance-railway/news/news05" class="sidebar__nav-manage--trains sidebar__nav-item">
              <svg class="bookings-icon sidebar__nav-icon">
                <use xlink:href="../../../../utrance-railway/public/img/pages/admin/svg/sprite.svg#icon-news"></use>
              </svg>
              <span class="manage--bookings-name">New train in ...</span>
            </a>
            <a href="/utrance-railway/news/news06" class="sidebar__nav-manage--trains sidebar__nav-item">
              <svg class="freights-icon sidebar__nav-icon">
                <use xlink:href="../../../../utrance-railway/public/img/pages/admin/svg/sprite.svg#icon-news"></use>
              </svg>
              <span class="manage--freights-name">Nothern line ...</span>
            </a> -->
           
              <div class="userrole-name">Old Headlines</div>

              <?php
              $dom = new DOMDocument;
              libxml_use_internal_errors(true);
              $dom->loadHTML('...');
              libxml_clear_errors();

              if (isset($allnews)){
                $count = 0;
                foreach ($allnews as $key => $value){
                  if($count>4 && $count<11){
                    $html = "<a href='/utrance-railway/news/news01?id=" . $value['News_id'] . "' class='sidebar__nav-manage--trains sidebar__nav-item'>";
                    $html .="<svg class='bookings-icon sidebar__nav-icon'>";
                    $html .="<use xlink:href='../../../../utrance-railway/public/img/svg/sprite.svg#icon-news'></use></svg>";
                    $html .="<span class='manage--bookings-name'>" . $value['Headline'] . " ...</span></a>";
                    
                  
                    
                    $dom = new DOMDocument();
                    $dom->loadHTML($html);
                    print_r($dom->saveHTML());
                    
                  }
                  $count++;
                }
              }
              ?>
           
              <!-- <a href="/utrance-railway/news/news07" class="sidebar__nav-manage--trains sidebar__nav-item">
              <svg class="bookings-icon sidebar__nav-icon">
                <use xlink:href="../../../../utrance-railway/public/img/pages/admin/svg/sprite.svg#icon-news"></use>
              </svg>
              <span class="manage--bookings-name">Heavy rain in ...</span>
            </a>
              <a href="/utrance-railway/news/news08" class="sidebar__nav-manage--trains sidebar__nav-item">
              <svg class="bookings-icon sidebar__nav-icon">
                <use xlink:href="../../../../utrance-railway/public/img/pages/admin/svg/sprite.svg#icon-news"></use>
              </svg>
              <span class="manage--bookings-name">Ticket price meeting ...</span>
            </a>
            <a href="/utrance-railway/news/news09" class="sidebar__nav-manage--trains sidebar__nav-item">
              <svg class="freights-icon sidebar__nav-icon">
                <use xlink:href="../../../../utrance-railway/public/img/pages/admin/svg/sprite.svg#icon-news"></use>
              </svg>
              <span class="manage--freights-name">New trains ...</span>
           </a>
           <a href="/utrance-railway/news/news10" class="sidebar__nav-manage--trains sidebar__nav-item">
              <svg class="freights-icon sidebar__nav-icon">
                <use xlink:href="../../../../utrance-railway/public/img/pages/admin/svg/sprite.svg#icon-news"></use>
              </svg>
              <span class="manage--freights-name">Remodel trains ...</span>
            </a> -->
            
          </div>
        </div>
      </div>
</div>


</body>
</html>

<script type="text/javascript" src="../../../utrance-railway/public/js/pages/admin/news.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

<script>

</script>