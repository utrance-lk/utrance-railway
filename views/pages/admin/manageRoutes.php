<div class="load-content-container">
        <div class="load-content">
          <div class="load-content--manage-trains">
            <form class="dashboard-searchbar--container" method='POST' action="/utrance-railway/routes/">
              <input
                type="text"
                class="dashboard-searchbar"
                placeholder="Search routes by name"
                name="searchRoute"
              />
              <svg class="search-icon__btn">
                <use xlink:href="/utrance-railway/public/img/svg/sprite.svg#icon-magnifying-glass"></use>
              </svg>
            </form>
            <a href="/utrance-railway/routes/add" class="btn btn-square-blue">
              <div class="addbtn-text">Add Route</div>
              <svg class="addbtn-img">
                <use xlink:href="/utrance-railway/public/img/svg/sprite.svg#icon-circle-with-plus">
                </use>
              </svg>
            </a>
            <div class="search__results-container">

             <?php
$dom = new DOMDocument;
libxml_use_internal_errors(true);
$dom->loadHTML('...');
libxml_clear_errors();

if (isset($routes)) {
 
  foreach ($routes as $key => $value){
   
    $html = "<div class='search__result-card'>";
    $html .= "<div class='search__result-route-idbox'>";
    $html .= "#<span class='route__id'>".$value['route']."</span></div>";
    $html .= "<div class='search__result-route-start'>".$value['sid']."</div>";
    $html .= "<div class='search__result-route-destination'>".$value['did']."</div>";
    $html .= "<a href='/utrance-railway/routes/view?id=".$value['route']."' class='btn btn-box-white margin-r-s'>View</a>";
    $html .= "<div class='btn'>";
    $html .= "<div class='btn-box-white btn-box-white--delete'>Delete</div></div></div>";

    $dom = new DOMDocument();
    $dom->loadHTML($html);
    print_r($dom->saveHTML());
  }
 
  
}


?>  

            </div>
          </div>
</div>
        </div>
      </div>
