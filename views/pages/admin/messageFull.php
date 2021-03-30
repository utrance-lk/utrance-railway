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
           
            <p> Message</p>
            </div>
            <form action="/utrance-railway/messageFull" method="GET" >
            <div class="content__fields">

               <?php
                  if (isset($give_details)) 
                  foreach($give_details as $key => $value)
   
                  {
                  $html = "";
                  {
                  $html .= "<fieldset class='classess-box content__fields-item'>";
                  $html .= "<legend class='form__label'>To</legend>";    
                  $html .= "<label for='firstname' class='form__label' >".App::$APP->activeUser()['first_name']."</label>";
                  $html .= "</fieldset>";

                  $html .= "<fieldset class='classess-box content__fields-item'>";
                  $html .= "<legend class='form__label'>From</legend>";    
                  $html .= "<label for='firstname' class='form__label'>".$value['first_name']."</label>";
                  $html .= "</fieldset>";

                  $html .= "<fieldset class='classess-box content__fields-item'>";
                  $html .= "<legend class='form__label'>Message</legend>";    
                  $html .= "<label for='firstname' class='form__label'>".$value['detail']."</label>";
                  $html .= "</fieldset>";

                  $html .= "<fieldset class='classess-box content__fields-item'>";
                  $html .= "<legend class='form__label'>Message Type</legend>";  
                  $html .= "<label for='firstname' class='form__label'>".$value['details_type']."</label>";
                  $html .= "</fieldset>";

                  }
                
                  $dom = new DOMDocument();
                  $dom->loadHTML($html);
                  print_r($dom->saveHTML());
                  }
              ?>

                <a href="/utrance-railway/message" class="btn__save-box">
                <div class="button">Back</div>
        </a>
 
 
          </div>
          </form>
          </div>
        </div>
      </div>
</div>
</body>
</html>