<div class="main-container">
<div class="load-content-container js--load-content-container">
        <div class="load-content">
          <div class="load-content--settings">
            <div class="content-title">
              <p>Recent News</p>
             
            </div>
            <div class="row">
            <div class="userrole-name">Train Schedule</div>
  <?php 
  $dom = new DOMDocument;
  libxml_use_internal_errors(true);
  $dom->loadHTML('...');
  libxml_clear_errors();
   
  if (isset($news)){
    $count = 0;
    foreach ($news as $key => $value){
       if($value['News_type']=="train_schedule" && $count<2){
        $html = "<div class='column'><div class='card'>";
        $html .="<img src='/utrance-railway/public/img/newsImages/" . $value['NewsImage'] . "' style='width:100%' width='160px' height='230px'>";
        $html .="<div class='container'><br>";
        $html .="<h3>" . $value['Headline'] . "</h3><br>";
        $html .="<p style='text-align:justify;'>" . $value['Content'] . "</p>";
        $html .="<a href='/utrance-railway/news/news01?id=" . $value['News_id'] . "' class='sidebar__nav-manage--trains sidebar__nav-item'>";
        $html .="<div class='button'>Read More</div></a></div></div></div>";
       
         $count++;
         $dom = new DOMDocument();
         $dom->loadHTML($html);
         print_r($dom->saveHTML());
         
       }
      
    }
  }

  
  ?>     
 
  
</div>
<div class="row">
<div class="userrole-name">Ticket Prices</div>
<?php 
  $dom = new DOMDocument;
  libxml_use_internal_errors(true);
  $dom->loadHTML('...');
  libxml_clear_errors();
   
  if (isset($news)){
    $count = 0;
    foreach ($news as $key => $value){
       if($value['News_type']=="ticket_price" && $count<2){
        $html = "<div class='column'><div class='card'>";
        $html .="<img src='/utrance-railway/public/img/newsImages/" . $value['NewsImage'] . "' style='width:100%' width='160px' height='230px'>";
        $html .="<div class='container'><br>";
        $html .="<h3>" . $value['Headline'] . "</h3><br>";
        $html .="<p style='text-align:justify;'>" . $value['Content'] . "</p>";
        $html .="<a href='/utrance-railway/news/news01?id=" . $value['News_id'] . "' class='sidebar__nav-manage--trains sidebar__nav-item'>";
        $html .="<div class='button'>Read More</div></a></div></div></div>";
       
         $count++;
         $dom = new DOMDocument();
         $dom->loadHTML($html);
         print_r($dom->saveHTML());
         
       }
      
    }
  }

  
  ?>  
  
  
</div>

<div class="row">
<div class="userrole-name">Other</div>

<?php 
  $dom = new DOMDocument;
  libxml_use_internal_errors(true);
  $dom->loadHTML('...');
  libxml_clear_errors();
   
  if (isset($news)){
    $count = 0;
    foreach ($news as $key => $value){
       if($value['News_type']=="other" && $count<2){
        $html = "<div class='column'><div class='card'>";
        $html .="<img src='/utrance-railway/public/img/newsImages/" . $value['NewsImage'] . "' style='width:100%' width='160px' height='230px'>";
        $html .="<div class='container'><br>";
        $html .="<h3>" . $value['Headline'] . "</h3><br>";
        $html .="<p style='text-align:justify;'>" . $value['Content'] . "</p>";
        $html .="<a href='/utrance-railway/news/news01?id=" . $value['News_id'] . "' class='sidebar__nav-manage--trains sidebar__nav-item'>";
        $html .="<div class='button'>Read More</div></a></div></div></div>";
       
         $count++;
         $dom = new DOMDocument();
         $dom->loadHTML($html);
         print_r($dom->saveHTML());
         
       }
      
    }
  }

  
  ?> 



</div>



          </div>
        </div>
</div>

<div class="sidebar">
        <div class="sidebar__nav">
   
          <div class="sidebar__nav-role-items">

            <div class="userrole-name">Old Headlines</div>

            <?php 
                $dom = new DOMDocument;
                libxml_use_internal_errors(true);
                $dom->loadHTML('...');
                libxml_clear_errors();
   
                if (isset($news)){
                  $count = 0;
                  foreach ($news as $key => $value){
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
                <use xlink:href="../../../../utrance-railway/public/img/svg/sprite.svg#icon-news"></use>
              </svg>
              <span class="manage--bookings-name">Heavy rain in ...</span>
            </a>
              <a href="/utrance-railway/news/news08" class="sidebar__nav-manage--trains sidebar__nav-item">
              <svg class="bookings-icon sidebar__nav-icon">
                <use xlink:href="../../../../utrance-railway/public/img/svg/sprite.svg#icon-news"></use>
              </svg>
              <span class="manage--bookings-name">Ticket price meeting ...</span>
            </a>
            <a href="/utrance-railway/news/news09" class="sidebar__nav-manage--trains sidebar__nav-item">
              <svg class="freights-icon sidebar__nav-icon">
                <use xlink:href="../../../../utrance-railway/public/img/svg/sprite.svg#icon-news"></use>
              </svg>
              <span class="manage--freights-name">New trains ...</span>
           </a>
           <a href="/utrance-railway/news/news10" class="sidebar__nav-manage--trains sidebar__nav-item">
              <svg class="freights-icon sidebar__nav-icon">
                <use xlink:href="../../../../utrance-railway/public/img/svg/sprite.svg#icon-news"></use>
              </svg>
              <span class="manage--freights-name">Remodel trains ...</span>
            </a> -->
          </div>
        </div>
      </div>
</div>

<script type="module" src="../../../utrance-railway/public/js/pages/admin/main.js"></script>


</body>
</html>