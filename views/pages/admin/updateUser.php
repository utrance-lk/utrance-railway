<div class="load-content-container">
      <div class="load-content">
        <div class="load-content--settings" >
            <!--div class="content-title"!-->


            <?php
            if(isset($users)){
              foreach($users as $key=>$value){
                
                     
                $html ="";
                $html .="<div class='content-title'>";
                $html .="<p >".$value['first_name']." 's Account Settings</p></div>";


                   $dom = new DOMDocument();
                    $dom->loadHTML($html);
                    print_r($dom->saveHTML());
              }

            }
           
            ?>
             <!--/div!-->
              <!--p>Chris's Account Settings</p!-->
          
             
          <form action="/utrance-railway/users/update?id=<?php echo $users[0]['id'];?>" class="form__user-data" method="POST">
          <!--form action="/utrance-railway/users/update?id=".$value['id']."' class="form__user-data" method="POST"!-->
            <!--div class="content__fields"!-->


                  <?php
                    $dom = new DOMDocument;
                    libxml_use_internal_errors(true);
                    $dom->loadHTML('...');
                    libxml_clear_errors();
                  ?>

              <?php
                  
                  if(isset($users)){
                  
                    foreach($users as $key=>$value){
                     
                     $html ="";
                     
                    
                    
                    $html .="<div class='content__fields'>";
                    $html .="<div class='firstname-box content__fields-item'>";
                    $html .="<label for='firstname' class='form__label'>First Name</label>";
                   
                   if(isset($updateSetValue['firstNameError'])){
                    
                    $html .="<input type='text' name='first_name' class='form__input'  placeholder='".$updateSetValue['firstNameError']."' ></div>";
                   }else{
                    $html .="<input type='text' name='first_name' class='form__input'   value=' ".$value['first_name']." '></div>";

                   }
                    
                    
                    

                    $html .="<div class='lastname-box content__fields-item'>";
                    $html .="<label for='lastname' class='form__label'>Last Name</label>";

                    if(isset($updateSetValue['lastNameError'])){
                      $html .="<input type='text' name='last_name' class='form__input' placeholder='".$updateSetValue['lastNameError']."'></div>";
                    }else{
                      $html .="<input type='text' name='last_name' class='form__input' value=' ".$value['last_name']." '></div>";
                    }
                    

                    $html .="<div class='email-box content__fields-item'>";
                    $html .="<label for='email' class='form__label'>Email</label>";

                    if(isset($updateSetValue['email_id_error'])){
                      $html .="<input type='email' name='email_id' class='form__input' placeholder='".$updateSetValue['email_id_error']."'></div>";
                    }else{
                      $html .="<input type='email' name='email_id' class='form__input' value=' ".$value['email_id']." '></div>";
                    }
                    

                    $html .="<div class='address-box content__fields-item'>";
                    $html .="<span class='adress-box__title'>Address</span>";
                    $html .="<div class='streetline-1 content__fields-item'>";
                    $html .="<label for='stl1' class='form__label'>Street Line 1</label>";

                    if(isset($updateSetValue['streetLine1Error'])){
                      $html .="<input type='text' name='street_line1' class='form__input'   placeholder='".$updateSetValue['streetLine1Error']."'></div>";
                    }else{
                      $html .="<input type='text' name='street_line1' class='form__input'  value=' ".$value['street_line1']." '></div>";
                    }
                    

                    $html .="<div class='streetline-2 content__fields-item'>";
                    $html .="<label for='stl2' class='form__label'>Street Line 2</label>";


                    if(isset($updateSetValue['streetLine2Error'])){
                      $html .="<input type='text' name='street_line2' class='form__input' placeholder='".$updateSetValue['streetLine2Error']."'></div>";
                    }else{
                      $html .="<input type='text' name='street_line2' class='form__input' value=' ".$value['street_line2']." '></div>";
                    }
                    

                    $html .="<div class='city content__fields-item'>";
                    $html .="<label for='city' class='form__label'>City</label>";
                    if(isset($updateSetValue['cityError'])){
                      $html .="<input type='text' name='city' class='form__input' placeholder='".$updateSetValue['cityError']."'></div></div>";
                    }else{
                      $html .="<input type='text' name='city' class='form__input'  value=' ".$value['city']." '></div></div>";
                    }
                    

                    $html .="<div class='contactno-box content__fields-item'>";
                    $html .="<label for='contactno' class='form__label'>Contact No</label>";

                    if(isset($updateSetValue['contactNumError'])){
                      $html .="<input type='text' name='contact_num' class='form__input' placeholder='".$updateSetValue['contactNumError']."'></div>";
                    }else{
                      $html .="<input type='text' name='contact_num' class='form__input' value=' ".$value['contact_num']." '></div>";
                    }
                    

                    
                    $html .="<div class='btn__save-box'>";
                   // $id=$value['id'];
                    $html .="<button class='btn__save btn-settings' type='submit'>Save Settings</button></div>";
                   
                    $dom = new DOMDocument();
                    $dom->loadHTML($html);
                    print_r($dom->saveHTML());
                  
                    }
                  }
                 ?>



          
              </div>
           </form>
           </div>
          </div>
      </div>
    </div>
  