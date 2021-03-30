<!--div class="load-content-container js--load-content-container">
        <div class="load-content">
          <div class="load-content--settings">
          <div class="content-title"!-->
<div class="dashboard">
    <?php include_once '../views/layouts/adminSideNav.php';?>
    <div class="dash-content__container">
      <div class="dash-content">
      <div class="heading-secondary margin-b-m margin-t-m">
            <div class="center-text">
           
            <p> Messages</p>
     

            </div>
            <p id="rcorners2">
            <div class="userrole-name">New Messages</div>
            <br>
            <?php
            $dom = new DOMDocument;
            libxml_use_internal_errors(true);
            $dom->loadHTML('...');
            libxml_clear_errors();
               
                  if (isset($give_details))
                  foreach($give_details as $key => $value1)
                  {
                  $html = "";

                  if($value1['readMessage']=="0" && $value1['readMessage']!="1")
                  {
                  $html .= "<div class='firstname-box content__fields-item'>";
                  $html .= "<label for='firstname' class='form__label_message'><hr>New message from " .$value1['first_name']. ": (" .$value1['details_type']. ")";
                  
                  $details_id=$value1['details_id'];

                  $html .= "<a href='/utrance-railway/messageFull?details_id=$details_id' class=''>";
                  $html .= "<div class='button'>View</div></a></label><hr>";

                  $dom = new DOMDocument();
                  $dom->loadHTML($html);
                  print_r($dom->saveHTML());
                  }
                  
                  }
              ?>
              </p>
              <br>
              <br>
            
              <p id="rcorners2">
             <div class="userrole-name">Old Messages</div>
             <br>
              <?php
              $dom = new DOMDocument;
              libxml_use_internal_errors(true);
              $dom->loadHTML('...');
              libxml_clear_errors();

                  if (isset($give_details))

                  foreach($give_details as $key => $value2)

                  {
                  $html = "";
                
                  if($value2['readMessage']=="1") 
                  {
                  $html .= "<div class='firstname-box content__fields-item'>";

                  $details_id=$value2['details_id'];

                  $html .= "<label for='firstname' class='form__label_message'><hr>Read message from ". $value2['first_name'] .": (" .$value2['details_type']. ")";
                  $html .= "<a href='/utrance-railway/messageFull?details_id=$details_id' class=''>";
                  $html .= "<div class='button'>Read Again</div></a></label><hr>";
                  
                  $dom = new DOMDocument();
                  $dom->loadHTML($html);
                  print_r($dom->saveHTML());
                  }

                 
                  }
              ?>

                </p>
          </div>
     </div>

     
</div>


</div>


</body>
</html>