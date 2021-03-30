<?Php include_once "../views/components/backButton.php";?>
<section class="ticket-prices">
  <form class="ticket-prices__search" method="POST" action="/utrance-railway/freight-prices">
    <div class="ticket-prices__search--from">
      <div class="ticket-prices__search-box  js--from__station"  id="js--from__station"></div>
      <div class="ticket-prices__search-dropdown js--search-dropdown__from">
            <input type="text" id="dropdown-from"  name="start" class="ticket-prices__search-dropdown-input js--search-dropdown__search-from" >
      </div>
      <ul class="ticket-prices__search-dropdown-search-results js--results__list-from"></ul>
    </div>
    <span class="center-text">TO</span>
    <div class="ticket-prices__search--to">
      <div class="ticket-prices__search-box  js--to__station"  id="js--to__station"></div>
      <div class="ticket-prices__search-dropdown js--search-dropdown__to">
          <input type="text"  id="dropdown-to" name="destination" class="ticket-prices__search-dropdown-input js--search-dropdown__search-to">
      </div>
      <ul class="ticket-prices__search-dropdown-search-results js--results__list-to"></ul>
    </div>
    <button class="btn-search" type="submit">
        <svg class="btn-search__icon">
            <use xlink:href='../../../../utrance-railway/public/img/svg/sprite.svg#icon-magnifying-glass'></use>
        </svg>
    </button>
  </form>
    <div class="search__results-container margin-b-l"></div>
</section>

<script type="text/javascript" src="../../../utrance-railway/public/js/components/viewFreightPrice.js"></script>


<?php if (isset($freight)): ?>
        <script >
        let x=<?php echo json_encode($freight); ?>;
        console.log(x);
        document.querySelector(".js--from__station").textContent = x.start;
        document.querySelector(".js--to__station").textContent = x.destination;
        document.querySelector(".js--search-dropdown__search-from").value = x.start;
        document.querySelector(".js--search-dropdown__search-to").value = x.destination;
         renderResults(<?php echo json_encode($freight); ?>);
       </script>

      <?php endif;?>


      <?php if (!(isset($freight))): ?>
        <script>
        document.querySelector(".js--from__station").textContent = stationsArray[3];
        document.querySelector(".js--to__station").textContent = stationsArray[0];
        document.querySelector(".js--search-dropdown__search-from").value = stationsArray[3];
        document.querySelector(".js--search-dropdown__search-to").value = stationsArray[0];
          renderDefaultResults();

        </script>
      <?php endif;?>


      <script>
      // document.querySelector(".minus-btn").setAttribute("disabled","disabled");
       let valueCount;
       let weight="kg";
       let timberPrice=document.getElementById("first_class").innerText;
       timberPrice=timberPrice.match(/\d+/g);
       console.log(timberPrice)
       let metalPrice=document.getElementById("second_class").innerText;
       metalPrice=metalPrice.match(/\d+/g);
       let textilePrice=document.getElementById("third_class").innerText;
       textilePrice=textilePrice.match(/\d+/g);
       let agriculturalPrice=document.getElementById("agricultural__class").innerText;
       agriculturalPrice=agriculturalPrice.match(/\d+/g);
       console.log(agriculturalPrice);



        function getSelectValue()
        {
            var selectedValue = document.getElementById("select-weight__range").value;
            let timber_price=0;
            let metal_price=0;
            let textile_price=0;
            let agriculture_price=0;
            if(selectedValue == 2){

              timber_price=parseInt(timberPrice)+200;
              metal_price=parseInt(metalPrice)+200;
              textile_price=parseInt(textilePrice)+200;
              agriculture_price=parseInt(agriculturalPrice)+200;



            }else if(selectedValue == 3){
              timber_price=parseInt(timberPrice)+500;
              metal_price=parseInt(metalPrice)+500;
              textile_price=parseInt(textilePrice)+500;
              agriculture_price=parseInt(agriculturalPrice)+500;


            }else if(selectedValue == 4){
              timber_price=parseInt(timberPrice)+700;
              metal_price=parseInt(metalPrice)+700;
              textile_price=parseInt(textilePrice)+700;
              agriculture_price=parseInt(agriculturalPrice)+700;
            }else if(selectedValue == 5){
              timber_price=parseInt(timberPrice)+1200;
              metal_price=parseInt(metalPrice)+1200;
              textile_price=parseInt(textilePrice)+1200;
              agriculture_price=parseInt(agriculturalPrice)+1200;
            }else if(selectedValue == 6){
              timber_price=parseInt(timberPrice)+1800;
              metal_price=parseInt(metalPrice)+1800;
              textile_price=parseInt(textilePrice)+1800;
              agriculture_price=parseInt(agriculturalPrice)+1800;
            }else if(selectedValue == 1){
              timber_price=parseInt(timberPrice);
              metal_price=parseInt(metalPrice);
              textile_price=parseInt(textilePrice);
              agriculture_price=parseInt(agriculturalPrice);
            }

             document.getElementById("first_class").innerText="Rs "+timber_price;
              document.getElementById("second_class").innerText="Rs "+metal_price;
              document.getElementById("third_class").innerText="Rs "+textile_price;
              document.getElementById("agricultural__class").innerText="Rs "+agriculture_price;
           console.log(selectedValue);
        }


          </script>
</body>
</html>
