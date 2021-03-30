<section class="ticket-prices">
  <form class="ticket-prices__search" method="POST" action="/Freight-prices">
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
            <use xlink:href='/public/img/svg/sprite.svg#icon-magnifying-glass'></use>
        </svg>
    </button>
  </form>
    <div class="search__results-container"></div>
</section>

<script type="text/javascript" src="/public/js/components/viewFreightPrice.js"></script>


<?php if (isset($tickets)): ?>
        <script >
        let x=<?php echo json_encode($tickets); ?>;
        document.querySelector(".js--from__station").textContent = x.start;
        document.querySelector(".js--to__station").textContent = x.destination;
        document.querySelector(".js--search-dropdown__search-from").value = x.start;
        document.querySelector(".js--search-dropdown__search-to").value = x.destination;
         renderResults(<?php echo json_encode($tickets); ?>);


        </script>
      <?php endif;?>


      <?php if (!(isset($tickets))): ?>
        <script>
        document.querySelector(".js--from__station").textContent = stationsArray[3];
        document.querySelector(".js--to__station").textContent = stationsArray[0];
        document.querySelector(".js--search-dropdown__search-from").value = stationsArray[3];
        document.querySelector(".js--search-dropdown__search-to").value = stationsArray[0];
          renderDefaultResults();

        </script>
      <?php endif;?>


      <script>
       document.querySelector(".minus-btn").setAttribute("disabled","disabled");
       let valueCount;
       let onePerson="Person";
       let twoPerson="Persons";
       let firstClassPrice=document.getElementById("first_class").innerText;
       firstClassPrice=firstClassPrice.match(/\d+/g);
       console.log(firstClassPrice)
       let secondClassPrice=document.getElementById("second_class").innerText;
       secondClassPrice=secondClassPrice.match(/\d+/g);
       let thirdClassPrice=document.getElementById("third_class").innerText;
       thirdClassPrice=thirdClassPrice.match(/\d+/g);
       console.log(firstClassPrice);

       function getPriceTotal(){
                let firstTotal=firstClassPrice * valueCount;
                let secondTotal=secondClassPrice * valueCount;
                let thirdTotal=thirdClassPrice * valueCount;
                document.getElementById("first_class").innerText="Rs "+firstTotal;
                document.getElementById("second_class").innerText="Rs "+secondTotal;
                document.getElementById("third_class").innerText="Rs "+thirdTotal;



            }
        document.querySelector(".plus-btn").addEventListener("click",function(){
        valueCount=document.getElementById("number__box").value;
        valueCount++;
         document.getElementById("number__box").value=valueCount;
         console.log(valueCount);
        if(valueCount >1){
            document.querySelector(".minus-btn").removeAttribute("disabled");
            document.querySelector(".minus-btn").classList.remove("disabled");
            document.getElementById("number__box__name").textContent=twoPerson;

            }else{
                document.getElementById("number__box__name").textContent=onePerson;
            }
            getPriceTotal();
      });

       document.querySelector(".minus-btn").addEventListener("click",function(){
         valueCount=document.getElementById("number__box").value;
         valueCount--;

         document.getElementById("number__box").value=valueCount;
         if(valueCount ==1){
             document.querySelector(".minus-btn").setAttribute("disabled","disabled");
             document.getElementById("number__box__name").textContent=onePerson;

         }else{
            document.getElementById("number__box__name").textContent=twoPerson;
         }
         getPriceTotal();

    });
          </script>
</body>
</html>
